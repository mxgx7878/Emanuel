<!doctype html>
<html>

<head>
    <title>Dashboard</title>
    @include('dashboard.layouts.styles')
</head>

<body>
    <header>

        <div class="mobile-menu">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 p-0">
                        <div class="mobile-top">
                            <div class="img-div">
                                <img src="{{ asset('dashboard/assets/images/logo.png') }}" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="circle" id="navbar"><i class="fa fa-bars" aria-hidden="true"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="circle" id="navbar"><i class="fa fa-bars" aria-hidden="true"></i></div> -->
            <div class="nveMenu text-left">
                <div class="mobile-cross close-btn-nav" id="navbar"><i class="fas fa-times" aria-hidden="true"></i>
                </div>
                <div>
                    <a href="index.php"><img src="{{ asset('dashboard/assets/images/logo.png') }}"
                            class="img-fluid"></a>
                </div>
                <ul class="navlinks p-0 mt-4">
                    <li><a href="{{ route('dashboard') }}">Online</a></li>
                    <li><a href="{{ route('dashborad.meet-more-women.view') }}">Matches</a></li>
                    <li><a href="{{route('dashboard.advanced.search.view')}}">Search</a></li>
                    <li><a href="{{ route('dashboard.user.all.message.view') }}">Messages</a></li>
                    {{-- <li><a href="#">Activity</a></li> --}}
                </ul>
            </div>
            <div class="overlay"></div>
        </div>
        <div class="desktop-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 align-self-center">
                        <div class="logo-img">
                            <img src="{{ asset('dashboard/assets/images/logo.png') }}" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-md-8 align-self-center">
                        <ul class="header_links">
                            <li><a href="{{ route('dashboard') }}">Online</a></li>
                            <li><a href="{{ route('dashborad.meet-more-women.view') }}">Matches</a></li>
                            <li><a href="{{route('dashboard.advanced.search.view')}}">Search</a></li>
                            <li> <a href="{{ route('dashboard.user.all.message.view') }}">Messages</a></li>
                            {{-- <li><a href="#">Activity</a></li> --}}
                        </ul>
                    </div>
                    <div class="col-md-2 align-self-center">
                        <ul class="inner_user_links">
                            <li><a href="{{ route('dashborad.meet-more-women.view') }}"><i
                                        class="fa-solid fa-globe"></i></a></li>
                            <li class="dropdown"><a class="user_link dropdown-toggle" href="javascript:;"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"><i class="fa-solid fa-user"></i></a>
                                <div class="dropdown-menu user_links_menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('dashborad.user.details.view') }}">View
                                        Profile</a>
                                    <a class="dropdown-item" href="{{ route('dashborad.user-edit-profile.view') }}">Edit
                                        Profile</a>
                                    <a class="dropdown-item"
                                        href="{{ route('dashborad.user-photos.view') }}">Photos</a>
                                    <a class="dropdown-item"
                                        {{-- href="{{ route('dashbaord.user-match.view') }}">Matches</a> --}}
                                    <a class="dropdown-item" href="{{ route('dashbaord.user-interest.view') }}">Hobies
                                        & Interests</a>
                                    <a class="dropdown-item"
                                        href="{{ route('dashbaord.user-personality.view') }}">Personality Questions</a>
                                   
                                    {{-- <a class="dropdown-item" href="#">Verify Profile</a>
                                    <a class="dropdown-item" href="#">Switch Off Profile</a> --}}
                                </div>
                            </li>

                            <li class="dropdown"><a href="javascript:;" id="dropdownMenuButton" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i
                                        class="fa-solid fa-gear"></i></a>
                                <div class="dropdown-menu user_links_menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item"
                                        href="{{ route('dashboard.user-email-address.view') }}">Email Address</a>
                                    <a class="dropdown-item"
                                        href="{{ route('dashboard.user-reset-password.view') }}">Password</a>
										<a class="dropdown-item" href="{{ route('dashboard.profile.setting.view') }}">Profile Settings</a>
                                    <a class="dropdown-item" href="{{ route('dashboard.billing.view') }}">Billing</a>
                                    <a class="dropdown-item"
                                        href="{{ route('dashboard.user-notifications.view') }}">Notifications</a>
                                    {{-- <a class="dropdown-item" href="#">Select Language</a>
                                    <a class="dropdown-item" href="#">Help</a>
                                    <a class="dropdown-item" href="#">Update Membership</a> --}}
                                    <a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- PRELOADER START -->
    <div class="preloader"></div>
    <!-- PRELOADER END -->


    <!--
 fancybox images link
 <a data-fancybox="gallery" href="images/logo.png"><img src="images/logo.png"></a>
 <a data-fancybox="gallery" href="images/logo.png"><img src="images/logo.png"></a>
 -->
