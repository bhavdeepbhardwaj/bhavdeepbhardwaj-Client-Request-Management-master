@if (session('success'))
    <div class="alert alert-fill-primary">
        <i class="ti-info-alt"></i> {{ session('success') }}
    </div>
@endif

@if (session('status'))
    <div class="alert alert-fill-primary">
        <i class="ti-info-alt"></i> {{ session('status') }}
    </div>
@endif

@if (session('alert'))
    <div class="alert alert-fill-danger">
        <i class="ti-info-alt"></i> {{ session('alert') }}
    </div>
@endif

@if (session('warning'))
        <div class="alert alert-fill-danger">
            <i class="ti-info-alt"></i> {{ session('warning') }}
         </div>
@endif

@if (session('error'))
    <div class="alert alert-fill-danger">
        <i class="ti-info-alt"></i> {{ session('error') }}
    </div>
@endif
