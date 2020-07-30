@extends('backend.layouts.master')

@section('title', 'Edit Quiz')

@section('content')
    <div class="span9">
        <div class="content">
            @if(Session::has('message'))
                <div class="alert alert-success"> {{ Session::get('message') }} </div>
            @endif
            <form action="{{ route('quiz.update',[$quiz->id]) }}" method="post">
                {{ method_field('PUT') }}
                @csrf
                <div class="module">
                    <div class="module-head">
                        <h2>Edit {{ $quiz->name }}</h2>
                    </div>
                    <div class="module-body">
                        <div class="control-group">
                            <label for="name" class="control-label">Quiz Name</label>
                            <div class="controls">
                                <input type="text" name="name" class="span8" placeholder="Enter name of the quiz..." value="{{ $quiz->name }}">
                            </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="control-group">
                            <label for="description" class="control-label">Description</label>
                            <div class="controls">
                                <textarea name="description" class="span8" placeholder="Enter description of the quiz...">{{ $quiz->description }}</textarea>
                            </div>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="control-group">
                            <label for="minutes" class="control-label">Minutes</label>
                            <div class="controls">
                                <input type="text" name="minutes" class="span8" placeholder="Enter duration of quiz..." value="{{ $quiz->minutes }}">
                            </div>
                            @error('minutes')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn btn-success"> Submit </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


