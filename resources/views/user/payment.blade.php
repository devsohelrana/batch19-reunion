@extends('user.appUser')

@section('title', 'User Payment')

@section('usersection')
    <div class="card">
        <h5 class="card-header">Profile Details</h5>
        <!-- Account -->
        <div class="card-body">
            <h2>Payment</h2>
        </div>
        <!-- /Account -->

        @if (session('status') === 'detail-success')
            <div class="toasterWrap">
                <div id="toast" class="toast">
                    <div class="iconBox"><i class="bx bx-bell icon"></i></div>
                    <div class="details">
                        <span>Success</span>
                        <p>Successfully Update Your Details</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
