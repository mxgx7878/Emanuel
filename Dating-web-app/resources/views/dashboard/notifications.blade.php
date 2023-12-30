@extends('dashboard.layouts.main')
@section('content')
    <section class="inner_header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="inner_header_links">
                        <li><a href="{{ route('dashboard.user-email-address.view') }}">Email Address</a></li>
                        <li><a href="{{ route('dashboard.user-reset-password.view') }}">Password</a></li>
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
                        <div class="col-md-8">
                            <h1>Notifications</h1>
                            <p>Update your email and realtime notifications.</p>
                        </div>
                        <div class="col-md-4 ">
                            <div class="actionBtn">
                                <a href="{{ route('dashboard.user-email-address.view') }}">Change Email Address</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="notifications_switches_div">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form_heading mt-3">
                        <h2>Email Notifications</h2>
                    </div>
                    <form action="">
                        <div class="form-group row align-items-center align-items-center mt-3">
                            <label for="" class="col-md-6">New messages:</label>
                            <div class="custom-control col-md-6 custom-switch text-right">
                                <input type="checkbox" checked class="custom-control-input" id="new_message">
                                <label class="custom-control-label" for="new_message"></label>
                            </div>
                        </div>
                        <div class="form-group row align-items-center mt-3">
                            <label for="" class="col-md-6">Liked me:</label>
                            <div class="custom-control col-md-6 custom-switch text-right">
                                <input type="checkbox" checked class="custom-control-input" id="liked_me">
                                <label class="custom-control-label" for="liked_me"></label>
                            </div>
                        </div>
                        <div class="form-group row align-items-center mt-3">
                            <label for="" class="col-md-6">New matches:</label>
                            <div class="custom-control col-md-6 custom-switch text-right">
                                <input type="checkbox" checked class="custom-control-input" id="new_match">
                                <label class="custom-control-label" for="new_match"></label>
                            </div>
                        </div>
                        <div class="form-group row align-items-center mt-3">
                            <label for="" class="col-md-6">Your Profile Interactions:</label>
                            <div class="custom-control col-md-6 custom-switch text-right">
                                <input type="checkbox" checked class="custom-control-input" id="profile">
                                <label class="custom-control-label" for="profile"></label>
                            </div>
                        </div>
                        <div class="form-group row align-items-center mt-3">
                            <label for="" class="col-md-6">Muslima.com offers and promotions:</label>
                            <div class="custom-control col-md-6 custom-switch text-right">
                                <input type="checkbox" checked class="custom-control-input" id="promotions">
                                <label class="custom-control-label" for="promotions"></label>
                            </div>
                        </div>
                        <div class="form-group row align-items-center mt-3">
                            <label for="" class="col-md-6">Cupid Media offers and promotions:</label>
                            <div class="custom-control col-md-6 custom-switch text-right">
                                <input type="checkbox" checked class="custom-control-input" id="promotions2">
                                <label class="custom-control-label" for="promotions2"></label>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="col-md-6">
                    <div class="form_heading mt-3">
                        <h2>Realtime Notifications</h2>
                        <form action="" class="mt-4">
                            <div class="form-group row align-items-center mt-3">
                                <label for="" class="col-md-6">New messages:</label>
                                <div class="custom-control col-md-6 custom-switch text-right">
                                    <input type="checkbox" checked class="custom-control-input" id="new_message1">
                                    <label class="custom-control-label" for="new_message1"></label>
                                </div>
                            </div>
                            <div class="form-group row align-items-center mt-3">
                                <label for="" class="col-md-6">Liked me:</label>
                                <div class="custom-control col-md-6 custom-switch text-right">
                                    <input type="checkbox" checked class="custom-control-input" id="liked-me1">
                                    <label class="custom-control-label" for="liked-me1"></label>
                                </div>
                            </div>
                            <div class="form-group row align-items-center mt-3">
                                <label for="" class="col-md-6">Someone viewed my profile:</label>
                                <div class="custom-control col-md-6 custom-switch text-right">
                                    <input type="checkbox" checked class="custom-control-input" id="new_match1">
                                    <label class="custom-control-label" for="new_match1"></label>
                                </div>
                            </div>
                            <div class="form-group row align-items-center mt-3">
                                <label for="" class="col-md-6">Potential matches:</label>
                                <div class="custom-control col-md-6 custom-switch text-right">
                                    <input type="checkbox" checked class="custom-control-input" id="new_match4">
                                    <label class="custom-control-label" for="new_match4"></label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form_heading mt-3">
                        <h2>On-site ads / Internal messaging</h2>
                    </div>
                    <form action="">
                        <div class="form-group row align-items-center mt-3">
                            <label for="" class="col-md-6">Cupid Media network sites</label>
                            <div class="custom-control col-md-6 custom-switch text-right">
                                <input type="checkbox" checked class="custom-control-input" id="new_match5">
                                <label class="custom-control-label" for="new_match5"></label>
                            </div>
                        </div>
                    </form>
                    <div class="actionBtn">
                        <button><i class="fa-solid fa-arrow-up"></i> Upgrade Now to Remove Ads</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
