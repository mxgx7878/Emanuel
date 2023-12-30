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
        .address{
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
</style>
<section class="meet_more_women_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="single_womens">
                <div class="images_div">
                <img src="{{asset('dashboard/assets/images/girl_img1.png')}}" class="img-fluid" alt="">
                    <img src="{{asset('dashboard/assets/images/girl_img2.png')}}" class="img-fluid" alt="">
                    <img src="{{asset('dashboard/assets/images/girl_img3.png')}}" class="img-fluid" alt="">
                    <img src="{{asset('dashboard/assets/images/girl_img4.png')}}" class="img-fluid" alt="">
                    <img src="{{asset('dashboard/assets/images/girl_img5.png')}}" class="img-fluid" alt="">
                    <img src="{{asset('dashboard/assets/images/girl_img1.png')}}" class="img-fluid" alt="">
                    <img src="{{asset('dashboard/assets/images/girl_img2.png')}}" class="img-fluid" alt="">
                    <img src="{{asset('dashboard/assets/images/girl_img3.png')}}" class="img-fluid" alt="">
                </div>
                <div class="content">
                    <h1> Meet More Single Women!</h1>
                    <p>Meet over 60 million members across the Cupid Media network</p>
                </div>
                </div>
               
                
            </div>
        </div>
    </div>

</section>
<section class="user_listing_page pt-3">
	<div class="container">
		
		<div class="row">
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
				<div class="w-100 d-flex align-items-center h1 justify-content-center" style="height: 205px">no user avaliable</div>
			@endif

		</div>
		
	</div>

</section>

@endsection
@push('js')
    <script>
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