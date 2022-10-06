@extends('author.layouts.default')


@section('title', 'Conference Table')

@section('bodys')
<div class="card-body">
    <table id="bootstrap-data-table" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Title </th>
                <th>University</th>
                <th>Submission Deadline</th>
                <th>Conference Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $d)
            <tr>
                <td>{{ $d->id }}</td>
                <td>
                    {{ $d->title  }}
                </td>
                <td>{{ $d->name  }}</td>
                <td>
                    {{ $d->submission_deadline }}
                </td>
                <td>{{ $d->conference_date }}</td>
                <td>
                    <a href="{{ url('author/conference/'.$d->id) }}" class="btn btn-info">Submit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop