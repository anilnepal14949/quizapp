<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['question', 'quiz_id'];
    private $limit = 10;
    private $order = 'DESC';

    public function answers() {
        return $this->hasMany('App\Answer');
    }

    public function quiz() {
        return $this->belongsTo('App\Quiz');
    }

    public function storeQuestion($data) {
        return Question::create($data);
    }

    public function getQuestions() {
        return Question::orderBy('created_at',$this->order)->with('quiz')->paginate($this->limit);
    }

    public function getQuestionById($id) {
        return Question::find($id);
    }

    public function updateQuestion($data, $id) {
        $question = $this->getQuestionById($id);
        $question->question = $data['question'];
        $question->quiz_id = $data['quiz_id'];
        $question->save();

        return $question;
    }

    public function deleteQuestion($id) {
        $this->getQuestionById($id)->delete();
    }
}
