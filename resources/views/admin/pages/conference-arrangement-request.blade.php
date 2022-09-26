@extends('admin.layouts.default')


@section('title', 'Conference Arrangement Request List')

@section('conference-arrangement-request')
<div class="animated fadeIn">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Conference Arrangement Request</strong>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>University</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    <a href="#">
                                        What Is the Difference Between Conference Papers, Journal Papers, Term
                                        Papers, Seminar Papers, Proceeding, Transactions, Seminar, Technical
                                        Report and Patents?
                                    </a>
                                </td>
                                <td>Premier University, Chittagong</td>
                                <td>
                                    <a href="" class="btn btn-dark">Accept</a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>
                                    <a href="#">
                                        What Is the Difference Between Conference Papers, Journal Papers, Term
                                        Papers, Seminar Papers, Proceeding, Transactions, Seminar, Technical
                                        Report and Patents?
                                    </a>
                                </td>
                                <td>Premier University, Chittagong</td>
                                <td>
                                    <a href="" class="btn btn-dark">Accept</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div><!-- .animated -->
@stop