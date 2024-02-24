@extends('user.appUser')

@section('title', 'Participant Payment')
@section('usersection')

    <div class="card">
        <h5 class="card-header">Profile Details</h5>
        <!-- Account -->
        <div class="row">
            <div class="col-md">
                <div class="row g-0 d-flex justify-content-center align-items-center">
                    <div class="col-md-6">
                        <img class="card-img card-img-left" src="../assets/img/illustrations/payment.svg" alt="Card image">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h1 class="payTitle">
                                <span class="subTitle">1st reunion powered by</span> <br>
                                BATCH 19
                            </h1>
                            <p class="card-text mt-5">
                                This is a wider card with supporting text below as a natural lead-in to additional
                                content.
                                This content is a little bit longer.
                            </p>

                            <div class="payBkash">
                                <img src="../assets/img/bKash.svg" class="card-img  card-img-right" alt="">
                            </div>

                            <a class="btn btn-primary w-100" href="kfkfksdfksd">
                                <span class="tf-icons bx bx-wallet me-1"></span>
                                Complete Payment
                            </a>
                        </div>
                    </div>
                </div>
            </div>
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
