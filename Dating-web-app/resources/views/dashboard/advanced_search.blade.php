@extends('dashboard.layouts.main')
@section('content')
    <style>
        .dot {
            height: 7px;
            width: 7px;
            color: red;
            background-color: red;
            border-radius: 146px;
            position: absolute;
            left: 87px;
            bottom: 35px;
        }

        .address {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
    <section class="inner_header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="inner_header_links">
                        <li><a href="{{ route('dashboard.advanced.search.view') }}">Search</a></li>
                        <li><a href="{{ route('dashboard.serach.first.name.view') }}">First Name</a></li>
                        <li><a href="{{ route('dashboard.search.member.number.view') }}">Member number</a>
                        </li>
                        <li><a href="{{ route('dashboard.search.popular.searches.view') }}">Popular
                                Searches</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="first_name_form_section mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('dashboard.users.advanced.search') }}" method="get">

                        <div class="form_heading">
                            <h2>Search</h2>
                        </div>

                        <div class="form-row pt-3 pb-3">
                            <div class="form-group col-md-3">
                                <label for="inputCity">I'm a</label>
                                <select name="gender" id="" class="form-control">
                                    <option value="">Select</option>
                                    <option {{ isset($gender) && $gender == 1 ? 'Selected' : '' }} value="1">Male
                                    </option>
                                    <option {{ isset($gender) && $gender == 2 ? 'Selected' : '' }} value="2">Female
                                    </option>
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="inputState">Seeking</label>
                                <select name="partner_gender" id="inputState" class="form-control">
                                    <option value="">Select</option>
                                    <option {{ isset($partner_gender) && $partner_gender == 1 ? 'Selected' : '' }}
                                        value="1">Male</option>
                                    <option {{ isset($partner_gender) && $partner_gender == 2 ? 'Selected' : '' }}
                                        value="2">Female</option>
                                </select>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="inputState">Age</label>

                                <select name="age" id="" class="form-control">
                                    <!-- <option value="" selected="" muted="" disabled="">Topic</option> -->
                                    <option value="">Select</option>
                                    @for ($i = 18; $i <= 40; $i++)
                                        <option {{ isset($age) && $age == $i ? 'Selected' : '' }}
                                            value="{{ $i }}">
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="form-row pb-3">
                            <div class="form-group col-md-3">
                                <label for="inputState">Sort results by:</label>
                                <select name="orderby" id="inputState" class="form-control">
                                    <!-- <option selected>select</option> -->
                                    <option value="">Select</option>
                                    <option {{ isset($orderby) && $orderby == 'new_member' ? 'Selected' : '' }}
                                        value="new_member">Newest members</option>
                                    <option {{ isset($orderby) && $orderby == 'photo_first' ? 'Selected' : '' }}
                                        value="photo_first">Photos First</option>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="">Photo</label>
                                <div class="form-check">
                                    <input type="checkbox" {{ isset($photo) ? 'checked' : '' }} name="photo"
                                        value="1" class="form-check-input" style="width:20px;height:22px"
                                        id="exampleCheck1">
                                </div>
                            </div>

                        </div>

                        <div class="form_heading d-flex">
                            <h2>Living in</h2>
                        </div>

                        <div class="form-row pt-3 pb-3">
                            <div class="form-group col-md-3">
                                <label for="inputCity">Country</label>
                                <select name="country" id="country" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($country as $item)
                                        <option {{ isset($usercountry) && $usercountry == $item->id ? 'Selected' : '' }}
                                            value="{{ $item->id }}">{{ $item->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            <div id="getState" class="form-group col-md-3">
                                <label for="">State/Province</label>
                                <select name="state" id="state" class="form-control" disabled>
                                    <option value="">Select</option>
                                </select>
                            </div>
                            <div id="getCity" class="form-group col-md-3">
                                <label for="">City</label>
                                <select name="city" id="city" class="form-control" disabled>
                                    <option value="">Select</option>
                                </select>
                            </div>
                        </div>

                        <div class="actionBtn text-center mt-3">
                            <button>Search</button>
                        </div>
                    </form>
                </div>


            </div>
    </section>
    <section class="user_listing_page pt-3">
        <div class="container">

            <div class="row">
                @if (isset($data))

                    @if (count($data) > 0)
                        @foreach ($data as $user)
                            <div class="col-xl-2 col-md-3 mb-3">
                                <div class="user_card">
                                    <div class="img_div">
                                        <a href="{{ route('dashborad.partner.detail.view', $user['user']['id']) }}"><img
                                                src="{{ $user['userimages']['image'] != null ? asset('dashboard/assets/images/user_images/' . $user['userimages']['image']) : asset('dashboard/assets/images/girl_img1.png') }}"
                                                class="img-fluid" alt=""></a>

                                        {{-- <p class="online_u"></p> --}}
                                    </div>
                                    <div class="user_data">
                                        <h3 class="user_name">{{ $user['user']['name'] }}</h3>

                                        <p class="address"><span>{{ $user['age'] }}
                                            </span>{{ isset($user['cities']) ? $user['cities']['name'] : '-' }},
                                            {{ isset($user['states']) ? $user['states']['name'] : '-' }},
                                            {{ isset($user['countries']) ? $user['countries']['name'] : '-' }}
                                        </p>
                                        <p class="seeking_p_age"><span>Seeking:</span>
                                            {{ $user['gender_id'] == 1 ? 'Female' : 'Male' }} </p>

                                    </div>
                                    <div class="card_bottom">
                                        <div>

                                            <a href="javascript:void(0)" class="favourite"
                                                id="favourite_{{ $user['id'] }}" data-id="{{ $user['user_id'] }}"><i
                                                    class="{{ $user['wish'] == true ? 'fa-heart mr-4 fa-solid' : 'fa-heart mr-4 fa-regular' }}"></i></a>
                                            <a href="{{ route('dashboard.user.message.view', $user['user_id']) }}"><i
                                                    class="fa-solid fa-message"></i></a>

                                            @if ($user['message'] == true)
                                                <div class="dot"></div>
                                            @endif
                                        </div>
                                        <div>
                                            <a href="javascript:;"><i class="fa-solid fa-camera"></i></a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="w-100 d-flex align-items-center h1 justify-content-center" style="height: 205px">no
                            user avaliable</div>
                    @endif
                @endif
            </div>

        </div>

    </section>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            var country = "{{ isset($usercountry) ? $usercountry : '' }}";
            var state = "{{ isset($state) ? $state : '' }}";
            var city = "{{ isset($city) ? $city : ''}}";

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
            $('.favourite').on('click', function() {

                let id = $(this).attr('id');

                if ($("#" + id).find('i').attr('class') == "fa-heart mr-4 fa-regular") {
                    $("#" + id).find('i').removeClass('fa-regular').addClass(
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


                } else if ($("#" + id).find('i').attr('class') == "fa-heart mr-4 fa-solid") {
                    $("#" + id).find('i').addClass('fa-regular').removeClass(
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
