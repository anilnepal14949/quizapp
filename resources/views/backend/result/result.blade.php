@extends('backend.layouts.master')

@section('title','Result')

@section('content')
    <div class="span9">
        <div class="content">
            @if(Session::has('message'))
                <div class="alert alert-success"> {{ Session::get('message') }} </div>
            @endif
            <div class="module">
                <div class="module-head">
                    <h2> Result</h2>
                </div>
                <div class="module-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Quiz</th>
                                <th>Total Questions</th>
                                <th>Attempt Questions</th>
                                <th>Correct Answers</th>
                                <th>Wrong Answers</th>
                                <th>Percentage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($quizzes as $key=>$quiz)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $quiz->name }}</td>
                                    <td>{{ $totalQuestions }}</td>
                                    <td>{{ $attemptQuestions }} </td>
                                    <td>{{ $userCorrectAnswers }}</td>
                                    <td>{{ $userWrongAnswers }}</td>
                                    <td>{{ round($percentage,2) }}%</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Result</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($results as $key=>$result)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $result->question->question }}</td>
                                    <td>{{ $result->answer->answer }}</td>
                                    @if($result->answer->is_correct == 1)
                                        <td><span class="badge badge-success">Correct</span></td>
                                    @else
                                        <td><span class="badge badge-warning">Incorrect</span></td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
