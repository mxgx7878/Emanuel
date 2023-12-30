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
    <section class="user_filter_div">
        <div class="container">
            <div class="row">
                <div class="col-md-12 py-5">
                    <form action="{{ route('dashboard.users.search') }}" method="get">
                        @csrf
                        <div class="row select_optins_tab">
                            <div class="col-xl-2 col-md-4 mb-3">
                                <label for="">I'm a</label>
                                <select name="gender" id="" class="form-control">
                                    <option value="">Select</option>
                                    <option class="form-control" {{ isset($gender) && $gender == 1 ? 'Selected' : '' }}
                                        value="1">Male</option>
                                    <option class="form-control" {{ isset($gender) && $gender == 2 ? 'Selected' : '' }}
                                        value="2">Female</option>
                                </select>
                            </div>
                            <div class="col-xl-2 col-md-4 mb-3">
                                <label for="">Seeking a</label>
                                <select name="partner_gender" id="" class="form-control">
                                    <option value="">Select</option>
                                    <option class="form-control"
                                        {{ isset($partner_gender) && $partner_gender == 1 ? 'Selected' : '' }}
                                        value="1">Male</option>
                                    <option class="form-control"
                                        {{ isset($partner_gender) && $partner_gender == 2 ? 'Selected' : '' }}
                                        value="2">Female</option>
                                </select>
                            </div>
                            <div class="col-xl-2 col-md-4 mb-3">
                                <label for="">From</label>
                                <select name="country" id="" class="form-control">

                                    <option value="">Select</option>
                                    @foreach ($country as $item)
                                        <option {{ isset($usercountry) && $usercountry == $item->id ? 'Selected' : '' }}
                                            value="{{ $item->id }}">{{ $item->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-xl-2 col-md-4 mb-3">
                                <label for="">Age</label>
                                <div class="d-flex">
                                    <select name="age" id="" class="form-control">
                                        <!-- <option value="" selected="" muted="" disabled="">Topic</option> -->
                                        <option value="">Select</option>
                                        @for ($i = 18; $i <= 40; $i++)
                                            <option {{ isset($age) && $age == $i ? 'Selected' : '' }}
                                                value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    <select name="partner_age" id="" class="form-control ml-2">
                                        <!-- <option value="" selected="" muted="" disabled="">Topic</option> -->
                                        <option value="">Select</option>
                                        @for ($i = 18; $i <= 40; $i++)
                                            <option {{ isset($partner_age) && $partner_age == $i ? 'Selected' : '' }}
                                                value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-4 mb-3">
                                <label for="">Photo</label>
                                <div class="form-check">
                                    <input type="checkbox" {{ isset($photo) ? 'checked' : '' }} name="photo"
                                        value="1" class="form-check-input" id="exampleCheck1">
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-4 mb-3 align-self-center">
                                <div class="actionBtn mt-3">
                                    <button type="submit">Submit </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="user_listing_page pt-3">
        <div class="container">
            <div class="row">
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
                <div {{ isset($back) ? 'class=col-md-6' : 'class=col-md-8' }}>
                    {{-- <p>{{ count($data) }} - {{ count($data) }} of {{ count($data) }}</p> --}}
                </div>
                <div class="col-md-4">
                    <form id="form-search" action="{{route('dashboard.users.search')}}" method="get">
                        <div class="row align-items-center mb-3">
                            <label for="" class="col-md-4">Order By:</label>
                          
                                <div class="col-md-8">
                                    <select name="neworderby" id="" class="form-control ml-2 " onchange="formSubmitSearch(this,'form-search')">
                                        <!-- <option value="" selected="" muted="" disabled="">Topic</option> -->
                                        <option value="">Select</option>
                                        <option value="new_member">Newest members</option>
                                        <option value="photo_first">Photos First</option>
                                    </select>
                                </div>
                           
                        </div>
                    </form>
                </div>
                @if (isset($back))
                    <div class="col-md-2">
                        <div>
                            <button class="btn btn-danger" onclick="window.location='{{ route('dashboard') }}'"><i
                                    class="fa-solid fa-chevron-left"></i> Back</button>
                        </div>
                    </div>
                @endif
            </div>
            <div class="row">
                @if (count($data) > 0)
                    @foreach ($paginator as $user)
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
                                        {{ isset($user['countries']) ? $user['countries']['name'] : '-' }}</p>
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
                    <div class="w-100 d-flex align-items-center h1 justify-content-center" style="height: 205px">no user
                        avaliable</div>
                @endif

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="nexPrev pagination">
                        <div class="actionBtn">
                            @if ($paginator->onFirstPage())
                                <!-- Disable the "Previous" button if on the first page -->
                                <button class="d-none" disabled><i class="fa-solid fa-chevron-left"></i> Previous</button>
                            @else
                                <!-- Enable the "Previous" button with a link to the previous page -->
                                <a  href="{{ $paginator->previousPageUrl() }}"><i class="fa-solid fa-chevron-left"></i> Previous</a>
                            @endif
                        </div>
                        
                        <div class="actionBtn">
                            @if ($paginator->hasMorePages())
                                <!-- Enable the "Next" button with a link to the next page -->
                                <a href="{{ $paginator->nextPageUrl() }}">Next <i class="fa-solid fa-chevron-right"></i></a>
                            @else
                                <!-- Disable the "Next" button if on the last page -->
                                <button class="d-none" disabled>Next <i class="fa-solid fa-chevron-right"></i></button>
                            @endif
                        </div>
                        
                        {{-- <!-- Display pagination links -->
                        {{ $paginator->links() }} --}}
                    </div>
                </div>
            </div>
        </div>

    </section>
    <section>
        <div class="container">

        </div>
    </section>

@endsection
@push('js')
    <script>
        function formSubmitSearch (valueoption , formid) { 

            document.getElementById(formid).submit();

         }
        $(document).ready(function() {


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
        });
    </script>
@endpush
