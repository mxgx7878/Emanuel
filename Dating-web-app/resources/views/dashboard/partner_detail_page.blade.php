@extends('dashboard.layouts.main')

@section('content')
    <style>
        .counter_btn {
            font-size: 16px;
            font-weight: 500;
            border: none;
            padding: 3px 8px;
            background: #dc3545;
            color: #fff;
            border-radius: 16px;
            width: 29px;
        }

        .input-qty {
            width: 20px;
            border: none;
            font-size: 18px;
            text-align: center;
        }

        .qty-container {
            display: flex;
            align-items: center;
            gap: 10px;
            border: 1px solid red;
            border-radius: 25px;
            padding: 2px;
            width: 110px;
            justify-content: center;
        }
    </style>

    <section class="partner_detail_page_section mt-3">

        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="row">
                    
                        @if(count($userphotos) == 0)

                        <div class="col-md-5">
                            <div class="main_img_display">
                                <img src="{{ asset('dashboard/assets/images/partner-01.png') }}" id="grote_image">

                            </div>
                            <br>
                            <div class="thumbnail_images">
                                <div class="thumbnail">
                                    <img src="{{ asset('dashboard/assets/images/partner-01.png') }}" alt="">
                                </div>
                                <div class="thumbnail">
                                    <img src="{{ asset('dashboard/assets/images/partner-02.png') }}" alt="">
                                </div>
                                <div class="thumbnail">
                                    <img src="{{ asset('dashboard/assets/images/partner-03.png') }}" alt="">
                                </div>
                                <div class="thumbnail">
                                    <img src="{{ asset('dashboard/assets/images/partner-04.png') }}" alt="">
                                </div>
                            </div>


                        </div>
                        @else
                        <div class="col-md-5">
                            <div class="main_img_display">
                                <img src="{{ asset('dashboard/assets/images/user_images/'.$userData->userimages->image) }}" id="grote_image">

                            </div>
                            <br>
                            <div class="thumbnail_images">
                                @foreach ($userphotos as $photo )    
                                <div class="thumbnail">
                                    <img src="{{ asset('dashboard/assets/images/user_images/'.$photo->image) }}" alt="">
                                </div>
                                @endforeach
                                
                            </div>


                        </div>
                        @endif

                        <div class="col-md-7">

                            @if (auth()->user()->id != $userData->id)
                                <div class="arabic_heart_message">
                                    <!-- <div class="arabic_title">
                                                                                                                                                                                                <p>ثم يعوضك الله بما يليق بقلبك،وما ادراك ما عوض الله</p>
                                                                                                                                                                                            </div> -->

                                    <div class="heart_message_icon">
                                        <span id="favourite" data-id="{{ $userData->user_id }}" class="arabic_heart_icon">
                                            <i
                                                class="{{ $userData->wish == true ? 'fa-heart fa-solid' : 'fa-heart fa-regular' }}"></i>
                                        </span>

                                        <span class="arabic_message_icon">
                                            <i class="fa-solid fa-message"></i>
                                        </span>
                                    </div>
                                </div>
                            @endif


                            <div class="partner_title">
                                <span class="partner_title_name">{{ $userData->user->name }}</span>
                                <span class="partner_title_icon"><i class="fa-solid fa-user"></i></span>
                                <span class="partner_title_icon"><i class="fa-solid fa-circle"></i></span>
                                @if (auth()->user()->id != $userData->user_id)
                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#exampleModal">
                                        Send Gift
                                    </button>
                                @else
                                    @if ($userData->is_boost == 0)
                                        <button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#exampleModal3">
                                            Boost Profile
                                        </button>
                                        <span class="badge badge-danger">not boosted</span>
                                    @elseif ($userData->is_boost == 1)
                                        <span class="badge badge-success">boosted</span>
                                    @endif
                                @endif
                            </div>

                            <div class="partner_details">

                                <div class="partner_details_paragraph">
                                    <p class="partner_details_address">{{ $userData->age }}
                                        •{{ isset($userData->cities) ? $userData->cities->name : 'N/A' }},
                                        {{ isset($userData->states) ? $userData->states->name : 'N/A' }},
                                        {{ isset($userData->countries) ? $userData->countries->name : 'N/A' }}
                                    </p>
                                    <p>{{ $userData->gender_id == 1 ? 'Male' : 'Female' }} /
                                        {{ $userData->marital_status != null ? $userData->marital_status : 'N/A' }}
                                        / ID: {{ $userData->unique_id }}</p>
                                    <p>Seeking Male {{ $userData->age }} - 39 For: Marriage</p>

                                </div>

                                {{-- <div class="partner_details_icons">
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-exclamation"></i></span>
                                    <span><i class="fa-solid fa-ban"></i></span>
                                </div> --}}

                            </div>
                            <div class="container">
                                <div class="row">

                                    @if (count($getGifts) > 0)
                                        @foreach ($getGifts as $key => $gift)
                                            <div class="col-md-12 d-flex">

                                                <div class="col-md-6">
                                                    {{ $key }}
                                                </div>
                                                <div class="col-md-6">
                                                    {{ $gift }}
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                            </div>

                            <div>

                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <!-- <th scope="col">#</th> -->
                                            <th scope="col">Overview</th>
                                            <th scope="col">Last</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <!-- <th scope="row">1</th> -->
                                            <td>Education:</td>
                                            <td>{{ $userData->education != null ? $userData->education : 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <!-- <th scope="row">3</th> -->
                                            <td>Drink:</td>
                                            <td>{{ $userData->drink != null ? $userData->drink : 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <!-- <th scope="row">3</th> -->
                                            <td>Smoke:</td>
                                            <td>{{ $userData->smoke != null ? $userData->smoke : 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <!-- <th scope="row">3</th> -->
                                            <td>Religion:</td>
                                            <td>{{ $userData->religion != null ? $userData->religion : 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <!-- <th scope="row">3</th> -->
                                            <td>Occupation:</td>
                                            <td>{{ $userData->Occupation != null ? $userData->Occupation : 'N/A' }}</td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>

                            <div class="match_nomatch">

                                @if ($userData->match)
                                    
                                <div class="match">
                                    <span><i class="fa-solid fa-circle"></i></span>
                                    <label>Match</label>
                                </div>
                                @else
                                <div class="no_match">
                                    <span><i class="fa-solid fa-circle"></i></span>
                                    <label>No Match</label>
                                </div>

                                @endif

                            </div>

                        </div>
                    </div>

                    <div class="member_overview_para">
                        <h4>Member Overview</h4>
                        <p>{{ $userData->about_yourself != null ? $userData->about_yourself : 'N/A' }}</p>
                    </div>

                    <div class="seeking_para">
                        <h4>Seeking</h4>
                        <p>{{ $userData->looking_partner_info != null ? $userData->looking_partner_info : 'N/A' }}</p>
                    </div>

                    <div class="more_about_me">
                        <h4>More About Me</h4>

                        <div class="match_nomatch">

                            @if ($userData->match)
                                    
                                <div class="match">
                                    <span><i class="fa-solid fa-circle"></i></span>
                                    <label>Match</label>
                                </div>
                                @else
                                <div class="no_match">
                                    <span><i class="fa-solid fa-circle"></i></span>
                                    <label>No Match</label>
                                </div>

                                @endif
                        </div>

                    </div>



                    <div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <!-- <th scope="col">#</th> -->
                                    <th scope="col">Basic</th>
                                    <!-- <th scope="col">She's Looking For</th> -->
                                    <!-- <th scope="col">Handle</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <!-- <th scope="row">Gender:</th> -->
                                    <td>Gender:</td>
                                    <td>{{ $userData->gender_id == 1 ? 'Male' : 'Female' }}</td>
                                    <td>{{ $userData->looking_for_id == 1 ? 'Male' : 'Female' }}</td>
                                </tr>
                                <tr>
                                    <!-- <th scope="row">2</th> -->
                                    <td>Age:</td>
                                    <td>{{ $userData->age }}</td>
                                    <td>{{ $userData->age }} - 39</td>
                                </tr>
                                <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td>Lives in:</td>
                                    <td>{{ isset($userData->cities) ? $userData->cities->name : 'N/A' }},
                                        {{ isset($userData->states) ? $userData->states->name : 'N/A' }},
                                        {{ isset($userData->countries) ? $userData->countries->name : 'N/A' }}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td>Relocate:</td>
                                    <td>{{ $userData->willing_to_relocate != null ? $userData->willing_to_relocate : 'N/A' }}
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                    <div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <!-- <th scope="col">#</th> -->
                                    <th scope="col">Appearance</th>
                                    <!-- <th scope="col">She's Looking For</th> -->
                                    <!-- <th scope="col">Handle</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <!-- <th scope="row">Gender:</th> -->
                                    <td>Hair color:</td>
                                    <td>{{ $userData->hair_color != null ? $userData->hair_color : 'N/A' }}</td>

                                </tr>
                                <tr>
                                    <!-- <th scope="row">2</th> -->
                                    <td>Eye color:</td>
                                    <td>{{ $userData->eye_color != null ? $userData->eye_color : 'N/A' }}</td>
                                    {{-- <td>Any</td> --}}
                                </tr>
                                <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td>Height:</td>
                                    @php
                                        $feet = 0;
                                        $inches = 0;
                                        if ($userData->height != null) {
                                            $heightInInches = $userData->height / 2.54;

                                            // Calculate feet and inches
                                            $feet = floor($heightInInches / 12);
                                            $inches = $heightInInches % 12;
                                        } else {
                                            $userData->height = null;
                                        }
                                    @endphp
                                    <td>
                                        @if ($userData->height != null)
                                            {{ $feet }}'{{ $inches }}" ({{ $userData->height }} cm)
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    {{-- <td>Any</td> --}}
                                </tr>
                                <tr>
                                    @php
                                        $weightInKilograms = $userData->weight * 0.453592;
                                    @endphp
                                    <!-- <th scope="row">3</th> -->
                                    <td>Weight:</td>
                                    <td>
                                        @if ($userData->weight != null)
                                            {{ floor($weightInKilograms) }} kg ({{ $userData->weight }} lb)
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    {{-- <td>Any</td> --}}
                                </tr>
                                <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td>Body style:</td>
                                    <td>{{ $userData->body_type != null ? $userData->body_type : 'N/A' }}</td>
                                    {{-- <td>Any</td> --}}
                                </tr>
                                <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td>Ethnicity:</td>
                                    <td>{{ $userData->ethnicity != null ? $userData->ethnicity : 'N/A' }}</td>
                                    {{-- <td>Any</td> --}}
                                </tr>
                                {{-- <tr> --}}
                                <!-- <th scope="row">3</th> -->
                                {{-- <td>Appearance:</td>
                                    <td>Attractive</td> --}}
                                {{-- <td>Any</td> --}}
                                {{-- </tr> --}}
                            </tbody>
                        </table>

                    </div>

                    <div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <!-- <th scope="col">#</th> -->
                                    <th scope="col">Lifestyle</th>
                                    <!-- <th scope="col">She's Looking For</th> -->
                                    <!-- <th scope="col">Handle</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <!-- <th scope="row">Gender:</th> -->
                                    <td>Drink:</td>
                                    <td>{{ $userData->drink != null ? $userData->drink : 'N/A' }}</td>
                                    {{-- <td>Don't drink</td> --}}
                                </tr>
                                <tr>
                                    <!-- <th scope="row">2</th> -->
                                    <td>Smoke:</td>
                                    <td>{{ $userData->smoke != null ? $userData->smoke : 'N/A' }}</td>
                                    {{-- <td>Don't smoke</td> --}}
                                </tr>
                                <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td>Eating habits:</td>
                                    <td>{{ $userData->eating_habits != null ? $userData->eating_habits : 'N/A' }}</td>
                                    {{-- <td>Any</td> --}}
                                </tr>
                                <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td>Marital Status:</td>
                                    <td>{{ $userData->marital_status != null ? $userData->marital_status : 'N/A' }}</td>
                                    {{-- <td>Single</td> --}}
                                </tr>
                                {{-- <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td>Have children:</td>
                                    <td>No</td>
                                   
                                </tr> --}}
                                {{-- <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td>Number of children:</td>
                                    <td>N/A</td>
                                    <td>Any</td>
                                </tr>
                                <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td>Oldest child:</td>
                                    <td>N/A</td>
                                    <td>Any</td>
                                </tr>
                                <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td>Youngest child:</td>
                                    <td>N/A</td>
                                    <td>Any</td>
                                </tr>
                                <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td>Want (more) children:</td>
                                    <td>Yes</td>
                                    <td>Yes</td>
                                </tr> --}}
                                <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td>Occupation:</td>
                                    <td>{{ $userData->Occupation != null ? $userData->Occupation : 'N/A' }}</td>
                                    {{-- <td>Any</td> --}}
                                </tr>
                                <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td>Employment status:</td>
                                    <td>{{ $userData->employment_status != null ? $userData->employment_status : 'N/A' }}
                                    </td>
                                    {{-- <td>Any</td> --}}
                                </tr>
                                <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td>Annual income:</td>
                                    <td>{{ $userData->annual_income != null ? $userData->annual_income : 'N/A' }}</td>
                                    {{-- <td>Any</td> --}}
                                </tr>
                                <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td>Living situation:</td>
                                    <td>{{ $userData->living_situation != null ? $userData->living_situation : 'N/A' }}
                                    </td>
                                    {{-- <td>Live Alone</td> --}}
                                </tr>
                            </tbody>
                        </table>

                    </div>

                    <div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <!-- <th scope="col">#</th> -->
                                    <th scope="col">Background / Cultural Values</th>
                                    <!-- <th scope="col">She's Looking For</th> -->
                                    <!-- <th scope="col">Handle</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <!-- <th scope="row">Gender:</th> -->
                                    <td>Nationality:</td>
                                    <td>{{ isset($userData->usernationality) ? $userData->usernationality->name : 'N/A' }}
                                    </td>
                                    {{-- <td>Any</td> --}}
                                </tr>
                                <tr>
                                    <!-- <th scope="row">2</th> -->
                                    <td>Education:</td>
                                    <td>{{ $userData->education != null ? $userData->education : 'N/A' }}</td>
                                    {{-- <td>Any</td> --}}
                                </tr>
                                <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td>Languages spoken:</td>
                                    <td>{{ $userData->languages_spoken != null ? $userData->languages_spoken : 'N/A' }}
                                    </td>
                                    {{-- <td>Any</td> --}}
                                </tr>
                                <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td>Religion:</td>
                                    <td>{{ $userData->religion != null ? $userData->religion : 'N/A' }}</td>
                                    {{-- <td>Any</td> --}}
                                </tr>
                                <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td>Born / Reverted:</td>
                                    <td>{{ $userData->born_reverted != null ? $userData->born_reverted : 'N/A' }}</td>
                                    {{-- <td>Any</td> --}}
                                </tr>
                                <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td>Religious values:</td>
                                    <td>{{ $userData->religious_values != null ? $userData->religious_values : 'N/A' }}
                                    </td>
                                    {{-- <td>Very Religious,Religious</td> --}}
                                </tr>
                                <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td>Attend religious services:</td>
                                    <td>{{ $userData->attend_religious_services != null ? $userData->attend_religious_services : 'N/A' }}
                                    </td>
                                    {{-- <td>Any</td> --}}
                                </tr>
                                {{-- <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td>Wear a Niqab:</td>
                                    <td></td>
                                    <td>Any</td>
                                </tr>
                                <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td>Wear a Hijab:</td>
                                    <td>No</td>
                                    <td>Any</td>
                                </tr> --}}
                                <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td>Read Qur'an:</td>
                                    <td>{{ $userData->read_quran != null ? $userData->read_quran : 'N/A' }}</td>
                                    {{-- <td>Any</td> --}}
                                </tr>
                                <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td>Polygamy:</td>
                                    <td>{{ $userData->polygamy != null ? $userData->polygamy : 'N/A' }}</td>
                                    {{-- <td>Don't accept polygamy</td> --}}
                                </tr>
                                <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td>Family values:</td>
                                    <td>{{ $userData->family_values != null ? $userData->family_values : 'N/A' }}</td>
                                    {{-- <td>Any</td> --}}
                                </tr>
                            </tbody>
                        </table>

                    </div>

                    <div class="seeking_para">
                        <h4>Hobbies & Interests</h4>
                        <div class="hobbies_interest">
                            <div>
                                <h6>Entertainment:</h6>
                                @php
                                    $entertainment = ['Antiques', 'Art / Painting', 'Astrology', 'Ballet', 'Bars / Pubs / Nightclubs', 'Beach / Parks', 'Board / Card Games', 'Camping / Nature', 'Cars / Mechanics', 'Casino / Gambling', 'Collecting', 'Comedy Clubs', 'Computers / Internet', 'Concerts / Live Music', 'Cooking / Food', 'Crafts', 'Dancing', 'Dining Out', 'Dinner Parties', 'Education', 'Family', 'Fashion Events', 'Gardening / Landscaping', 'Home Improvement', 'Investing / Finance', 'Karaoke / Sing-along', 'Library', 'Meditation', 'Motorcycles', 'Movies / Cinema', 'Museums / Galleries', 'Music (Listening)', 'Music (Playing)', 'News / Politics', 'Pets', 'Philosophy / Spirituality', 'Photography', 'Poetry', 'Reading', 'Science and Technology', 'Shopping', 'Social Causes / Activism', 'TV: Educational / News', 'TV: Entertainment', 'Theatre', 'Traveling', 'Video / Online Games', 'Volunteering', 'Watching Sports', 'Writing', 'Other'];
                                    $food = ['American', 'Barbecue', 'Cajun / Southern', 'California-Fusion', 'Caribbean/Cuban', 'Chinese / Dim Sum', 'Continental', 'Deli', 'Eastern European', 'Fast Food / Pizza', 'French', 'German', 'Greek', 'Indian', 'Italian', 'Japanese / Sushi', 'Jewish / Kosher', 'Korean', 'Mediterranean', 'Mexican', 'Middle Eastern', 'Seafood', 'Soul Food', 'South American', 'Southwestern', 'Thai', 'Vegan', 'Vegetarian / Organic', 'Vietnamese', 'Other'];

                                    $filteredInterests = null;
                                    $filteredFood = null;

                                    $values = json_decode($userData->interests);
                                    if ($values != null) {
                                        $filteredInterests = array_filter($entertainment, function ($entertainment) use ($values) {
                                            return !in_array($entertainment, $values);
                                        });

                                        $filteredFood = array_filter($food, function ($food) use ($values) {
                                            return !in_array($food, $values);
                                        });
                                    }
                                @endphp
                                <p>
                                    @if ($filteredInterests != null)
                                        @foreach ($filteredInterests as $item)
                                            {{ $item }},
                                        @endforeach
                                    @else
                                        N/A
                                    @endif
                                </p>
                            </div>
                            <div>
                                <h6>Food:</h6>
                                <p>
                                    @if ($filteredFood != null)
                                        @foreach ($filteredFood as $item)
                                            {{ $item }},
                                        @endforeach
                                    @else
                                        N/A
                                    @endif
                                    <!-- <p>Beach / Parks, Camping / Nature, Crafts, Dining Out, Family, Gardening / Landscaping, Karaoke / Sing-along, Music (Listening), Motorcycles, Movies / Cinema, Pets, Shopping, Traveling, TV: Educational / News, TV: Entertainment, Volunteering, Cooking / Food</p> -->
                            </div>
                        </div>

                        <!-- <p>I'm looking for someone who is god fearing , who would be my guide and my light down a dark path , someone who is respectful ,responsible ,caring and trustworthy, who has sense of humour and like traveling , it would be great if he don't smoke nor drink ....thanks for ur time 😊</p> -->
                    </div>

                    <div class="seeking_para">
                        <h4>Safety Tip - Beware of fake webcams</h4>
                        <p>Some scammers from Ghana, Nigeria, Russia or other countries will stream a fake webcam stream
                            when you chat with them on webcam. They do this by using a pre-recorded video that appears as if
                            they are the person on the other end of the webcam. In order to protect yourself from fake web
                            cams ask the person to verify that they are not a recording by standing up, waving, holding up a
                            hand or writing a message on a piece of paper and holding it for you to see. If the person is
                            real they should be able to obey your requests in real time. If the webcam is fake they will be
                            unable to do any of these things in real time.</p>
                    </div>
                    {{-- 
                    <div class="mt-1">
                        <button type="button" class="btn btn-light info_button">For more safety tips click here</button>

                    </div> --}}


                </div>
            </div>
        </div>
        </div>

        <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title" id="exampleModalLabel">Boost Plan Info</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <h2 class="text-center">Plan Detail</h2>
                                    <p class="text-justify">
                                    <p class="text-center">🚀 Boost Your Profile to the Top!</p><br>

                                    <p class="text-center">✨ Stand out from the crowd and get noticed instantly with our
                                        profile boosting
                                        feature! Elevate your presence on the platform and increase visibility to potential
                                        connections.</p><br>

                                    <p class="text-center">👁‍🗨 Be Seen First: Boosting your profile catapults you to the
                                        top of search
                                        results, ensuring that your profile catches the eye of those who matter.</p><br>

                                    <p class="text-center">
                                        🌐 Reach a Wider Audience: Unlock the potential to connect with a broader network.
                                        Boosted profiles receive increased visibility, making networking easier and more
                                        effective.</p><br>
                                    <p class="text-center">⏳ Instant Impact: Don't wait for opportunities, create them!
                                        Boost your profile now
                                        and make a lasting impression on those searching for professionals like you.</p><br>


                                    <p class="text-center"> Ready to shine? Tap into the power of profile boosting and take
                                        your online presence
                                        to new heights! 🚀✨</p><br>
                                    </p>
                                    <p class="text-center font-weight-bold">Boost Profile in 3$ </p>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="boost_profile" data-toggle="modal" data-dismiss="modal"
                            data-target="#exampleModal2" class="btn btn-primary">Confirm</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="conatiner">
                            <div class="row">
                                <div class="from-control col-md-12">

                                    @if (Session::has('success'))
                                        <div class="alert alert-success text-center">
                                            <a href="#" class="close" data-dismiss="alert"
                                                aria-label="close">×</a>
                                            <p>{{ Session::get('success') }}</p>
                                        </div>
                                    @endif

                                    <form id="form_1" role="form" action="{{ route('user.gift.purchase') }}"
                                        method="post" class="require-validation" data-cc-on-file="false"
                                        data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                                        @csrf


                                        <div class='col-md-12 form-group required'>
                                            <label class='control-label'>Name on Card</label> <input class='form-control'
                                                size='4' type='text'>
                                        </div>



                                        <div class='col-md-12 form-group required'>
                                            <label class='control-label'>Card Number</label> <input autocomplete='off'
                                                class='form-control card-number' size='20' type='text'>
                                        </div>


                                        <div
                                            style="display: flex;
                                        justify-content: space-evenly;
                                        align-items: center;
                                        gap: 21px;
                                        white-space: nowrap;
                                        ">

                                            <div class='col-md-3 form-group  required'>
                                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                                                    type='text'>
                                            </div>
                                            <div class='col-md-3 form-group  required'>
                                                <label class='control-label'>Expiration Month</label> <input
                                                    class='form-control card-expiry-month' placeholder='MM'
                                                    size='2' type='text'>
                                            </div>
                                            <div class='col-md-3 form-group  required'>
                                                <label class='control-label'>Expiration Year</label> <input
                                                    class='form-control card-expiry-year' placeholder='YYYY'
                                                    size='4' type='text'>
                                            </div>

                                        </div>
                                        <div class='col-md-12 error form-group d-none'>
                                            <div class='alert-danger alert'>Please correct the errors and try
                                                again.</div>
                                        </div>
                                        <input type="hidden" id="partner_id" value="" name="partner_id">
                                        <input type="hidden" id="cart_data" value="" name="data">

                                        <div class="col-md-12">
                                            <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now
                                            </button>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="conatiner">
                            <div class="row">
                                <div class="from-control col-md-12">

                                    @if (Session::has('success'))
                                        <div class="alert alert-success text-center">
                                            <a href="#" class="close" data-dismiss="alert"
                                                aria-label="close">×</a>
                                            <p>{{ Session::get('success') }}</p>
                                        </div>
                                    @endif

                                    <form role="form" action="{{ route('user.boost.profile') }}" method="post"
                                        class="require-validation" data-cc-on-file="false"
                                        data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                                        @csrf


                                        <div class='col-md-12 form-group required'>
                                            <label class='control-label'>Name on Card</label> <input class='form-control'
                                                size='4' type='text'>
                                        </div>



                                        <div class='col-md-12 form-group required'>
                                            <label class='control-label'>Card Number</label> <input autocomplete='off'
                                                class='form-control card-number' size='20' type='text'>
                                        </div>


                                        <div
                                            style="display: flex;
                                    justify-content: space-evenly;
                                    align-items: center;
                                    gap: 21px;
                                    white-space: nowrap;
                                    ">

                                            <div class='col-md-3 form-group  required'>
                                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                                                    type='text'>
                                            </div>
                                            <div class='col-md-3 form-group  required'>
                                                <label class='control-label'>Expiration Month</label> <input
                                                    class='form-control card-expiry-month' placeholder='MM'
                                                    size='2' type='text'>
                                            </div>
                                            <div class='col-md-3 form-group  required'>
                                                <label class='control-label'>Expiration Year</label> <input
                                                    class='form-control card-expiry-year' placeholder='YYYY'
                                                    size='4' type='text'>
                                            </div>

                                        </div>
                                        <div class='col-md-12 error form-group d-none'>
                                            <div class='alert-danger alert'>Please correct the errors and try
                                                again.</div>
                                        </div>
                                       

                                        <div class="col-md-12">
                                            <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now
                                            </button>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div> --}}



        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                @foreach ($gifts as $gift)
                                    <div class="col-md-12 d-flex ">
                                        <div class="col-md-3 my-2"><img
                                                src="{{ asset('admin/asset/admin/images/giftimages/' . $gift->image) }}"
                                                alt="" height="150" width="100"></div>

                                        <div class="col-md-9 my-2">
                                            <div class="model_content">
                                                <div class="">
                                                    Gift: {{ $gift->title }}
                                                </div>
                                                <div>
                                                    Price: {{ $gift->price }}
                                                </div>

                                                <div class="qty-container">
                                                    <div>
                                                        <button class="counter_btn qty-btn-plus"
                                                            data-id="{{ $gift->id }}">+</button>
                                                    </div>
                                                    <div>

                                                        <input class="input-qty" type="text" value="0"
                                                            id="data-{{ $gift->id }}">
                                                    </div>
                                                    <div>
                                                        <button class="counter_btn qty-btn-minus"
                                                            data-id="{{ $gift->id }}">-</button>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="btn_purchase" data-toggle="modal" data-dismiss="modal"
                            data-target="#exampleModal2" class="btn btn-primary">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script>
        $(function() {

            /*------------------------------------------
            --------------------------------------------
            Stripe Payment Code
            --------------------------------------------
            --------------------------------------------*/

            var $form = $(".require-validation");





            $('form.require-validation').bind('submit', function(
                e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]',
                        'input[type=password]',
                        'input[type=text]',
                        'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(
                        inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass(
                            'has-error');
                        $errorMessage.removeClass(
                            'hide');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data(
                        'stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number')
                            .val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $(
                            '.card-expiry-month'
                        ).val(),
                        exp_year: $(
                                '.card-expiry-year')
                            .val()
                    }, stripeResponseHandler);
                }

            });

            /*------------------------------------------
            --------------------------------------------
            Stripe Response Handler
            --------------------------------------------
            --------------------------------------------*/
            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('d-none')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];

                    $form.find('input[type=text]').empty();
                    $form.append(
                        "<input type='hidden' name='stripeToken' value='" +
                        token + "'/>");
                    $form.get(0).submit();
                }
            }

        });
    </script>

    <script>
        $(document).ready(function() {
            let gifts = @json($gifts);
            let cart_array = {};
            $('#favourite').on('click', function() {

                if ($(this).find('i').attr('class') == "fa-heart fa-regular") {
                    $(this).find('i').removeClass('fa-regular').addClass(
                        'fa-solid');

                    // user.add.remove.favourite
                    let data = {
                        '_token': "{{ csrf_token() }}",
                        'favourite_id': $(this).data('id'),
                    }
                    $.ajax({
                        type: 'post',
                        url: "{{ route('user.add.remove.favourite') }}",
                        data: data,
                        dataType: "json",
                        success: function(res) {
                            if (res.status == true) {

                            }
                        }
                    })


                } else if ($(this).find('i').attr('class') == "fa-heart fa-solid") {
                    $(this).find('i').addClass('fa-regular').removeClass(
                        'fa-solid');
                    let data = {
                        '_token': "{{ csrf_token() }}",
                        'favourite_id': $(this).data('id'),
                    }
                    $.ajax({
                        type: 'post',
                        url: "{{ route('user.add.remove.favourite') }}",
                        data: data,
                        dataType: "json",
                        success: function(res) {
                            if (res.status == true) {

                            }
                        }
                    })
                }
            });
            $(".thumbnail img").click(function() {
                var plaatje = $(this).attr("src");
                $("#grote_image").attr("src", plaatje);

            })

            $('#boost_profile').on('click', function() {
                $('#form_1').attr('action', "{{ route('user.boost.profile') }}");
            })

            $('#btn_purchase').on('click', function() {

                $('#cart_data').val(JSON.stringify(cart_array));
                $('#partner_id').val("{{ $userData->user_id }}");

                console.log(cart_array);

            })

            $(".qty-btn-plus").click(function() {


                var $n = $("#data-" + $(this).data('id'));
                let id = $(this).data('id');

                if ($n.val() <= 9) {
                    $n.val(Number($n.val()) + 1);
                    cart_array[id] = $n.val();

                }

            });

            $(".qty-btn-minus").click(function() {
                var $n = $("#data-" + $(this).data('id'));
                var amount = Number($n.val());
                let id = $(this).data('id');
                console.log(id, amount);
                if (amount > 1) {
                    $n.val(amount - 1);
                    cart_array[id] = $n.val();
                }
            });


        })
    </script>
@endpush
