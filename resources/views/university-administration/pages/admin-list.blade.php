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
                                            <a href="{{ url('uni-admin/delete-admin-acc/'.$d->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
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