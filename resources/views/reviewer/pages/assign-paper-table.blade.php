@extends('reviewer.layouts.default')


@section('title', 'Assign Paper Table')

@section('user_name', $user_name)

@section('bodys')

<div class="animated fadeIn">
    <div class="row">

        <div class="col-md-12">

            <div class="row d-flex justify-content-center">
                <div class="card bg-dark mr-4" style="width: 18rem;">
                    <div class="card-body text-center text-white">
                        <h4 class="card-title"><b>Total User</b></h4>
                        <h6 class="card-subtitle mb-2">#</h6>
                    </div>
                </div>

                <div class="card bg-dark mr-4" style="width: 18rem;">
                    <div class="card-body text-center text-white">
                        <h4 class="card-title"><b>Total Conference</b></h4>
                        <h6 class="card-subtitle mb-2">#</h6>
                    </div>
                </div>

                <div class="card bg-dark mr-4" style="width: 18rem;">
                    <div class="card-body text-center text-white">
                        <h4 class="card-title"><b>Total University</b></h4>
                        <h6 class="card-subtitle mb-2">#</h6>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Paper Title</th>
                                <th>Keywords</th>
                                <th>Massage From University</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $d)
                            <tr>
                                <td>{{ $d->id }}</td>
                                <td>
                                    {{ Str::limit($d->submission_title, 30) }}
                                </td>
                                <td>
                                    {{ Str::limit($d->tags, 20) }}
                                </td>
                                <td>{{ Str::limit($d->msg, 30) }}</td>
                                <td>
                                    <a href="{{ url('paper-download/'.$d->submission_id) }}" class="btn btn-info">Download</a>
                                    <a href="{{ url('review-submission-paper/'.$d->submission_id) }}" class="btn btn-info">View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div><!-- .animated -->



@stop