@extends('layouts.landing.master')

@section('title','Pengaduan')

@section('link')
<style type="text/css">
	
.slideshow {
	position: absolute;
	top: 0;
	left: 0;
	margin-left: -8rem;
	opacity: 0;
	transition: margin-left 0.8s, opacity 0.8s;
}

.slideshow.show {
	position: relative;
	z-index: 22;
	margin-left: 0;
	opacity: 1;
}

</style>
@endsection

@include('layouts.landing.partials.breadcrumb', [ 'breadLink' => 'Pengaduan', 'breadTitle' => 'Standar Operasional Prosedur Pengaduan' ])

@section('content')
<section class="bg-light pb-5 pt85">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10 col-lg-8">
				<ul class="nav nav-pills mb-4 position-relative" style="z-index:24;">
					<li class="nav-item">
						<a class="nav-link slideshow-toggler active" href="#sms">MELALUI SMS LAPOR</a>
					</li>
					<li class="nav-item">
						<a class="nav-link slideshow-toggler" href="#upt">MELALUI UPT</a>
					</li>
				</ul>
				<div class="position-relative">
					<div id="sms" class="card card-body rounded-lg shadow-sm slideshow show">
						<div><img src="{{ asset('app-assets/sop/sop-pengaduan-sms.png') }}" class="img-fluid" alt="SOP PENANGANAN PENGADUAN MASYARAKAT MELALUI SMS LAPOR"></div>
						<p class="text-center mt-4">SOP PENANGANAN PENGADUAN MASYARAKAT MELALUI SMS LAPOR</p>
					</div>
					<div id="upt" class="card card-body rounded-lg shadow-sm slideshow">
						<div><img src="{{ asset('app-assets/sop/sop-pengaduan-sms.png') }}" class="img-fluid" alt="SOP PENANGANAN PENGADUAN MASYARAKAT MELALUI SMS LAPOR"></div>
						<p class="text-center mt-4">SOP PENANGANAN PENGADUAN MASYARAKAT MELALUI SMS LAPOR</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('script')
<script type="text/javascript">
	
$(".slideshow-toggler").click(function(event) {
	event.preventDefault();
	if($(this).hasClass("active"))
		return;

	$(".slideshow.show").removeClass("show");
	$(".slideshow-toggler.active").removeClass("active");

	const target = $(this).attr("href");
	$(target).addClass("show");
	$(this).addClass("active");

});

</script>
@endsection