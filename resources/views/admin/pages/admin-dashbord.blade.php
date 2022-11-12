@extends('admin.layouts.default')


@section('title', 'University Admin Register')

@section('bodys')

    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">

                <div class="row d-flex justify-content-center">
                    <div class="card bg-dark mr-4" style="width: 18rem;">
                        <div class="card-body text-center text-white">
                            <h4 class="card-title"><b>Total User</b></h4>
                            <h6 class="card-subtitle mb-2">{{ $total_user }}</h6>
                        </div>
                    </div>

                    <div class="card bg-dark mr-4" style="width: 18rem;">
                        <div class="card-body text-center text-white">
                            <h4 class="card-title"><b>Total Conference</b></h4>
                            <h6 class="card-subtitle mb-2">{{ $total_conference }}</h6>
                        </div>
                    </div>

                    <div class="card bg-dark mr-4" style="width: 18rem;">
                        <div class="card-body text-center text-white">
                            <h4 class="card-title"><b>Total University</b></h4>
                            <h6 class="card-subtitle mb-2">{{ $total_universities }}</h6>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-body">

                        <!--  -->
                        <div class="d-flex">
                            <div style="width: 50%">
                                <canvas id="myChart"></canvas>
                            </div>
                            <div style="width: 50%">
                                <canvas id="myChart2"></canvas>
                            </div>
                        </div>
                        <div style="width: 50%" class="mt-5">
                            <canvas id="myChart3" width="400" height="400"></canvas>
                        </div>

                        <script>
                            const chart = @json($chart);
                            const chart2 = @json($chart2);
                            const chart3 = @json($chart3);
                        </script>

                        



                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script src="{{ asset('assets/js/chart.js') }}"></script>
                        <!--  -->

                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
@stop
