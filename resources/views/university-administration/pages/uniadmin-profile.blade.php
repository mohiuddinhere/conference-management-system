@extends('university-administration.layouts.default')

@section('title')
    <title>Uni Admin Profile</title>
@endsection

@section('content')
    <!-- Content -->
    <div class="container pt-4">
        <div class="card">
            <div class="card-body">
                @foreach($data as $d)
                <h4><b>Name:</b> {{ $d->name }}</h4>
                <h4 class="mt-2"><b>Email:</b> {{ $d->email }}</h4>
                @endforeach
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection