<header class="site-header">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-12">
				<div class="header-box">
					<div class="site-branding">
						<a href="{{ route('/') }}" title="Dinas Kelautan dan Perikanan Provinsi Sulawesi Selatan">
							<img src="{{ asset('app-assets/landing/assets/images/logo.png') }}" alt="Logo" style="max-width: 80px;">
						</a>
					</div>
					<div class="header-menu">
						<nav class="main-navigation">
							<button class="toggle-button">
								<span></span>
								<span></span>
								<span></span>
							</button>
							<ul class="menu">
								<li>
									<a href="{{ route('/') }}" title="Beranda">Beranda</a>
								</li>
								<li><a href="" title="Tentang">Tentang</a></li>
                                <li><a href="{{ route('landing.sop') }}" title="SOP">SOP</a></li>
								<li><a href="{{ route('landing.pengumuman') }}" title="Pengumuman">Pengumuman</a></li>
                                <li><a href="{{ route('landing.pengaduan') }}" title="Pengaduan">Pengaduan</a></li>
								{{-- <li class="sub-items">
									<a href="javascript:void(0);" title="Pages">Pages</a>
									<ul class="sub-menu">
										<li>
											<a href="pricing.html" title="Pricing">Pricing</a>
										</li>
										<li>
											<a href="portfolio.html" title="Portfolio">Portfolio</a>
										</li>
										<li>
											<a href="portfolio-detail.html" title="Portfolio-detail">Portfolio-Detail</a>
										</li>
										<li>
											<a href="team.html" title="Team">Team</a>
										</li>
										<li>
											<a href="faq.html" title="FAQ">FAQ</a>
										</li>
									</ul>
								</li> --}}
								{{-- <li class="sub-items">
									<a href="javascript:void(0);" title="Blog">Blog</a>
									<ul class="sub-menu">
										<li><a href="blog-list.html" title="Blog List">Blog List</a></li>
										<li><a href="blog-detail.html" title="Blog Detail">Blog Detail</a></li>
									</ul>
								</li> --}}
								<li><a href="" title="Kontak Kami">Kontak Kami</a></li>
                                <li class="d-lg-none d-xl-none"><a href="{{ route('login') }}" title="Login">Login</a></li>
							</ul>
						</nav>
						<div class="black-shadow"></div>
					</div>
					<div class="header-search">
						<a href="{{ route('login') }}" class="sec-btn" title="Login"><span>Login</span></a>
						{{-- <div class="search-box">
							<div class="search-icon">
								<a href="javascript:void(0);" title="Search"><i class="fa fa-search" aria-hidden="true"></i></a>
							</div>
						</div>
						<div class="extra-menu">
							<div class="extra-menu-icon">
								<a href="javascript:void(0);" title="Menu">
									<img src="{{ asset('app-assets/landing/assets/images/menu-icon.png') }}" alt="Menu Icon" class="lazy">
								</a>
							</div>
							<div class="extra-menu-info">
								<span class="close-extra-menu"></span>
								<div class="extra-info-text">
									<div class="extra-info-logo">
										<img src="{{ asset('app-assets/landing/assets/images/logo.png') }}" alt="Logo" class="lazy">
									</div>
									<div class="search-input">
										<form>
											<input type="text" name="search" class="form-input" placeholder="Search Here..." required>
											<button type="submit" class="sec-btn"><span><i class="fa fa-search" aria-hidden="true"></i></span></button>
										</form>
									</div>
									<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
								</div>
								<div class="extra-info-text">
									<h3 class="h3-title">Categories</h3>
									<ul>
										<li>Web Design</li>
										<li>Idea & Research</li>
										<li>Web Development</li>
										<li>SEO & Marketing</li>
										<li>Business Analytics</li>
										<li>24x7 Support</li>
									</ul>
								</div>
								<div class="extra-info-text">
									<h3 class="h3-title">Contacts</h3>
									<div class="footer-contact-box">
										<div class="footer-contact-link">
											<span class="icon">
												<i class="fa fa-map-marker" aria-hidden="true"></i>
											</span>
											<a href="javascript:void(0);" title="1247/Plot No. 39, 15th Phase, Colony, Kukatpally, Hyderabad">1247/Plot No. 39, 15th Phase, Colony, Kukatpally, Hyderabad</a>
										</div>
									</div>
									<div class="footer-contact-box">
										<div class="footer-contact-link">
											<span class="icon">
												<i class="fa fa-envelope" aria-hidden="true"></i>
											</span>
											<a href="javascript:void(0);" title="info@gmail.com">info@gmail.com</a>
											<a href="javascript:void(0);" title="services@gmail.com">services@gmail.com</a>
										</div>
									</div>
									<div class="social-icon">
										<a href="javascript:void(0);" title="Follow on Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
										<a href="javascript:void(0);" title="Follow on Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
										<a href="javascript:void(0);" title="Follow on Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
									</div>
								</div>
							</div>
							<div class="black-shadow"></div>
						</div> --}}
					</div>
				</div>
			</div>
		</div>
	</div>

    <!-- Bottom Navbar -->
    <nav class="navbar navbar-dark bg-success navbar-expand d-md-none d-lg-none d-xl-none fixed-bottom" style="background-color: #f2061d !important;">
        <ul class="navbar-nav nav-justified w-100">
            <li class="nav-item">
                <a href="{{ route('/') }}" class="nav-link" style="color: white !important;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                        <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
                    </svg>
                    {{-- <span class="small d-block">Beranda</span> --}}
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('landing.pantau-permohonan') }}" class="nav-link" style="color: white !important;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link" style="color: white !important;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-patch-plus" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5z"/>
                      <path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z"/>
                    </svg>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('landing.survei') }}" class="nav-link" style="color: white !important;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                        <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                        <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                    </svg>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link" style="color: white !important;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg>
                </a>
            </li>
        </ul>
    </nav>
</header>
