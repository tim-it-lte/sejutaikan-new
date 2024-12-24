@extends('layouts.landing.master')

@section('title','Pengaduan')

@section('link')
<style type="text/css">
	
.basic-list {
	line-height:1.5;
	list-style: disc;
}

</style>
@endsection

@include('layouts.landing.partials.breadcrumb', [ 'breadLink' => 'Pengaduan', 'breadTitle' => 'Alur Pengaduan Masyarakat' ])

@section('content')
<section class="container py-5">
	<div class="row justify-content-center">
		<div class="col-md-10 col-lg-8">
			<img src="{{ asset('app-assets/landing-new/images/alur_pengaduan_masyarakat.png') }}" class="img-fluid" alt="Alur Pengaduan Masyarakat">
			<div class="row justify-content-center bg-light border my-4 py-4">
				<div class="col-auto">
					<p class="text-center">
						<b>SP4N-LAPOR!</b>
					</p>
					<p class="text-center mb-0">
						<a href="mailto:wbs.bpmppsulsel@gmail.com" target="_blank" class="btn btn-lg rounded-pill btn-danger" data-aos="fade-up"><i class="fas fa-envelope"></i> wbs.bpmppsulsel@gmail.com</a>
					</p>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="container mb-5">
	<div class="row justify-content-center">
		<div class="col-md-6 col-lg-4">
			<h3>Apa itu</h3>
			<h1><span class="ree-tt">Whistle Blowing System (WBS)</span>?</h1>
		</div>
		<div class="col-md-6 col-lg-4">
			<p class="pt-3 pt-md-5"><i>Whistle Blowing System</i> (WBS) merupakan sarana pelaporan / pengaduan mengenai tindakan (perbuatan/perilaku/kejadian) yang terjadi dilingkungan UPT. Balai Penerapan Mutu Produk Perikanan.</p>
		</div>
	</div>
</section>
<section class="container my-5 pt85">
	<div class="row justify-content-center align-items-center">
		<div class="col-md-6 col-lg-4">
			<div class="my-4">
				<img src="{{ asset('app-assets/landing-new/images/illustration/unsur-alur-pengaduan.svg') }}" alt="Ilustrasi bertanya" class="img-fluid">
			</div>
		</div>
		<div class="col-auto">
			<h1 class="mb-4" style="max-width: 530px;"><span class="ree-tt">Unsur-unsur dalam pelaporan / pengaduan</span>?</h1>
			<ul class="basic-list">
				<li><strong>What: </strong>Perbuatan berindikasi pelanggaran yang diketahui.</li>
				<li><strong>Where: </strong>Dimana perbuatan tersebut dilakukan.</li>
				<li><strong>When: </strong>Kapan perbuatan tersebut dilakukan.</li>
				<li><strong>Who: </strong>Siapa saja yang terlibat dalam perbuatan tersebut</li>
				<li><strong>How: </strong>Bagaimana perbuatan tersebut dilakukan (modus, cara, dsb).</li>
			</ul>
		</div>
	</div>
</section>
<section class="container my-5 pt85">
	<div class="row">
		<div class="col-md">
			<h3><span class="ree-tt">Whistle Blowing System (WBS)</span></h3>
			<ul class="basic-list">
				<li>Perbuatan melawan hukum, memperkaya diri orang/badan lain yang merugikan keuangan/perekonomian negara.</li>
				<li>Menyalahgunakan kewenangan karena jabatan/kedudukan yang dapat merugikan keuangan/perekonomian negara.</li>
				<li>Penggelapan dalam jabatan.</li>
				<li>Pemerasan dalam jabatan.</li>
				<li>Tindak pidana yang berkaitan dengan pemborongan.</li>
				<li>Delik gratifikasi.</li>
				<li>Suap menyuap.</li>
				<li>Benturan kepentingan dalam pengadaan.</li>
			</ul>
		</div>
		<div class="col-md">
			<h3><span class="ree-tt">Perlindungan Terhadap Pelapor atau pihak terkait</span></h3>
			<ul class="basic-list">
				<li>Menjamin kerahasiaan terhadap identitas Pelapor maupun pihak-pihak yang mempunyai keterkaitan dengan pelaporan pelanggaran tersebut.</li>
				<li>Menjamin perlindungan terhadap Pelapor dari segala bentuk ancaman, intimidasi, ataupun tindakan tidak menyenangkan dari pihak manapun.</li>
				<li>Kerahasiaan terhadap identitas dan perlindungan terhadap Pelapor tersebut juga berlaku bagi para pihak yang melaksanakan Investigasi maupun pihak-pihak yang memberikan informasi terkait dengan Pengaduan tersebut.</li>
				<li>Ketentuan-ketentuan kerahasiaan dan perlindungan terhadap Pelapor tersebut akan tetap berlaku selama Pelapor menjaga kerahasiaan pelanggaran yang diadukan kepada pihak manapun, dengan cara, bentuk dan kondisi apapun, dan tidak/ belum menjadi konsumsi publik baik sebelum atau setelah pengaduan.</li>
			</ul>
		</div>
	</div>
</section>
@endsection