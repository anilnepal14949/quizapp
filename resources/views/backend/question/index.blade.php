@extends('backend.layouts.master')

@section('title','All Questions')

@section('content')
    <div class="span9">
        <div class="content">
            @if(Session::has('message'))
                <div class="alert alert-success"> {{ Session::get('message') }} </div>
            @endif
            <div class="module">
                <div class="module-head">
                    <h2> All Questions</h2>
                </div>
                <div class="module-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Question</th>
                                <th>Quiz</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        @if(count($questions) > 0)
                            @foreach($questions as $key => $question)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $question->question }}</td>
                                    <td>{{ $question->quiz->name }}</td>
                                    <td>{{ date('F d, Y', strtotime($question->created_at)) }}</td>
                                    <td>
                                            <a href="{{ route('question.edit',[$question->id]) }}">
                                                <button type="button" class="btn btn-info">Edit</button>
                                            </a>
                                            <a href="#"
                                                onClick="
                                                    if(confirm('Do you want to delete this question?')){
                                                        event.preventDefault();
                                                        document.getElementById('delete-form{{$question->id}}').submit();
                                                    }else{
                                                        event.preventDefault();
                                                    }
                                                ">
                                                <button type="submit" value="delete" class="btn btn-danger">Delete</button>
                                            </a>
                                            <a href="{{ route('question.show',[$question->id]) }}">
                                                <button type="button" class="btn btn-primary">View Answers</button>
                                            </a>
                                            <form id="delete-form{{$question->id}}" method="post" action="{{ route('question.destroy',[$question->id]) }}">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                            </form>
                                        </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5"> No questions to show. </td>
                            </tr>
                        @endif
                        <tbody>
                        </tbody>
                    </table>
                    {{ $questions->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
