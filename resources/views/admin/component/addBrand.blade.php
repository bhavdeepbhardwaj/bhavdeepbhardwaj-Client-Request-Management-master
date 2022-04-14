<!-- Edit Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Add Country
                    <strong></strong>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" method="POST" action="{{ route('store.brandStore') }}"
                    enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="name">Brand Name</label>
                                <input type="text" class="form-control{{ $errors->has('name') ? ' has-error' : '' }}" id="name" placeholder="Brand Name"
                                    name="name" value="">
                                    @if ($errors->has('name'))
                                    <br />
                                    <div class="alert alert-danger">
                                        <i class="ti-info-alt"></i> Brand Name Can Not Be Empty
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="user_id">User</label>
                                <select class="form-control" id="user_id" name="user_id">
                                    <option>-------Select------</option>
                                    @foreach ($users as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}
                                            <?php $users = \App\Models\User::where('id', $item->id)->first(); ?>
                                            {{ $users->name }}
                                        </option>
                                    @endforeach
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
