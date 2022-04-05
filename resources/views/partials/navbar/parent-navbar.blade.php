
@if ( Auth::user()->role == 2)
    @include('partials.navbar.user-parent-navbar')
@else
    @include('partials.navbar.client-parent-navbar')
@endif



