@extends('layouts.master')

@section('title')
    @lang('title.super_admin_show_user_client')
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
                                                        <h4 class="card-title card-title-dash">Show Tabel Page</h4>
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $ac)
                                <tr>
                                    <td>{{ $ac->name }}</td>
                                    <td>{{ $ac->email }}</td>
                                    <td>
                                        @if ($ac->role == 1)
                                            <label class="badge badge-success">Admin</label>
                                        @elseif ($ac->role == 2)
                                            <label class="badge badge-warning">User</label>
                                        @elseif ($ac->role == 3)
                                            <label class="badge badge-info">Client</label>
                                        @elseif ($ac->role == 4)
                                            <label class="badge badge-primary">Employe</label>
                                        @elseif ($ac->role == 5)
                                            <label class="badge badge-danger">Resource</label>
                                        @endif
                                    </td>
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
@endsection
