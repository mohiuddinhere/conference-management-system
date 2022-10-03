@extends('university-administration.layouts.default')

@section('title')
    <title>Dashboard</title>
@endsection

@section('content')
    <!-- Content -->
    <div class="container pt-4">
        <h2 class="mb-4 text-center font-weight-bold mb-4 pb-4">Dashboard</h2>

        <div class="row d-flex justify-content-center">
            <div class="card bg-dark mr-4" style="width: 18rem;">
                <div class="card-body text-center text-white">
                    <h4 class="card-title"><b>Admins</b></h4>
                    <h6 class="card-subtitle mb-2">{{ $user_data }}</h6>
                </div>
            </div>

            <div class="card bg-dark mr-4" style="width: 18rem;">
                <div class="card-body text-center text-white">
                    <h4 class="card-title"><b>Submissions</b></h4>
                    <h6 class="card-subtitle mb-2">Card subtitle</h6>
                </div>
            </div>

            <div class="card bg-dark mr-4" style="width: 18rem;">
                <div class="card-body text-center text-white">
                    <h4 class="card-title"><b>Conferences</b></h4>
                    <h6 class="card-subtitle mb-2">Card subtitle</h6>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection