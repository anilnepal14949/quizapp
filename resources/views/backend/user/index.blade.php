@extends('backend.layouts.master')

@section('title','All Users')

@section('content')
    <div class="span9">
        <div class="content">
            @if(Session::has('message'))
                <div class="alert alert-success"> {{ Session::get('message') }} </div>
            @endif
            <div class="module">
                <div class="module-head">
                    <h2> All Users</h2>
                </div>
                <div class="module-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Occupation</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        @if(count($users) > 0)
                            @foreach($users as $key => $user)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->visible_password }}</td>
                                    <td>{{ $user->occupation }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                            <a href="{{ route('user.edit',[$user->id]) }}">
                                                <button type="button" class="btn btn-info">Edit</button>
                                            </a>
                                            <a href="#"
                                                onClick="
                                                    if(confirm('Do you want to delete this user?')){
                                                        event.preventDefault();
                                                        document.getElementById('delete-form{{$user->id}}').submit();
                                                    }else{
                                                        event.preventDefault();
                                                    }
                                                ">
                                                <button type="submit" value="delete" class="btn btn-danger">Delete</button>
                                            </a>
                                            <form id="delete-form{{$user->id}}" method="post" action="{{ route('user.destroy',[$user->id]) }}">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                            </form>
                                        </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5"> No users to show. </td>
                            </tr>
                        @endif
                        <tbody>
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
