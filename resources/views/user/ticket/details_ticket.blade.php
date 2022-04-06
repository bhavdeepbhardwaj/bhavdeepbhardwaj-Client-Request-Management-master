@extends('layouts.parent')

@section('title')
    @lang('title.user_details_ticket')
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
                                                    <div>
                                                        {{-- <a href="{{ route('client.ticket.edit_ticket')}}" class="btn btn-primary" style="text-decoration: none; color: #fff; padding:15px">Edit</a> --}}
                                                        {{-- <button class="btn btn-outline-success"
                                                            onclick="showSwal('custom-html')">Click here!</button> --}}
                                                        <!-- Edit  Button trigger modal -->
                                                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal"
                                                            data-target="#exampleModalScrollable" style="color: #fff;">
                                                            Edit Ticket
                                                        </button> --}}
                                                        <!-- Edit Modal -->
                                                        {{-- @include('user.component.edit') --}}
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
                @include('component.alert')
                <div class="form-group row">
                    <div class="col-md-4">
                        <h4>Comment</h4>
                    </div>

                    <div class="col-md-8">
                        <div class="">
                            <a href="{{ route('user.comment.detail_comment', [$ticket_detail->id]) }}"
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
                        @if ($ticket_detail->objective != '')
                            <div class="">{{ $ticket_detail->objective }}</div>
                        @else
                            <div class="">N/A</div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <h4>Reference File Upload</h4>
                    </div>

                    <div class="col-md-8">
                        @if ($ticket_detail->reference != '')
                            @foreach (explode(',', $ticket_detail->reference) as $ref)
                                <div class=""><a href="{{ '/' . $ref }}" target="_blank"
                                        download="{!! $ref !!}">Download File</a>
                                </div>
                            @endforeach
                        @else
                            <div class="">N/A</div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <h4>Summary / Creative Brief</h4>
                    </div>

                    <div class="col-md-8">
                        @if ($ticket_detail->summary != '')
                            <div class="">{!! $ticket_detail->summary !!}</div>
                        @else
                            <div class="">N/A</div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <h4>Other Important Information</h4>
                    </div>

                    <div class="col-md-8">
                        @if ($ticket_detail->otherinfo != '')
                            <div class="">{!! $ticket_detail->otherinfo !!}</div>
                        @else
                            <div class="">N/A</div>
                        @endif
                    </div>
                </div>

                <form action="{{ route('user.ticket.update', [$ticket_detail->id]) }}" method="POST">
                    {!! csrf_field() !!}
                    <div class="form-group row">
                        <div class="col-md-4">
                            <h4>Deadline</h4>
                        </div>

                        <div class="col-md-4">
                            <div class="">
                                <input id="deadline" type="datetime-local"
                                    class="form-control{{ $errors->has('deadline') ? ' has-error' : '' }}"
                                    name="deadline" value="{{ old('deadline') }}">
                                @if ($errors->has('deadline'))
                                    <br />
                                    <div class="alert alert-danger">
                                        <i class="ti-info-alt"></i> Deadline Can Not Be Empty
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group row" for="exampleSelectstatus1">
                        <div class="col-md-4">
                            <h4>Status</h4>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <select class="form-control" id="exampleSelectstatus1" name="status">
                                    <option>-------Select------</option>
                                    @foreach ($status as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-ticket"></i> Update Details
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/alerts.js') }}"></script>
    <script src="{{ asset('vendors/sweetalert/sweetalert.min.js ') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
    <!-- plugin js for this page -->
    <script src="{{ asset('vendors/tinymce/tinymce.min.js ') }}"></script>
    <script src="{{ asset('js/editorDemo.js ') }}"></script>
    <!-- End custom js for this page-->
@endsection
