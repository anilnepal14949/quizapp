@extends('backend.layouts.master')

@section('title', 'Create Questions')

@section('content')
    <div class="span9">
        <div class="content">
            <form action="{{ route('question.store') }}" method="post">
                @csrf
                <div class="module">
                    <div class="module-head">
                        <h2>Create Questions</h2>
                    </div>
                    <div class="module-body">
                        <div class="control-group">
                            <label for="quiz_id" class="control-label">Quiz</label>
                            <div class="controls">
                                <select name="quiz_id" id="quiz_id" class="span8">
                                    <option value="0"> Select Quiz..</option>
                                    @foreach($quizzes as $quiz)
                                        <option value="{{ $quiz->id }}">{{ $quiz->name }}</option>
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
                                <input type="text" name="question" class="span8" placeholder="Enter question..." value="{{old('question')}}">
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
                                @for($i=1;$i<=4;$i++)
                                    <input type="text" name="options[]" class="span7" placeholder="Enter option {{ $i }}..." value="{{old('name')}}" required>
                                    <input type="radio" name="correct_answer" value="{{ $i }}"><span> Is Correct Answer? </span>
                                @endfor
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


