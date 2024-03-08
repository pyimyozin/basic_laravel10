@extends('back.master')
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <h5 class="text-">User Lists</h5>
                <a href="{{url('/users/registration')}}" style="text-decoration: none;">
                    <button class="btn btn-primary btn-sm mb-2" style="float: right;"><i class="fa fa-plus-circle"></i> Add New </button>
                </a>
                @if(session('successAlert'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <strong>{{ session('successAlert') }}</strong>
                        <button class="close" data-dismiss="alert">&times;</button>
                    </div>
                @endif
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
@endsection