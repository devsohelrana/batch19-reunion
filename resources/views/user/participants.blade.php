@extends('user.appUser')

@section('title', 'Participants List')

@section('usersection')
    <!-- Bordered Table -->
    <div class="card d-none d-md-block">
        <h5 class="card-header">Participants List</h5>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th class="th-sm">Avatar</th>
                            <th class="th-sm">Name</th>
                            <th class="th-sm">Email</th>
                            <th class="th-sm">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($participants as $participant)
                            <tr>
                                <td>
                                    <img src="{{ $participant->avatar }}" alt="Avatar"
                                        class="rounded-circle avatar avatar-md" />
                                </td>
                                <td>
                                    {{ $participant->name }}
                                </td>
                                <td>
                                    {{ $participant->email }}
                                </td>
                                <td><span class="badge rounded-pill bg-success">Success</span></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/ Bordered Table -->

    <div class="col-12 col-md-8 d-md-none col-lg-4 order-3 order-md-2">
        <div class="row">
            <div class="col-12 my-1">
                <div class="card">
                    <h5 class="card-header">Participants List</h5>
                </div>
            </div>
            @foreach ($participants as $participant)
                <div class="col-12 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="{{ $participant->avatar }}"
                                        alt="Participant Avatar | {{ $participant->name }}" class="rounded" />
                                </div>
                                <small><i class='bx bx-wallet'></i> <span class="text-success fw-medium">Success</span>
                                </small>
                            </div>
                            <span class="d-block mb-1">{{ $participant->name }}</span>
                            <span class="d-block mb-1">{{ $participant->email }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
