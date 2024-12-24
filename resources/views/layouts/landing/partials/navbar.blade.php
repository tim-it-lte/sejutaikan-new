@php

$menuList = [
    [ 'title' => 'Beranda', 'route' => '/' ],
    [ 'title' => 'Profil', 'route' => 'landing.profil' ],
    [
        'title' => 'Layanan',
        'items' => [
            [ 'title' => 'Pantau Permohonan', 'route' => 'landing.pantau-permohonan' ],
            [ 'title' => 'Alur Permohonan', 'route' => 'landing.alur-permohonan' ],
            
            [ 'title' => 'Customer Service', 'url' => 'https://wa.me/6281244962783' ]
        ]
    ],
    [ 'title' => 'Berita', 'route' => 'landing.berita' ],
    [
        'title' => 'Pengaduan',
        'items' => [
            [ 'title' => 'Form Pengaduan', 'route' => 'landing.pengaduan' ],
            [ 'title' => 'Alur Pengaduan Masyarakat', 'route' => 'landing.alur-pengaduan' ],
            //[ 'title' => 'SOP Pengaduan', 'route' => 'landing.sop-pengaduan' ]
        ]
    ],
    [ 'title' => 'Layanan Lainnya' ]
];

function getMenuUrl($item) {
    if(isset($item['items'])) return '#';
    if(isset($item['route'])) return route($item['route']);
    if(isset($item['url'])) return $item['url'];
    return '#';
}

@endphp
<header class="header-bhv ree-header fixed-top">
    <div class="mini-header-bar">
      	<div class="sideone">
        	<a href="mailto:bpmpp.mks@gmail.com" class="contactinfo"><i class="far fa-envelope"></i> bpmpp.mks@gmail.com</a>
        	<a href="#" class="contactinfo" target="blank"><i class="fa fa-map-marker" aria-hidden="true"></i> Jl. Dr. Ir. Sutami No. 23</a>
      	</div>
    </div>
    <div class="container-fluid m-p-l-r-0">
      	<div class="menu-header horzontl">
        	<div class="menu-logo">
          		<div class="dskt-logo">
          			<a class="nav-brand" href="{{ route('/') }}">
          				<img src="{{ asset('app-assets/landing/assets/images/logo.png') }}" alt="Logo" class="logo-pemprov" style="max-width: 80px;" />
          			</a>
          		</div>
        	</div>
	        <div class="ree-nav" role="navigation">
	          	<ul class="nav-list">
                    @foreach($menuList as $item)
                    <li class="megamenu{{ isset($item['items']) ? ' mega-small' : '' }}">
                        <a href="{{ getMenuUrl($item) }}" class="menu-links">
                            <span>{{ $item['title'] }}</span>
                            @if(isset($item['items']))
                            <small><i class="fas fa-chevron-down ml-2"></i></small>
                            @endif
                        </a>
                        @if(isset($item['items']))
                        <div class="menu-dropdown">
                            <div class="menu-block-set">
                                @foreach($item['items'] as $childItem)
                                <a class="dropdown-item" href="{{ getMenuUrl($childItem) }}">{{ $childItem['title'] }}</a>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </li>
                    @endforeach
	            </ul>
	        </div>
	        <div class="ree-nav-cta">
	        	<ul>
	        		<li><a href="{{ route('login') }}" class="ree-btn ree-btn0 ree-btn-grdt2">
                        <span>Register</span>
                        <svg width="12" height="100" xmlns="http://www.w3.org/2000/svg" fill="currentColor" style="height: 1.2em; width: auto;">
                          <rect width="12" height="100" x="0" y="0" />
                        </svg>
                        <span>Login</span>
                    </a></li>
	        	</ul>
	        </div>
	        <div class="mobile-menu2">
	        	<ul class="mob-nav2">
	        		<li class="navm-"><a class="toggle" href="#"> <span></span> </a> </li>
	        	</ul>
	        </div>
        	<!-- mobile Nav -->
        	<nav id="main-nav">
        		<ul>
                    @foreach($menuList as $item)
                    <li>
                        <a href="{{ getMenuUrl($item) }}">{{ $item['title'] }}</a>
                        @if(isset($item['items']))
                        <ul>
                            @foreach($item['items'] as $childItem)
                            <li>
                                <a href="{{ getMenuUrl($childItem) }}">{{ $childItem['title'] }}</a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                    <li>
                        <div>
                            <a href="{{ route('login') }}" class="ree-btn ree-btn0 ree-btn-grdt2 text-center">
                                <span>Register</span>
                                <svg width="12" height="100" xmlns="http://www.w3.org/2000/svg" fill="currentColor" style="height: 1.2em; width: auto;">
                                  <rect width="12" height="100" x="0" y="0" />
                                </svg>
                                <span>Login</span>
                            </a>
                        </div>
                    </li>
        		</ul>
        		{{-- <ul class="bottom-nav">
        			<li class="ree-hc">
        				<a href="tel:123567890" rel="noreferrer" target="_blank">
        					<svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 25.625 25.625" style="enable-background:new 0 0 25.625 25.625;" xml:space="preserve">
        						<g>
        							<path d="M22.079,17.835c-1.548-1.324-3.119-2.126-4.648-0.804l-0.913,0.799 c-0.668,0.58-1.91,3.29-6.712-2.234C5.005,10.079,7.862,9.22,8.531,8.645l0.918-0.8c1.521-1.325,0.947-2.993-0.15-4.71l-0.662-1.04  C7.535,0.382,6.335-0.743,4.81,0.58L3.986,1.3C3.312,1.791,1.428,3.387,0.971,6.419c-0.55,3.638,1.185,7.804,5.16,12.375
        							c3.97,4.573,7.857,6.87,11.539,6.83c3.06-0.033,4.908-1.675,5.486-2.272l0.827-0.721c1.521-1.322,0.576-2.668-0.973-3.995 L22.079,17.835z" />
        						</g>
        					</svg>
        				</a>
        			</li>
        			<li class="ree-hc">
        				<a href="https://separateweb.com/cdn-cgi/l/email-protection#ff9e9d9cbf9a879e928f939ad19c9092" target="_blank">
        					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
        						<path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
        						<path d="M0 0h24v24H0z" fill="none" />
        					</svg>
        				</a>
        			</li>
        			<li class="ree-hc">
        				<a href="skype:reevan.company" rel="noreferrer" target="_blank">
        					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
        						<path d="M424.7 299.8c2.9-14 4.7-28.9 4.7-43.8 0-113.5-91.9-205.3-205.3-205.3-14.9 0-29.7 1.7-43.8 4.7C161.3 40.7 137.7 32 112 32 50.2 32 0 82.2 0 144c0 25.7 8.7 49.3 23.3 68.2-2.9 14-4.7 28.9-4.7 43.8 0 113.5 91.9 205.3 205.3 205.3 14.9 0 29.7-1.7 43.8-4.7 19 14.6 42.6 23.3 68.2 23.3 61.8 0 112-50.2 112-112 .1-25.6-8.6-49.2-23.2-68.1zm-194.6 91.5c-65.6 0-120.5-29.2-120.5-65 0-16 9-30.6 29.5-30.6 31.2 0 34.1 44.9 88.1 44.9 25.7 0 42.3-11.4 42.3-26.3 0-18.7-16-21.6-42-28-62.5-15.4-117.8-22-117.8-87.2 0-59.2 58.6-81.1 109.1-81.1 55.1 0 110.8 21.9 110.8 55.4 0 16.9-11.4 31.8-30.3 31.8-28.3 0-29.2-33.5-75-33.5-25.7 0-42 7-42 22.5 0 19.8 20.8 21.8 69.1 33 41.4 9.3 90.7 26.8 90.7 77.6 0 59.1-57.1 86.5-112 86.5z" />
        					</svg>
        				</a>
        			</li>
        			<li class="ree-hc">
        				<a href="wa.me/%2b91123456789.html" rel="noreferrer" target="_blank">
        					<svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"	style="enable-background:new 0 0 512 512;" xml:space="preserve">
        						<g>
        							<path d="M256.064,0h-0.128C114.784,0,0,114.816,0,256c0,56,18.048,107.904,48.736,150.048l-31.904,95.104l98.4-31.456 C155.712,496.512,204,512,256.064,512C397.216,512,512,397.152,512,256S397.216,0,256.064,0z M405.024,361.504 c-6.176,17.44-30.688,31.904-50.24,36.128c-13.376,2.848-30.848,5.12-89.664-19.264C189.888,347.2,141.44,270.752,137.664,265.792
        							c-3.616-4.96-30.4-40.48-30.4-77.216s18.656-54.624,26.176-62.304c6.176-6.304,16.384-9.184,26.176-9.184 c3.168,0,6.016,0.16,8.576,0.288c7.52,0.32,11.296,0.768,16.256,12.64c6.176,14.88,21.216,51.616,23.008,55.392 c1.824,3.776,3.648,8.896,1.088,13.856c-2.4,5.12-4.512,7.392-8.288,11.744c-3.776,4.352-7.36,7.68-11.136,12.352 c-3.456,4.064-7.36,8.416-3.008,15.936c4.352,7.36,19.392,31.904,41.536,51.616c28.576,25.44,51.744,33.568,60.032,37.024 c6.176,2.56,13.536,1.952,18.048-2.848c5.728-6.176,12.8-16.416,20-26.496c5.12-7.232,11.584-8.128,18.368-5.568 c6.912,2.4,43.488,20.48,51.008,24.224c7.52,3.776,12.48,5.568,14.304,8.736C411.2,329.152,411.2,344.032,405.024,361.504z"/>
        						</g>
        					</svg>
        				</a>
        			</li>
        		</ul> --}}
        	</nav>
        </div>
    </div>
</header>