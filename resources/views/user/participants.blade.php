@extends('user.appUser')

@section('title', 'Participants List')

@section('usersection')
    <!-- Bordered Table -->
    <div class="card">
        <h5 class="card-header">Participants List</h5>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th class="th-sm">Avatar</th>
                            <th class="th-sm">Name</th>
                            <th class="th-sm">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    <img src="{{ $user->avatar }}" alt="Avatar" class="rounded-circle avatar avatar-md" />
                                </td>
                                <td>
                                    <span class="fw-medium">{{ $user->name }}</span>
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
@endsection
