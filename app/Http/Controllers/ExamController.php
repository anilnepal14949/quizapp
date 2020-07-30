<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Quiz;
use App\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quizzes = Quiz::all();
        return view('backend.exam.assign', compact('quizzes'));
    }

    public function assignExam(Request $request) {
        $quiz = (new Quiz)->assignExam($request->all());

        return redirect()->back()->with('message','Exam assigned to user successfully');
    }

    public function userExam() {
        $quizzes = Quiz::all();

        return view('backend.exam.index',compact('quizzes'));
    }

    public function removeExam(Request $request) {
        $userId = $request->get('user_id');
        $quizId = $request->get('quiz_id');

        $quiz = Quiz::find($quizId);
        $result = Result::where('quiz_id', $quizId)->where('user_id',$userId)->exists();

        if($result) {
            return redirect()->back()->with('message','Exam cannot be deleted! User has already attempted the quiz.');
        }else {
            $quiz->users()->detach($userId);
            return redirect()->back()->with('message','Exam successfully detached from user.');
        }
    }

    public function getQuizQuestions(Request $request, $quizId) {
        $authUser = auth()->user()->id;

        // check if user has been assigned a particular quiz
        $userIds = DB::table('quiz_users')->where('user_id', $authUser)->pluck('quiz_id')->toArray();
        if(!in_array($quizId, $userIds)) {
            return redirect()->to('/home')->with('error','You are not assigned to this quiz.');
        }

        $quiz = Quiz::find($quizId);
        $time = Quiz::where('id', $quizId)->value('minutes');
        $quizQuestions = Question::where('quiz_id', $quizId)->with('answers')->get();

        $authUserHasAttemptedQuiz = Result::where('user_id', $authUser)->where('quiz_id', $quizId)->get();

        // has user attempted a particular quiz
        $wasCompleted = Result::where('user_id',$authUser)->whereIn('quiz_id', (new Quiz)->hasQuizAttempted())->pluck('quiz_id')->toArray();
        if(in_array($quizId, $wasCompleted)) {
            return redirect()->to('/home')->with('error','This quiz is completed. Please wait to be reassigned to attempt again.');
        }

        return view('quiz', compact('quiz','time','quizQuestions','authUserHasAttemptedQuiz'));
    }

    public function storeResults(Request $request) {
        $question_id = $request->get('question_id');
        $answer_id = $request->get('answer_id');
        $quiz_id = $request->get('quiz_id');
        $user_id = auth()->user()->id;

        $result = Result::updateOrCreate([
            'user_id'=>$user_id,
            'quiz_id'=>$quiz_id,
            'question_id'=>$question_id
        ], [
            'answer_id'=>$answer_id
        ]);

        return $result;
    }

    public function viewResult($user_id, $quiz_id) {
        $results = Result::where('user_id', $user_id)->where('quiz_id', $quiz_id)->get();

        return view('result-detail', compact('results'));
    }

    public function result() {
        $quizzes = Quiz::all();

        return view('backend.result.index',compact('quizzes'));
    }

    public function userQuizResult($user_id, $quiz_id) {
        $results = Result::where('user_id', $user_id)->where('quiz_id',$quiz_id)->get();
        $totalQuestions = Question::where('quiz_id', $quiz_id)->count();

        $attemptQuestions = Result::where('quiz_id', $quiz_id)->where('user_id',$user_id)->count();
        $quizzes = Quiz::where('id',$quiz_id)->get();

        $ans = [];
        foreach($results as $result) {
            array_push($ans, $result->answer_id);
        }

        $userCorrectAnswers = Answer::whereIn('id', $ans)->where('is_correct',1)->count();
        $userWrongAnswers = $totalQuestions - $userCorrectAnswers;

        if($attemptQuestions > 0)
            $percentage = ($userCorrectAnswers/$totalQuestions) * 100;
        else
            $percentage = 0;

        return view('backend.result.result',compact('results', 'totalQuestions','attemptQuestions', 'userCorrectAnswers','userWrongAnswers','percentage', 'quizzes'));
    }
}
