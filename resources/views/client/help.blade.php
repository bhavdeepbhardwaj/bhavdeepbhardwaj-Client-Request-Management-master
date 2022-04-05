@extends('layouts.parent')

@section('title')
    @lang('title.client_help')
@endsection


@section('css')
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


    <div class="row">
        <div class="col-md-1 grid-margin stretch-card">
        </div>

        <div class="col-md-10 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @include('client.component.alert')
                    <form class="forms-sample" method="POST" action="{{ route('help.store') }}"
                        enctype="multipart/form-data">
                        {!! csrf_field() !!}

                        <input type="hidden" class="form-control" id="exampleInputTitle1" placeholder="ID" name="user"
                            value="{{ Auth::user()->name }}">
                        <input type="hidden" class="form-control" id="exampleInputTitle1" placeholder="ID" name="case_id"
                            value="{{ $prefixvalue }}">

                        <div class="form-group">
                            <label for="exampleInputTitle1">Title</label>
                            <input type="text" class="form-control" id="exampleInputTitle1" placeholder="Title"
                                name="title">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="exampleInputcategories2">Categories</label>
                            <select class="form-control" id="exampleInputcategories2" name="helpCategory_id">
                                <option>-------Select------</option>
                                @foreach ($help_category as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="formFileSm3">Reference File Upload</label>
                            <input class="form-control form-control-sm" id="formFileSm3" type="file" name="reference_file">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputSummary4">Summary / Creative Brief</label>
                            <textarea id='tinyMceExample' name="summary" placeholder="Summary / Creative Brief"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-1 grid-margin stretch-card">
        </div>
    </div>
@endsection

@section('js')
    <!-- plugin js for this page -->
    <script src="../../../../vendors/tinymce/tinymce.min.js"></script>
    <script src="../../../../js/editorDemo.js"></script>
    <!-- End custom js for this page-->
@endsection
