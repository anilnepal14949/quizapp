<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = ['name', 'description', 'minutes'];

    public function questions() {
        return $this->hasMany('App\Question');
    }

    public function users() {
        return $this->belongsToMany('App\User','quiz_users');
    }

    public function storeQuiz($data) {
        return Quiz::create($data);
    }

    public function allQuizzes() {
        return Quiz::all();
    }

    public function getQuizById($id) {
        return Quiz::find($id);
    }

    public function updateQuiz($data, $id) {
        return $this->getQuizById($id)->update($data);
    }

    public function deleteQuiz($id) {
        return $this->getQuizById($id)->delete();
    }

    public function assignExam($data) {
        $quizId = $data['quiz_id'];
        $quiz = Quiz::find($quizId);
        $userId = $data['user_id'];

        return $quiz->users()->syncWithoutDetaching($userId);
    }

    public function hasQuizAttempted() {
        $attemptQuiz = [];
        $authUser = auth()->user()->id;
        $users = Result::where('user_id',$authUser)->get();

        foreach($users as $user){
            array_push($attemptQuiz, $user->quiz_id);
        }

        return $attemptQuiz;
    }
}
