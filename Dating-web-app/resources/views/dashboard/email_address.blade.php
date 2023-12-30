@extends('dashboard.layouts.main')
@section('content')
<section class="inner_header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <ul class="inner_header_links">
						<li><a  href="{{route('dashboard.user-email-address.view')}}">Email Address</a></li>
						<li><a  href="{{route('dashboard.user-reset-password.view')}}">Password</a></li>
            <li> <a  href="{{ route('dashboard.profile.setting.view') }}">Profile Settings</a></li>
						<li><a  href="{{route('dashboard.billing.view')}}">Billing</a></li>
            <li><a  href="{{route('dashboard.user-notifications.view')}}">Notifications</a></li>
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
              <div class="col-md-12">
              <h1>Email Address</h1>
              <p>Please update your email if it has changed so you do not miss any communications or match alerts.</p>
              </div>
              <!-- <div class="col-md-4 ">
              <div class="actionBtn" >
                <a href="javascript:;">View My Profile</a>
              </div>
              </div> -->
                </div>
			</div>
            <div class="col-md-12 ">
            <div class="form_heading mt-3">
                        <h2>Change Email Address</h2>
                    </div>
                   <form action="{{route('user.change.email')}}" method="post">
                    @csrf
                    <div class="form-group row align-items-center mt-5">
                    <input type="text" class="form-control col-md-6 " name="email" placeholder="victorfred@gmail.com">
                   <div class="actionBtn col-md-3">
                   <button >Save</button>
                   </div>
                    </div>
                   </form>
                   <p>This email has already been verified.</p>
            </div>
		</div>
	</div>
	</section>
@endsection

   