@extends('admin.layouts.default')


@section('title', 'Conference Table')

@section('bodys')
<div class="card-body">
    <table id="bootstrap-data-table" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Address</th>
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
                    {{ $d->name }}
                </td>
                <td>
                    {{ $d->address }}
                </td>
                <td>{{ $d->created_at }}</td>
                <td>{{ $d->updated_at }}</td>
                <td>
                    <a href="{{ url('edit-conference/'.$d->id) }}" class="btn btn-info">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop