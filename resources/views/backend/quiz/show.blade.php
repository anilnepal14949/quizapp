@extends('backend.layouts.master')

@section('title','Quiz Details')

@section('content')

    <div class="span9">
        <div class="content">
            @foreach($quizzes as $quiz)
                <div class="module">
                    <div class="module-body">
                        <p>
                            <h3 class="heading">
                                {{ $quiz->name }}
                            </h3>
                        </p>
                        <div class="module-body table">
                            @foreach($quiz->questions as $key => $question)
                                <table class="table table-message">
                                    <tbody>
                                        <tr class="read">
                                            {{$key + 1}}. {{ $question->question }}
                                            <td class="cell-author hidden-phone hidden-tablet">
                                                @foreach($question->answers as $answer)
                                                    <p>
                                                        {{ $answer->answer }}
                                                        @if($answer->is_correct)
                                                        <span class="badge badge-success">
                                                            Correct Answer
                                                        </span>
                                                        @endif
                                                    </p>
                                                @endforeach
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            @endforeach
                        </div>
                        <div class="module-foot">
                            <a href="{{ route('quiz.index') }}">
                                <button type="button" class="btn btn-inverse pull-right">
                                    Back
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
