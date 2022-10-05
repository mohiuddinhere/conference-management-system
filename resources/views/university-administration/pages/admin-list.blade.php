@extends('university-administration.layouts.default')

@section('title')
<title>Admin List</title>
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $d)
                                    <tr>
                                        <td>{{ $d->id }}</td>
                                        <td>
                                            {{ $d->name }}
                                        </td>
                                        <td>{{ $d->email }}</td>
                                        <td>
                                            <a href="{{ url('uni-admin/edit-admin-acc/'.$d->id) }}" class="btn btn-info"><i class="fa-solid fa-user-pen"></i></a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{ $d->id }}">
                                            <i class="fa-solid fa-trash"></i>
                                            </button>

                                            <!-- The Modal -->
                                            <div class="modal" id="myModal{{ $d->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Delete Confirmation</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    Are you sure you want to delete <b>{{ $d->name }}</b> data?
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <a href="{{ url('uni-admin/delete-admin-acc/'.$d->id) }}" class="btn btn-success">Delete</a>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>

                                                </div>
                                            </div>
                                            </div>
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