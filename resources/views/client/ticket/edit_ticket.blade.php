@extends('layouts.parent')

@section('title')
    @lang('title.client_edit_ticket')
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
                                                        <h4 class="card-title card-title-dash">Edit Ticket</h4>
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
                <form class="forms-sample">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputBrand1">Brand</label>
                                <select class="form-control" id="exampleInputBrand1" name="brand">
                                    <option>-------Select------</option>
                                    <option value="0">Brand !</option>
                                    <option value="0">Brand !</option>
                                    <option value="0">Brand !</option>
                                    <option value="0">Brand !</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputCountry2">Country</label>
                                <select class="form-control" id="exampleInputCountry2" name="country">
                                    <option>-------Select------</option>
                                    <option value="0">Country !</option>
                                    <option value="0">Country !</option>
                                    <option value="0">Country !</option>
                                    <option value="0">Country !</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputTitle3">Project Title</label>
                                <input type="text" class="form-control" id="exampleInputTitle3"
                                    placeholder="Project Title" name="project_title">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleSelectCategory4">Category</label>
                                <select class="form-control" id="exampleSelectCategory4" name="category">
                                    <option>-------Select------</option>
                                    <option value="0">Category !</option>
                                    <option value="0">Category !</option>
                                    <option value="0">Category !</option>
                                    <option value="0">Category !</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleSelectPriority6">Priority</label>
                                <select class="form-control" id="exampleSelectPriority6" name="priority">
                                    <option>-------Select------</option>
                                    <option value="0">Priority !</option>
                                    <option value="0">Priority !</option>
                                    <option value="0">Priority !</option>
                                    <option value="0">Priority !</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleKeyObjective7">Key Objective</label>
                                <input type="text" class="form-control" id="exampleKeyObjective7"
                                    placeholder="Key Objective" name="key_objective">
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
                            <textarea id='tinyMceExample1' class="" name="other_Important_Information" placeholder="Other Important Information"></textarea>

                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="formFileSm8">Reference File Upload</label>
                                <input class="form-control form-control-sm" id="formFileSm8" type="file" name="upload">
                                <p class="files">* Supported file format: doc, docx, jpg, jpeg, png, pdf, xlsx,
                                    xlx, ppt, pptx, csv, zip<br />Multiple files should have the same extension or in a zip
                                    file.</p>
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
