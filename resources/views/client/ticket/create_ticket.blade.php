@extends('layouts.parent')

@section('title')
    @lang('title.client_create_ticket')
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
                                                        <h4 class="card-title card-title-dash">Create Ticket Page</h4>
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

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @include('client.component.alert')
                <form class="forms-sample" method="POST" action="{{ route('ticket.store') }}"
                    enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="row">
                        <input type="hidden" class="form-control" id="exampleInputTitle1" placeholder="ID" name="user_id"
                            value="{{ Auth::user()->id }}">
                        <input type="hidden" class="form-control" id="exampleInputTitle2" placeholder="Prefix" name="job"
                            value="{{ $prefixvalue }}">
                        <input type="hidden" class="form-control" id="exampleInputTitle3" placeholder="Job No"
                            name="job_no" value="">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputBrand1">Brand</label>
                                <select class="form-control" id="exampleInputBrand1" name="brand">
                                    <option>-------Select------</option>
                                    @foreach ($brands as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputCountry2">Country</label>
                                <select class="form-control" id="exampleInputCountry2" name="country">
                                    <option>-------Select------</option>
                                    @foreach ($countries as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputTitle3">Project Title</label>
                                <input type="text" class="form-control" id="exampleInputTitle3"
                                    placeholder="Project Title" name="title">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleSelectCategory4">Category</label>
                                <select class="form-control" id="exampleSelectCategory4" name="category">
                                    <option>-------Select------</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleSelectPriority6">Priority</label>
                                <select class="form-control" id="exampleSelectPriority6" name="priority">
                                    <option>-------Select------</option>
                                    @foreach ($prioritys as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleKeyObjective7">Key Objective</label>
                                <input type="text" class="form-control" id="exampleKeyObjective7"
                                    placeholder="Key Objective" name="objective">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleSummary5">Summary / Creative Brief</label>
                                {{-- <textarea class="form-control" id="exampleSummary5" rows="4" name="summary"></textarea> --}}
                                <textarea id='tinyMceExample' name="summary" placeholder="Summary / Creative Brief"></textarea>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleTextarea1">Other Important Information</label>
                                {{-- <textarea class="form-control" id="exampleSummary5" rows="4" name="other_Important_Information"></textarea> --}}
                                <textarea id='tinyMceExample1' class="" name="otherinfo"
                                    placeholder="Other Important Information"></textarea>

                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="formFileSm8">Reference File Upload</label>
                                <input class="form-control form-control-sm" id="formFileSm8" type="file" name="reference">
                                <p class="files">* Supported file format: doc, docx, jpg, jpeg, png, pdf, xlsx,
                                    xlx, ppt, pptx, csv, zip<br />Multiple files should have the same extension or in a zip
                                    file.</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleSelectstatus9">Status</label>
                                <select class="form-control" id="exampleSelectstatus9" name="status">
                                    <option>-------Select------</option>
                                    @foreach ($status as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- plugin js for this page -->
    <script src="../../../../vendors/tinymce/tinymce.min.js"></script>
    <script src="../../../../js/editorDemo.js"></script>
    <!-- End custom js for this page-->
@endsection
