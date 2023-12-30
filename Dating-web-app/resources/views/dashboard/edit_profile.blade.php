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


    <section class="view_pro_form_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="form_heading">
                        <h2>Your Basics</h2>
                    </div>
                    <form action="{{ route('user.add.update.details') }}" method="post">
                        @csrf
                        <div class="row pt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">First Name:</label>
                                    <input type="text" class="form-control" name="name" value="{{ $user->name }}"
                                        placeholder="Victor">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">I'm a:</label>
                                    {{-- <input type="text" class="form-control" muted
                                        value="{{ $userData->gender_id == 1 ? 'male' : 'female' }}" disabled name="gender"
                                        id="gender" placeholder="Male"> --}}
                                    <select name="gender" muted disabled id="gender" class="form-control">
                                        <option {{ $userData->gender_id == 1 ? 'selected' : '' }} value="1">Male
                                        </option>
                                        <option {{ $userData->gender_id == 2 ? 'selected' : '' }} value="2">Female
                                        </option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 align-self-center mt-3">
                                <div class="actionBtn">
                                    <a id="change_gender" href="javascript:void(0);">Change</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Date Of Birth:</label>
                                    <input type="month" class="form-control"
                                        {{ $userData->date_of_birth != null ? '' : 'muted disabled' }} id="date_of_birth"
                                        name="date_of_birth" min="2000-01" value="{{ $userData->date_of_birth }}"
                                        placeholder="December 2022">
                                    {{-- <input  type="date" id="date_of_birth" class="form-control" muted disabled
                                        name="date_of_birth" value="December 2022" placeholder="December 2022"> --}}
                                </div>
                            </div>
                            <div class="col-md-2 align-self-center mt-3">
                                <div class="actionBtn">
                                    <a id="change_date" href="javascript:void(0);">Change</a>
                                </div>
                            </div>
                            <div class="col-md-6 align-self-center mt-3">
                                <p id="emailHelp" class="form-text text-muted">* To protect your privacy we only store your
                                    month and year of birth</p>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-3">
                                <label for="exampleInputEmail1">Country:</label>
                                <select name="country" id="country" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($country as $item)
                                        <option {{ $item->id == $userData->country ? 'Selected' : '' }}
                                            value="{{ $item->id }}">{{ $item->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            <div id="getState" class="col-md-3">
                                <label for="">State/Province</label>
                                <select name="state" id="state" class="form-control" disabled>
                                    <option value="">Select</option>
                                </select>
                            </div>
                            <div id="getCity" class="col-md-3">
                                <label for="">City</label>
                                <select name="city" id="city" class="form-control" disabled>
                                    <option value="">Select</option>
                                </select>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12">
                                <div class="form_heading">
                                    <h2>Your Appearance</h2>
                                </div>
                            </div>
                        </div>

                        <div class="row pt-5">
                            <div class="col-md-12">
                                <p for="" class="vraiant_heading">Hair Color:</p>
                                <div class="variation_radio_btns">
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="hair" id="bald"
                                                {{ $userData->hair_color == 'Bald / Shaved' ? 'checked' : '' }}
                                                value="Bald / Shaved">
                                            <label class="form-check-label" for="bald">Bald / Shaved</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->hair_color == 'Black' ? 'checked' : '' }} name="hair"
                                                id="appearance_black" value="Black">
                                            <label class="form-check-label" for="appearance_black">Black</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="hair" id="blonde"
                                                {{ $userData->hair_color == 'Blonde' ? 'checked' : '' }} value="Blonde">
                                            <label class="form-check-label" for="blonde">Blonde</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="hair"
                                                {{ $userData->hair_color == 'Brown' ? 'checked' : '' }}
                                                id="appearance_brown" value="Brown">
                                            <label class="form-check-label" for="appearance_brown">Brown</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="hair"
                                                {{ $userData->hair_color == 'Grey / White' ? 'checked' : '' }} Brown
                                                id="appearance_grey" value="Grey / White">
                                            <label class="form-check-label" for="appearance_grey">Grey / White</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="hair"
                                                {{ $userData->hair_color == 'Light Brown' ? 'checked' : '' }}
                                                id="appearance_light_brown" value="Light Brown">
                                            <label class="form-check-label" for="appearance_light_brown">Light
                                                Brown</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="hair"
                                                {{ $userData->hair_color == 'Red' ? 'checked' : '' }} id="appearance_red"
                                                value="Red">
                                            <label class="form-check-label" for="appearance_red">Red</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="hair"
                                                {{ $userData->hair_color == 'Changes frequently' ? 'checked' : '' }}
                                                id="changes_frequently" value="Changes frequently">
                                            <label class="form-check-label" for="changes_frequently">Changes
                                                frequently</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="hair" id="other-01"
                                                {{ $userData->hair_color == 'Other' ? 'checked' : '' }} value="Other">
                                            <label class="form-check-label" for="other-01">Other</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="hair"
                                                {{ $userData->hair_color == 'Prefer not to say' ? 'checked' : '' }}
                                                id="prefer_not_to_say" value="Prefer not to say">
                                            <label class="form-check-label" for="prefer_not_to_say">Prefer not to
                                                say</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-5">
                            <div class="col-md-12">
                                <p for="" class="vraiant_heading">Eye Color:</p>
                                <div class="variation_radio_btns">

                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="eye_color"
                                                {{ $userData->eye_color == 'Black' ? 'checked' : '' }} id="eye_black"
                                                value="Black">
                                            <label class="form-check-label" for="eye_black">Black</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="eye_color"
                                                {{ $userData->eye_color == 'Blue' ? 'checked' : '' }} id="eye_blue"
                                                value="Blue">
                                            <label class="form-check-label" for="eye_blue">Blue</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="eye_color"
                                                {{ $userData->eye_color == 'Brown' ? 'checked' : '' }} id="eye_brown"
                                                value="Brown">
                                            <label class="form-check-label" for="eye_brown">Brown</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="eye_color"
                                                {{ $userData->eye_color == 'Green' ? 'checked' : '' }} id="eye_green"
                                                value="Green">
                                            <label class="form-check-label" for="eye_green">Green</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="eye_color"
                                                {{ $userData->eye_color == 'Grey' ? 'checked' : '' }} id="eye_grey"
                                                value="Grey">
                                            <label class="form-check-label" for="eye_grey">Grey</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="eye_color"
                                                {{ $userData->eye_color == 'Hazel' ? 'checked' : '' }} id="eye_hazel"
                                                value="Hazel">
                                            <label class="form-check-label" for="eye_hazel">Hazel</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" selected name="eye_color"
                                                {{ $userData->eye_color == 'Other' ? 'checked' : '' }} id="other-02"
                                                value="Other">
                                            <label class="form-check-label" selected for="other-02">Other</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row pt-5">
                                    <div class="col-md-12">
                                        <p for="" class="vraiant_heading">Height:</p>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="height" class="form-control" id="height">
                                            <option value="">PLease Select</option>
                                            <option {{ $userData->height == '120' ? 'selected' : '' }} value="120">4'
                                                0'' (120cm)</option>
                                            <option {{ $userData->height == '122' ? 'selected' : '' }} value="122">4'
                                                1'' (122cm)</option>
                                            <option {{ $userData->height == '125' ? 'selected' : '' }} value="125">4'
                                                2'' (125cm)</option>
                                            <option {{ $userData->height == '127' ? 'selected' : '' }} value="127">4'
                                                3'' (127cm)</option>
                                            <option {{ $userData->height == '130' ? 'selected' : '' }} value="130">4'
                                                4'' (130cm)</option>
                                            <option {{ $userData->height == '132' ? 'selected' : '' }} value="132">4'
                                                5'' (132cm)</option>
                                            <option {{ $userData->height == '135' ? 'selected' : '' }} value="135">4'
                                                6'' (135cm)</option>
                                            <option {{ $userData->height == '137' ? 'selected' : '' }} value="137">4'
                                                7'' (137cm)</option>
                                            <option {{ $userData->height == '140' ? 'selected' : '' }} value="140">4'
                                                8'' (140cm)</option>
                                            <option {{ $userData->height == '142' ? 'selected' : '' }} value="142">4'
                                                9'' (142cm)</option>
                                            <option {{ $userData->height == '145' ? 'selected' : '' }} value="145">4'
                                                10'' (145cm)</option>
                                            <option {{ $userData->height == '147' ? 'selected' : '' }} value="147">4'
                                                11'' (147cm)</option>
                                            <option {{ $userData->height == '150' ? 'selected' : '' }} value="150">5'
                                                0'' (150cm)</option>
                                            <option {{ $userData->height == '152' ? 'selected' : '' }} value="152">5'
                                                1'' (152cm)</option>
                                            <option {{ $userData->height == '155' ? 'selected' : '' }} value="155">5'
                                                2'' (155cm)</option>
                                            <option {{ $userData->height == '157' ? 'selected' : '' }} value="157">5'
                                                3'' (157cm)</option>
                                            <option {{ $userData->height == '160' ? 'selected' : '' }} value="160">5'
                                                4'' (160cm)</option>
                                            <option {{ $userData->height == '163' ? 'selected' : '' }} value="163">5'
                                                5'' (163cm)</option>
                                            <option {{ $userData->height == '165' ? 'selected' : '' }} value="165">5'
                                                6'' (165cm)</option>
                                            <option {{ $userData->height == '168' ? 'selected' : '' }} value="168">5'
                                                7'' (168cm)</option>
                                            <option {{ $userData->height == '170' ? 'selected' : '' }} value="170">5'
                                                8'' (170cm)</option>
                                            <option {{ $userData->height == '173' ? 'selected' : '' }} value="173">5'
                                                9'' (173cm)</option>
                                            <option {{ $userData->height == '175' ? 'selected' : '' }} value="175">5'
                                                10'' (175cm)</option>
                                            <option {{ $userData->height == '178' ? 'selected' : '' }} value="178">5'
                                                11'' (178cm)</option>
                                            <option {{ $userData->height == '180' ? 'selected' : '' }} value="180">6'
                                                0'' (180cm)</option>
                                            <option {{ $userData->height == '183' ? 'selected' : '' }} value="183">6'
                                                1'' (183cm)</option>
                                            <option {{ $userData->height == '185' ? 'selected' : '' }} value="185">6'
                                                2'' (185cm)</option>
                                            <option {{ $userData->height == '188' ? 'selected' : '' }} value="188">6'
                                                3'' (188cm)</option>
                                            <option {{ $userData->height == '191' ? 'selected' : '' }} value="191">6'
                                                4'' (191cm)</option>
                                            <option {{ $userData->height == '193' ? 'selected' : '' }} value="193">6'
                                                5'' (193cm)</option>
                                            <option {{ $userData->height == '196' ? 'selected' : '' }} value="196">6'
                                                6'' (196cm)</option>
                                            <option {{ $userData->height == '198' ? 'selected' : '' }} value="198">6'
                                                7'' (198cm)</option>
                                            <option {{ $userData->height == '201' ? 'selected' : '' }} value="201">6'
                                                8'' (201cm)</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="row pt-5">
                                    <div class="col-md-12">
                                        <p for="" class="vraiant_heading">Weight:</p>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="weight" class="form-control" id="weight">
                                            <option value="" selected muted disabled>PLease Select</option>
                                            <option {{ $userData->weight == '90' ? 'selected' : '' }} value="90">90
                                                lbs</option>
                                            <option {{ $userData->weight == '95' ? 'selected' : '' }} value="95">95
                                                lbs</option>
                                            <option {{ $userData->weight == '100' ? 'selected' : '' }} value="100">100
                                                lbs</option>
                                            <option {{ $userData->weight == '105' ? 'selected' : '' }} value="105">105
                                                lbs</option>
                                            <option {{ $userData->weight == '110' ? 'selected' : '' }} value="110">110
                                                lbs</option>
                                            <option {{ $userData->weight == '115' ? 'selected' : '' }} value="115">115
                                                lbs</option>
                                            <option {{ $userData->weight == '120' ? 'selected' : '' }} value="120">120
                                                lbs</option>
                                            <option {{ $userData->weight == '125' ? 'selected' : '' }} value="125">125
                                                lbs</option>
                                            <option {{ $userData->weight == '130' ? 'selected' : '' }} value="130">130
                                                lbs</option>
                                            <option {{ $userData->weight == '135' ? 'selected' : '' }} value="135">135
                                                lbs</option>
                                            <option {{ $userData->weight == '140' ? 'selected' : '' }} value="140">140
                                                lbs</option>
                                            <option {{ $userData->weight == '145' ? 'selected' : '' }} value="145">145
                                                lbs</option>
                                            <option {{ $userData->weight == '150' ? 'selected' : '' }} value="150">150
                                                lbs</option>
                                            <option {{ $userData->weight == '155' ? 'selected' : '' }} value="155">155
                                                lbs</option>
                                            <option {{ $userData->weight == '160' ? 'selected' : '' }} value="160">160
                                                lbs</option>
                                            <option {{ $userData->weight == '165' ? 'selected' : '' }} value="165">165
                                                lbs</option>
                                            <option {{ $userData->weight == '170' ? 'selected' : '' }} value="170">170
                                                lbs</option>
                                            <option {{ $userData->weight == '175' ? 'selected' : '' }} value="175">175
                                                lbs</option>
                                            <option {{ $userData->weight == '180' ? 'selected' : '' }} value="180">180
                                                lbs</option>
                                            <option {{ $userData->weight == '185' ? 'selected' : '' }} value="185">185
                                                lbs</option>
                                            <option {{ $userData->weight == '190' ? 'selected' : '' }} value="190">190
                                                lbs</option>
                                            <option {{ $userData->weight == '195' ? 'selected' : '' }} value="195">195
                                                lbs</option>
                                            <option {{ $userData->weight == '200' ? 'selected' : '' }} value="200">200
                                                lbs</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-5">
                            <div class="col-md-12">
                                <p for="" class="vraiant_heading">Body type:</p>
                                <div class="variation_radio_btns">

                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->body_type == 'Petite' ? 'checked' : '' }} name="body_type"
                                                id="petite" value="Petite">
                                            <label class="form-check-label" for="petite">Petite</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->body_type == 'Slim' ? 'checked' : '' }} name="body_type"
                                                id="slim" value="Slim">
                                            <label class="form-check-label" for="slim">Slim</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->body_type == 'Athletic' ? 'checked' : '' }} name="body_type"
                                                id="athletic" value="Athletic">
                                            <label class="form-check-label" for="athletic">Athletic</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->body_type == 'Average' ? 'checked' : '' }} name="body_type"
                                                id="other" value="Average">
                                            <label class="form-check-label" for="other">Average</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->body_type == 'Few Extra Pounds' ? 'checked' : '' }}
                                                name="body_type" id="few_extra_pounds" value="Few Extra Pounds">
                                            <label class="form-check-label" for="few_extra_pounds">Few Extra
                                                Pounds</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->body_type == 'Full Figured' ? 'checked' : '' }}
                                                name="body_type" id="full_figured" value="Full Figured">
                                            <label class="form-check-label" for="full_figured">Full Figured</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->body_type == 'Large and Lovely' ? 'checked' : '' }}
                                                name="body_type" id="large_and_lovely" value="Large and Lovely">
                                            <label class="form-check-label" for="large_and_lovely">Large and
                                                Lovely</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-12">
                                <p for="" class="vraiant_heading">Your ethnicity is mostly::</p>
                                <div class="variation_radio_btns">

                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->ethnicity == 'Arab (Middle Eastern)' ? 'checked' : '' }}
                                                name="ethnicity" id="ethnicity_arab" value="Arab (Middle Eastern)">
                                            <label class="form-check-label" for="ethnicity_arab">Arab (Middle
                                                Eastern)</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->ethnicity == 'Asian' ? 'checked' : '' }} name="ethnicity"
                                                id="ethnicity_asian" value="Asian">
                                            <label class="form-check-label" for="ethnicity_asian">Asian</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->ethnicity == 'Black' ? 'checked' : '' }} name="ethnicity"
                                                id="ethnicity_black" value="Black">
                                            <label class="form-check-label" for="ethnicity_black">Black</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->ethnicity == 'Caucasian (White)' ? 'checked' : '' }}
                                                name="ethnicity" id="ethnicity_white" value="Caucasian (White)">
                                            <label class="form-check-label" for="ethnicity_white">Caucasian
                                                (White)</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->ethnicity == 'Hispanic / Latino' ? 'checked' : '' }}
                                                name="ethnicity" id="ethnicity_latino" value="Hispanic / Latino">
                                            <label class="form-check-label" for="ethnicity_latino">Hispanic /
                                                Latino</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->ethnicity == 'Indian' ? 'checked' : '' }} name="ethnicity"
                                                id="ethnicity_indian" value="Indian">
                                            <label class="form-check-label" for="ethnicity_indian">Indian</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->ethnicity == 'Mixed' ? 'checked' : '' }} name="ethnicity"
                                                id="ethnicity_mixed" value="Mixed">
                                            <label class="form-check-label" for="ethnicity_mixed">Mixed</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->ethnicity == 'Pacific Islander' ? 'checked' : '' }}
                                                name="ethnicity" id="ethnicity_islander" value="Pacific Islander">
                                            <label class="form-check-label" for="ethnicity_islander">Pacific
                                                Islander</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->ethnicity == 'Others' ? 'checked' : '' }} name="ethnicity"
                                                id="other-03" value="Others">
                                            <label class="form-check-label" for="other-03">Others</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->ethnicity == 'Prefer not to say' ? 'checked' : '' }}
                                                name="ethnicity" id="prefer_not_to_say_02" value="Prefer not to say">
                                            <label class="form-check-label" for="prefer_not_to_say_02">Prefer not
                                                to say</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form_heading">
                                    <h2>Your Lifestyle</h2>
                                </div>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12">
                                <p for="" class="vraiant_heading">Do you drink?:</p>
                                <div class="variation_radio_btns">

                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->drink == 'Do drink' ? 'checked' : '' }} name="drink"
                                                id="do_drink" value="Do drink">
                                            <label class="form-check-label" for="do_drink">Do drink</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->drink == 'Occasionally drink' ? 'checked' : '' }}
                                                name="drink" id="occasionally_drink" value="Occasionally drink">
                                            <label class="form-check-label" for="occasionally_drink">Occasionally
                                                drink</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->drink == 'Do not drink' ? 'checked' : '' }} name="drink"
                                                id="dont_drink" value="Do not drink">
                                            <label class="form-check-label" for="dont_drink">Don't drink</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->drink == 'Prefer not to say' ? 'checked' : '' }}
                                                name="drink" id="prefer_not_to_say_03" value="Prefer not to say">
                                            <label class="form-check-label" selected for="prefer_not_to_say_03">Prefer not
                                                to say</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12">
                                <p for="" class="vraiant_heading">Marital Status:</p>
                                <div class="variation_radio_btns">

                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->marital_status == 'Single' ? 'checked' : '' }}
                                                name="marital_status" id="status_single" value="Single">
                                            <label class="form-check-label" for="status_single">Single</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->marital_status == 'Separated' ? 'checked' : '' }}
                                                name="marital_status" id="status_separated" value="Separated">
                                            <label class="form-check-label" for="status_separated">Separated</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->marital_status == 'Widowed' ? 'checked' : '' }}
                                                name="marital_status" id="status_widowed" value="Widowed">
                                            <label class="form-check-label" for="status_widowed">Widowed</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->marital_status == 'Divorced' ? 'checked' : '' }} selected
                                                name="marital_status" id="status_divorced" value="Divorced">
                                            <label class="form-check-label" selected
                                                for="status_divorced">Divorced</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->marital_status == 'Other' ? 'checked' : '' }} selected
                                                name="marital_status" id="other-04" value="Other">
                                            <label class="form-check-label" selected for="other-04">Other</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->drink == 'Prefer not to say' ? 'checked' : '' }} selected
                                                name="marital_status" id="prefer_not_to_say_04"
                                                value="Prefer not to say">
                                            <label class="form-check-label" selected for="prefer_not_to_say_04">Prefer not
                                                to say</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12">
                                <p for="" class="vraiant_heading">Eating Habits:</p>
                                <div class="variation_radio_btns">

                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->eating_habits == 'Halal foods always' ? 'checked' : '' }}
                                                name="habits" id="halal_foods_01" value="Halal foods always">
                                            <label class="form-check-label" for="halal_foods_01">Halal foods
                                                always</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->eating_habits == 'Halal foods when I can' ? 'checked' : '' }}
                                                name="habits" id="halal_foods_02" value="Halal foods when I can">
                                            <label class="form-check-label" for="halal_foods_02">Halal foods when I
                                                can</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->eating_habits == 'No special restrictions' ? 'checked' : '' }}
                                                name="habits" id="halal_foods_03" value="No special restrictions">
                                            <label class="form-check-label" for="halal_foods_03">No special
                                                restrictions</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12">
                                <p for="" class="vraiant_heading">Do you smoke?</p>
                                <div class="variation_radio_btns">

                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->smoke == 'Do smoke' ? 'checked' : '' }} name="smoke"
                                                id="smoke-01" value="Do smoke">
                                            <label class="form-check-label" for="smoke-01">Do smoke</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->smoke == 'Occasionally Smoke' ? 'checked' : '' }}
                                                name="smoke" id="smoke-02" value="Occasionally Smoke">
                                            <label class="form-check-label" for="smoke-02">Occasionally Smoke</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->smoke == 'Do not Smoke' ? 'checked' : '' }} name="smoke"
                                                id="smoke-03" value="Do not Smoke">
                                            <label class="form-check-label" for="smoke-03">Don't Smoke</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->smoke == 'Prefer not to say' ? 'checked' : '' }}
                                                name="smoke" id="smoke-04" value="Prefer not to say">
                                            <label class="form-check-label" selected for="smoke-04">Prefer not to
                                                say</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="row pt-5">
                            <div class="col-md-12">
                                <p for="" class="vraiant_heading">Do you have children?</p>
                            </div>
                            <div class="col-md-3">
                                <select name="" class="form-control" id="">
                                    <option value="" selected muted disabled>PLease Select</option>
                                    <option value="">No</option>
                                    <option value="">Yes </option>
                                </select>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12">
                                <p for="" class="vraiant_heading">Number of children:</p>
                            </div>
                            <div class="col-md-3">
                                <select name="" class="form-control" id="">
                                    <option value="" selected muted disabled>PLease Select</option>
                                    <option value="">No</option>
                                    <option value="">Yes </option>
                                </select>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12">
                                <p for="" class="vraiant_heading">Oldest child:</p>
                            </div>
                            <div class="col-md-3">
                                <select name="" class="form-control" id="">
                                    <option value="" selected muted disabled>PLease Select</option>
                                    <option value="">No</option>
                                    <option value="">Yes </option>
                                </select>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-12">
                                <p for="" class="vraiant_heading">Youngest child:</p>
                            </div>
                            <div class="col-md-3">
                                <select name="" class="form-control" id="">
                                    <option value="" selected muted disabled>PLease Select</option>
                                    <option value="">No</option>
                                    <option value="">Yes </option>
                                </select>
                            </div>
                        </div> --}}


                        {{-- <div class="row pt-3">
                            <div class="col-md-12">
                                <p for="" class="vraiant_heading">Do you want (more) children?</p>
                                <div class="variation_radio_btns">

                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                id="more-children-01" value="option1">
                                            <label class="form-check-label" for="more-children-01">Yes</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                id="more-children-02" value="option1">
                                            <label class="form-check-label" for="more-children-02">not Sure</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                id="more-children-03" value="option1">
                                            <label class="form-check-label" for="more-children-03">No</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div> --}}
                        <div class="row pt-3">
                            <div class="col-md-12">
                                <p for="" class="vraiant_heading">Occupation:</p>
                                <div class="variation_radio_btns">

                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->Occupation == 'Administrative / Secretarial / Clerical' ? 'checked' : '' }}
                                                name="occupation" id="occupation-01"
                                                value="Administrative / Secretarial / Clerical">
                                            <label class="form-check-label" for="occupation-01">Administrative /
                                                Secretarial / Clerical</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->Occupation == 'Advertising / Media' ? 'checked' : '' }}
                                                name="occupation" id="occupation-02" value="Advertising / Media">
                                            <label class="form-check-label" for="occupation-02">Advertising /
                                                Media</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->Occupation == 'Artistic / Creative / Performance' ? 'checked' : '' }}
                                                name="occupation" id="occupation-03"
                                                value="Artistic / Creative / Performance">
                                            <label class="form-check-label" for="occupation-03">Artistic / Creative /
                                                Performance</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->Occupation == 'Construction / Trades' ? 'checked' : '' }}
                                                name="occupation" id="occupation-04" value="Construction / Trades">
                                            <label class="form-check-label" for="occupation-04">Construction /
                                                Trades</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->Occupation == 'Domestic Helper' ? 'checked' : '' }}
                                                name="occupation" id="occupation-05" value="Domestic Helper">
                                            <label class="form-check-label" for="occupation-05">Domestic Helper</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->Occupation == 'Education / Academic' ? 'checked' : '' }}
                                                name="occupation" id="occupation-06" value="Education / Academic">
                                            <label class="form-check-label" for="occupation-06">Education /
                                                Academic</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->Occupation == 'Entertainment / Media' ? 'checked' : '' }}
                                                name="occupation" id="occupation-07" value="Entertainment / Media">
                                            <label class="form-check-label" for="occupation-07">Entertainment /
                                                Media</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->Occupation == 'Executive / Management / HR' ? 'checked' : '' }}
                                                name="occupation" id="occupation-08" value="Executive / Management / HR">
                                            <label class="form-check-label" for="occupation-08">Executive / Management /
                                                HR</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->Occupation == 'Farming / Agriculture' ? 'checked' : '' }}
                                                name="occupation" id="occupation-09" value="Farming / Agriculture">
                                            <label class="form-check-label" for="occupation-09">Farming /
                                                Agriculture</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->Occupation == 'Finance / Banking / Real Estate' ? 'checked' : '' }}
                                                name="occupation" id="occupation-10"
                                                value="Finance / Banking / Real Estate">
                                            <label class="form-check-label" for="occupation-10">Finance / Banking / Real
                                                Estate</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->Occupation == 'Fire / law enforcement / security' ? 'checked' : '' }}
                                                name="occupation" id="occupation-11"
                                                value="Fire / law enforcement / security">
                                            <label class="form-check-label" for="occupation-11">Fire / law enforcement /
                                                security</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->Occupation == 'Hair Dresser / Personal Grooming' ? 'checked' : '' }}
                                                name="occupation" id="occupation-12"
                                                value="Hair Dresser / Personal Grooming">
                                            <label class="form-check-label" for="occupation-12">Hair Dresser / Personal
                                                Grooming</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->Occupation == 'IT / Communications' ? 'checked' : '' }}
                                                name="occupation" id="occupation-13" value="IT / Communications">
                                            <label class="form-check-label" for="occupation-13">IT /
                                                Communications</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->Occupation == 'Laborer / Manufacturing' ? 'checked' : '' }}
                                                name="occupation" id="occupation-14" value="Laborer / Manufacturing">
                                            <label class="form-check-label" for="occupation-14">Laborer /
                                                Manufacturing</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->Occupation == 'Legal' ? 'checked' : '' }} name="occupation"
                                                id="occupation-15" value="Legal">
                                            <label class="form-check-label" for="occupation-15">Legal</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->Occupation == 'Medical / Dental / Veterinary' ? 'checked' : '' }}
                                                name="occupation" id="occupation-16"
                                                value="Medical / Dental / Veterinary">
                                            <label class="form-check-label" for="occupation-16">Medical / Dental /
                                                Veterinary</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->Occupation == 'Military' ? 'checked' : '' }}
                                                name="occupation" id="occupation-17" value="Military">
                                            <label class="form-check-label" for="occupation-17">Military</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->Occupation == 'Nanny / Child care' ? 'checked' : '' }}
                                                name="occupation" id="occupation-18" value="Nanny / Child care">
                                            <label class="form-check-label" for="occupation-18">Nanny / Child care</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->Occupation == 'No occupation / Stay at home' ? 'checked' : '' }}
                                                name="occupation" id="occupation-19"
                                                value="No occupation / Stay at home">
                                            <label class="form-check-label" for="occupation-19">No occupation / Stay at
                                                home</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->Occupation == 'Non-profit / clergy / social services' ? 'checked' : '' }}
                                                name="occupation" id="occupation-20"
                                                value="Non-profit / clergy / social services">
                                            <label class="form-check-label" for="occupation-20">Non-profit / clergy /
                                                social services</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->Occupation == 'Political / Govt / Civil Service' ? 'checked' : '' }}
                                                name="occupation" id="occupation-21"
                                                value="Political / Govt / Civil Service">
                                            <label class="form-check-label" for="occupation-21">Political / Govt / Civil
                                                Service</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->Occupation == 'Retail / Food services' ? 'checked' : '' }}
                                                name="occupation" id="occupation-22" value="Retail / Food services">
                                            <label class="form-check-label" for="occupation-22">Retail / Food
                                                services</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->Occupation == 'Retired' ? 'checked' : '' }}
                                                name="occupation" id="occupation-23" value="Retired">
                                            <label class="form-check-label" for="occupation-23">Retired</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->Occupation == 'Sales / Marketing' ? 'checked' : '' }}
                                                name="occupation" id="occupation-24" value="Sales / Marketing">
                                            <label class="form-check-label" for="occupation-24">Sales / Marketing</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->Occupation == 'Self Employed' ? 'checked' : '' }}
                                                name="occupation" id="occupation-25" value="Self Employed">
                                            <label class="form-check-label" for="occupation-25">Self Employed</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->Occupation == 'Sports / recreation' ? 'checked' : '' }}
                                                name="occupation" id="occupation-26" value="Sports / recreation">
                                            <label class="form-check-label" for="occupation-26">Sports /
                                                recreation</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->Occupation == 'Student' ? 'checked' : '' }}
                                                name="occupation" id="occupation-27" value="Student">
                                            <label class="form-check-label" for="occupation-27">Student</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->Occupation == 'Technical / Science / Engineering' ? 'checked' : '' }}
                                                name="occupation" id="occupation-28"
                                                value="Technical / Science / Engineering">
                                            <label class="form-check-label" for="occupation-28">Technical / Science /
                                                Engineering</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->Occupation == 'Transportation' ? 'checked' : '' }}
                                                name="occupation" id="occupation-29" value="Transportation">
                                            <label class="form-check-label" for="occupation-29">Transportation</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->Occupation == 'Travel / Hospitality' ? 'checked' : '' }}
                                                name="occupation" id="occupation-30" value="Travel / Hospitality">
                                            <label class="form-check-label" for="occupation-30">Travel /
                                                Hospitality</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->Occupation == 'Unemployed' ? 'checked' : '' }}
                                                name="occupation" id="occupation-31" value="Unemployed">
                                            <label class="form-check-label" for="occupation-31">Unemployed</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->Occupation == 'Other' ? 'checked' : '' }} name="occupation"
                                                id="occupation-32" value="Other">
                                            <label class="form-check-label" for="occupation-32">Other</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12">
                                <p for="" class="vraiant_heading">Employment status:</p>
                                <div class="variation_radio_btns">

                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->employment_status == 'Student' ? 'checked' : '' }}
                                                name="employment_status" id="employment-01" value="Student">
                                            <label class="form-check-label" for="employment-01">Student</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->employment_status == 'Part Time' ? 'checked' : '' }}
                                                name="employment_status" id="employment-02" value="Part Time">
                                            <label class="form-check-label" for="employment-02">Part Time</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->employment_status == 'Full Time' ? 'checked' : '' }}
                                                name="employment_status" id="employment-03" value="Full Time">
                                            <label class="form-check-label" for="employment-03">Full Time</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->employment_status == 'Homemaker' ? 'checked' : '' }}
                                                name="employment_status" id="employment-04" value="Homemaker">
                                            <label class="form-check-label" for="employment-04">Homemaker</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->employment_status == 'Retired' ? 'checked' : '' }}
                                                name="employment_status" id="employment-05" value="Retired">
                                            <label class="form-check-label" for="employment-05">Retired</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->employment_status == 'Not Employed' ? 'checked' : '' }}
                                                name="employment_status" id="employment-06" value="Not Employed">
                                            <label class="form-check-label" for="employment-06">Not Employed</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->employment_status == 'Other' ? 'checked' : '' }}
                                                name="employment_status" id="employment-07" value="Other">
                                            <label class="form-check-label" for="employment-07">Other</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->employment_status == 'Prefer not to say' ? 'checked' : '' }}
                                                name="employment_status" id="employment-08" value="Prefer not to say">
                                            <label class="form-check-label" for="employment-08">Prefer not to
                                                say</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12">
                                <p for="" class="vraiant_heading">Annual Income:</p>
                                <input type="text" class="form-control" name="annual_income"
                                    value="{{ $userData->annual_income }}" placeholder="Enter Annual Income">
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12">
                                <p for="" class="vraiant_heading">Living situation:</p>
                                <div class="variation_radio_btns">

                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->living_situation == 'Live Alone' ? 'checked' : '' }}
                                                name="situation" id="situation-01" value="Live Alone">
                                            <label class="form-check-label" for="situation-01">Live Alone</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->living_situation == 'Live with friends' ? 'checked' : '' }}
                                                name="situation" id="situation-02" value="Live with friends">
                                            <label class="form-check-label" for="situation-02">Live with friends</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->living_situation == 'Live with family' ? 'checked' : '' }}
                                                name="situation" id="situation-03" value="Live with family">
                                            <label class="form-check-label" for="situation-03">Live with family</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->living_situation == 'Live with kids' ? 'checked' : '' }}
                                                name="situation" id="situation-04" value="Live with kids">
                                            <label class="form-check-label" for="situation-04">Live with kids</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            {{ $userData->living_situation == 'Live with spouse' ? 'checked' : '' }}
                                            name="situation" id="situation-05" value="Live with spouse">
                                        <label class="form-check-label" for="situation-05">Live with spouse</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            {{ $userData->living_situation == 'Other' ? 'checked' : '' }}
                                            name="situation" id="situation-06" value="Other">
                                        <label class="form-check-label" for="situation-06">Other</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            {{ $userData->living_situation == 'Prefer not to say' ? 'checked' : '' }}
                                            name="situation" id="situation-07" value="Prefer not to say">
                                        <label class="form-check-label" for="situation-07">Prefer not to say</label>
                                    </div>

                                </div>
                            </div>
                        </div>



                        <div class="row pt-3">
                            <div class="col-md-12">
                                <p for="" class="vraiant_heading">Willing to relocate:</p>
                                <div class="variation_radio_btns">

                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->willing_to_relocate == 'Willing to relocate within my country' ? 'checked' : '' }}
                                                name="relocate" id="relocate-01"
                                                value="Willing to relocate within my country">
                                            <label class="form-check-label" for="relocate-01">Willing to relocate within
                                                my country</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->willing_to_relocate == 'Willing to relocate to another country' ? 'checked' : '' }}
                                                name="relocate" id="relocate-02"
                                                value="Willing to relocate to another country">
                                            <label class="form-check-label" for="relocate-02">Willing to relocate to
                                                another country</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->willing_to_relocate == 'Not willing to relocate' ? 'checked' : '' }}
                                                name="relocate" id="relocate-03" value="Not willing to relocate">
                                            <label class="form-check-label" for="relocate-03">Not willing to
                                                relocate</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->willing_to_relocate == 'Not sure about relocating' ? 'checked' : '' }}
                                                name="relocate" id="relocate-04" value="Not sure about relocating">
                                            <label class="form-check-label" for="relocate-04">Not sure about
                                                relocating</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-12">
                                <p for="" class="vraiant_heading">Relationship you're looking for:</p>
                                <div class="variation_radio_btns">

                                    <div class="form-check">
                                        <input type="checkbox"
                                            {{ $userData->relationship_looking_for == 'Marriage' ? 'checked' : '' }}
                                            name="relationship" value="Marriage" class="form-check-input"
                                            id="marriage">
                                        <label class="form-check-label" for="exampleCheck1">Marriage</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox"
                                            {{ $userData->relationship_looking_for == 'Friendship' ? 'checked' : '' }}
                                            name="relationship" value="Friendship" class="form-check-input"
                                            id="friendship">
                                        <label class="form-check-label" for="exampleCheck1">Friendship</label>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form_heading">
                                    <h2>Your Background / Cultural Values</h2>
                                </div>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12">
                                <p for="" class="vraiant_heading">Nationality:</p>
                            </div>
                            <div class="col-md-3">
                                <select name="nationality" class="form-control" id="">
                                    <option value="">PLease Select</option>
                                    @foreach ($country as $item)
                                        <option {{ $item->id == $userData->nationality ? 'selected' : '' }}
                                            value="{{ $item->id }}">{{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12">
                                <p for="" class="vraiant_heading">Education:</p>
                                <div class="variation_radio_btns">

                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input"
                                                {{ $userData->education == 'Primary (Elementary) School' ? 'checked' : '' }}
                                                type="radio" name="education" id="education-01"
                                                value="Primary (Elementary) School">
                                            <label class="form-check-label" for="education-01">Primary (Elementary)
                                                School</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->education == 'Middle School / Junior High' ? 'checked' : '' }}
                                                name="education" id="education-02"
                                                value="Middle School / Junior High">
                                            <label class="form-check-label" for="education-02">Middle School / Junior
                                                High</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->education == 'High School' ? 'checked' : '' }}
                                                name="education" id="education-03" value="High School">
                                            <label class="form-check-label" for="education-03">High School</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->education == 'Vocational College' ? 'checked' : '' }}
                                                name="education" id="education-04" value="Vocational College">
                                            <label class="form-check-label" for="education-04">Vocational
                                                College</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->education == 'Bachelors Degree' ? 'checked' : '' }}
                                                name="education" id="education-05" value="Bachelors Degree">
                                            <label class="form-check-label" for="education-05">Bachelors Degree</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->education == 'Masters Degree' ? 'checked' : '' }}
                                                name="education" id="education-06" value="Masters Degree">
                                            <label class="form-check-label" for="education-06">Masters Degree</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->education == 'PhD or Doctorate' ? 'checked' : '' }}
                                                name="education" id="education-07" value="PhD or Doctorate">
                                            <label class="form-check-label" for="education-07">PhD or Doctorate</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12">
                                <p for="" class="vraiant_heading">Languages spoken:</p>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="language"
                                    value="{{ $userData->languages_spoken }}" placeholder="Enter Annual Income">
                            </div>

                        </div>
                        <div class="row pt-3">
                            <div class="col-md-12">
                                <p for="" class="vraiant_heading">Religion:</p>
                            </div>
                            <div class="col-md-3">
                                <select name="religion" class="form-control" id="">
                                    <option value="">PLease Select</option>
                                    <option {{ $userData->religion == 'Islam' ? 'selected' : '' }} value="Islam">Islam
                                    </option>
                                    <option {{ $userData->religion == 'Christianity' ? 'selected' : '' }}
                                        value="Christianity">Christianity</option>
                                    <option {{ $userData->religion == 'Hinduism' ? 'selected' : '' }} value="Hinduism">
                                        Hinduism</option>
                                    <option {{ $userData->religion == 'Buddhism' ? 'selected' : '' }} value="Buddhism">
                                        Buddhism</option>
                                    <option {{ $userData->religion == 'Judaism' ? 'selected' : '' }} value="Judaism">
                                        Judaism</option>
                                </select>
                            </div>

                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12">
                                <p for="" class="vraiant_heading">Born / Reverted:</p>
                                <div class="variation_radio_btns">

                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->born_reverted == 'Born a muslim' ? 'checked' : '' }}
                                                name="born_reverted" id="born-01" value="Born a muslim">
                                            <label class="form-check-label" for="born-01">Born a muslim</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->born_reverted == 'Reverted to Islam' ? 'checked' : '' }}
                                                name="born_reverted" id="born-02" value="Reverted to Islam">
                                            <label class="form-check-label" for="born-02">Reverted to Islam</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->born_reverted == 'Plan to revert to Islam' ? 'checked' : '' }}
                                                name="born_reverted" id="born-03" value="Plan to revert to Islam">
                                            <label class="form-check-label" for="born-03">Plan to revert to
                                                Islam</label>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-12">
                                <p for="" class="vraiant_heading">Religious values:</p>
                                <div class="variation_radio_btns">

                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->religious_values == 'Very Religious' ? 'checked' : '' }}
                                                name="religious_value" id="religious-01" value="Very Religious">
                                            <label class="form-check-label" for="religious-01">Very Religious</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->religious_values == 'Religious' ? 'checked' : '' }}
                                                name="religious_value" id="religious-02" value="Religious">
                                            <label class="form-check-label" for="religious-02">Religious</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->religious_values == 'Not Religious' ? 'checked' : '' }}
                                                name="religious_value" id="religious-03" value="Not Religious">
                                            <label class="form-check-label" for="religious-03">Not Religious</label>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-12">
                                <p for="" class="vraiant_heading">Attend religious services:</p>
                                <div class="variation_radio_btns">

                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->attend_religious_services == 'Daily' ? 'checked' : '' }}
                                                name="attend_religious_service" id="religious-services-01"
                                                value="Daily">
                                            <label class="form-check-label" for="religious-services-01">Daily</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->attend_religious_services == 'Only on Jummah / Fridays' ? 'checked' : '' }}
                                                name="attend_religious_service" id="religious-services-02"
                                                value="Only on Jummah / Fridays">
                                            <label class="form-check-label" for="religious-services-02">Only on Jummah /
                                                Fridays</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->attend_religious_services == 'Sometimes' ? 'checked' : '' }}
                                                name="attend_religious_service" id="religious-services-03"
                                                value="Sometimes">
                                            <label class="form-check-label"
                                                for="religious-services-03">Sometimes</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->attend_religious_services == 'Only During Ramadan' ? 'checked' : '' }}
                                                name="attend_religious_service" id="religious-services-04"
                                                value="Only During Ramadan">
                                            <label class="form-check-label" for="religious-services-04">Only During
                                                Ramadan</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->attend_religious_services == 'Never' ? 'checked' : '' }}
                                                name="attend_religious_service" id="religious-services-05"
                                                value="Never">
                                            <label class="form-check-label" for="religious-services-05">Never</label>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-12">
                                <p for="" class="vraiant_heading">Read Qur'an:</p>
                                <div class="variation_radio_btns">

                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->read_quran == 'Daily' ? 'checked' : '' }}
                                                name="read_quran" id="read-01" value="Daily">
                                            <label class="form-check-label" for="read-01">Daily</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->read_quran == 'Ocassionally' ? 'checked' : '' }}
                                                name="read_quran" id="read-02" value="Ocassionally">
                                            <label class="form-check-label" for="read-02">Ocassionally</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->read_quran == 'Only During Ramadan' ? 'checked' : '' }}
                                                name="read_quran" id="read-03" value="Only During Ramadan">
                                            <label class="form-check-label" for="read-03">Only During Ramadan</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->read_quran == 'Only on Jummah / Fridays' ? 'checked' : '' }}
                                                name="read_quran" id="read-04" value="Only on Jummah / Fridays">
                                            <label class="form-check-label" for="read-04">Only on Jummah /
                                                Fridays</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->read_quran == 'Read translated version' ? 'checked' : '' }}
                                                name="read_quran" id="read-05" value="Read translated version">
                                            <label class="form-check-label" for="read-05">Read translated
                                                version</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->read_quran == 'Never Read' ? 'checked' : '' }}
                                                name="read_quran" id="read-06" value="Never Read">
                                            <label class="form-check-label" for="read-06">Never Read</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->read_quran == 'Prefer not to say' ? 'checked' : '' }}
                                                name="read_quran" id="read-07" value="Prefer not to say">
                                            <label class="form-check-label" for="read-07">Prefer not to say</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-12">
                                <p for="" class="vraiant_heading">Polygamy:</p>
                                <div class="variation_radio_btns">

                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->polygamy == 'Accept polygamy' ? 'checked' : '' }}
                                                name="polygamy" id="polygamy-01" value="Accept polygamy">
                                            <label class="form-check-label" for="polygamy-01">Accept polygamy</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->polygamy == 'Maybe accept polygamy' ? 'checked' : '' }}
                                                name="polygamy" id="polygamy-02" value="Maybe accept polygamy">
                                            <label class="form-check-label" for="polygamy-02">Maybe accept
                                                polygamy</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->polygamy == 'Do not accept polygamy' ? 'checked' : '' }}
                                                name="polygamy" id="polygamy-03" value="Do not accept polygamy">
                                            <label class="form-check-label" for="polygamy-03">Don't accept
                                                polygamy</label>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-12">
                                <p for="" class="vraiant_heading">Family values:</p>
                                <div class="variation_radio_btns">

                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->family_values == 'Conservative' ? 'checked' : '' }}
                                                name="family_value" id="family-values-01" value="Conservative">
                                            <label class="form-check-label" for="family-values-01">Conservative</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->family_values == 'Moderate' ? 'checked' : '' }}
                                                name="family_value" id="family-values-02" value="Moderate">
                                            <label class="form-check-label" for="family-values-02">Moderate</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->family_values == 'Liberal' ? 'checked' : '' }}
                                                name="family_value" id="family-values-03" value="Liberal">
                                            <label class="form-check-label" for="family-values-03">Liberal</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->family_values == 'Prefer not to say' ? 'checked' : '' }}
                                                name="family_value" id="family-values-04" value="Prefer not to say">
                                            <label class="form-check-label" for="family-values-04">Prefer not to
                                                say</label>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-12">
                                <p for="" class="vraiant_heading">Profile creator:</p>
                                <div class="variation_radio_btns">

                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->profile_creator == 'Self' ? 'checked' : '' }}
                                                name="profile_creator" id="creator-01" value="Self">
                                            <label class="form-check-label" for="creator-01">Self</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->profile_creator == 'Parent' ? 'checked' : '' }}
                                                name="profile_creator" id="creator-02" value="Parent">
                                            <label class="form-check-label" for="creator-02">Parent</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->profile_creator == 'Friend' ? 'checked' : '' }}
                                                name="profile_creator" id="creator-03" value="Friend">
                                            <label class="form-check-label" for="creator-03">Friend</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->profile_creator == 'Brother / Sister' ? 'checked' : '' }}
                                                name="profile_creator" id="creator-04" value="Brother / Sister">
                                            <label class="form-check-label" for="creator-04">Brother / Sister</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $userData->profile_creator == 'Relative' ? 'checked' : '' }}
                                                name="profile_creator" id="creator-05" value="Relative">
                                            <label class="form-check-label" for="creator-05">Relative</label>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form_heading">
                                    <h2>In your own words</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-12">
                                <p for="" class="vraiant_heading">Your profile heading:</p>
                                <input value="{{ $userData->Profile_heading }}" type="text"
                                    name="profile_heading" class="form-control"
                                    placeholder="Amet explicabo Repudiandae dolorem minim culpa">
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-12">
                                <p for="" class="vraiant_heading">A little about yourself:</p>
                                <textarea name="about" class="form-control" id="" cols="30" rows="4"
                                    placeholder="Vitae voluptate magn">{{ $userData->about_yourself }}</textarea>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-12">
                                <p for="" class="vraiant_heading">What you're looking for in a partner:</p>
                                <textarea name="looking_for_info" class="form-control" id="" cols="30" rows="4"
                                    placeholder="Vitae voluptate magn">{{ $userData->looking_partner_info }}</textarea>
                            </div>
                        </div>


                        <div class="actionBtn mt-3 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        $(document).ready(function() {

              var country = "{{ $userData->country }}";
              var state = "{{ $userData->state }}";
              var city  = "{{ $userData->city }}";
              
            if (country != null && state != null) {

                $('#state').empty();
                $('#state').append(
                    `<option value='' >Select</option>`
                );

                let data = {
                    '_token': "{{ csrf_token() }}",
                    'country': country,
                    'country_id': country,
                    'country': 'country',
                }
                $.ajax({
                    type: 'post',
                    url: "{{ route('get.states') }}",
                    data: data,
                    dataType: "json",
                    success: function(res) {
                        if (res.status) {
                            res.data.forEach((element) => {
                                $('#state').removeAttr('disabled');
                                $('#state').append(
                                    `<option ${(state == element.id) ? "selected": "" } value='${element.id}' >${element.name}</option>`
                                );
                            })
                        }
                    }
                })

            }

            if (state != null && city != null) {
                $('#city').empty();
                $('#city').append(
                    `<option value='' >Select</option>`
                );

                let data2 = {
                    '_token': "{{ csrf_token() }}",
                    'state': 'state',
                    'state_id': state,
                }
                $.ajax({
                    type: 'post',
                    url: "{{ route('get.states') }}",
                    data: data2,
                    dataType: "json",
                    success: function(res) {
                        if (res.status) {
                            res.data.forEach((element) => {
                                $('#city').removeAttr('disabled');
                                $('#city').append(
                                    `<option ${(city == element.id) ? "selected": "" }  value='${element.id}' >${element.name}</option>`
                                );
                            })
                        }
                    }
                })

            }



            $('#change_date').on('click', function() {

                $('#date_of_birth').removeAttr('muted disabled');
            });
            $('#change_gender').on('click', function() {
                $('#gender').removeAttr('muted disabled');
            })


            $('#country').on('change', function() {
                let country = $(this).val();
                // let objectid = $(this).find('option:selected').attr('id');

                $('#state').empty();
                $('#state').append(
                    `<option value='' >Select</option>`
                );

                let data = {
                    '_token': "{{ csrf_token() }}",
                    'country': country,
                    'country_id': country,
                    'country': 'country',
                }
                $.ajax({
                    type: 'post',
                    url: "{{ route('get.states') }}",
                    data: data,
                    dataType: "json",
                    success: function(res) {
                        if (res.status) {
                            res.data.forEach((element) => {
                                $('#state').removeAttr('disabled');
                                $('#state').append(
                                    `<option value='${element.id}' >${element.name}</option>`
                                );
                            })
                        }
                    }
                })
            })

            $('#state').on('change', function() {
                let state_id = $(this).val();
                // let objectid = $(this).find('option:selected').attr('class');


                $('#city').empty();
                $('#city').append(
                    `<option value='' >Select</option>`
                );

                let data = {
                    '_token': "{{ csrf_token() }}",
                    'state': 'state',
                    'state_id': state_id,
                }
                $.ajax({
                    type: 'post',
                    url: "{{ route('get.states') }}",
                    data: data,
                    dataType: "json",
                    success: function(res) {
                        if (res.status) {
                            res.data.forEach((element) => {
                                $('#city').removeAttr('disabled');
                                $('#city').append(
                                    `<option value='${element.id}' >${element.name}</option>`
                                );
                            })
                        }
                    }
                })
            })

        });
    </script>
@endpush
