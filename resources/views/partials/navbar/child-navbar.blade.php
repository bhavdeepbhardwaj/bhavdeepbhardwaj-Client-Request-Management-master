
@if ( Auth::user()->role == 4)
    @include('partials.navbar.employee-child-navbar')
@else
    @include('partials.navbar.resource-child-navbar')
@endif





