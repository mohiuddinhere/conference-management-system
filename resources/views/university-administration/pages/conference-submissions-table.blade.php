@extends('university-administration.layouts.default')


@section('title', 'Conference Table')

@section('content')
<div class="card-body">
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif
    <table id="bootstrap-data-table" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Conference Title</th>
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
                <td>{{ $d->id }}</td>
                <td>{{ $d->conference_name }}</td>
                <td>{{ $d->title }}</td>
                <td>
                    {{ $d->user_name  }}
                </td>
                <td>{{ Str::limit($d->track_name, 20)   }}</td>
                <td>
                    {{ Str::limit($d->tags, 20) }}
                </td>
                <td>
                    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#exampleModal{{$d->id}}">Add Reviewer</a>

                    <div class="modal fade" id="exampleModal{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{ url('uni_admin/add-reviewer/'.$d->id) }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email" class="col-form-label">Reviewer's Email:</label>
                                            <input type="email" name="email" class="form-control" id="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Message:</label>
                                            <textarea class="form-control" name="massage" id="message-text"></textarea>
                                        </div>

                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Assigning Reviewer</button>

                                        <div class="modal-footer mt-4"></div>
                                    </form>
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
@stop