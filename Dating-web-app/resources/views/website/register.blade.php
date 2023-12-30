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
        .muslima_register_section {
            padding-top: 60px;
            background-image: url("{{ asset('website/assets/images/people_collection.png') }}");
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
        }

        .muslima_register_form {
            margin-top: 25%;
            background-color: #fff;
            border-radius: 15px;
            padding: 25px 25px;
        }

        .looking_for_div {
            display: flex;
            justify-content: space-between;
        }

        .male_female_btn {
            border: 1px solid #eec6c6;
            border-radius: 10px;
            width: 65px;
        }

        .male_female_btn button.male_btn {
            font-size: 25px;
            border: none;
            border-right: 1px solid #eec6c6;
            background-color: transparent;
            color: #c4baba;
        }

        .male_female_btn button.female_btn {
            font-size: 25px;
            border: none;
            /* border-right: 1px solid #000; */
            background-color: transparent;
            color: #c4baba;
        }

        .checkbox_form {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            padding: 0px;
        }


        .age_restriction {
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
        }

        .view_single_ones_btn {
            width: 100%;
            background-color: #568e96;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            border: none;
            padding: 8px 15px;
            border-radius: 10px;
            display: flex;
            justify-content: flex-start;
            gap: 100px;
            align-items: center;

        }

        .male_female_btn button.male_btn:hover {
            color: blue;
            /* border-color: blue; */
        }

        .male_female_btn button.female_btn:hover {
            color: rgb(235, 127, 145);
            /* border-color: pink; */
        }

        .view_single_ones_btn span {
            font-size: 24px;
        }

        .checkbox_input {
            height: 25px;
            width: 30px;
        }

        .checkbox_form label {
            font-size: 12px;
            color: #d22424;
            padding-left: 8px;

        }

        .age_restriction span {
            font-size: 24px;
            color: #d22424;
        }

        .age_restriction p {
            font-size: 12px;
            color: #d22424;
            padding-left: 8px;
        }

        label {
            margin: 0px;
        }

        .dropdown_select {
            margin-top: 2px;
        }
    </style>

</head>

<body>


    <section class="muslima_register_section">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mx-auto">
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

                    <div class="muslima_register_form">
                        <form action="{{ route('user.register') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="example">First Name</label>
                                <input type="text" name="name" required class="form-control" id="example"
                                    aria-describedby="emailHelp">
                            </div>


                            <div class="looking_for_div">

                                <div>
                                    <label for="first_selection">I'm a</label>
                                    <div class="male_female_btn" id="gender_selection">
                                        <button type="button" class="male_btn" id="gender_male" name="gender"
                                            value="1" id="first_selection"><span><i
                                                    class="fa-solid fa-person"></i></span></button>
                                        <input type="hidden" name="gender_male">
                                        <button type="button" class="female_btn" id="gender_female" name="gender"
                                            value="2" id="first_selection"><span><i
                                                    class="fa-solid fa-person-dress"></i></span></button>
                                        <input type="hidden" name="gender_female">
                                    </div>
                                </div>

                                <div>
                                    <label for="second_selection">I'm looking for</label>
                                    <div class="male_female_btn" id="looking_for_selection">
                                        <button type="button" class="male_btn" id="looking_for_male" name="looking_for"
                                            value="1" id="second_selection"><span><i
                                                    class="fa-solid fa-person"></i></span></button>
                                        <input type="hidden" name="looking_for_male">
                                        <button type="button" class="female_btn" id="looking_for_female"
                                            name="looking_for" value="2" id="second_selection"><span><i
                                                    class="fa-solid fa-person-dress"></i></span></button>
                                        <input type="hidden" name="looking_for_female">
                                    </div>
                                </div>

                                <div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Age</label>
                                        <select class="form-control dropdown_select" required name="age"
                                            id="exampleFormControlSelect1">
                                            <option>18</option>
                                            <option>19</option>
                                            <option>20</option>
                                            <option>21</option>
                                            <option>22</option>
                                            <option>23</option>
                                            <option>24</option>
                                            <option>25</option>
                                            <option>26</option>
                                            <option>27</option>
                                            <option>28</option>
                                            <option>29</option>
                                            <option>30</option>
                                            <option>31</option>
                                        </select>
                                    </div>
                                </div>


                            </div>


                            <div class="form-group">
                                <label for="exampleFormControlInput1">Email address</label>
                                <input type="email" class="form-control" required name="email"
                                    id="exampleFormControlInput1" placeholder="name@example.com">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControl">Password</label>
                                <input type="password" class="form-control" required name="password"
                                    id="exampleFormControl" placeholder="Your Muslima Password">
                            </div>


                            <div class="form-group">
                                <div class="form-check checkbox_form">
                                    <input class="checkbox_input" required name="agecheck" type="checkbox"
                                        id="gridCheck">
                                    <label class="form-check-label " for="gridCheck">
                                        Yes, I confirm that I am over 18 and agree to the <strong
                                            style="color: #5e5b5b;">Terms of Use</strong> and <strong
                                            style="color: #5e5b5b;">Privacy Statement</strong>.
                                    </label>
                                </div>
                            </div>



                            <div class="age_restriction">
                                <span><i class="fa-solid fa-circle-exclamation"></i></span>
                                <p>You must be over 18 and agree to the Terms of Use and Privacy Statement.</p>
                            </div>


                            <button type="submit" class="view_single_ones_btn"><span><i
                                        class="fa-solid fa-lock"></i></span><label for=""> View Singles
                                    Now</label></button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            $('#gender_male').on('click', function() {
                $(this).next().val('1');
                $('#gender_female').next().removeAttr('value');
                $(this).attr('style', 'color:blue')
                $('#gender_female').removeAttr('style', 'color:rgb(235, 127, 145)');
                $('#looking_for_female').attr('style', 'color:rgb(235, 127, 145)');
                $('#looking_for_female').next().val('2');
                $('#looking_for_male').next().removeAttr('value');
                $('#looking_for_male').removeAttr('style', 'color:blue');
            });
            $('#gender_female').on('click', function() {
                $(this).next().val('2');
                $('#gender_male').next().removeAttr('value');
                $(this).attr('style', 'color:rgb(235, 127, 145)');
                $('#gender_male').removeAttr('style', 'color:blue')
                $('#looking_for_male').attr('style', 'color:blue');
                $('#looking_for_male').next().val('1');
                $('#looking_for_female').next().removeAttr('value');
                $('#looking_for_female').removeAttr('style', 'color:rgb(235, 127, 145)');
            });
        });
    </script>

</body>

</html>
