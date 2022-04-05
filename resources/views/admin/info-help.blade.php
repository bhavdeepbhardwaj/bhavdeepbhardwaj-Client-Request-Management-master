@extends('layouts.master')

@section('title')
    @lang('title.admin_details_info_help')
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
                                                        <h4 class="card-title card-title-dash">Help Desk Info </h4>
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

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-4">
                        <h4>Date</h4>
                    </div>

                    <div class="col-md-8">
                        <div class="">Date</div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <h4>User</h4>
                    </div>

                    <div class="col-md-8">
                        <div class="">User</div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <h4>Categories</h4>
                    </div>

                    <div class="col-md-8">
                        <div class="">categories</div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <h4>Case ID</h4>
                    </div>

                    <div class="col-md-8">
                        <div class="">Case ID</div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <h4>Title</h4>
                    </div>

                    <div class="col-md-8">
                        <div class="">Title</div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <h4>Summary</h4>
                    </div>

                    <div class="col-md-8">
                        <div class="">Summary</div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <h4>Reference File</h4>
                    </div>

                    <div class="col-md-8">
                        <div class=""><a href="">Download</a></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
