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

                        <div class="d-flex">
                            <h3 class="mb-2">Here is the Paper</h3>
                            <form method="post" action="{{ url('reviewer/mark/'.$data->id) }}" class="ml-auto p-2">
                            @csrf
                                <div class="d-flex form-group">
                                    <select name="marking" class="form-control">
                                        <option value="">GIVE REVIEW</option>
                                        <option value="Accepted">Accepted</option>
                                        <option value="PartiallyAccepted">Partially Accepted</option>
                                        <option value="Rejected">Rejected</option>
                                    </select>
                                    <button class="btn btn-info ml-1" type="submit">Submit</button>
                                </div>
                                @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                                @if(Session::has('err'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('err') }}
                                    </div>
                                @endif
                            </form>
                        </div>
                        
                        <iframe src="{{ asset('./uploads/'.$data->file_name) }}" width="100%" height="550px">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div><!-- .animated -->
@stop