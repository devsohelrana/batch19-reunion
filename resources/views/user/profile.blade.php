@extends('user.appUser')

@section('page-script')
    <script src="{{ asset('assets/js/location.js') }}"></script>
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection

@section('title', 'User Profile')
@section('usersection')
    <div class="card">
        <h5 class="card-header">Profile Details</h5>
        <!-- Account -->
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-center flex-column gap-2">
                <form id="formAccountSettings" method="POST" onsubmit="return false">
                    <div class="imgUplod">
                        <label for="avatar" class="selectFile">
                            <i class='bx bxs-camera'></i>
                        </label>
                        <input type="file" id="avatar" name="avatar" required />
                        <div class="profilImg">
                            {{-- @if (Auth::check())
                                @if ($avatars && $avatars->user_id == auth()->user()->id) --}}
                            <img id="previewavatar"
                                src="{{ $user->avatar }}"
                                alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
                            {{-- @endif
                            @endif --}}
                        </div>
                    </div>
                    <p class="text-muted my-2">Allowed JPG, GIF or PNG. Max size of 800K</p>
                    <div class="button-wrapper d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary me-2">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
        <hr class="my-0" />
        <div class="card-body">
            <form id="formAccountSettings" method="POST" onsubmit="return false">
                {{-- user basic details --}}
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <input class="form-control" type="text" id="name" name="name" placeholder="Your Name"
                            autofocus />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="phoneNumber">Phone Number</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text">BD (+88)</span>
                            <input type="text" id="phoneNumber" name="phoneNumber" class="form-control"
                                placeholder="017 00 000 000" />
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="gender" class="form-label">Gender</label>
                        <select id="gender" class="select2 form-select">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="group" class="form-label">Group</label>
                        <select id="group" class="select2 form-select">
                            <option value="">Select Group</option>
                            <option value="Science">Science</option>
                            <option value="Arts">Arts</option>
                            <option value="Commerce">Commerce</option>
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="marital_status" class="form-label">Marital Status</label>
                        <select id="marital_status" class="select2 form-select">
                            <option value="">Select Marital Status</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                        </select>
                    </div>
                </div>

                {{-- User address --}}
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="division">Division</label>
                        <select name="division" id="division" onchange="divisionsList();" class="select2 form-select"
                            autofocus>
                            <option value="" disabled selected>Select Division</option>
                            <option value="Barishal">বরিশাল (Barishal)</option>
                            <option value="Chattogram">চট্টগ্রাম (Chattogram)</option>
                            <option value="Dhaka">ঢাকা (Dhaka)</option>
                            <option value="Khulna">খুলনা (Khulna)</option>
                            <option value="Mymensingh">ময়মনসিংহ (Mymensingh)</option>
                            <option value="Rajshahi">রাজশাহী (Rajshahi)</option>
                            <option value="Rangpur">রংপুর (Rangpur)</option>
                            <option value="Sylhet">সিলেট (Sylhet)</option>
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="district">District</label>
                        <select name="district" id="district" onchange="upazilaList();" class="select2 form-select">

                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="upazila">Upazila</label>
                        <select name="upazila" id="upazila" onchange="thanaList();" class="select2 form-select">

                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="thana">Thana</label>
                        <select name="thana" id="thana" class="select2 form-select">

                        </select>
                    </div>
                </div>

                {{-- submit button --}}
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /Account -->

    </div>

@endsection
