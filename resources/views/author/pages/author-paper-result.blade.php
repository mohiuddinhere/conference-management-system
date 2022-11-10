@extends('author.layouts.default')


@section('title', 'Author Register')

@section('bodys')
<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Conference Title</th>
                            <th>Submission Title</th>
                            <th>University</th>
                            <th>Conference Date</th>
                            <th>Result</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $d)
                        <tr>
                            <td>{{ $d->conferenceTitle }}</td>
                            <td>{{ $d->submissionTitle }}</td>
                            <td>{{ $d->universityName }}</td>
                            <td>{{ $d->conferenceDate }}</td>
                            <td><div class="alert alert-info">{{ $d->reviewStatus }}</div></td>
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