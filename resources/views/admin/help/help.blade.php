@extends('layouts.master')

@section('title')
    @lang('title.super_admin_help')
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
                                                        <h4 class="card-title card-title-dash">Help Page</h4>
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
                                <th>User</th>
                                <th>Categories</th>
                                <th>Title</th>
                                <th>Reference File</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($helps as $help)
                                <tr>
                                    <td>{{ $help->user }}</td>
                                    <td>
                                        <?php $categories = \App\Models\HelpCategory::where('id', $help->helpCategory_id)->first(); ?> {{ $categories->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.info-help', [$help->id]) }}" style="text-decoration: none;"> Title
                                            &nbsp;<i class="ti-eye"></i></a>
                                    </td>
                                    <td>
                                        @if ($help->reference != '')
                                            @foreach (explode(',', $help->reference) as $ref)
                                                <a href="{{ '/' . $ref }}" target="_blank"
                                                    download="{!! $ref !!}">Download File</a><br />
                                            @endforeach
                                        @else
                                            N/A
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
