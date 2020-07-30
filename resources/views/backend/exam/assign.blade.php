@extends('backend.layouts.master')

@section('title', 'Assign Exam')

@section('content')
    <div class="span9">
        @if(Session::has('message'))
            <div class="alert alert-success"> {{ Session::get('message') }} </div>
        @endif
        <div class="content">
            <form action="{{ route('assign.exam') }}" method="post">
                @csrf
                <div class="module">
                    <div class="module-head">
                        <h2>Assign Exam</h2>
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
                            <label for="user_id" class="control-label">User</label>
                            <div class="controls">
                                <select name="user_id" id="user_id" class="span8">
                                    <option value="0"> Select User..</option>
                                    @foreach(App\User::where('is_admin',0)->get() as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('user_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn btn-success"> Assign Exam </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


