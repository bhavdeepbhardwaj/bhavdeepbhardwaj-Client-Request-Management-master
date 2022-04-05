@extends('layouts.parent')

@section('title')
    @lang('title.client_view_comment')
@endsection

@section('css')
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
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
                                                        <h4 class="card-title card-title-dash">View Comment</h4>
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
                <h4 class="card-title">Data table</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>SRN</th>
                                        <th>Comment SRN No</th>
                                        <th>Comment</th>
                                        <th>Reference</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($view_comment as $comment)
                                        <tr>
                                            <td>{{ date('d-m-Y h:i:s A', strtotime($comment->created_at)) }}</td>
                                            <td>{{ $comment->job }}</td>
                                            <td>{{ $comment->job }}{{ $num = '-E' . sprintf('%02d', intval($comment->id)) }}
                                            </td>
                                            <td>{!! $comment->comment !!}</td>
                                            <td>
                                                @if ($comment->reference != '')
                                                    @foreach (explode(',', $comment->reference) as $ref)
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
