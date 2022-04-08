@extends('layouts.master')

@section('title')
    @lang('title.admin_statuses')
@endsection

@section('css')
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../../../../vendors/feather/feather.css">
    <link rel="stylesheet" href="../../../../vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../../../vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../../../../vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../../../../vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
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
                                                        <h4 class="card-title card-title-dash">Show Statues Page</h4>
                                                    </div>
                                                    <div>
                                                        {{-- <a href="{{ route('client.ticket.edit_ticket')}}" class="btn btn-primary" style="text-decoration: none; color: #fff; padding:15px">Edit</a> --}}
                                                        {{-- <button class="btn btn-outline-success"
                                                            onclick="showSwal('custom-html')">Click here!</button> --}}
                                                        <!-- Edit  Button trigger modal -->
                                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                            data-target="#exampleModalScrollable" style="color: #fff;">
                                                            Add Status
                                                        </button>
                                                        <!-- Edit Modal -->
                                                        @include('admin.component.addStatus')
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

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="order-listing" class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Status Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($statuses as $status)
                                <tr>
                                    <td>{{ $status->created_at }}</td>
                                    <td>{{ $status->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- Custom js for this page-->
    <script src="../../../../vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="../../../../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="{{ asset('js/data-table.js ') }}"></script>
    <!-- End custom js for this page-->
    <script src="{{ asset('js/alerts.js') }}"></script>
    <script src="{{ asset('vendors/sweetalert/sweetalert.min.js ') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
    <!-- plugin js for this page -->
    <script src="{{ asset('vendors/tinymce/tinymce.min.js ') }}"></script>
    <script src="{{ asset('js/editorDemo.js ') }}"></script>
    <!-- End custom js for this page-->
@endsection
