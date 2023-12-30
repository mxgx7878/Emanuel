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
                                <a href="{{route('dashborad.user.details.view')}}">View My Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                    <div class="form_heading">
                                                    <h2>What do you do for fun / entertainment?</h2>
                                                </div>
                                    </div>
                                </div>
                              </div> -->

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <form action="{{route('user.interest.upload')}}" method="post">
                    @csrf
                    <div class="interest_form_main">

                        <div class="form_heading my-3">
                            <h2>What do you do for fun / entertainment?</h2>
                        </div>


                        @php
                            $entertainment = ['Antiques', 'Art / Painting', 'Astrology', 'Ballet', 'Bars / Pubs / Nightclubs', 'Beach / Parks', 'Board / Card Games', 'Camping / Nature', 'Cars / Mechanics', 'Casino / Gambling', 'Collecting', 'Comedy Clubs', 'Computers / Internet', 'Concerts / Live Music', 'Cooking / Food', 'Crafts', 'Dancing', 'Dining Out', 'Dinner Parties', 'Education', 'Family', 'Fashion Events', 'Gardening / Landscaping', 'Home Improvement', 'Investing / Finance', 'Karaoke / Sing-along', 'Library', 'Meditation', 'Motorcycles', 'Movies / Cinema', 'Museums / Galleries', 'Music (Listening)', 'Music (Playing)', 'News / Politics', 'Pets', 'Philosophy / Spirituality', 'Photography', 'Poetry', 'Reading', 'Science and Technology', 'Shopping', 'Social Causes / Activism', 'TV: Educational / News', 'TV: Entertainment', 'Theatre', 'Traveling', 'Video / Online Games', 'Volunteering', 'Watching Sports', 'Writing', 'Other'];
                        @endphp
                        <div class="all_checkboxes_options">
                            @foreach ($entertainment as $key => $interest)
                                <div class="single_checkbox_option">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input {{ isset($data) &&  in_array($interest,$data) ? "checked": "" }} class="form-check-input" type="checkbox" name="interest[]"
                                                value="{{ $interest }}" id="Antiques">
                                            <label class="form-check-label" for="Antiques">
                                                {{ $interest }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="form_heading my-3">
                            <h2>What sort of food do you like?</h2>
                        </div>
                        @php
                            $food = ['American', 'Barbecue', 'Cajun / Southern', 'California-Fusion', 'Caribbean/Cuban', 'Chinese / Dim Sum', 'Continental', 'Deli', 'Eastern European', 'Fast Food / Pizza', 'French', 'German', 'Greek', 'Indian', 'Italian', 'Japanese / Sushi', 'Jewish / Kosher', 'Korean', 'Mediterranean', 'Mexican', 'Middle Eastern', 'Seafood', 'Soul Food', 'South American', 'Southwestern', 'Thai', 'Vegan', 'Vegetarian / Organic', 'Vietnamese', 'Other'];
                        @endphp
                        <div class="all_checkboxes_options">
                            @foreach ($food as $key=> $interest)
                                <div class="single_checkbox_option">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input {{ isset($data) &&  in_array($interest,$data) ? "checked": "" }} class="form-check-input" type="checkbox" name="interest[]"
                                                value="{{ $interest }}" id="Antiques">
                                            <label class="form-check-label" for="Antiques">
                                                {{ $interest }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>



                        <div class="form_heading my-3">
                            <h2>What sort of music are you into?</h2>
                        </div>
                        @php
                            $music = ['Alternative', 'Classical / Opera', 'Country / Folk', 'Dance / Techno', 'Jazz / Blues', 'Metal', 'New Age', 'Pop', "R'n'B / Hip Hop", 'Rap', 'Reggae', 'Religious', 'Rock', 'Soft Rock', 'World', 'Other'];

                        @endphp
                        <div class="all_checkboxes_options">
                            @foreach ($music as $key => $interest)
                                <div class="single_checkbox_option">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input {{ isset($data) &&  in_array($interest,$data) ? "checked": "" }} class="form-check-input" type="checkbox" name="interest[]"
                                                value="{{ $interest }}" id="Antiques">
                                            <label class="form-check-label" for="Antiques">
                                                {{ $interest }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>



                        <div class="form_heading my-3">
                            <h2>What sports do you play or like to watch?</h2>
                        </div>
                        @php
                            $play = [
                                'Aerobics',
                                'American Football',
                                'Archery',
                                'Athletics',
                                'Aussie Rules Football',
                                'Auto Racing',
                                'BMX / Mountain Biking',
                                'Baseball / Softball',
                                'Basketball',
                                'Biking',
                                'Boating / Sailing',
                                'Bodybuilding',
                                'Bowling',
                                'Boxing',
                                'Canoe / Kayak',
                                'Canyoning / Caving',
                                'Cricket',
                                'Cycling',
                                'Darts',
                                'Diving',
                                'Extreme Sports',
                                'Figure Skating',
                                'Fishing',
                                'Golf',
                                'Gym / Weight Training',
                                'Gymnastics',
                                'Hang Gliding / Paragliding',
                                'Hiking',
                                'Hockey',
                                'Horse Riding',
                                'Hunting / Shooting',
                                'Ice Skating / Ice Hockey',
                                'In-line Skating',
                                'Jet / Water Skiing',
                                'Jogging / Running',
                                'Lacrosse',
                                'Martial Arts',
                                'Motor Sports',
                                'Mountain / Rock Climbing',
                                'Netball',
                                'Parachuting / BASE Jumping',
                                'Polo',
                                'Pool / Billiards',
                                'Rowing',
                                'Rugby',
                                'Scuba Diving / Snorkeling',
                                'Skateboarding',
                                'Skiing / Snowboarding',
                                'Snowmobiling',
                                'Soccer',
                                'Squash / Racquetball',
                                'Surfing',
                                'Swimming',
                                'Table Tennis',
                                'Tennis / Badminton',
                                'Volleyball',
                                'Walking',
                                'Windsurfing / Kite Boarding',
                                'Wrestling',
                                'Yoga / Pilates',
                                'Other',
                            ];

                        @endphp
                        <div class="all_checkboxes_options">
                            @foreach ($play as $key=> $interest)
                                <div class="single_checkbox_option">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input {{ isset($data) &&  in_array($interest,$data) ? "checked": "" }} class="form-check-input" type="checkbox" name="interest[]"
                                                value="{{ $interest }}" id="Antiques">
                                            <label class="form-check-label" for="Antiques">
                                                {{ $interest }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                        <div class="actionBtn form_submit_btn">
                            <button type="submit" class="btn btn-info">SUBMIT</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
