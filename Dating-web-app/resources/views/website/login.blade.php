<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* body{
        color: #000;
       } */

        .muslima_login_section {
            padding-top: 60px;
            background-image: url("{{ asset('website/assets/images/people_collection.png') }}");
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
        }


        .muslima_form {
            margin-top: 25%;
            background-color: #fff;
            padding: 25px 25px;
            border-radius: 15px;
            /* color: #000; */
        }

        .members_login_heading {
            font-size: 35px;
            font-weight: 400;
            text-align: center;
            /* color: #fff; */
        }

        .form_label {
            font-size: 18px;
            margin: 0px;
            /* color: #fff; */
        }

        .forgot_password_div {
            text-align: right;

        }

        .forgot_password_div a {
            font-size: 18px;
            font-weight: 500;
            /* color: #fff; */
            cursor: pointer;
            color: #000;
        }

        .checkbox_input {
            height: 25px;
            width: 30px;
        }

        .checkbox_form {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            padding: 0px;
            gap: 10px;
        }

        .checkbox_form label {
            font-size: 16px;
            font-weight: 500;
            /* color: #fff; */
        }

        .dont_open_para {
            font-size: 16px;
            font-weight: 500;
            /* color: #fff; */
            margin-top: 16px;
            font-style: italic;
        }

        .login_btn {
            width: 100%;
            font-size: 20px;
            font-weight: 600;
            color: #fff;
            background-color: #568e96;
        }

        .not_member_div {
            font-size: 20px;
            font-weight: 500;
            text-align: center;
            /* color: #fff; */
            margin-top: 20px;
        }

        .not_member_div p.spread_word {
            font-size: 17px;
            font-weight: 400;
        }

        .social_links {
            font-size: 30px;
            /* color: #fff; */
            text-align: center;
        }

        .social_links span {
            margin: 0px 8px;
        }

        .input_field {
            margin-top: 16px;
        }

        .join_now {
            color: #69969d;
        }

        .forgot_pass {
            text-align: right;
            font-size: 14px;
            font-weight: 600;
        }
    </style>

</head>

<body>

    <section class="muslima_login_section">
        <div class="container">
            <div class="row">

                <div class="col-md-4 mx-auto">

                    <div class="muslima_form">
                        <h4 class="members_login_heading">Members Login</h4>
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
                        <div>
                            <form action="{{ route('user.login') }}" method="post">
                                @csrf
                                <div class="form-group input_field">
                                    <label for="exampleFormControlInput1" class="form_label">Email</label>
                                    <input type="email" class="form-control" name="email"
                                        id="exampleFormControlInput1">
                                </div>

                                <div class="form-group input_field">
                                    <label for="exampleInputPassword1" class="form_label">Password</label>
                                    <input type="password" class="form-control" name="password"
                                        id="exampleInputPassword1">
                                    <a href=""><small id="emailHelp" class="form-text forgot_pass">Forgot
                                            Password</small></a>
                                </div>
                                <div class="form-group">
                                    <div class="form-check checkbox_form">
                                        <input class="checkbox_input" type="checkbox" name="remember_me" value="0"
                                            id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Keep me logged in
                                        </label>
                                    </div>
                                    <p class="dont_open_para">Don't check this box if you're at a public or shared
                                        computer</p>
                                </div>

                                <button type="submit" class="btn login_btn">Login</button>
                            </form>
                        </div>

                        <div class="not_member_div">
                            <p>Not a member? <a href="{{ route('register.view') }}" class="join_now"><strong>Join
                                        Now!</strong></a></p>
                            <p class="spread_word">Help spread the word about Muslima!</p>
                        </div>

                        <div class="social_links">
                            <span><i class="fa-brands fa-facebook-f"></i></span>
                            <span><i class="fa-brands fa-twitter"></i></span>
                            <span><i class="fa-brands fa-instagram"></i></span>
                            <span><i class="fa-brands fa-youtube"></i></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {

            $("#gridCheck").on('click', function() {
                if ($('#gridCheck').val() == 0) {
                    $('#gridCheck').val('1')
                } else if ($('#gridCheck').val() == 1) {
                    $('#gridCheck').val('0')
                }

            })



        });
    </script>
</body>

</html>
