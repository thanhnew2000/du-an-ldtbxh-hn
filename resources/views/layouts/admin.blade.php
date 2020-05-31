<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>@yield('title')</title>
		<!-- start start-->
		@include('layouts.dashboard.style')
		@yield('style')
		<!-- end start-->
	</head>
	<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<!-- start header	 -->
			@include('layouts.dashboard.header')
			<!-- end header -->

			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
				<!-- start slidebar -->
				@include('layouts.dashboard.sidebar')
				<!-- end slidebar -->

				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!--start content -->
					@yield('content')
					<!--end content -->
				</div>
			</div>
		</div>
		<!--start footer -->
		@include('layouts.dashboard.footer')
		<!--end footer -->
	</body>
	<!-- start script -->
	@include('layouts.dashboard.script')
	@yield('script')
	<script>
		$(document).ready(function(){
			var avatarImgUrl = $('.m-topbar__userpic>img').attr('src');
            SystemUtil.defaultImgUrl(avatarImgUrl, '.m-topbar__userpic>img', "{!! asset('uploads/avatars/user.png') !!}");
		});
	</script>
	<!-- end script -->
</html>
