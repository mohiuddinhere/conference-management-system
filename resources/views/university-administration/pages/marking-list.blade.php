@extends('university-administration.layouts.default')


@section('title', 'Conference Table')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h3><b>Submission Title:</b> {{ $titleNameData->submission_title }}</h3>
            <h3 class="mt-2"><b>Track:</b> {{ $titleNameData->track_name }}</h3>
            <ul>
                <h3 class="mt-2"><b>Reviews Given: </b></h3>
                @foreach($reviewerName as $r)
                    <li class="ml-4 mt-1">
                        <h3><b>{{ $r->reviewer_name }}</b></h3>
                        <h3 class="mt-1">Result Adequate: {{ $r->result_adequate }}</h3>
                        <h3 class="mt-1">Contribution: {{ $r->contribution }}</h3>
                        <h3 class="mt-1">Literature Review: {{ $r->literature_review }}</h3>
                        <h3 class="mt-1">Review Status: {{ $r->review_status }}</h3>
                    </li>
                @endforeach
            </ul>
            <h3 class="mt-5 mb-2"><b>Submit Final Score: </b></h3>
            <form action="{{ url('store-marking/'.$titleNameData->submission_id) }}" method="post">
                @csrf
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="accepted" name="radio" id="flexRadioDefault1" {{ !empty($result->review_status ) && $result->review_status == 'accepted'? 'checked' : '' }}>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Accepted
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="radio" value="rejected" id="flexRadioDefault2" {{ !empty($result->review_status ) && $result->review_status == 'rejected'? 'checked' : '' }}>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Rejected
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-info" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop