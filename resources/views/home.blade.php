@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @if(Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif
            <div class="card">
                <div class="card-header"><h2>Quizzes Assigned</h2></div>
                @if($isExamAssigned)
                    @foreach($quizzes as $quiz)
                        <div class="card-body">
                            <p><h3>{{ $quiz->name }}</h3></p>
                            <p>About Quiz: {{ $quiz->description }}</p>
                            <p>Duration: {{ $quiz->minutes }} minutes</p>
                            <p>Number of questions: {{ $quiz->questions->count() }}</p>
                            <p>
                                @if(!in_array($quiz->id, $wasQuizCompleted))
                                    <a href="/user/quiz/{{$quiz->id}}">
                                        <button type="button" class="btn btn-success"> Start Quiz </button>
                                    </a>
                                @else
                                    <a href="/result/user/{{ auth()->user()->id }}/quiz/{{ $quiz->id }}"> View Results </a>
                                    <span class="float-right badge badge-danger"> Completed </span>
                                @endif
                            </p>
                        </div>
                        <hr>
                    @endforeach
                @else
                    <p><h3 class="text-center"> You are not assigned any quiz !</h3></p>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3>User Profile</h3>
                </div>
                <div class="card-body">
                    <p>
                        Email: {{ auth()->user()->email }}
                    </p>
                    <p>
                        Occupation: {{ auth()->user()->occupation }}
                    </p>
                    <p>
                        Address: {{ auth()->user()->anil }}
                    </p>
                    <p>
                        Phone: {{ auth()->user()->phone }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
