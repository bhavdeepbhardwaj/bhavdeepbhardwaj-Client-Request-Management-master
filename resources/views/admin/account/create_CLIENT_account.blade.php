@extends('layouts.master')

@section('title')
    @lang('title.super_admin_client_create')
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
                                                        <h4 class="card-title card-title-dash">Create Client </h4>
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
                @include('admin.component.alert')
                <form class="forms-sample" method="POST" action="{{ route('admin.createClient') }}">
                    {!! csrf_field() !!}
                    <div class="row">

                        <input type="" class="form-control @error('role') is-invalid @enderror" id="role"
                                    placeholder="role" name="role" value="{{ $role->id }}">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputFirstName1">First Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="exampleInputFirstName1" placeholder="First Name" name="name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputLastName1">Last Name</label>
                                <input type="text" class="form-control" id="exampleInputLastName1" placeholder="Last Name"
                                    name="last_name">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail2">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    id="exampleInputEmail2" placeholder="Email" name="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputPrefix">Prefix</label>
                                <input type="text" class="form-control" id="exampleInputPrefix" placeholder="Prefix"
                                    name="prefix">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleSelectPassword4">Password</label>
                                <input type="text" class="form-control @error('password') is-invalid @enderror"
                                    id="exampleSelectPassword4" placeholder="Password" name="password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleSelectConfirmPasswor5">Confirm Password</label>
                                <input type="text" class="form-control" id="exampleSelectConfirmPassword6"
                                    placeholder="Confirm Password" name="password_confirmation">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-check" style="">
                                <label class="form-check-label text-muted">
                                    <input type="checkbox" class="form-check-input">
                                    I agree to all Terms & Conditions
                                </label>
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
