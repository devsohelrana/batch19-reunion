@php
    function activeNav($uri = '')
    {
        $active = '';
        if (Request::is(Request::segment(1) . '/' . $uri . '/*') || Request::is(Request::segment(1) . '/' . $uri) || Request::is($uri)) {
            $active = 'active';
        }
        return $active;
    }
@endphp
<ul class="nav nav-pills flex-column flex-md-row mb-3">
    <li class="nav-item">
        <a class="nav-link {{ activeNav('profile') }}" href="{{ route('profile') }}"><i class="bx bx-user me-1"></i>
            User Profile </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ activeNav('payment') }}" href="{{ route('profile.payment') }}"><i
                class='bx bx-dollar-circle me-1'></i>
            Payment</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ activeNav('participants') }}" href="{{ route('profile.participants') }}">
            <i class='bx bx-group me-1'></i>
            Participants</a>
    </li>
</ul>
