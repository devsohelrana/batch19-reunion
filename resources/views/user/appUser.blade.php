@extends('layouts.navbarLayout')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            @include('user.nav')
            @yield('usersection')
        </div>
    </div>
@endsection
