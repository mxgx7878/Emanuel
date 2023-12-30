<!DOCTYPE html>
<html lang="en">

<head>
    <title>OBS STUDIO</title>
    <meta charset="utf-8">
    @include('admin.layouts.css')
    @include('admin.layouts.extrajs')
</head>

<body>
    <section class="login h-100vh align-items-center">
        <div class="container-fluid h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-md-5 leftColumn">
                    <div class="loginForm">
                        <div class="loginContent px-md-5">
                            <div class="logo text-center">
                                <figure>
                                    <a href="#">
                                        <h2>Dating Website Admin Portal <span></span></h2>
                                    </a>
                                </figure>
                            </div>
                            <div class="container">
                                @if (session('message'))
                                    <p style="color: white;">
                                        {{ session('message') }}
                                    </p>
                                @endif
                                <!-- Your login form HTML here -->
                            </div>
                            <div class="titleBox text-center">
                                <h3>Login</h3>
                                <p>Please login to your account.</p>
                            </div>

                            <div class="titleBox text-center">
                                @if (\Session::has('error'))
                                    <span class="text-danger">
                                        {{ \Session::get('error') }}
                                    </span>
                                @endif
                            </div>
                            <form action="{{ route('admin_login') }}" method="POST">
                                @csrf
                                <div class="form-group py-2">
                                    <label for="email">
                                        Email <span class="required text-danger">*</span>
                                    </label>
                                    <input type="email" name="email" placeholder="Enter Email Address"
                                        class="form-control border-0 rounded-pill shadow"/>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group py-2 position-relative">
                                    <label for="password">Password <span class="required text-danger">*</span></label>
                                    <div class="passwordWrapper position-relative">
                                        <input type="password"
                                            class="form-control border-0 rounded-pill shadow passInput" name="password"
                                            id="password" placeholder="Password">

                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <i class="bi bi-eye-slash enter-icon right-icon position-absolute passDisplay"
                                            aria-hidden="true"></i>
                                    </div>
                                </div>
                                <!-- <div class="d-flex justify-content-end flex-wrap">
                                <p><a href="./forgot-password.php" class="theme-primary-text">Forgot Password?</a></p>
                            </div> -->
                                <div class="form-group">
                                    <input type="submit" value="Login"
                                        class="border-0 rounded-pill form-control text-white bg-theme-dating">
                                </div>
                            </form>
                            <!-- <p class="mb-0 text-center text-light">Don't have an account? <a href="./sign-up" class="text-light">Sign Up</a></p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
