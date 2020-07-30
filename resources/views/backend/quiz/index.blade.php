@extends('backend.layouts.master')

@section('title','All Quizzes')

@section('content')
    <div class="span9">
        <div class="content">
            @if(Session::has('message'))
                <div class="alert alert-success"> {{ Session::get('message') }} </div>
            @endif
            <div class="module">
                <div class="module-head">
                    <h2> All Quizzes</h2>
                </div>
                <div class="module-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Duration</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($quizzes) > 0)
                                @foreach($quizzes as $key=>$quiz)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $quiz->name }}</td>
                                        <td>{{ $quiz->description }}</td>
                                        <td>{{ $quiz->minutes }} minutes</td>
                                        <td>
                                            <a href="{{ route('quiz.edit',[$quiz->id]) }}">
                                                <button type="button" class="btn btn-info">Edit</button>
                                            </a>
                                            <a href="#"
                                                onClick="
                                                    if(confirm('Do you want to delete this quiz?')){
                                                        event.preventDefault();
                                                        document.getElementById('delete-form{{$quiz->id}}').submit();
                                                    }else{
                                                        event.preventDefault();
                                                    }
                                                ">
                                                <button type="submit" value="delete" class="btn btn-danger">Delete</button>
                                            </a>
                                            <a href="{{ route('quiz.question',[$quiz->id]) }}">
                                                <button type="button" class="btn btn-primary">View Questions</button>
                                            </a>
                                            <form id="delete-form{{$quiz->id}}" method="post" action="{{ route('quiz.destroy',[$quiz->id]) }}">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <th colspan="5"> No quiz to display.</th>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
