@extends('backend.layouts.master')

@section('title','User Results')

@section('content')
    <div class="span9">
        <div class="content">
            @if(Session::has('message'))
                <div class="alert alert-success"> {{ Session::get('message') }} </div>
            @endif
            <div class="module">
                <div class="module-head">
                    <h2> User Results</h2>
                </div>
                <div class="module-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User's Name</th>
                                <th>Quiz</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($quizzes) > 0)
                                @foreach($quizzes as $quiz)
                                    @foreach($quiz->users as $key => $user)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $quiz->name }}</td>
                                            <td>
                                                <a href="{{ route('quiz.question',[$quiz->id]) }}">
                                                    <button type="button" class="btn btn-primary">View Questions</button>
                                                </a>
                                                <a href="/result/{{$user->id}}/{{$quiz->id}}">
                                                    <button class="btn btn-info">View Result</button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            @else
                                <th colspan="4"> No user to display.</th>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
