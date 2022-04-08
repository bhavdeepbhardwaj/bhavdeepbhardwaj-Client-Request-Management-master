@extends('layouts.parent')

@section('title')
    @lang('title.client_show_ticket')
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
                                                        <h4 class="card-title card-title-dash">Show Ticket Page</h4>
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
                                        <th>Brand</th>
                                        <th>Country</th>
                                        <th>Project Title</th>
                                        <th>Category</th>
                                        <th>Priority</th>
                                        <th>Status</th>
                                        <th>Comment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tickets as $ticket_detail)
                                        <tr>
                                            <td>{{ date('d-m-Y h:i:s A', strtotime($ticket_detail->created_at)) }}</td>
                                            <td>{{ $ticket_detail->job }}</td>
                                            <td>
                                                <?php $brands = \App\Models\Brand::where('id', $ticket_detail->brand)->first(); ?>
                                                {{ $brands->name }}
                                            </td>
                                            <td>
                                                <?php $countrys = \App\Models\Country::where('id', $ticket_detail->country)->first(); ?>
                                                {{ $countrys->name }}
                                            </td>
                                            <td>
                                                <a href="{{ route('client.ticket.details_ticket', [$ticket_detail->id]) }}"
                                                    style="text-decoration: none;">{{ $ticket_detail->title }}&nbsp;<i
                                                        class="ti-eye"></i></a>
                                            </td>

                                            <td>
                                                <?php $categorys = \App\Models\Category::where('id', $ticket_detail->category)->first(); ?>
                                                {{ $categorys->name }}
                                            </td>
                                            <td>
                                                @if ($ticket_detail->priority == 1)
                                                    <label class="badge badge-info">
                                                        <?php $prioritys = \App\Models\Priority::where('id', $ticket_detail->priority)->first(); ?>
                                                        {{ $prioritys->name }}
                                                    </label>
                                                @elseif ($ticket_detail->priority == 2)
                                                    <div class="badge badge-primary">
                                                        <?php $prioritys = \App\Models\Priority::where('id', $ticket_detail->priority)->first(); ?>
                                                        {{ $prioritys->name }}
                                                    </div>
                                                @elseif ($ticket_detail->priority == 3)
                                                    <label class="badge badge-danger">
                                                        <?php $prioritys = \App\Models\Priority::where('id', $ticket_detail->priority)->first(); ?>
                                                        {{ $prioritys->name }}
                                                    </label>
                                                @endif

                                            </td>
                                            <td>
                                                <?php $statuss = \App\Models\Status::where('id', $ticket_detail->status)->first(); ?>
                                                {{ $statuss->name }}
                                            </td>
                                            <td>
                                                {{-- {{ $comments->job }} --}}
                                                @if ($ticket_detail->commentnos == '0')
                                                    N/A
                                                @else
                                                    <label class="badge badge-primary">
                                                        <a href="{{ route('client.comment.comment_detail', [$ticket_detail->id]) }}"
                                                            class="text-decoration-none">{{ $ticket_detail->commentnos }}
                                                        </a>
                                                    </label>
                                                @endif

                                                {{-- <a href="{{ route('client.comment.comment_detail', [$ticket_detail->id]) }}">{{$ticket_detail->commentnos}} </a> --}}
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
