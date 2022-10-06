@extends('author.layouts.default')


@section('title', 'Author Paper Submission')

@section('bodys')

<div class="animated fadeIn">
    <div class="row">

        <div class="col-md-12">

            <div class="row d-flex justify-content-center">
                <div class="card bg-dark mr-4" style="width: 18rem;">
                    <div class="card-body text-center text-white">
                        <h4 class="card-title"><b>Total User</b></h4>
                        <h6 class="card-subtitle mb-2">20</h6>
                    </div>
                </div>

                <div class="card bg-dark mr-4" style="width: 18rem;">
                    <div class="card-body text-center text-white">
                        <h4 class="card-title"><b>Total Conference</b></h4>
                        <h6 class="card-subtitle mb-2">10</h6>
                    </div>
                </div>

                <div class="card bg-dark mr-4" style="width: 18rem;">
                    <div class="card-body text-center text-white">
                        <h4 class="card-title"><b>Total University</b></h4>
                        <h6 class="card-subtitle mb-2">10</h6>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-body">
                    <div class="container pt-4">
                        <h3 class="mb-4 text-center font-weight-bold">Submit Paper Here</h3>
                        @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                        @endif
                        <form method="POST" action="{{ url('author/submission/'.$submission_id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Track</label>
                                <select name="track" id="" class="form-control">
                                    <option>SELECT TRACK</option>
                                    @foreach($data as $d)
                                    <option value="{{ $d->id }}">{{$d->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Abstract</label>
                                <textarea name="abstract" class="form-control" rows="5" id="comment" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Tags</label>
                                <input name="tags" type="text" data-role="tagsinput" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Upload File</label><br>
                                <input type="file" id="myFile" name="file">
                            </div>
                            <div class="form-group mb-5">
                                <button class="btn btn-info mt-2">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>




@stop