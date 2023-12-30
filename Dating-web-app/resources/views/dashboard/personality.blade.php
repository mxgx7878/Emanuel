@extends('dashboard.layouts.main')
@section('content')
    <section class="inner_header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="inner_header_links">
                        <li><a href="{{ route('dashborad.user-photos.view') }}">Photos</a></li>
                        <li><a href="{{ route('dashborad.user-edit-profile.view') }}">Profile</a></li>
                        {{-- <li><a href="{{ route('dashbaord.user-match.view') }}">Match</a></li> --}}
                        <li><a href="{{ route('dashbaord.user-interest.view') }}">Interest</a></li>
                        <li><a href="{{ route('dashbaord.user-personality.view') }}">Personality</a></li>
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
                            <h1>Edit Profile</h1>
                            <p>Answering these profile questions will help other users find you in search results
                                and help us to find you more accurate matches. Answer all questions below to complete this
                                step.</p>
                        </div>
                        <div class="col-md-4 ">
                            <div class="actionBtn">
                                <a href="{{ route('dashborad.user.details.view') }}">View My Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-md-12 pb-5">

                <form action="{{ route('user.add.update.personality.question') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="favorite_movie">What is your favorite movie?</label>
                        <input type="text" class="form-control" id="favorite_movie" name="q1"
                        value="{{ isset($userQuestions->q1) ? $userQuestions->q1 : ""}}" >
                    </div>

                    <div class="form-group">
                        <label for="favorite_book">What is your favorite book?</label>
                        <input type="text" value="{{ isset($userQuestions->q2) ? $userQuestions->q2 : ""}}"  class="form-control" id="favorite_book"
                            name="q2">
                    </div>

                    <div class="form-group">
                        <label for="favorite_food">What sort of food do you like?</label>
                        <input type="text" value="{{ isset($userQuestions->q3) ? $userQuestions->q3 : ""}}" class="form-control" name="q3"
                            id="favorite_food">
                    </div>

                    <div class="form-group">
                        <label for="favorite_music">What sort of music do you like?</label>
                        <input type="text" value="{{ isset($userQuestions->q4) ? $userQuestions->q4 : ""}}" class="form-control" name="q4"
                            id="favorite_music">
                    </div>

                    <div class="form-group">
                        <label for="hobbies_and_interests">What are your hobbies and interests?</label>
                        <input type="text" value="{{ isset($userQuestions->q5) ? $userQuestions->q5 : ""}}" class="form-control" name="q5"
                            id="hobbies_and_interests">
                    </div>

                    <div class="form-group">
                        <label for="physical_appearance">How would you describe your dress sense and physical
                            appearance?</label>
                        <input type="text" value="{{ isset($userQuestions->q6) ? $userQuestions->q6 : ""}}" class="form-control" name="q6"
                            id="physical_appearance">
                    </div>

                    <div class="form-group">
                        <label for="sense_of_humour">How would you describe your sense of humor?</label>
                        <input type="text" value="{{ isset($userQuestions->q7) ? $userQuestions->q7 : ""}}" class="form-control" name="q7"
                            id="sense_of_humour">
                    </div>

                    <div class="form-group">
                        <label for="personality">How would you describe your personality?</label>
                        <input type="text" value="{{ isset($userQuestions->q8) ? $userQuestions->q8 : ""}}" class="form-control" name="q8"
                            id="personality">
                    </div>

                    <div class="form-group">
                        <label for="traveled">Where have you traveled or would like to travel to?</label>
                        <input type="text" value="{{ isset($userQuestions->q9) ? $userQuestions->q9 : ""}}" class="form-control" name="q9"
                            id="traveled">
                    </div>

                    <div class="form-group">
                        <label for="partner">How adaptive are you to having a partner from a different culture to your
                            own?</label>
                        <input type="text" value="{{ isset($userQuestions->q10) ? $userQuestions->q10 : ""}}"  class="form-control" name="q10"
                            id="partner">
                    </div>

                    <div class="form-group">
                        <label for="romantic_weekend">How would you spend a perfect romantic weekend?</label>
                        <input type="text" value="{{ isset($userQuestions->q11) ? $userQuestions->q11 : ""}}"  class="form-control" name="q11"
                            id="romantic_weekend">
                    </div>

                    <div class="form-group">
                        <label for="perfect_match">What sort of person would be your perfect match?</label>
                        <input type="text" value="{{ isset($userQuestions->q12) ? $userQuestions->q12 : ""}}"  class="form-control" name="q12"
                            id="perfect_match">
                    </div>

                    <div class="actionBtn text-center form_submit_btn">
                        <button type="submit" class="btn btn-info">SUBMIT</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
