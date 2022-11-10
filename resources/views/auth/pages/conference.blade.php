@extends(session()->get('role').'.layouts.default')


@section('title', 'University Admin Register')

@section('bodys')

    <div class="card">
        <div class="card-body">
            <div class="mx-5 text-justify">
                <div class="mt-3">
                    <h3>Conferences Title : {{ $conference_data->conferences_title }}</h3>
                </div>
                <hr />
                <div>
                    <h3>Universitie : {{ $conference_data->universitie_name }}</h3>
                    <p><b class="ml-3" >Address: </b>{{ $conference_data->universitie_address }}</p>
                </div>
                <hr />
                <div>
                    <h3>Conferences Tracks</h3>
                    <ul>
                        @foreach ($conference_track as $item)
                            <li class="ml-4">{{ $item->tracks }}</li>
                        @endforeach
                    </ul>
                </div>
                <hr />
                <div>
                    <h3>Conference Submission Deadline: <b>{{ $conference_data->conferences_submission_deadline }}</b></h3>
                </div>
                <hr />
                <div class="mb-3">
                    <h3>Conference Date: <b>{{ $conference_data->conference_date }}</b></h3>
                </div>
            </div>
        </div>
    </div>

@stop
