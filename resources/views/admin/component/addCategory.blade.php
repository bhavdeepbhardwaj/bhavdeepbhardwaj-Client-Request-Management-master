<!-- Edit Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Add Category
                    <strong></strong>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="name">Category Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Category Name"
                                    name="name" value="">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="user">User</label>
                                <select class="form-control" id="user" name="User">
                                    <option>-------Select------</option>
                                    <option value="0">User !</option>
                                    <option value="0">User !</option>
                                    <option value="0">User !</option>
                                    <option value="0">User !</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" style="color: #fff;">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
