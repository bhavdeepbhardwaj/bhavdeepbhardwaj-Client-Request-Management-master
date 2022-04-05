@extends('layouts.master')

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
                                                        <h4 class="card-title card-title-dash">Show Tabel Page</h4>
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
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $ac)
                                <tr>
                                    <td>{{ $ac->name }}</td>
                                    <td>{{ $ac->email }}</td>
                                    <td>
                                        @if ($ac->role == 1)
                                            <label class="badge badge-success">Admin</label>
                                        @elseif ($ac->role == 2)
                                            <label class="badge badge-warning">User</label>
                                        @elseif ($ac->role == 3)
                                            <label class="badge badge-info">Client</label>
                                        @elseif ($ac->role == 4)
                                            <label class="badge badge-primary">Employe</label>
                                        @elseif ($ac->role == 5)
                                            <label class="badge badge-danger">Resource</label>
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
@endsection
