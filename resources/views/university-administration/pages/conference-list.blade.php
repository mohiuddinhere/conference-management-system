@extends('university-administration.layouts.default')

@section('title')
<title>Conference List</title>
@endsection

@section('content')
    <!-- Content -->
    <div class="content">
    
        <div class="animated fadeIn">
            <div class="row">
    
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Conference List</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Conference Name</th>
                                        <th>Conference Date</th>
                                        <th>Submission Deadline</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($conferences as $c)
                                    <tr>
                                        <td>{{ $c->id }}</td>
                                        <td>
                                            {{ $c->title }}
                                        </td>
                                        <td>{{ $c->conference_date }}</td>
                                        <td>{{ $c->submission_deadline }}</td>
                                        <td>
                                            <a href="{{ url('uni-admin/conference/table/submissions/'.$c->id) }}" class="btn btn-info">Submission</a>
                                            <a href="{{ url('uni-admin/edit-conference/'.$c->id) }}" class="btn btn-info">Edit</a>
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
    </div>
    <!-- /.content -->
@endsection
        