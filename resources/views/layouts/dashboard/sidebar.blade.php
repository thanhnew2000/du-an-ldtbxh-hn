<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i
		class="la la-close"></i></button>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-light ">

	<!-- BEGIN: Aside Menu -->
	<div id="m_ver_menu"
		class="m-aside-menu m-aside-menu--skin-light m-aside-menu--submenu-skin-light m-scroller ps ps--active-y"
		m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500"
		style="position: relative; overflow: hidden;">
		<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
			<li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
				<a href="{{url('dashboard')}}" class="m-menu__link ">
					<i class="m-menu__link-icon flaticon-line-graph"></i>
					<span class="m-menu__link-text">Dashboard</span>
				</a>
			<li class="m-menu__section ">
				<h4 class="m-menu__section-text">Danh sách chức năng</h4>
				<i class="m-menu__section-icon flaticon-more-v2"></i>
			</li>
			<li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a
					href="javascript:;" class="m-menu__link m-menu__toggle"><i
						class="m-menu__link-icon flaticon-layers"></i><span class="m-menu__link-text">Quản lý tài
						khoản</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
				<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span
								class="m-menu__link"><span class="m-menu__link-text">Base</span></span></li>
						<li class="m-menu__item " aria-haspopup="true"><a href="{{route('account.list')}}"
								class="m-menu__link "><i
									class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
									class="m-menu__link-text">Quản lý tài khoản</span></a></li>
						<li class="m-menu__item " aria-haspopup="true"><a href="{{route('account.tao-tk')}}"
								class="m-menu__link "><i
									class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
									class="m-menu__link-text">Tạo tài khoản</span></a></li>
						<li class="m-menu__item " aria-haspopup="true"><a href="{{route('account.quyen-truy-cap')}}"
								class="m-menu__link "><i
									class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
									class="m-menu__link-text">Quản lý quyền truy cập</span></a></li>
						<li class="m-menu__item " aria-haspopup="true"><a href="{{route('account.phan-quyen-tk')}}"
								class="m-menu__link "><i
									class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
									class="m-menu__link-text">Phân quyền tài khoản</span></a></li>
					</ul>
				</div>
			</li>
			<li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a
					href="javascript:;" class="m-menu__link m-menu__toggle"><i
						class="m-menu__link-icon flaticon-share"></i><span class="m-menu__link-text">Quản lý cơ sở đào
						tạo</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
				<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						<li class="m-menu__item " aria-haspopup="true"><a href="{{route('csdt.danh-sach')}}"
								class="m-menu__link "><i
									class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
									class="m-menu__link-text">Danh sách cơ sở đào tạo</span></a></li>
						<li class="m-menu__item " aria-haspopup="true"><a href="{{route('csdt.chi-nhanh')}}"
								class="m-menu__link "><i
									class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
									class="m-menu__link-text">Danh sách địa điểm đào tạo</span></a></li>
						<li class="m-menu__item " aria-haspopup="true"><a href="{{route('csdt.thiet-lap-nghe-cs')}}"
								class="m-menu__link "><i
									class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
									class="m-menu__link-text">Thiết lập nghề cho cơ sở đào tạo</span></a></li>
					</ul>
				</div>
			</li>
			{{-- 17/06/2020 Tuanbt - thêm sidebar Quản lý giấy phép --}}
			<li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a
					href="javascript:;" class="m-menu__link m-menu__toggle"><i
						class="m-menu__link-icon flaticon-interface-11"></i><span class="m-menu__link-text">Quản lý giấy
						phép</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
				<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						<li class="m-menu__item " aria-haspopup="true"><a href="{{route('giay-phep.danh-sach')}}"
								class="m-menu__link "><i
									class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
									class="m-menu__link-text">Danh sách giấy phép</span></a></li>
					</ul>
				</div>
			</li>
			<li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a
					href="javascript:;" class="m-menu__link m-menu__toggle"><i
						class="m-menu__link-icon flaticon-web"></i><span class="m-menu__link-text">Quản lý ngành
						nghề</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
				<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">

						<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"
							m-menu-submenu-toggle="hover"><a href="{{route('nghe.danh-sach')}}"
								class="m-menu__link m-menu__toggle"><i
									class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
									class="m-menu__link-text">Danh sách ngành nghề</span><i
									class="m-menu__ver-arrow la la-angle-right"></i></a>

						</li>
						<li class="m-menu__item " aria-haspopup="true"><a href="{{route('nghe.chi-tieu-ts')}}"
								class="m-menu__link "><i
									class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
									class="m-menu__link-text">Thiết lập chỉ tiêu tuyển sinh</span></a></li>

					</ul>
				</div>
			</li>
			{{-- HieuNT --}}
			{{-- <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a
					href="javascript:;" class="m-menu__link m-menu__toggle"><i
						class="m-menu__link-icon flaticon-interface-1"></i><span class="m-menu__link-text">Nhập báo cáo
						cho cơ sở</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
				<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span
								class="m-menu__link"><span class="m-menu__link-text">Portlets</span></span></li>
						<li class="m-menu__item " aria-haspopup="true"><a href="{{route('ql-giao-vien.index')}}"
			class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
				class="m-menu__link-text">Quản lý giáo viên</span></a></li>
			<li class="m-menu__item " aria-haspopup="true"><a href="{{route('nhapbc.quan-ly')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Đội ngũ cán bộ quản lý</span></a></li>
			<li class="m-menu__item " aria-haspopup="true"><a href="{{route('nhapbc.chinh-sach-sv')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Thực hiện chính sách cho sinh viên</span></a></li>
			<li class="m-menu__item " aria-haspopup="true"><a href="{{route('nhapbc.ket-qua-ts')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Kết quả tuyển sinh</span></a></li>
			<li class="m-menu__item " aria-haspopup="true"><a href="{{route('nhapbc.xd-chuong-trinh')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Xây dựng chương trình / giáo trình</span></a></li>
			<li class="m-menu__item " aria-haspopup="true"><a href="{{route('nhapbc.kq-tot-nghiep')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Kết quả tốt nghiệp</span></a></li>
			<li class="m-menu__item " aria-haspopup="true"><a href="{{route('nhapbc.dao-tao-khuye-tat')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Đào tạo nghề cho người khuyết tật</span></a></li>
			<li class="m-menu__item " aria-haspopup="true"><a href="{{route('nhapbc.dao-tao-thanh-nien')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Đào tạo nghề cho thanh niên</span></a></li>
			<li class="m-menu__item " aria-haspopup="true"><a href="{{route('nhapbc.dao-tao-nghe-doanh-nghiep')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Kết quả tốt nghiệp đào tạo nghề gắn với doanh
						nghiệp</span></a></li>
			<li class="m-menu__item " aria-haspopup="true"><a href="{{route('nhapbc.lien-ket-dao-tao')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Liên kết đào tạo</span></a></li>
			<li class="m-menu__item " aria-haspopup="true"><a href="{{route('nhapbc.deadline-bao-cao')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Thiết lập deadline báo cáo theo đợt</span></a></li>
			<li class="m-menu__item " aria-haspopup="true"><a href="{{route('nhapbc.tien-do-nop-bao-cao')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Kiểm soát tiến độ nộp báo cáo</span></a></li>
			<li class="m-menu__item " aria-haspopup="true"><a href="{{route('nhapbc.phe-duyet-bao-cao')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Phê duyệt báo cáo</span></a></li>
		</ul>
	</div>
	</li> --}}
	{{-- <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a
					href="javascript:;" class="m-menu__link m-menu__toggle"><i
						class="m-menu__link-icon flaticon-interface-6"></i><span class="m-menu__link-text">Tổng hợp
						trích xuất báo cáo</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
				<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span
								class="m-menu__link"><span class="m-menu__link-text">Timeline</span></span></li>
						<li class="m-menu__item " aria-haspopup="true"><a href="{{route('xuatbc.ds-nha-giao')}}"
	class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
		class="m-menu__link-text">Danh sách đội ngũ nhà giáo</span></a></li>
	<li class="m-menu__item " aria-haspopup="true"><a href="{{route('xuatbc.ds-quan-ly')}}" class="m-menu__link "><i
				class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
				class="m-menu__link-text">Danh sách đội ngũ quản lý</span></a></li>
	<li class="m-menu__item " aria-haspopup="true"><a href="{{route('xuatbc.ds-sv-dang-hoc')}}" class="m-menu__link "><i
				class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
				class="m-menu__link-text">Tổng hợp sinh viên đang theo học</span></a></li>
	<li class="m-menu__item " aria-haspopup="true"><a href="{{route('xuatbc.ds-chinh-sach-sv')}}"
			class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
				class="m-menu__link-text">Tổng hợp thực hiện chính sách cho SV</span></a></li>
	<li class="m-menu__item " aria-haspopup="true">
		<a href="{{route('solieutuyensinh')}}" class="m-menu__link ">
			<i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
			<span class="m-menu__link-text">Tổng hợp kết quả tuyển sinh</span>
		</a>
	</li>
	<li class="m-menu__item " aria-haspopup="true"><a href="{{route('xuatbc.ds-xd-giao-trinh')}}"
			class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
				class="m-menu__link-text">Tổng hợp xd chương trình, giáo trình</span></a></li>
	<li class="m-menu__item " aria-haspopup="true"><a href="{{route('xuatbc.ds-tot-nghiep')}}" class="m-menu__link "><i
				class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
				class="m-menu__link-text">Tổng hợp kết quả tốt nghiệp</span></a></li>
	<li class="m-menu__item " aria-haspopup="true"><a href="{{route('xuatbc.ds-dao-tao-khuyet-tat')}}"
			class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
				class="m-menu__link-text">Tổng hợp đào tạo nghề cho người khuyết tật</span></a></li>
	<li class="m-menu__item " aria-haspopup="true"><a href="{{route('xuatbc.ds-dao-tao-thanh-nien')}}"
			class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
				class="m-menu__link-text">Tổng hợp đào tạo nghề cho thanh niên</span></a></li>
	<li class="m-menu__item " aria-haspopup="true"><a href="{{route('xuatbc.ds-dao-tao-voi-doanh-nghiep')}}"
			class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
				class="m-menu__link-text">Tổng hợp đào tạo nghề với doanh nghiệp</span></a></li>
	<li class="m-menu__item " aria-haspopup="true"><a href="{{route('xuatbc.ds-hop-tact-qte')}}"
			class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
				class="m-menu__link-text">Tổng hợp hợp tác quốc tế</span></a></li>
	<li class="m-menu__item " aria-haspopup="true"><a href="{{route('xuatbc.ds-chi-tieu-ts')}}" class="m-menu__link "><i
				class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
				class="m-menu__link-text">Tổng hợp đăng ký chỉ tiêu tuyển sinh</span></a></li>


	</ul>
</div>
</li> --}}
{{-- End HieuNT --}}

{{-- VinhNB --}}

{{-- Quản lý nhân sự --}}
<li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;"
		class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-avatar"></i><span
			class="m-menu__link-text">Quản lý nhân
			sự</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
	<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
		<ul class="m-menu__subnav">
			<li class="m-menu__item " aria-haspopup="true"><a href="{{route('ql-giao-vien.index')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Quản lý giáo viên</span></a></li>
			<li class="m-menu__item " aria-haspopup="true"><a href="{{route('xuatbc.ds-nha-giao')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Danh sách đội ngũ nhà giáo</span></a></li>
			<li class="m-menu__item " aria-haspopup="true"><a href="{{route('so-lieu-can-bo-quan-ly.index')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Danh sách đội ngũ quản lý</span></a></li>
		</ul>
	</div>
</li>
{{-- End Quản lý nhân sự --}}

{{-- Quản lý sinh viên đang có mặt --}}
<li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
	<a href="javascript:;" class="m-menu__link m-menu__toggle">
		<i class="m-menu__link-icon flaticon-statistics"></i>
		<span class="m-menu__link-text">Quản lý sinh viên đang theo học</span>
		<i class="m-menu__ver-arrow la la-angle-right"></i>
	</a>
	<div class="m-menu__submenu ">
		<span class="m-menu__arrow"></span>
		<ul class="m-menu__subnav">
			<li class="m-menu__item " aria-haspopup="true">
				<a href="{{route('xuatbc.ds-sv-dang-hoc')}}" class="m-menu__link ">
					<i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
					<span class="m-menu__link-text">Tổng hợp sinh viên đang theo học</span>
				</a>
			</li>
		</ul>
	</div>
</li>
{{-- End quản lý sinh viên đang có mặt --}}


{{-- Quản lý chính sách cho sinh viên --}}
<li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;"
		class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-statistics"></i><span
			class="m-menu__link-text">Quản lý chính
			sách</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
	<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
		<ul class="m-menu__subnav">
			<li class="m-menu__item " aria-haspopup="true"><a href="{{route('nhapbc.chinh-sach-sv')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Thực hiện chính sách cho sinh viên</span></a></li>
			<li class="m-menu__item " aria-haspopup="true"><a href="{{route('xuatbc.tong-hop-chinh-sach-sinh-vien')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Tổng hợp thực hiện chính sách cho SV</span></a></li>
		</ul>
	</div>
</li>
{{-- End Quản lý chính sách cho sinh viên --}}

{{-- Quản lý đăng kí chỉ tiêu --}}
<li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;"
		class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-users"></i><span
			class="m-menu__link-text">Quản lý đăng kí chỉ tiêu</span><i
			class="m-menu__ver-arrow la la-angle-right"></i></a>
	<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
		<ul class="m-menu__subnav">
			<li class="m-menu__item " aria-haspopup="true"><a href="{{route('xuatbc.ds-chi-tieu-ts')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Tổng hợp đăng ký chỉ tiêu tuyển sinh</span></a></li>
		</ul>
	</div>
</li>
{{-- End Quản lý đăng kí chỉ tiêu  --}}

{{-- Quản lý kết quả tuyển sinh --}}
<li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;"
		class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-grid-menu"></i><span
			class="m-menu__link-text">Quản lý kết
			quả tuyển sinh</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
	<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
		<ul class="m-menu__subnav">
			<li class="m-menu__item " aria-haspopup="true"><a href="{{route('solieutuyensinh')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Kết quả tuyển sinh</span></a></li>
			<li class="m-menu__item " aria-haspopup="true">
				<a href="{{route('nhapbc.ket-qua-ts')}}" class="m-menu__link ">
					<i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
					<span class="m-menu__link-text">Tổng hợp kết quả tuyển sinh</span>
				</a>
			</li>
		</ul>
	</div>
</li>
{{-- End Quản lý kết quả tuyển sinh --}}

{{-- Quản lý xây dựng chương trình giáo trình  --}}
<li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;"
		class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-folder"></i><span
			class="m-menu__link-text">Quản lý xd
			chương trình giáo trình</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
	<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
		<ul class="m-menu__subnav">
			<li class="m-menu__item " aria-haspopup="true"><a href="{{route('nhapbc.xd-chuong-trinh')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Xây dựng chương trình / giáo trình</span></a></li>

			<li class="m-menu__item " aria-haspopup="true"><a href="{{route('xuatbc.ds-xd-giao-trinh')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Tổng hợp xd chương trình, giáo trình</span></a></li>

		</ul>
	</div>
</li>
{{-- End quản lý xây dựng chương trình --}}

{{-- Quản lý kết quả tốt nghiệp --}}
<li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;"
		class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-technology-1"></i><span
			class="m-menu__link-text">Quản lý kết
			quả tốt
			nghiệp</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
	<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
		<ul class="m-menu__subnav">
			<li class="m-menu__item " aria-haspopup="true"><a href="{{route('nhapbc.kq-tot-nghiep')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Kết quả tốt nghiệp</span></a></li>
			<li class="m-menu__item " aria-haspopup="true"><a href="{{route('xuatbc.ds-tot-nghiep')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Tổng hợp kết quả tốt nghiệp</span></a></li>

		</ul>
	</div>
</li>
{{-- End quản lý kết quả tốt nghiệp --}}

{{-- Quản lý đào tạo nghề  --}}
<li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;"
		class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-interface-1"></i><span
			class="m-menu__link-text">Quản lý đào
			tạo nghề</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
	<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
		<ul class="m-menu__subnav">
			<li class="m-menu__item " aria-haspopup="true"><a href="{{route('nhapbc.dao-tao-khuyet-tat')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Đào tạo nghề cho người khuyết tật</span></a></li>
			<li class="m-menu__item " aria-haspopup="true"><a href="{{route('nhapbc.dao-tao-thanh-nien.index')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Đào tạo nghề cho thanh niên</span></a></li>
			<li class="m-menu__item " aria-haspopup="true"><a
					href="{{route('xuatbc.ket-qua-tot-nghiep-voi-doanh-nghiep')}}" class="m-menu__link "><i
						class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Kết quả tốt nghiệp đào tạo nghề gắn với doanh
						nghiệp</span></a></li>

			<li class="m-menu__item " aria-haspopup="true"><a href="{{route('xuatbc.ds-dao-tao-khuyet-tat')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Tổng hợp đào tạo nghề cho người khuyết tật</span></a></li>
			<li class="m-menu__item " aria-haspopup="true"><a href="{{route('xuatbc.ds-dao-tao-thanh-nien')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Tổng hợp đào tạo nghề cho thanh niên</span></a></li>
			<li class="m-menu__item " aria-haspopup="true"><a href="{{route('xuatbc.ds-dao-tao-voi-doanh-nghiep')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Tổng hợp đào tạo nghề với doanh nghiệp</span></a></li>
		</ul>
	</div>
</li>
{{-- End Quản lý đào tạo nghề --}}

{{-- Quản lý liên kết đào tạo --}}
<li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;"
		class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-globe"></i><span
			class="m-menu__link-text">Quản lý liên
			kết</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
	<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
		<ul class="m-menu__subnav">
			<li class="m-menu__item " aria-haspopup="true"><a href="{{route('xuatbc.tong-hop-lien-ket-dao-tao')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Tổng hợp liên kết liên thông trình độ</span></a></li>
			<li class="m-menu__item " aria-haspopup="true"><a
					href="{{route('xuatbc.tong-hop-lien-ket-dao-tao-cao-dang', ['id' => 6])}}" class="m-menu__link "><i
						class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Liên kết liên thông trình độ cao đẳng lên đại học</span></a></li>
			<li class="m-menu__item " aria-haspopup="true"><a
					href="{{route('xuatbc.tong-hop-lien-ket-dao-tao-trung-cap', ['id' => 5])}}" class="m-menu__link "><i
						class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Liên kết liên thông trình độ trung cấp lên đại học</span></a></li>
		</ul>
	</div>
</li>
{{-- End quản lý liên kết đào tạo --}}

{{-- Quản lý hoạt động giáo dục nghề nhiệp --}}
<li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;"
	class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-globe"></i><span
		class="m-menu__link-text">Quản lý giáo dục nghề nghiệp</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
	<ul class="m-menu__subnav">
		<li class="m-menu__item " aria-haspopup="true"><a href="{{route('xuatbc.quan-ly-giao-duc-nghe-nghiep')}}"
				class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
					class="m-menu__link-text">Tổng hợp giáo dục nghề nghiệp</span></a></li>
	</ul>
</div>
</li>
{{-- End Quản lý hoạt động giáo dục nghề nhiệp --}}

{{-- Quản lý thiết lập deadline  --}}
<li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;"
		class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-event-calendar-symbol"></i><span
			class="m-menu__link-text">Quản lý thiết
			lập deadline</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
	<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
		<ul class="m-menu__subnav">
			<li class="m-menu__item " aria-haspopup="true"><a href="{{route('nhapbc.lien-ket-dao-tao')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Liên kết đào tạo</span></a></li>
		</ul>
	</div>
</li>
{{-- End Quản lý thiết lập deadline --}}

{{-- Quản lý phê duyệt --}}
<li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;"
		class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-interface-5"></i><span
			class="m-menu__link-text">Quản lý phê
			duyệt</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
	<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
		<ul class="m-menu__subnav">
			<li class="m-menu__item " aria-haspopup="true"><a href="{{route('nhapbc.tien-do-nop-bao-cao')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Kiểm soát tiến độ nộp báo cáo</span></a></li>
			<li class="m-menu__item " aria-haspopup="true"><a href="{{route('nhapbc.phe-duyet-bao-cao')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Phê duyệt báo cáo</span></a></li>
		</ul>
	</div>
</li>
{{-- End Quản lý phê duyệt --}}

{{-- Quản lý tổng hợp hợp tác quốc tế --}}
<li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;"
		class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-interface-1"></i><span
			class="m-menu__link-text">Quản lý tổng
			hợp hợp tác quốc tế</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
	<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
		<ul class="m-menu__subnav">
			<li class="m-menu__item " aria-haspopup="true"><a href="{{route('xuatbc.ds-hop-tact-qte')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Tổng hợp hợp tác quốc tế</span></a></li>
		</ul>
	</div>
</li>
{{-- End Quản lý tổng hợp hợp tác quốc tế --}}
{{-- End VinhNB --}}


<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a
		href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-network"></i><span
			class="m-menu__link-text">Thống kê / biểu
			đồ</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
	<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
		<ul class="m-menu__subnav">
			<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span
						class="m-menu__link-text">Widgets</span></span></li>
			<li class="m-menu__item " aria-haspopup="true"><a href="{{url('chart/bieu-do-bao-cao-ngan-sach')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Biểu đồ báo cáo ngân sách</span></a></li>
			<li class="m-menu__item " aria-haspopup="true"><a href="{{url('chart/bieu-do-ket-qua-tuyen-sinh')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Biểu đồ kết quả tuyển sinh</span></a></li>
			<li class="m-menu__item " aria-haspopup="true"><a href="{{url('chart/bieu-do-sinh-vien-dang-theo-hoc')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Biểu đồ sinh viên đang theo học</span></a></li>
			<li class="m-menu__item " aria-haspopup="true"><a href="{{url('chart/bieu-do-so-luong-tot-nghiep')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Biểu đồ số lượng tốt nghiệp</span></a></li>
			<li class="m-menu__item " aria-haspopup="true"><a href="{{url('chart/bieu-do-hop-tac-quoc-te')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Biểu đồ hợp tác quốc tế</span></a></li>

		</ul>
	</div>
</li>
<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a
		href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-calendar"></i><span
			class="m-menu__link-text">Bảng tin điện
			tử</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
	<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
		<ul class="m-menu__subnav">
			<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span
						class="m-menu__link-text">Calendar</span></span></li>
			<li class="m-menu__item " aria-haspopup="true"><a href="{{url('news/danh-sach-tin-tuc')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Danh sách tin tức</span></a></li>
			<li class="m-menu__item " aria-haspopup="true"><a href="{{url('news/chi-tiet-tin-tuc')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Chi tiết tin tức</span></a></li>
			<li class="m-menu__item " aria-haspopup="true"><a href="{{url('news/quan-ly-tin-tuc')}}"
					class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Quản lý tin tức</span></a></li>

		</ul>
	</div>
</li>
<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a
		href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-mail"></i><span
			class="m-menu__link-text">Phản hồi / Báo
			lỗi hệ thống</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
	<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
		<ul class="m-menu__subnav">
			<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span
						class="m-menu__link-text">Charts</span></span></li>
			<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a
					href="{{url('feedback/nhan-tin-bao-loi-he-thong')}}" class="m-menu__link m-menu__toggle"><i
						class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
						class="m-menu__link-text">Nhắn tin báo lỗi hệ thống</span><i
						class="m-menu__ver-arrow la la-angle-right"></i></a>
			</li>


		</ul>
	</div>
</li>
</ul>
<div class="ps__rail-x" style="left: 0px; bottom: 0px;">
	<div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
</div>
<div class="ps__rail-y" style="top: 0px; height: 314px; right: 4px;">
	<div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 90px;"></div>
</div>
</div>

<!-- END: Aside Menu -->
</div>