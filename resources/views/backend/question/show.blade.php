@extends('backend.layouts.master')

@section('title','Question Details')

@section('content')

    <div class="span9">
        <div class="content">
            <div class="module">
                <div class="module-body">
                    <p>
                        <h3 class="heading">
                            {{ $question->question }}
                        </h3>
                    </p>
                    <div class="module-body table">
                        <table class="table table-message">
                            <tbody>
                                @foreach($question->answers as $key => $answer)
                                    <tr>
                                        <td class="cell-author hidden-phone hidden-tablet">
                                            {{$key + 1}}. {{ $answer->answer }}
                                            @if($answer->is_correct)
                                            <span class="badge badge-success pull-right">
                                                Correct Answer
                                            </span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="module-foot">
                        <a href="{{ route('question.edit',[$question->id]) }}">
                            <button type="button" class="btn btn-info">
                                Edit
                            </button>
                        </a>
                        <a href="#"
                            onClick="
                                if(confirm('Do you want to delete this quiz?')){
                                    event.preventDefault();
                                    document.getElementById('delete-form{{$question->id}}').submit();
                                }else{
                                    event.preventDefault();
                                }
                            ">
                            <button type="submit" value="delete" class="btn btn-danger">Delete</button>
                        </a>
                        <a href="{{ route('question.index') }}">
                            <button type="button" class="btn btn-inverse pull-right">
                                Back
                            </button>
                        </a>
                        <form id="delete-form{{$question->id}}" method="post" action="{{ route('question.destroy',[$question->id]) }}">
                            @csrf
                            {{ method_field('DELETE') }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
