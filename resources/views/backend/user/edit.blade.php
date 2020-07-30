@extends('backend.layouts.master')

@section('title', 'Update User')

@section('content')
    <div class="span9">
        <div class="content">
            <form action="{{ route('user.update',[$user->id]) }}" method="post">
                @csrf
                {{ method_field('PUT') }}
                <div class="module">
                    <div class="module-head">
                        <h2>Update User</h2>
                    </div>
                    <div class="module-body">
                        <div class="control-group">
                            <label for="name" class="control-label">Full Name</label>
                            <div class="controls">
                                <input type="text" name="name" class="span8" placeholder="Enter full name..." value="{{ $user->name }}">
                            </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="control-group">
                            <label for="password" class="control-label">Password</label>
                            <div class="controls">
                                <input type="text" name="password" class="span8" placeholder="Enter password..." value="{{ $user->visible_password }}">
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="control-group">
                            <label for="occupation" class="control-label">Occupation</label>
                            <div class="controls">
                                <input type="text" name="occupation" class="span8" placeholder="Enter occupation..." value="{{ $user->occupation }}">
                            </div>
                            @error('occupation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="control-group">
                            <label for="address" class="control-label">Address</label>
                            <div class="controls">
                                <input type="text" name="address" class="span8" placeholder="Enter address..." value="{{ $user->address }}">
                            </div>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="control-group">
                            <label for="phone" class="control-label">Phone</label>
                            <div class="controls">
                                <input type="text" name="phone" class="span8" placeholder="Enter phone..." value="{{ $user->phone }}">
                            </div>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn btn-success"> Update </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


