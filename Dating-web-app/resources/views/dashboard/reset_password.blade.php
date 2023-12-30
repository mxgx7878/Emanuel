@extends('dashboard.layouts.main')
@section('content')
    <section class="inner_header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="inner_header_links">
                        <li><a href="{{ route('dashboard.user-email-address.view') }}">Email Address</a>
                        </li>
                        <li><a href="{{ route('dashboard.user-reset-password.view') }}">Password</a>
                        </li>
                        <li> <a href="{{ route('dashboard.profile.setting.view') }}">Profile Settings</a></li>
                        <li><a href="{{ route('dashboard.billing.view') }}">Billing</a></li>
                        <li><a href="{{ route('dashboard.user-notifications.view') }}">Notifications</a></li>
                        <!-- <li><a href="#">Verify Profile</a></li> -->
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="innerPagesFirst">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="top_header_content row">
                        <div class="col-md-10">
                            <h1>Reset your password</h1>
                            <p>To help keep your account secure we recommend that you routinely change your password.</p>
                            <p class="note">Important: For extra security ensure that your new password is NOT the same as
                                your email password.</p>
                        </div>
                        <!-- <div class="col-md-4 ">
                          <div class="actionBtn" >
                            <a href="javascript:;">View My Profile</a>
                          </div>
                          </div> -->
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="col-md-12 mb-3">
                        @if (\Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ \Session::get('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @elseif(\Session::has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ \Session::get('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                    <div class="form_heading mt-3">
                        <h2>Enter your current password</h2>
                    </div>
                    <form action="{{ route('user.change.password') }}" method="post">
                        @csrf
                        <div class="form-group  mt-5">
                            <label for="">Current Password:</label>
                            <input type="password" class="form-control" name="password"
                                placeholder="Enter Current Password">
                            @error('password')
                                <p class="text-danger">Please Enter Password</p>
                            @enderror
                            <div class="form_heading mt-3">
                                <h2>Enter your new password</h2>
                            </div>
                            <label for="" class="mt-3">New Password:</label>
                            <input type="password" class="form-control" name="new_password"
                                placeholder="Enter New Password">
                            @error('new_password')
                                <p class="text-danger">Please Enter New Password</p>
                            @enderror
                            <label for="" class="mt-3">Confirm New Password:</label>
                            <input type="password" class="form-control" name="change_password"
                                placeholder="Enter New Password Again">
                            @error('change_password')
                                <p class="text-danger">Please Enter Change Password</p>
                            @enderror
                        </div>
                        <div class="actionBtn ">
                            <button>Save</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="password_guide">
                        <h2>Password Guidelines</h2>
                        <h5>Your password must meet the following criteria:</h5>
                        <ul>
                            <li><i class="fa-solid fa-check"></i> Must be greater than 8 characters in length.</li>
                            <li><i class="fa-solid fa-check"></i> Must contain at least one alpha character (eg. A-Z).
                            </li>
                            <li><i class="fa-solid fa-check"></i> Must contain at least one number.</li>
                            <li><i class="fa-solid fa-check"></i> Must contain NO spaces.</li>
                            <li><i class="fa-solid fa-check"></i> Must not be the same as previous passwords</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
