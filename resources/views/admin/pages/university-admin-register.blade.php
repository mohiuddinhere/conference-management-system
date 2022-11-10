@extends('admin.layouts.default')

@section('title', 'Conference Admin Create')

@section('bodys')
<body class="bg-white">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content shadow p-3 bg-white rounded">
                {{-- <div class="login-logo">
                    <img class="align-content" src="{{ asset('images/logo.png') }}" alt="">
                </div> --}}
                <div class="login-form">
                    <form method="POST" action="{{ url('admin/register/uni-admin/add') }}">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label>Institution</label>
                            <input type="text" name="univarsity_name" class="form-control" placeholder="Univarsity">
                        </div>
                        <div class="form-group">
                            <label>Institution Address</label>
                            <textarea type="text" name="address" class="form-control" placeholder="Address" rows="2"></textarea>
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
                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @stop

