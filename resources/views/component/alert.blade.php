@if (session('success'))
    <div class="alert alert-fill-primary">
        <i class="ti-info-alt"></i> {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        <i class="ti-info-alt"></i> {{ session('error') }}
    </div>
@endif

@if (session('status'))
    <div class="alert alert-fill-primary">
        <i class="ti-info-alt"></i> {{ session('status') }}
    </div>
@endif
