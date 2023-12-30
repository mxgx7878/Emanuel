
 <!-- Page content wrapper-->
 <div id="page-content-wrapper" class="flex-shrink-0">
    <!-- Top navigation-->
    <nav class="navbar navbar-expand-lg bg-theme-secondary border-bottom-radius">
        <div class="container">
            @if(session('message'))
                <p style="color: white;">
                    {{ session('message') }}
                </p>
            @endif
            <!-- Your login form HTML here -->
        </div>
        <div class="container-fluid justify-content-end">
            <div class="row justify-content-end">
                <button class="navbar-toggler text-white" id="sidebarToggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="bi bi-list"></i></button>
                <div class="collapse navbar-collapse col-xl-12 col-md-12 col-12 profile-dropdown" id="navbarSupportedContent">
                    <div class="d-flex align-items-center flex-wrap justify-content-end gap-15">
                        <div class="avatarImage d-flex align-items-center gap-15">
                            <a class="text-dark notification position-relative" id="notification"><i class="bi bi-bell-fill"></i><span class="count">3</span></a>
                            <img src="{{asset('assets/admin/images/user-icon.png')}}" alt="User Avatar" class="flex-shrink-0">
                        </div>
                        <div class="avatarInfo">
                            <a id="navbarDropdown">
                                <h3 class="text-white achivpFont h5 mb-0 mt-2">{{ auth()->user()->name }}<i class="bi bi-chevron-down"></i></h3>
                            </a>
                            <p class="mb-0 text-white">{{ (isset(auth()->user()->user_role) == 1 && auth()->user()->user_role == 1) ? "Admin" : "User"}}</p>
                            <div class="dropdown-menu p-3">
                                <p class="mb-2"><a href="#" class="text-dark achivpFont text-decoration-none"><i class="bi bi-person pr-2"></i>Profile</a></p>
                                <p class="mb-2"><a href="{{route('user.logout')}}" class="text-dark achivpFont text-decoration-none"><i class="bi bi-box-arrow-left pr-2"></i>Logout</button></p>
                                {{-- <p class="mb-2"><button data-toggle="modal" data-target="#logiutPopup" class="text-dark achivpFont bg-transparent border-0 p-0"><i class="bi bi-box-arrow-left pr-2"></i>Logout</button></p> --}}
                            </div>
                            <!-- notification -->

                            <div class="dropdown-notifcation p-3">
                                <h3 class="mb-0 achivpFont py-2 border-bottom font-weight-bold h5">Notifications</h3>
                                <div class="d-flex gap-15 py-3">
                                    <div class="notificationIcon flex-shrink-0">
                                        <i class="bi bi-bell-fill"></i>
                                    </div>
                                    <div class="notificationContent">
                                        <p class="text-secondary achivpFont">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor.
                                        </p>
                                        <p class="theme-primary-text mb-0"><span class="pr-3">May 25, 2021</span><span>10:30 PM</span></p>
                                    </div>
                                </div>
                                <div class="d-flex gap-15 py-3">
                                    <div class="notificationIcon flex-shrink-0">
                                        <i class="bi bi-bell-fill"></i>
                                    </div>
                                    <div class="notificationContent">
                                        <p class="text-secondary achivpFont">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor.
                                        </p>
                                        <p class="theme-primary-text mb-0"><span class="pr-3">May 25, 2021</span><span>10:30 PM</span></p>
                                    </div>
                                </div>
                                <div class="viewAll text-center py-3">
                                    <a href="#" class="text-dark font-weight-bold">VIEW ALL NOTIFICATIONS</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <!-- Page content-->