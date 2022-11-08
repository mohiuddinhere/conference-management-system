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
                        @if (Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                        @endif
                        <form method="POST" action="{{ url('author/submission/'.$submission_id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for=""><b>Title</b></label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for=""><b>Track</b></label>
                                <select name="track" id="" class="form-control">
                                    <option>SELECT TRACK</option>
                                    @foreach($data as $d)
                                    <option value="{{ $d->id }}">{{$d->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for=""><b>Abstract</b></label>
                                <textarea name="abstract" class="form-control" rows="5" id="comment" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for=""><b>Keywords</b></label><br>
                                <!-- <input name="tags" type="text" data-role="tagsinput" class="form-control"> -->
                                <input type="text" name="tags" class="form-control" data-role="tagsinput">
                            </div>
                            <div class="form-group">
                                <label for=""><b>Upload File</b></label><br>
                                <input type="file" id="myFile" name="file">
                            </div>

                            <div class="form-group mt-4">
                                <label><b>Authors List</b></label>
                                <div id="show_item">
                                    <div class="row">
                                        <div class="col mb-3 d-flex">
                                            <input type="text" name="author_name[]" class="form-control mr-2" placeholder="Author Name" required>
                                            <input type="email" name="author_email[]" class="form-control mr-2" placeholder="Author Email" required>
                                            <input type="text" name="author_orcidid[]" class="form-control" placeholder="Author OrcidID" required>
                                        </div>
                                        <div class="col-md-2 mb-3 d-grid ">
                                            <button class="btn btn-success add_item_button"><i class="fa-solid fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div> 
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
<!-- Scripts -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script> --}}
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- scripts for multiple input field  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/46f536c64d.js" crossorigin="anonymous"></script>

    <!-- multiple input field generation -->
    <script>
        $(document).ready(function(){
            $(".add_item_button").click(function(e){
                e.preventDefault();
                $("#show_item").prepend(`<div class="row">
                            <div class="col mb-3 d-flex">
                                <input type="text" name="author_name[]" class="form-control mr-2" placeholder="Author Name">
                                <input type="text" name="author_email[]" class="form-control mr-2" placeholder="Author Email">
                                <input type="text" name="author_orcidid[]" class="form-control" placeholder="Author OrcidID">
                            </div>
                            <div class="col-md-2 mb-3 d-grid">
                                <button class="btn btn-danger remove_item_button"><i class="fa-solid fa-trash-can"></i></button>
                            </div>
                        </div>`)
            });
            $(document).on('click', '.remove_item_button', function(e){
                e.preventDefault();
                let row_item = $(this).parent().parent();
                $(row_item).remove();
            })
        });

    </script>



@stop