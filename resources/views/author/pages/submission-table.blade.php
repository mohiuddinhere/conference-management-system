@extends('author.layouts.default')


@section('title', 'submission Table')

@section('bodys')
<div class="card-body">
    <table id="bootstrap-data-table" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Conferences Title</th>
                <th>Title </th>
                <th>Abstract</th>
                <th>Keyword</th>
                <th>Track Name</th>
                {{-- <th>File</th> --}}
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $d)
            <tr>
                <td>
                    {{ Str::limit($d->conferences_title, 30) }}
                </td>
                <td>
                    {{ Str::limit($d->title, 30) }}
                </td>
                <td>
                    {{ Str::limit($d->abstract, 30)  }}
                </td>
                <td>
                    {{ Str::limit($d->tags, 30)  }}
                </td>
                <td>
                    {{ $d->tracks_name }}
                </td>
                {{-- <td>
                    {{ Str::limit($d->file_name, 12) }}
                </td> --}}
                <td>
                    <a href="{{ url('author/submission/update/'.$d->submission_id) }}" class="btn btn-info">update</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop