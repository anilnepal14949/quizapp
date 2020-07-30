@extends('backend.layouts.master')

@section('title', 'Update Questions')

@section('content')
    <div class="span9">
        <div class="content">
            <form action="{{ route('question.update',[$question->id]) }}" method="post">
                @csrf
                {{ method_field('PUT') }}
                <div class="module">
                    <div class="module-head">
                        <h2>Update {{ $question->question }}</h2>
                    </div>
                    <div class="module-body">
                        <div class="control-group">
                            <label for="quiz_id" class="control-label">Quiz</label>
                            <div class="controls">
                                <select name="quiz_id" id="quiz_id" class="span8">
                                    <option value="0"> Select Quiz..</option>
                                    @foreach($quizzes as $quiz)
                                        <option value="{{ $quiz->id }}" @if($quiz->id == $question->quiz_id) selected @endif>{{ $quiz->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="control-group">
                            <label for="question" class="control-label">Question Name</label>
                            <div class="controls">
                                <input type="text" name="question" class="span8" placeholder="Enter question..." value="{{ $question->question }}">
                            </div>
                            @error('question')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="control-group">
                            <label for="options" class="control-label">Options</label>
                            <div class="controls">
                                @foreach($question->answers as $key => $answer)
                                    <input type="text" name="options[]" class="span7" placeholder="Enter option {{ $key+1 }}..." value="{{ $answer->answer }}" required>
                                    <input type="radio" name="correct_answer" value="{{ $key+1 }}" @if($answer->is_correct) checked @endif><span> Is Correct Answer? </span>
                                @endforeach
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn btn-success"> Submit </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


