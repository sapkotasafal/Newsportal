<!DOCTYPE html>
<html lang="en">
  @include('admin.includes.head')

    <body>
		<!-- Main Wrapper -->
        <div class="main-wrapper">

			<!-- Header -->
            <div class="header">

				<!-- Logo -->
                <div class="header-left">
                    <a href="index.html" class="logo">
						<img src="/adminpanel/assets/img/logo.png" width="40" height="40" alt="">
					</a>
                </div>
				<!-- /Logo -->

				<a id="toggle_btn" href="javascript:void(0);">
					<span class="bar-icon">
						<span></span>
						<span></span>
						<span></span>
					</span>
				</a>

				<!-- Header Title -->
                <div class="page-title-box">
					<h3>Safal Technology</h3>
                </div>
				<!-- /Header Title -->

				<a id="mobile_btn" class="mobile_btn" href="index.html#sidebar"><i class="fa fa-bars"></i></a>

				<!-- Header Menu -->
				<ul class="nav user-menu">

					<!-- Search -->

					<!-- /Message Notifications -->
                    @php
                        $current_user = Auth::guard('admin')->user();
                    @endphp

					<li class="nav-item dropdown has-arrow main-drop">
						<a href="index.html#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<span class="user-img"><img src="{{asset('storage/uploads/' .$current_user->image) }}" alt="{{$current_user->name}}">
							<span class="status online"></span></span>
							<span>{{$current_user->name}}</span>
						</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="{{route('profile')}}">My Profile</a>
							<a class="dropdown-item" href="{{route('changePassword')}}">Change Password</a>
							<a class="dropdown-item" href="{{route('adminLogout')}}">Logout</a>
						</div>
					</li>
				</ul>
				<!-- /Header Menu -->

				<!-- Mobile Menu -->
				<div class="dropdown mobile-user-menu">
					<a href="index.html#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="{{route('profile')}}">My Profile</a>
						<a class="dropdown-item" href="{{route('changePassword')}}">Change Password</a>
						<a class="dropdown-item" href="{{route('adminLogout')}}">Logout</a>
					</div>
				</div>
				<!-- /Mobile Menu -->

            </div>
			<!-- /Header -->

			<!-- Sidebar -->
          @include('admin.includes.sidebar_v2')
			<!-- /Sidebar -->

			<!-- Page Wrapper -->
           @yield('content')
			<!-- /Page Wrapper -->

        </div>
		<!-- /Main Wrapper -->

		@include('admin.includes.footer')
