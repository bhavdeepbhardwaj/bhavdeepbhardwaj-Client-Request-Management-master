<!-- Edit Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Ticket No.
                    <strong>{{ $ticket_detail->job }}{{ $num = sprintf('%03d', intval($ticket_detail->id)) }}</strong>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" method="POST" action="{{ route('comment.store', [$ticket_detail->id])}}"  enctype="multipart/form-data" >
                    {!! csrf_field() !!}
                    <div class="row">
                        <input type="hidden" class="form-control" id="exampleInputTitle1" placeholder="User ID"
                            name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" class="form-control" id="exampleInputTitle2" placeholder="Prefix"
                            name="job" value="{{ Auth::user()->prefix }}">
                        <input type="hidden" class="form-control" id="exampleInputTitle3" placeholder="Job No"
                            name="job_no" value="{{ $ticket_detail->id }}">
                            <input type="hidden" class="form-control" id="exampleInputTitle4" placeholder="Comment Case ID"
                            name="comment_ticket" value="{{ $prefixvalue}}">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="jobno">Ticket ID</label>
                                <input type="text" class="form-control" id="jobno" placeholder="Ticket ID"
                                    name="job"
                                    value="{{ $ticket_detail->job }}"
                                    >
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="exampleSummary5">Comments /
                                    Creative Brief</label>
                                {{-- <textarea class="form-control" id="exampleSummary5" rows="4" name="summary"></textarea> --}}
                                <textarea id='tinyMceExample3' name="comment" placeholder="Comments / Creative Brief"></textarea>

                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label" for="formFileSm8">Reference File
                                    Upload</label>
                                <input class="form-control form-control-sm" id="formFileSm8" type="file" name="reference">
                                <p class="files">*
                                    Supported file format: doc,
                                    docx, jpg, jpeg, png, pdf, xlsx,
                                    xlx, ppt, pptx, csv,
                                    zip<br />Multiple files should
                                    have the same extension or in a
                                    zip
                                    file.</p>
                            </div>
                        </div>

                    </div>
                    {{-- <button type="submit" class="btn btn-primary me-2">Submit</button> --}}
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" style="color: #fff;">Save</button>
                    </div>
                </form>
            </div>
            {{-- <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save
                    changes</button>
            </div> --}}
        </div>
    </div>
</div>
