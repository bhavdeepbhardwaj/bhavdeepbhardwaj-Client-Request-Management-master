@extends('layouts.master')

@section('title')
    @lang('title.admin_report')
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="home-tab">
                <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                        <div class="row">
                            <div class="col-lg-12 d-flex flex-column">
                                <div class="row flex-grow">
                                    <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                                        <div class="card card-rounded">
                                            <div class="card-body">
                                                <div class="d-sm-flex justify-content-between align-items-start">
                                                    <div>
                                                        <h4 class="card-title card-title-dash">Hi Super Admin:
                                                            {{ Auth::user()->name }}</h4>
                                                        <h5 class="card-subtitle card-subtitle-dash">
                                                            {{ Auth::user()->role }} Super Admin Reports Page</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Line chart</h4>
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bar chart</h4>
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Area chart</h4>
                        <canvas id="areaChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Doughnut chart</h4>
                        <canvas id="doughnutChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 grid-margin grid-margin-lg-0 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pie chart</h4>
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 grid-margin grid-margin-lg-0 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Scatter chart</h4>
                        <canvas id="scatterChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
