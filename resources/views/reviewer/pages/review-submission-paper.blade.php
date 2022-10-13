@extends('reviewer.layouts.default')


@section('title', 'Reviewer Dashboard')

@section('user_name', $user_name)

@section('bodys')
<div class="animated fadeIn">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="mx-5 text-justify">
                        <h2>{{ $data->title }}</h2>
                        <hr />
                        <h3>Abstract</h3>
                        <p>{{ $data->abstract }}</p>
                        <hr />
                        <h3>Keyword</h3>
                        <p>{{ $data->tags }}</p>
                        <hr />

                        <h3 class="mb-2">Here is the Paper</h3>
                        <iframe src="{{ asset('./uploads/'.$data->file_name) }}" width="100%" height="550px">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div><!-- .animated -->
@stop