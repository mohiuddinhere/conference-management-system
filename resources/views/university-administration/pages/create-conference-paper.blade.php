@extends('university-administration.layouts.default')

@section('title')
<title>Create Conference</title>
@endsection

@section('content')
    <!-- Content -->
    <div class="container pt-4">
        <h2 class="mb-4 text-center font-weight-bold">Create Conference</h2>
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        <form action="{{ url('store-conference') }}" method="post">
            @csrf
            <div class="form-group col-md-4 ml-0 pl-0">
                <label for="">Title</label>
                <input type="text" class="form-control" name="title" placeholder="Enter Title">
            </div>
            <div class="form-group">
                <label for="">Paper Submission Deadline</label>
                <input type="date" name="submissionDeadline" class="col-md-4 form-control">
            </div>
            <div class="form-group">
                <label for="">Conference Date</label>
                <input type="date" name="conferenceDate" class="col-md-4 form-control">
            </div>
            <div class="form-group">
            <label for="">Track</label>
                <div id="show_item">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <input type="text" name="track_name[]" class="form-control" placeholder="Track Name">
                        </div>
                        <div class="col-md-2 mb-3 d-grid ">
                            <button class="btn btn-success add_item_button"><i class="fa-solid fa-plus"></i></button>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="form-group mb-5">
                <button class="btn btn-info mt-2" type="submit">Submit</button>
            </div>
        </form>
    </div>
    <!-- /.content -->
@endsection
        