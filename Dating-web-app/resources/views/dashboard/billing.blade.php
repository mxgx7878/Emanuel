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
              <h1>Billing - Auto Renew</h1>
              <p>You are currently a FREE Standard member. Click "Upgrade Now" below to learn more about the benefits of becoming a paid member.</p>
              <p class="note">Note: Auto renewal is only switched on after you have made a successful payment to upgrade membership.</p>
              </div>
                </div>
                <div class="actionBtn mt-3">
                   <button >upgrade Now</button>
                   </div>
			</div>
        
         
		</div>
	</div>
	</section>
@endsection

    


