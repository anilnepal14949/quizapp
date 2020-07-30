@extends('layouts.app')

@section('content')

    <quiz-component
        :duration = "{{ $time }}"
        :quiz = "{{ $quiz }}"
        :quiz-questions = "{{ $quizQuestions }}"
        :has-quiz-attempted = "{{ $authUserHasAttemptedQuiz }}">

    </quiz-component>

    <script>
        window.oncontextmenu = function() {
            console.log("Right click disabled");
            return false;
        }
    </script>
@endsection
