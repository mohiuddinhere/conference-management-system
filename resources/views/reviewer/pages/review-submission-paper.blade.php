@extends('reviewer.layouts.default')


@section('title', 'Reviewer Dashboard')



@section('bodys')
<div class="animated fadeIn">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="mx-5 text-justify">
                        <h2>{{ $data->title }}</h2>
                        <hr />
                        <h3>Abstract</h3>
                        <p>{{ $data->abstract }}</p>
                        <hr />
                        <h3>Keyword</h3>
                        <p>{{ $data->tags }}</p>
                        <hr />

                        <div class="d-flex">
                            <form method="post" action="{{ url('reviewer/mark/'.$data->id) }}" class="p-2">
                            @csrf
                                <h4 class="mb-1">Result are adequate</h4> 
                                <div class="form-check-inline mb-3">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="3" name="result" {{ !empty($validate->result_adequate ) && $validate->result_adequate == 3? 'checked' : '' }}> 3
                                    </label>
                                    </div>
                                    <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="4" name="result" {{ !empty($validate->result_adequate ) && $validate->result_adequate == 4? 'checked' : '' }}> 4
                                    </label>
                                    </div>
                                    <div class="form-check-inline disabled">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="5" name="result" {{ !empty($validate->result_adequate ) && $validate->result_adequate == 5? 'checked' : '' }}> 5
                                    </label>
                                </div>


                                <h4 class="mb-1">Contribution</h4> 
                                <div class="form-check-inline mb-3">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="3" name="contribution" {{ !empty($validate->contribution ) && $validate->contribution  == 3? 'checked' : '' }}> 3
                                    </label>
                                    </div>
                                    <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="4" name="contribution" {{ !empty($validate->contribution ) && $validate->contribution  == 4? 'checked' : '' }}> 4
                                    </label>
                                    </div>
                                    <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="5" name="contribution" {{ !empty($validate->contribution ) && $validate->contribution  == 5? 'checked' : '' }}> 5
                                    </label>
                                </div>




                                <h4 class="mb-1">Literature Review</h4> 
                                <div class="form-check-inline mb-3">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="3" name="literature" {{ !empty($validate->literature_review ) && $validate->literature_review == 3? 'checked' : '' }}> 3
                                    </label>
                                    </div>
                                    <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="4" name="literature" {{ !empty($validate->literature_review ) && $validate->literature_review == 4? 'checked' : '' }}> 4
                                    </label>
                                    </div>
                                    <div class="form-check-inline disabled">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="5" name="literature" {{ !empty($validate->literature_review ) && $validate->literature_review == 5? 'checked' : '' }}> 5
                                    </label>
                                </div>
       

                                <div class="d-flex form-group">
                                    <select name="marking" class="form-control">
                                        <option value=""> {{ empty($validate)? "GIVE REVIEW" : $validate->review_status }}</option>
                                        <option value="Accepted">Accepted</option>
                                        <option value="PartiallyAccepted">Partially Accepted</option>
                                        <option value="Rejected">Rejected</option>
                                    </select>
                                    <button class="btn btn-info ml-1" type="submit">Submit</button>
                                </div>
                                @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                                @if(Session::has('err'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('err') }}
                                    </div>
                                @endif
                            </form>
                        </div>
                        <hr />
                        


                        <div class="d-flex">
                            <h3 class="mb-2">Here is the Paper</h3>
                        </div>
                        
                        <iframe src="{{ asset('./uploads/'.$data->file_name) }}" width="100%" height="550px">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div><!-- .animated -->
@stop