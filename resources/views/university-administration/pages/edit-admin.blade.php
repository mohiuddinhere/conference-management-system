@extends('university-administration.layouts.default')

@section('title')
<title>Edit Admin</title>
@endsection

@section('content')
    <!-- Content -->
    <div class="container">
        <h1 class="text-center mt-4 pt-4 mb-4"><b>Update Admin Details</b></h1>
        @if(Session::has('err'))
            <div class="alert alert-danger">
                {{ Session::get('err') }}
            </div>
        @endif
        <div class="login-form">
            <form method="POST" action="{{ url('update-admin/'.$admins->id) }}">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" value="{{ $admins->name }}" name="name" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <label>Email address</label>
                    <input type="email" value="{{ $admins->email }}" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <label>Old Password</label>
                    <input type="password" name="oldpassword" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <label>New Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="confirmPassword" class="form-control" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-info col-sm-2">Update</button>
            </form>
        </div>
        <br>
    </div>
    <!-- /.content -->
@endsection