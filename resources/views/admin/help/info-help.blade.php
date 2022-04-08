@extends('layouts.master')

@section('title')
    @lang('title.super_admin_info_help')
@endsection

@section('css')
    <style>
        p {
            font-size: 1rem;
        }

    </style>
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
                        <div class="">{{ date('d-m-Y h:i:s A', strtotime($helps->created_at)) }}
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <h4>User</h4>
                    </div>

                    <div class="col-md-8">
                        <div class="">{{ $helps->user }}</div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <h4>Categories</h4>
                    </div>

                    <div class="col-md-8">
                        <div class=""><?php $categories = \App\Models\HelpCategory::where('id', $helps->helpCategory_id)->first(); ?> {{ $categories->name }}</div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <h4>Case ID</h4>
                    </div>

                    <div class="col-md-8">
                        <div class="">{{ $helps->case_id }}</div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <h4>Title</h4>
                    </div>

                    <div class="col-md-8">
                        <div class="">{{ $helps->title }}</div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <h4>Summary</h4>
                    </div>

                    <div class="col-md-8">
                        <div class="">{!! $helps->summary !!}</div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <h4>Reference File</h4>
                    </div>

                    <div class="col-md-8">
                        <div class="">
                            @if ($helps->reference != '')
                                <td>
                                    @foreach (explode(',', $helps->reference) as $ref)
                                        <a href="{{ '/' . $ref }}" target="_blank"
                                            download="{!! $ref !!}">Download File</a><br />
                                    @endforeach
                                </td>
                            @else
                                <td>N/A</td>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
