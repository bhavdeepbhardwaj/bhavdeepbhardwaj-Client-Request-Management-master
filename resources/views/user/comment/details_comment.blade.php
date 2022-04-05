@extends('layouts.parent')

@section('title')
    @lang('title.client_comment_ticket')
@endsection

@section('css')
    {{-- <style>
        p {
            font-size: 1rem;
        }

    </style> --}}
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
                                                        <h4 class="card-title card-title-dash">SRN No:-
                                                            {{ $comment_record->job }}
                                                        </h4>
                                                    </div>
                                                    <div>
                                                        <h4 class="card-title card-title-dash text-center">Comments Create
                                                            At:- {{ Auth::user()->name }}</h4>
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
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="faq-block card-body">
                            <div class="container-fluid py-2">
                                <h5 class="mb-0">Lasts Update At:- {{ $comment_record->updated_at }}</h5>
                            </div>
                            <div id="accordion-1" class="accordion">
                                @foreach ($comment_detail as $key => $value)
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0">
                                                <a data-bs-toggle="collapse"
                                                    data-bs-target="#collapseOne{{ $key }}" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    {{ $value->job }}{{ $num = '-E' . sprintf('%02d', intval($value->id)) }}
                                                </a>
                                            </h5>
                                            <h5 class="mt-2">
                                                <img class="img-xs rounded-circle"
                                                    src="{{ asset('images/faces/face8.jpg') }}" alt="Profile image">
                                                <?php $user = \App\Models\User::where('id', $value->user_id)->first(); ?>
                                                {{ $user->name }}
                                            </h5>
                                        </div>
                                        <div id="collapseOne{{ $key }}" class="collapse show"
                                            aria-labelledby="headingOne" data-bs-parent="#accordion-1">
                                            <div class="card-body">
                                                {!! $value->comment !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModalScrollable">
                                        Comment Ticket
                                    </button>
                                    <!-- Edit Modal -->
                                    @include('user.component.edit')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- parent row -->
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
