@extends('dashboard.layouts.main')
@section('content')
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
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="form_heading text-center my-5">
                        <h2>Member Number Search</h2>
                    </div>
                    <form action="{{ route('dashboard.member.number.search') }}" method="get">
                        <input type="text" {{isset($unique_id) ? 'value='.$unique_id : ''}} name="unique_id" class="form-control">
                        <div class="actionBtn text-center mt-3">
                            <button type="submit">Submit</button>
                        </div>
                    </form>
                </div>
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
