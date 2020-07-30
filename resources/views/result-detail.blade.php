@extends('layouts.app')

@section('content')

    <div class="containter">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <center> <h2>Your Quiz Results</h2></center>
                @foreach($results as $key=>$result)
                <div class="card">
                    <div class="card-header">
                        <p>
                            <h2>
                                {{$key+1}}. {{ $result->question->question }}
                            </h2>
                        </p>
                    </div>
                    <div class="card-body">
                        @php
                            $i = 1;
                            $answers = DB::table('answers')->where('question_id', $result->question_id)->get();

                            foreach($answers as $answer) {
                                echo '<p>'.$i++.') '.$answer->answer.'</p>';
                            }
                        @endphp
                        <p>
                            <mark>Your Answer: {{ $result->answer->answer }}</mark>
                            @if($result->answer->is_correct)
                                <span class="badge badge-success">Correct Answer</span>
                            @else
                                <span class="badge badge-danger">Wrong Answer</span>
                            @endif
                        </p>
                        @php
                            $correctAnswers = DB::table('answers')->where('question_id',$result->question_id)->where('is_correct',1)->get();

                            foreach($correctAnswers as $correctAnswer) {
                                echo '<p class="alert alert-success">Correct Answer: '.$correctAnswer->answer.'</p>';
                            }
                        @endphp
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
