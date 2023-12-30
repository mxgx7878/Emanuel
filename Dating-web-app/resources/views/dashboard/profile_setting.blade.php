<style>
    .form_label {
        font-size: 20px;
        font-weight: 500;
    }

    .form-check-label {
        font-size: 16px;
    }
</style>


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

                    <div class="form_heading">
                        <h2>Profile Settings</h2>
                    </div>
                    <p class="mt-3">Update your profile display options and localization.</p>
                </div>
            </div>
        </div>
    </section>


    <section class="profile_setting_section">

        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <form>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form_heading">
                                    <h2>Online Options:</h2>
                                </div>

                                <div class="online_options_form mt-2">
                                    <p class="form_label my-2">Online Status:</p>

                                    <div class="form-check my-2">
                                        <input class="form-check-input" type="radio" name="exampleRadios"
                                            id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Show me as online
                                        </label>
                                    </div>

                                    <div class="form-check my-2">
                                        <input class="form-check-input" type="radio" name="exampleRadios"
                                            id="exampleRadios2" value="option2">
                                        <label class="form-check-label" for="exampleRadios2">
                                            Show me as busy
                                        </label>
                                    </div>

                                    <p class="form_label my-2">Display Profile:</p>

                                    <div class="form-check my-2">
                                        <input class="form-check-input" type="radio" name="exampleRadioss"
                                            id="exampleRadios11" value="option11" checked>
                                        <label class="form-check-label" for="exampleRadios11">
                                            Display my profile to users
                                        </label>
                                    </div>

                                    <div class="form-check my-2">
                                        <input class="form-check-input" type="radio" name="exampleRadioss"
                                            id="exampleRadios12" value="option12">
                                        <label class="form-check-label" for="exampleRadios12">
                                            Hide my profile from users
                                        </label>
                                    </div>

                                    <div class="actionBtn mt-3">
                                        <button><i class="fa-solid fa-arrow-up"></i> Upgrade Now to Remove Ads</button>
                                    </div>



                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form_heading">
                                    <h2>Localization:</h2>
                                </div>

                                <div class="localization_form mt-2">

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Time Zones:</label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option>Afghanistan</option>
                                            <option>Australia</option>
                                            <option>Austria</option>
                                            <option>Morocco</option>
                                            <option>Nepal</option>
                                            <option>Netherlands</option>
                                        </select>
                                        <small id="" class="form-text text-muted">(Filter time zones by
                                            country)</small>
                                    </div>

                                    <div class="form-group">
                                        <select class="form-control" id="exampleFormControlSelect2">
                                            <option>Please Select</option>
                                            <option>(GMT+05:00) Karachi</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect3">Date & Time Format:</label>
                                        <select class="form-control" id="exampleFormControlSelect3">
                                            <option>Nederlands (Nederlands)</option>
                                            <option>Bahasa Indonesia (Indonesia)</option>
                                            <option>English (United States)</option>
                                            <option>Español (Estados Unidos)</option>
                                            <option>Français (France)</option>
                                        </select>
                                        <!-- <small id="" class="form-text text-muted">(Filter time zones by country)</small> -->
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect4">Measurement Units:</label>
                                        <select class="form-control" id="exampleFormControlSelect4">
                                            <option>Metric</option>
                                            <option>Metric / Imperial</option>
                                            <option>Imperial USA </option>
                                            <option>Imperial UK </option>
                                            <!-- <option>5</option> -->
                                        </select>
                                        <!-- <small id="" class="form-text text-muted">(Filter time zones by country)</small> -->
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="text-center actionBtn">
                            <button type="button" class="btn btn-info">SAVE</button>
                        </div>
                    </form>

                    <div class="form_heading">

                        <h2>Switch Off Profile</h2>

                        <label for="" class="mt-3">To switch your profile off on Muslima.com please <a
                                href="">Click here</a></label>
                    </div>


                </div>
            </div>

    </section>
@endsection
