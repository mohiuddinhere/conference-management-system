@extends('university-administration.layouts.default')

@section('title')
<title>Create Admin</title>
@endsection

@section('content')
    <!-- Content -->
    <div class="container">
        <h1 class="text-center mt-4 pt-4 mb-4"><b>Register New Admin</b></h1>
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="login-form">
            <form method="POST" action="{{ url('store-admin') }}">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <label>Email address</label>
                    <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="confirmPassword" class="form-control" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-info col-sm-2">Register</button>
            </form>
        </div>
        <br>
    </div>
    <!-- /.content -->
@endsection