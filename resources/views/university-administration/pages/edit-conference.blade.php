@extends('university-administration.layouts.default')

@section('title')
<title>Edit Conference</title>
@endsection

@section('content')
    <!-- Content -->
    <div class="container pt-4">
        <h2 class="mb-4 text-center font-weight-bold">Edit Conference</h2>
        <form action="{{ url('update-conference/'.$conference->id) }}" method="post">
            @csrf
            <div class="form-group col-md-4 ml-0 pl-0">
                <label for="">Title</label>
                <input type="text" class="form-control" name="title" value="{{ $conference->title }}" placeholder="Enter Title">
            </div>
            <div class="form-group">
                <label for="">Paper Submission Deadline</label>
                <input type="date" name="submissionDeadline" value="{{ $conference->submission_deadline }}" class="col-md-4 form-control">
            </div>
            <div class="form-group">
                <label for="">Conference Date</label>
                <input type="date" name="conferenceDate" value="{{ $conference->conference_date }}" class="col-md-4 form-control">
            </div>
            <div class="form-group">
            <label for="">Track</label>
                <div id="show_item">
                    @foreach($t as $trck)
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <input type="text" name="track_name[]" value="{{ $trck->name }}" class="form-control" placeholder="Track Name">
                        </div>
                        <div class="col-md-2 mb-3 d-grid">
                            <button class="btn btn-danger remove_item_button"><i class="fa-solid fa-trash-can"></i></button>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-md-2 mb-3 d-grid ml-0 pl-0">
                            <button class="btn btn-success add_item_button"><i class="fa-solid fa-plus"></i></button>
                    </div>
                </div> 
            </div>
            <div class="form-group mb-5">
                <button class="btn btn-info mt-2" type="submit">Update</button>
            </div>
        </form>
    </div>
    <!-- /.content -->
@endsection