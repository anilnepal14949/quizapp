<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuizRequest;
use App\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = (new Quiz)->allQuizzes();

        return view('backend.quiz.index', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuizRequest $request)
    {
        $data = $request->all();

        $quiz = (new Quiz)->storeQuiz($data);

        return redirect()->route('quiz.index')->with('message','Quiz created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function viewQuestions($id)
    {
        $quizzes = Quiz::with('questions')->where('id',$id)->get();

        return view('backend.quiz.show', compact('quizzes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz = (new Quiz)->getQuizById($id);

        return view('backend.quiz.edit',compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuizRequest $request, $id)
    {
        $data = $request->all();

        $quiz = (new Quiz)->updateQuiz($data, $id);

        return redirect()->route('quiz.index')->with('message','Quiz edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        (new Quiz)->deleteQuiz($id);

        return redirect()->route('quiz.index')->with('message','Quiz deleted successfully');
    }
}
