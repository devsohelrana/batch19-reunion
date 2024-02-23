@extends('layouts.blankLayout')

@section('page-style')
<link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}" />
@endsection

@section('title', 'Profile Log in')
@section('content')
<!-- Content -->

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <a href="{{ URL::to('/') }}" class="app-brand-link gap-2">
                            <span class="app-brand-logo demo">
                                <x-application-logo />
                            </span>
                            <span class="app-brand-text demo text-body fw-bold">DevTekniQ</span>
                        </a>
                    </div>
                    <!-- /Logo -->

                    <form action="{{ route('google.auth') }}" method="post" class="text-center mb-3">
                        @csrf
                        <button class="btn rounded-pill btn-outline-dark">
                            <img src="{{ asset('assets/img/icons/brands/google.png') }}" alt=""
                                style="margin-right:  15px; width: 25px;">
                            {{ __('Log in with Google') }}
                        </button>
                    </form>

                    <div class="divider divider-dashed">
                        <div class="divider-text">Or Log in with EMAIL / USERNAME</div>
                    </div>

                    <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email or Username</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter your email or username" required autofocus autocomplete="email" />

                            <x-input-error :messages="$errors->get('email')" />
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                required autofocus autocomplete="current-password" />

                            <x-input-error :messages="$errors->get('password')" />
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember_me" />
                                    <label class="form-check-label" for="remember_me"> Remember Me </label>
                                </div>


                                <div>

                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        <small>Forgot Password?</small>
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <x-primary-button class="w-100">
                                {{ __('Sign in') }}
                            </x-primary-button>
                        </div>
                    </form>

                    <p class="text-center">
                        <span>New on our platform?</span>
                        <a href="{{ route('register') }}">
                            <span>Create an account</span>
                        </a>
                    </p>
                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
</div>

<!-- / Content -->
{{-- Profile Delete Toaster --}}
@if (session('status') === 'profile-deleted')
<div class="toasterWrap">
    <div id="toast" class="toast">
        <div class="iconBox"><i class="bx bx-bell icon"></i></div>
        <div class="details">
            <span>Success</span>
            <p>Successfully Deleted Your Profile</p>
        </div>
    </div>
</div>
@endif

{{-- user auth using google --}}
@if (session('status') === 'auth-error')
<div class="toasterWrap error">
    <div id="toast" class="toast">
        <div class="iconBox"><i class="bx bx-bell icon"></i></div>
        <div class="details">
            <span>Error</span>
            <p>Google provider configuration is missing</p>
        </div>
    </div>
</div>
@endif

@endsection