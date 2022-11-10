@extends('admin.layouts.default')


@section('title', 'Conference Table')

@section('bodys')

<div class="animated fadeIn">
    <div class="row">

        <div class="col-md-12">

            <div class="row d-flex justify-content-center">
                <div class="card bg-dark mr-4" style="width: 18rem;">
                    <div class="card-body text-center text-white">
                        <h4 class="card-title"><b>Total User</b></h4>
                        <h6 class="card-subtitle mb-2">{{ $total_user }}</h6>
                    </div>
                </div>

                <div class="card bg-dark mr-4" style="width: 18rem;">
                    <div class="card-body text-center text-white">
                        <h4 class="card-title"><b>Total Conference</b></h4>
                        <h6 class="card-subtitle mb-2">{{ $total_conference }}</h6>
                    </div>
                </div>

                <div class="card bg-dark mr-4" style="width: 18rem;">
                    <div class="card-body text-center text-white">
                        <h4 class="card-title"><b>Total University</b></h4>
                        <h6 class="card-subtitle mb-2">{{ $total_universities }}</h6>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Deadline</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $d)
                            <tr>
                                <td>{{ $d->id }}</td>
                                <td>
                                    <a href="{{ url('conference/'.$d->id) }}"> {{ $d->title }} </a> 
                                </td>
                                <td>
                                    {{ $d->submission_deadline }}
                                </td>
                                <td>{{ $d->conference_date }}</td>
                                <td>{{ $d->updated_at }}</td>
                                <td>
                                    <a href="{{ url('edit-conference/'.$d->id) }}" class="btn btn-info">Edit</a>
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
