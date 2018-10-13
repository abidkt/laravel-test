@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Users


                    <div class="float-right">
                        <a href="{{route('add-user')}}"class="btn btn-sm btn-info">Add New User</a>
                        &nbsp;
                        <div class="dropdown float-right">
                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Export
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{route('user-export-1')}}">Template 1</a>
                                <a class="dropdown-item" href="{{route('user-export-2')}}">Template 2</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    @include('includes.flash-message')

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <th scope="row">{{$user->id}}</th>
                                        <td>{{$user->first_name}}</td>
                                        <td>{{$user->last_name}}</td>
                                        <td>{{$user->city}}</td>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->created_at}}</td>
                                        <td>
                                            <form action="{{ route('delete-user', ['id' => $user->id]) }}" method="post" onsubmit="return submitForm();">
                                                {!! method_field('delete') !!}
                                                {!! csrf_field() !!}
                                                <button type="submit" class="btn btn-sm btn-danger float-right">Delete</a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function submitForm() {
        var confirm = window.confirm('Do you want to delete the user?');
        if(confirm)
            return true;
        return false;
    }
</script>
@endsection
