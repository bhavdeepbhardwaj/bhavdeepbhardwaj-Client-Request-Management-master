@extends('layouts.master')

@section('title')
    @lang('title.admin_details_ticket')
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
                                                        <h4 class="card-title card-title-dash">Detail Ticket</h4>
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

    {{-- <div class="col-md-12 grid-margin stretch-card">
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
                        <h4>SRN</h4>
                    </div>

                    <div class="col-md-8">
                        <div class="">SRN</div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <h4>Brand</h4>
                    </div>

                    <div class="col-md-8">
                        <div class="">Brand</div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <h4>Country</h4>
                    </div>

                    <div class="col-md-8">
                        <div class="">Country</div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <h4>Project Title</h4>
                    </div>

                    <div class="col-md-8">
                        <div class="">Project Title</div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <h4>Category</h4>
                    </div>

                    <div class="col-md-8">
                        <div class="">Category</div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <h4>Key Objective</h4>
                    </div>

                    <div class="col-md-8">
                        <div class="">Key Objective</div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <h4>Reference File Upload</h4>
                    </div>

                    <div class="col-md-8">
                        <div class="">Reference File Upload</div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <h4>Summary / Creative Brief</h4>
                    </div>

                    <div class="col-md-8">
                        <div class="">Summary / Creative Brief</div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <h4>Other Important Information</h4>
                    </div>

                    <div class="col-md-8">
                        <div class="">Other Important Information</div>
                    </div>
                </div>

            </div>
        </div>
    </div> --}}
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @include('component.alert')
                <div class="form-group row">
                    <div class="col-md-4">
                        <h4>Comment</h4>
                    </div>

                    <div class="col-md-8">
                        <div class="">
                            <a href="{{ route('client.comment.comment_detail', [$ticket_detail->id]) }}"
                                class="text-decoration-none"><i class="mdi mdi-eye"></i> Comment
                            </a>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <h4>Date</h4>
                    </div>

                    <div class="col-md-8">
                        <div class="">{{ date('d-m-Y h:i:s A', strtotime($ticket_detail->created_at)) }}
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <h4>SRN</h4>
                    </div>

                    <div class="col-md-8">
                        <div class="">
                            {{ $ticket_detail->job }}</div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <h4>Brand</h4>
                    </div>

                    <div class="col-md-8">
                        <div class="">
                            <?php $brands = \App\Models\Brand::where('id', $ticket_detail->brand)->first(); ?>
                            {{ $brands->name }}
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <h4>Country</h4>
                    </div>

                    <div class="col-md-8">
                        <div class="">
                            <?php $countrys = \App\Models\Country::where('id', $ticket_detail->country)->first(); ?>
                            {{ $countrys->name }}
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <h4>Project Title</h4>
                    </div>

                    <div class="col-md-8">
                        <div class="">
                            {{ $ticket_detail->title }}
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <h4>Category</h4>
                    </div>

                    <div class="col-md-8">
                        <div class="">
                            <?php $categorys = \App\Models\Category::where('id', $ticket_detail->category)->first(); ?>
                            {{ $categorys->name }}
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <h4>Key Objective</h4>
                    </div>

                    <div class="col-md-8">
                        <div class="">{{ $ticket_detail->objective }}</div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <h4>Reference File Upload</h4>
                    </div>

                    <div class="col-md-8">
                        <div class="">
                            @if ($ticket_detail->reference != '')
                                <td>
                                    @foreach (explode(',', $ticket_detail->reference) as $ref)
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

                <div class="form-group row">
                    <div class="col-md-4">
                        <h4>Summary / Creative Brief</h4>
                    </div>

                    <div class="col-md-8">
                        <div class="">{!! $ticket_detail->summary !!}</div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <h4>Other Important Information</h4>
                    </div>

                    <div class="col-md-8">
                        <div class="">{!! $ticket_detail->otherinfo !!}</div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
