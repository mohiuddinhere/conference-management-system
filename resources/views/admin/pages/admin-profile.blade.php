@extends('admin.layouts.default')


@section('title', 'University Admin Profile')

@section('bodys')

    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @foreach($data as $d)
                        <h4><b>Name:</b> {{ $d->name }}</h4>
                        <h4 class="mt-2"><b>Email:</b> {{ $d->email }}</h4>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
@stop
