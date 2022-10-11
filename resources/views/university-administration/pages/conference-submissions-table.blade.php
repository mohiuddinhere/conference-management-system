@extends('university-administration.layouts.default')


@section('title', 'Conference Table')

@section('content')
<div class="card-body">
    <table id="bootstrap-data-table" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Title</th>
                <th>User Name</th>
                <th>Track Name</th>
                <th>Tags</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $d)
            <tr>
                <td>{{ $d->conference_name }}</td>
                <td>{{ $d->title }}</td>
                <td>
                    {{ $d->user_name  }}
                </td>
                <td>{{ $d->track_name  }}</td>
                <td>
                    {{ $d->tags }}
                </td>
                <td>
                    <a href="{{ url('uni_admin/add-reviewer/'.$d->id) }}" class="btn btn-info">Add Reviewer</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop