<header id="m_header" class="m-grid__item    m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
	<div class="m-container m-container--fluid m-container--full-height">
		<div class="m-stack m-stack--ver m-stack--desktop">

						<!-- BEGIN: Brand -->
						<div class="m-stack__item m-brand  m-brand--skin-light ">
							<div class="m-stack m-stack--ver m-stack--general">
								<div class="m-stack__item m-stack__item--middle m-brand__logo" style="width: 60%;">
									<a href="{{route('dashboard')}}" class="m-brand__logo-wrapper">
									<img style="width: 35%; text-align: center" alt="" src="{!! asset('images/logo1.png') !!}">
									<span id ="bldtb" style="color: black;font-size:11px ">SỞ LĐTB & XH</span>
									<style>
									 .m-brand__logo-wrapper:hover{
										 text-decoration:none;
									 }
									</style>
								</a>
								</div>
								<div class="m-stack__item m-stack__item--middle m-brand__tools">

						<!-- BEGIN: Left Aside Minimize Toggle -->
						<a href="javascript:;" id="m_aside_left_minimize_toggle"
							class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block  ">
							<span></span>
						</a>

						<!-- END -->

						<!-- BEGIN: Responsive Aside Left Menu Toggler -->
						<a href="javascript:;" id="m_aside_left_offcanvas_toggle"
							class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
							<span></span>
						</a>

						<!-- END -->

						<!-- BEGIN: Responsive Header Menu Toggler -->
						<a id="m_aside_header_menu_mobile_toggle" href="javascript:;"
							class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
							<span></span>
						</a>

						<!-- END -->

						<!-- BEGIN: Topbar Toggler -->
						<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;"
							class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
							<i class="flaticon-more"></i>
						</a>

						<!-- BEGIN: Topbar Toggler -->
					</div>
				</div>
			</div>

			<!-- END: Brand -->
			<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">

				<!-- BEGIN: Horizontal Menu -->
				<button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark "
					id="m_aside_header_menu_mobile_close_btn"><i class="la la-close"></i></button>


				<!-- END: Horizontal Menu -->

				<!-- BEGIN: Topbar -->
				<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general m-stack--fluid">
					<div class="m-stack__item m-topbar__nav-wrapper">
						<ul class="m-topbar__nav m-nav m-nav--inline">

							<li class="m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center 	m-dropdown--mobile-full-width"
								m-dropdown-toggle="click" m-dropdown-persistent="1">
								<a href="#" class="m-nav__link m-dropdown__toggle" onclick="SystemUtil.changeNotifyStatus(this)" id="m_topbar_notification_icon">

									<span class="m-nav__link-icon notify-bell">
										<i class="flaticon-alarm"></i>
									</span>
								</a>
								<div class="m-dropdown__wrapper">
									<span class="m-dropdown__arrow m-dropdown__arrow--right notify-arrow-badge"></span>
									<div class="m-dropdown__inner">
										<div class="m-dropdown__header m--align-center"
											style="background: url({{asset('assets/app/media/img/misc/notification_bg.jpg')}}); background-size: cover;">
											<span class="m-dropdown__header-title notify-check-title">
												Không có thông báo mới
											</span>

										</div>
										<div class="m-dropdown__body">
											<div class="m-dropdown__content">
												<ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand"
													role="tablist">
													<li class="nav-item m-tabs__item">
														<a class="nav-link m-tabs__link active" data-toggle="tab"
															href="#topbar_notifications_notifications" role="tab">
															Thông báo
														</a>
													</li>

												</ul>
												<div class="tab-content">
													<div class="tab-pane active" id="topbar_notifications_notifications"
														role="tabpanel">
														<div class="m-scrollable m-scroller ps" data-scrollable="true"
															data-height="250" data-mobile-height="200"
															style="height: 250px; overflow: hidden;">
															<div class="m-list-timeline m-list-timeline--skin-light">
																<div class="m-list-timeline__items">

																</div>
															</div>
															<div class="ps__rail-x" style="left: 0px; bottom: 0px;">
																<div class="ps__thumb-x" tabindex="0"
																	style="left: 0px; width: 0px;"></div>
															</div>
															<div class="ps__rail-y" style="top: 0px; right: 4px;">
																<div class="ps__thumb-y" tabindex="0"
																	style="top: 0px; height: 0px;"></div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
							<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
								m-dropdown-toggle="click">
								<a href="#" class="m-nav__link m-dropdown__toggle">
									<span class="m-topbar__userpic">
										<img src="{!! asset('storage/'.Auth::user()->avatar) !!}"
											class="m--img-rounded m--marginless" alt="">
									</span>
									<span class="m-topbar__username m--hide">Nick</span>
								</a>
								<div class="m-dropdown__wrapper">
									<span
										class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
									<div class="m-dropdown__inner">
										<div class="m-dropdown__header m--align-center"
											style="background: url(assets/app/media/img/misc/user_profile_bg.jpg); background-size: cover;">
											<div class="m-card-user m-card-user--skin-dark">
												<div class="m-card-user__pic">
													<img src="{!! asset('storage/'.Auth::user()->avatar) !!}"
														class="m--img-rounded m--marginless" alt="">
												</div>
												<div class="m-card-user__details">
													<span
														class="m-card-user__name m--font-weight-500">{{ Auth::user()->name }}</span>
													<a href="{{route('profile.thong-tin-tk')}}"
														class="m-card-user__email m--font-weight-300 m-link">{{ Auth::user()->email }}</a>
												</div>
											</div>
										</div>
										<div class="m-dropdown__body">
											<div class="m-dropdown__content">
												<ul class="m-nav m-nav--skin-light">
													<li class="m-nav__section m--hide">
														<span class="m-nav__section-text">Section</span>
													</li>
													<li class="m-nav__item">
														<a href="{{ route('profile.thong-tin-tk')}}"
															class="m-nav__link">

															<i class="m-nav__link-icon flaticon-profile-1"></i>
															<span class="m-nav__link-title">
																<span class="m-nav__link-wrap">
																	<span class="m-nav__link-text">Cập nhật tài
																		khoản</span>
																	<!-- <span class="m-nav__link-badge"><span class="m-badge m-badge--success">2</span></span> -->
																</span>
															</span>
														</a>
													</li>
													<li class="m-nav__item">
														<a href="{{ route('profile.doi-mk')}}" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-share"></i>
															<span class="m-nav__link-text">Đổi mật khẩu</span>
														</a>
													</li>
													<li class="m-nav__separator m-nav__separator--fit">
													</li>
													<li class="m-nav__item">
														<a href="{{ route('logout') }}"
															class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">Logout</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>

				<!-- END: Topbar -->
			</div>
		</div>
	</div>
</header>