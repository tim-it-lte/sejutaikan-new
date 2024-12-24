<?php

// **
// use controller
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\CSController;
use App\Http\Controllers\JPController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ParameterController;
use App\Http\Controllers\PemohonController;
use App\Http\Controllers\PengangkutController;
use App\Http\Controllers\PengujianController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\PimpinanController;
use App\Http\Controllers\SopController;
use App\Http\Controllers\SurveiController;
use App\Http\Controllers\VerifikatorController;
use App\Http\Controllers\TestingController;

// **
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('/');

// Route::get('tentang', [LandingController::class, 'tentang'])->name('landing.tentang');
// Pengganti tentang
Route::get('profil', [LandingController::class, 'profil'])->name('landing.profil');

// parameter
Route::get('/datatable-parameter', [LandingController::class, 'datatable_parameter'])->name('landing.datatable-parameter');

// **
// formulir permohonan pengujian
Route::get('/permohonan-pengujian', [LandingController::class, 'permohonan_pengujian'])->name('landing.permohonan-pengujian');
Route::post('/permohonan-pengujian', [LandingController::class, 'post_permohonan_pengujian'])->name('landing.post-permohonan-pengujian');

// **
// pantau status permohonan
Route::get('/pantau-permohonan', [LandingController::class, 'pantau_permohonan'])->name('landing.pantau-permohonan');
Route::get('/datatable-pantau-permohonan', [LandingController::class, 'datatable_pantau_permohonan'])->name('landing.datatable-pantau-permohonan');

// **
// pengumuman
Route::get('/pengumuman', [LandingController::class, 'pengumuman'])->name('landing.pengumuman');
Route::get('/datatable-pengumuman', [LandingController::class, 'datatable_pengumuman'])->name('landing.datatable-pengumuman');

// **
// survei
Route::get('/survei', [LandingController::class, 'survei'])->name('landing.survei');
Route::post('/proses-survei', [LandingController::class, 'proses_survei'])->name('landing.proses-survei');

// **
// berita
Route::get('/berita', [LandingController::class, 'berita'])->name('landing.berita');
Route::get('/berita/{slug}', [LandingController::class, 'berita_detail'])->name('landing.detail.berita');

// **
// register post
Route::post('/proses-registrasi', [LandingController::class, 'proses_registrasi'])->name('landing.proses-registrasi');

// **
// sop
Route::get('/sop', [LandingController::class, 'sop'])->name('landing.sop');

// **
// pangaduan
Route::get('/pengaduan', [LandingController::class, 'pengaduan'])->name('landing.pengaduan');
Route::post('/proses-pengaduan', [LandingController::class, 'proses_pengaduan'])->name('landing.proses-pengaduan');
Route::get('/alur-pengaduan', [LandingController::class, 'alur_pengaduan'])->name('landing.alur-pengaduan');
Route::get('/sop-pengaduan', [LandingController::class, 'sop_pengaduan'])->name('landing.sop-pengaduan');

//
Route::get('/alur-permohonan', [LandingController::class, 'alur_permohonan'])->name('landing.alur-permohonan');


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// **
// route dashboard admin
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.home');

    // **
    // survei
    Route::get('/admin/survei', [SurveiController::class, 'index'])->name('admin.all.survei');
    Route::get('/admin/datatable-survei', [SurveiController::class, 'datatables'])->name('admin.datatable-all.survei');
    Route::get('/admin/survei/detail/{id}', [SurveiController::class, 'detail'])->name('admin.detail.survei');
    Route::get('/admin/survei/destroy/{id}', [SurveiController::class, 'destroy'])->name('admin.destroy.survei');

    // **
    // handler berita
    Route::get('/admin/berita', [BeritaController::class, 'index'])->name('admin.berita.all');
    Route::get('/admin/datatables-berita', [BeritaController::class, 'datatables'])->name('admin.berita.all-datatables');
    Route::get('/admin/add-berita', [BeritaController::class, 'create'])->name('admin.berita.create');
    Route::post('/admin/add-berita', [BeritaController::class, 'store'])->name('admin.berita.store');
    Route::get('/admin/edit-berita/{id}', [BeritaController::class, 'edit'])->name('admin.berita.edit');
    Route::put('/admin/update-berita/{id}', [BeritaController::class, 'update'])->name('admin.berita.update');
    Route::get('/admin/delete-berita/{id}', [BeritaController::class, 'destroy'])->name('admin.berita.destroy');

    // **
    // daftar permohonan
    Route::get('/admin/permohonan', [AdminController::class, 'daftar_permohonan'])->name('admin.all.permohonan');
    Route::get('/admin/datatable-permohonan', [AdminController::class, 'datatable_daftar_permohonan'])->name('admin.datatable-all.permohonan');

    // **
    // handler pengumuman
    Route::get('/admin/pengumuman', [PengumumanController::class, 'index'])->name('admin.pengumuman.all');
    Route::get('/admin/datatables-pengumuman', [PengumumanController::class, 'datatables'])->name('admin.pengumuman.all-datatables');
    Route::get('/admin/add-pengumuman', [PengumumanController::class, 'create'])->name('admin.pengumuman.create');
    Route::post('/admin/add-pengumuman', [PengumumanController::class, 'store'])->name('admin.pengumuman.store');
    Route::get('/admin/edit-pengumuman/{id}', [PengumumanController::class, 'edit'])->name('admin.pengumuman.edit');
    Route::put('/admin/update-pengumuman/{id}', [PengumumanController::class, 'update'])->name('admin.pengumuman.update');
    Route::get('/admin/delete-pengumuman/{id}', [PengumumanController::class, 'destroy'])->name('admin.pengumuman.destroy');

    // **
    // handler master permohonan
    Route::get('/admin/master-data/jenis-permohonan', [JPController::class, 'index'])->name('admin.jenis-permohonan.all');
    Route::get('/admin/master-data/datatables-jenis-permohonan', [JPController::class, 'datatables'])->name('admin.jenis-permohonan.all-datatables');
    Route::get('/admin/master-data/add-jenis-permohonan', [JPController::class, 'create'])->name('admin.jenis-permohonan.create');
    Route::post('/admin/master-data/add-jenis-permohonan', [JPController::class, 'store'])->name('admin.jenis-permohonan.store');
    Route::get('/admin/master-data/edit-jenis-permohonan/{id}', [JPController::class, 'edit'])->name('admin.jenis-permohonan.edit');
    Route::put('/admin/master-data/update-jenis-permohonan/{id}', [JPController::class, 'update'])->name('admin.jenis-permohonan.update');
    Route::get('/admin/master-data/delete-jenis-permohonan/{id}', [JPController::class, 'destroy'])->name('admin.jenis-permohonan.destroy');

    // **
    // handler parameter
    Route::get('/admin/master-data/parameter', [ParameterController::class, 'index'])->name('admin.parameter.all');
    Route::get('/admin/master-data/datatables-parameter/{jp?}', [ParameterController::class, 'datatables'])->name('admin.parameter.all-datatables');
    Route::get('/admin/master-data/add-parameter', [ParameterController::class, 'create'])->name('admin.parameter.create');
    Route::post('/admin/master-data/add-parameter', [ParameterController::class, 'store'])->name('admin.parameter.store');
    Route::get('/admin/master-data/edit-parameter/{id}', [ParameterController::class, 'edit'])->name('admin.parameter.edit');
    Route::put('/admin/master-data/update-parameter/{id}', [ParameterController::class, 'update'])->name('admin.parameter.update');
    Route::get('/admin/master-data/delete-parameter/{id}', [ParameterController::class, 'destroy'])->name('admin.parameter.destroy');
    //
    Route::get('/admin/master-data/aktif-parameter/{id}', [ParameterController::class, 'aktif'])->name('admin.parameter.aktif');
    Route::post('/admin/master-data/proses-nonaktif-parameter', [ParameterController::class, 'proses_nonaktif'])->name('admin.parameter.proses-nonaktif');
    // Download PDF
    Route::get('/admin/master-data/parameter/download', [ParameterController::class, 'download'])->name('admin.parameter.download');

    // **
    // handler sop
    Route::get('/admin/sop', [SopController::class, 'index'])->name('admin.sop.all');
    Route::get('/admin/datatables-sop', [SopController::class, 'datatables'])->name('admin.sop.all-datatables');
    Route::get('/admin/add-sop', [SopController::class, 'create'])->name('admin.sop.create');
    Route::post('/admin/add-sop', [SopController::class, 'store'])->name('admin.sop.store');
    Route::get('/admin/edit-sop/{id}', [SopController::class, 'edit'])->name('admin.sop.edit');
    Route::put('/admin/update-sop/{id}', [SopController::class, 'update'])->name('admin.sop.update');
    Route::get('/admin/delete-sop/{id}', [SopController::class, 'destroy'])->name('admin.sop.destroy');

    Route::get('/admin/update_password/{email}/{newPassword}', [AdminController::class, 'update_password'])->name('admin.password.update');

    // **
    // handler Galeri
    Route::get('/admin/galeri', [AdminController::class, 'gallery_list'])->name('admin.gallery');
    Route::post('/admin/galeri/add', [AdminController::class, 'gallery_store'])->name('admin.gallery.add');
    Route::get('/admin/galeri/delete/{id}', [AdminController::class, 'gallery_destroy'])->name('admin.gallery.destroy');

});

// **
// route dashboard cs
Route::group(['middleware' => 'cs'], function () {
    Route::get('/cs', [CSController::class, 'index'])->name('cs.home');

    // **
    // daftar permohonan
    Route::get('/cs/permohonan', [CSController::class, 'daftar_permohonan'])->name('cs.all.permohonan');
    Route::get('/cs/datatable-permohonan', [CSController::class, 'datatable_daftar_permohonan'])->name('cs.datatable-all.permohonan');

    // verifikasi
    Route::get('/cs/verifikasi-permohonan/{id}', [CSController::class, 'verifikasi_permohonan'])->name('cs.verifikasi.permohonan');
    Route::post('/cs/verifikasi-data-permohonan/{id}', [CSController::class, 'verifikasi_data_permohonan'])->name('cs.verifikasi-data.permohonan');

    Route::post('/cs/proses-verifikasi-permohonan/{id}', [CSController::class, 'proses_verifikasi_permohonan'])->name('cs.proses-verifikasi.permohonan');

    //
    Route::get('/cs/permohonan/pengkodean-sampel', [CSController::class, 'daftar_pengkodean_sampel'])->name('cs.all.pengkodean-sampel');

    Route::get('/cs/datatable-permohonan/pengkodean-sampel', [CSController::class, 'datatable_pengkodean_sampel'])->name('cs.datatable-all.pengkodean-sampel');
    //
    Route::get('/cs/pengkodean-permohonan/{id}', [CSController::class, 'pengkodean_permohonan'])->name('cs.pengkodean-permohonan.permohonan');
    Route::post('/cs/proses-pengkodean-permohonan/{id}', [CSController::class, 'proses_pengkodean_permohonan'])->name('cs.proses-pengkodean-permohonan.permohonan');
    //
    Route::get('/cs/permohonan/verifikasi_pengujian', [CSController::class, 'daftar_verifikasi_pengujian'])->name('cs.all.verifikasi_pengujian');

    Route::get('/cs/datatable-permohonan/verifikasi_pengujian', [CSController::class, 'datatable_verifikasi_pengujian'])->name('cs.datatable-all.verifikasi_pengujian');

    //
    Route::get('/cs/verifikasi-pengujian/{id}', [CSController::class, 'verifikasi_pengujian'])->name('cs.verifikasi-pengujian.permohonan');

    Route::post('/cs/proses-verifikasi-pengujian/{id}', [CSController::class, 'proses_verifikasi_pengujian'])->name('cs.proses-verifikasi-pengujian.permohonan');

    //
    Route::get('/cs/permohonan/terbit_sertifikat', [CSController::class, 'daftar_terbit_sertifikat'])->name('cs.all.terbit_sertifikat');

    Route::get('/cs/datatable-permohonan/terbit_sertifikat', [CSController::class, 'datatable_terbit_sertifikat'])->name('cs.datatable-all.terbit_sertifikat');

    // download sertifikat
    Route::get('/cs/cetak-sertifikat/{id}', [PermohonanController::class, 'cetak_sertifikat'])->name('cs.cetak-sertifikat');

    // report
    Route::get('/cs/report', [CSController::class, 'report'])->name('cs.all.report');
    Route::get('/cs/datatable-report/{tahun?}/{bulan?}', [CSController::class, 'datatable_report'])->name('cs.datatable-all.report');
    //
    Route::get('/cs/pdf-report/{tahun?}/{bulan?}', [CSController::class, 'pdf_report'])->name('cs.all.pdf-report');

    // semua data permohonan sampel
    Route::get('/cs/all-permohonan-sampel', [CSController::class, 'all_permohonan_sampel'])->name('cs.all.permohonan-sampel');
    Route::get('/cs/datatable-all-permohonan-sampel/{tahun?}/{bulan?}', [CSController::class, 'datatable_all_permohonan_sampel'])->name('cs.datatable-all-permohonan-sampel');
    Route::get('/cs/detail-all-permohonan-sampel/{id}', [CSController::class, 'detail_all_permohonan_sampel'])->name('cs.detail-all-permohonan-sampel');


});

// **
// route dashboard pemohon
Route::group(['middleware' => 'pemohon'], function () {
    Route::get('/pemohon', [PemohonController::class, 'index'])->name('pemohon.home');

    // **
    // daftar permohonan
    Route::get('/pemohon/permohonan', [PemohonController::class, 'daftar_permohonan'])->name('pemohon.all.permohonan');
    Route::get('/pemohon/datatable-permohonan', [PemohonController::class, 'datatable_daftar_permohonan'])->name('pemohon.datatable-all.permohonan');

    // **
    // handler pengajuan permohonan
    Route::get('/pemohon/ajukan-permohonan', [PermohonanController::class, 'ajukan_permohonan'])->name('pemohon.ajukan-permohonan');
    Route::post('/pemohon/verifikasi-ajuan-permohonan', [PermohonanController::class, 'verifikasi_ajuan_permohonan'])->name('pemohon.verifikasi-ajuan-permohonan');

    Route::post('/pemohon/proses-ajuan-permohonan', [PermohonanController::class, 'proses_ajuan_permohonan'])->name('pemohon.proses-ajuan-permohonan');

    // **
    // verifikasi ulang permohon
    Route::get('/pemohon/verifikasi-ulang/permohonan/{id}', [PermohonanController::class, 'verifikasi_ulang_permohonan'])->name('pemohon.verifikasi-ulang-permohonan');
    //
    Route::post('/pemohon/proses-verifikasi-ulang/permohonan/{id}', [PermohonanController::class, 'proses_verifikasi_ulang_permohonan'])->name('pemohon.proses_verifikasi-ulang-permohonan');

    // **
    // pilih parameter lainnya
    Route::get('/pemohon/pilih-parameter-lainnya/permohonan/{id}', [PermohonanController::class, 'pilih_parameter_lainnya'])->name('pemohon.pilih-parameter-lainnya');
    Route::post('/pemohon/verifikasi-pilih-parameter-lainnya/permohonan/{id}', [PermohonanController::class, 'verifikasi_pilih_parameter_lainnya'])->name('pemohon.verifikasi-pilih-parameter-lainnya');
    //
    Route::post('/pemohon/proses-pilih-parameter-lainnya/permohonan/{id}', [PermohonanController::class, 'proses_pilih_parameter_lainnya'])->name('pemohon.proses-pilih-parameter-lainnya');

    // pembayaran
    Route::get('/pemohon/pembayaran/{id}', [PermohonanController::class, 'pembayaran'])->name('pemohon.pembayaran');
    Route::post('/pemohon/proses-pembayaran/{id}', [PermohonanController::class, 'proses_pembayaran'])->name('pemohon.proses-pembayaran');

    // if dikembalikan bukti bayar
    Route::get('/pemohon/cek-pesan-dikembalikan/{id}', [PermohonanController::class, 'cek_pesan_dikembalikan'])->name('pemohon.cek-pesan-dikembalikan');

    // download sertifikat
    Route::get('/pemohon/cetak-sertifikat/{id}', [PermohonanController::class, 'cetak_sertifikat'])->name('pemohon.cetak-sertifikat');

});

// **
// route dashboard pengujian
Route::group(['middleware' => 'pengujian'], function () {
    Route::get('/pengujian', [PengujianController::class, 'index'])->name('pengujian.home');

    // **
    // handler segera pengujian
    Route::get('/pengujian/segera-pengujian', [PengujianController::class, 'segera_pengujian'])->name('pengujian.segera-pengujian');
    Route::get('/pengujian/segera-pengujian-datatable', [PengujianController::class, 'segera_pengujian_datatable'])->name('pengujian.segera-pengujian-datatable');
    //
    Route::get('/pengujian/segera-pengujian-detail/{id}', [PengujianController::class, 'segera_pengujian_detail'])->name('pengujian.segera-pengujian-detail');
    // **
    // selesai pengujian
    Route::get('/pengujian/selesai-pengujian-action/{id}', [PengujianController::class, 'selesai_pengujian_action'])->name('pengujian.selesai-pengujian-action');
    Route::post('/pengujian/selesai-pengujian-proses/{id}', [PengujianController::class, 'selesai_pengujian_proses'])->name('pengujian.selesai-pengujian-proses');

    // **
    // handler selesai pengujian
    Route::get('/pengujian/selesai-pengujian', [PengujianController::class, 'selesai_pengujian'])->name('pengujian.selesai-pengujian');
    Route::get('/pengujian/selesai-pengujian-datatable', [PengujianController::class, 'selesai_pengujian_datatable'])->name('pengujian.selesai-pengujian-datatable');
    //
    Route::get('/pengujian/selesai-pengujian-detail/{id}', [PengujianController::class, 'selesai_pengujian_detail'])->name('pengujian.selesai-pengujian-detail');

    // **
    // handler pengujian dikembalikan
    Route::get('/pengujian/pengujian-dikembalikan', [PengujianController::class, 'pengujian_dikembalikan'])->name('pengujian.pengujian-dikembalikan');
    Route::get('/pengujian/pengujian-dikembalikan-datatable', [PengujianController::class, 'pengujian_dikembalikan_datatable'])->name('pengujian.pengujian-dikembalikan-datatable');
    //
    Route::get('/pengujian/edit-pengujian-dikembalikan/{id}', [PengujianController::class, 'edit_pengujian_dikembalikan'])->name('pengujian.edit-pengujian-dikembalikan');
    Route::put('/pengujian/edit-pengujian-dikembalikan-proses/{id}', [PengujianController::class, 'edit_pengujian_dikembalikan_proses'])->name('pengujian.edit-pengujian-dikembalikan-proses');

});

// **
// route dashboard pimpinan
Route::group(['middleware' => 'pimpinan'], function () {
    Route::get('/pimpinan', [PimpinanController::class, 'index'])->name('pimpinan.home');

    // **
    // daftar permohonan
    Route::get('/pimpinan/permohonan', [PimpinanController::class, 'daftar_permohonan'])->name('pimpinan.all.permohonan');
    Route::get('/pimpinan/datatable-permohonan', [PimpinanController::class, 'datatable_daftar_permohonan'])->name('pimpinan.datatable-all.permohonan');

    // detail
    Route::get('/pimpinan/permohonan-detail/{id}', [PimpinanController::class, 'detail_permohonan'])->name('pimpinan.detail.permohonan');
    // bubuhi tandatangan
    Route::get('/pimpinan/permohonan-tanda-tangan/{id}', [PimpinanController::class, 'ttd_permohonan'])->name('pimpinan.ttd.permohonan');

    // ttd
    Route::get('/pimpinan/ttd', [PimpinanController::class, 'edit_ttd'])->name('pimpinan.edit.ttd');
    Route::post('/pimpinan/proses-ttd', [PimpinanController::class, 'update_ttd'])->name('pimpinan.update.ttd');

    // download sertifikat
    Route::get('/pimpinan/cetak-sertifikat/{id}', [PermohonanController::class, 'cetak_sertifikat'])->name('pimpinan.cetak-sertifikat');
    
    // new
    // masukkan phprase
    // tte
    Route::post('/pimpinan/tte-action/{id}', [PimpinanController::class, 'tte_action'])->name('pimpinan.tte.post');
    

});

//  **
// route dashboard verifikator
Route::group(['middleware' => 'verifikator'], function () {
    Route::get('/verifikator', [VerifikatorController::class, 'index'])->name('verifikator.home');

    // **
    // daftar permohonan
    Route::get('/verifikator/permohonan', [VerifikatorController::class, 'daftar_permohonan'])->name('verifikator.all.permohonan');
    Route::get('/verifikator/datatable-permohonan', [VerifikatorController::class, 'datatable_daftar_permohonan'])->name('verifikator.datatable-all.permohonan');

    Route::get('/verifikator/permohonan/{id}/verifikasi', [VerifikatorController::class, 'verifikasi_permohonan'])->name('verifikator.verifikasi.permohonan');

    Route::get('/verifikator/permohonan/{id}/detail', [VerifikatorController::class, 'detail_permohonan'])->name('verifikator.detail.permohonan');

    // **
    // handler sertifikat
    Route::get('/verifikator/cetak-sertifikat/{id}', [PermohonanController::class, 'cetak_sertifikat'])->name('verifikator.cetak-sertifikat');
    // ** add
    Route::get('/verifikator/permohonan/{id}/kembalikan', [VerifikatorController::class, 'kembalikan_permohonan'])->name('verifikator.kembalikan.permohonan');

});

// **
// route dashboard keuangan
Route::group(['middleware' => 'keuangan'], function () {
    Route::get('/keuangan', [KeuanganController::class, 'index'])->name('keuangan.home');

    // **
    // handler belum pembayaran
    Route::get('/keuangan/belum-pembayaran', [KeuanganController::class, 'belum_pembayaran'])->name('keuangan.belum-pembayaran');
    Route::get('/keuangan/belum-pembayaran-datatable', [KeuanganController::class, 'belum_pembayaran_datatable'])->name('keuangan.belum-pembayaran-datatable');

    // **
    // handler pembayaran
    Route::get('/keuangan/sudah-pembayaran', [KeuanganController::class, 'sudah_pembayaran'])->name('keuangan.sudah-pembayaran');
    Route::get('/keuangan/sudah-pembayaran-datatable/{tahun?}', [KeuanganController::class, 'sudah_pembayaran_datatable'])->name('keuangan.sudah-pembayaran-datatable');
    //
    // cetak excel
    Route::get('/keuangan/sudah-pembayaran-cetak/{tahun?}', [KeuanganController::class, 'sudah_pembayaran_cetak'])->name('keuangan.sudah-pembayaran-cetak');
    //
    Route::get('/keuangan/pembayaran/detail-sudah-membayar/{id}', [KeuanganController::class, 'sudah_membayar_detail'])->name('keuangan.sudah-membayar-detail.pembayaran');
    // cetak surat ketetapan
    Route::get('/keuangan/pembayaran/cetak-sk/{id}', [KeuanganController::class, 'cetak_sk'])->name('keuangan.sudah-membayar-detail.cetak-sk');

    // **
    // handler verifikasi view
    Route::get('/keuangan/pembayaran/verifikasi/{id}', [KeuanganController::class, 'verifikasi_view'])->name('keuangan.verifikasi.pembayaran');

    Route::get('/keuangan/pembayaran/proses-verifikasi/{id}', [KeuanganController::class, 'verifikasi_proses'])->name('keuangan.verifikasi-proses.pembayaran');

    // **
    // handler kembalikan
    Route::get('/keuangan/pembayaran/kembalikan/{id}', [KeuanganController::class, 'kembalikan_view'])->name('keuangan.kembalikan.pembayaran');
    Route::post('/keuangan/pembayaran/proses-kembalikan/{id}', [KeuanganController::class, 'kembalikan_proses'])->name('keuangan.kembalikan-proses.pembayaran');
    // detail
    Route::get('/keuangan/pembayaran/detail-kembalikan/{id}', [KeuanganController::class, 'kembalikan_detail'])->name('keuangan.kembalikan-detail.pembayaran');

});

Route::group(['middleware' => 'pengangkut'], function () {
    Route::get('/pengangkut', [PengangkutController::class, 'index'])->name('pengangkut.home');

    // **
    // handler pengangkut
    Route::get('/pengangkut/diangkut', [PengangkutController::class, 'diangkut'])->name('pengangkut.diangkut');
    Route::get('/pengangkut/diangkut-datatable', [PengangkutController::class, 'diangkut_datatable'])->name('pengangkut.diangkut-datatable');
    // detail
    Route::get('/pengangkut/diangkut-detail/{id}', [PengangkutController::class, 'diangkut_detail'])->name('pengangkut.diangkut-detail');
    //
    Route::get('/pengangkut/diangkut-view/{id}', [PengangkutController::class, 'diangkut_view'])->name('pengangkut.diangkut-view');
    Route::post('/pengangkut/diangkut-proses/{id}', [PengangkutController::class, 'diangkut_proses'])->name('pengangkut.diangkut-proses');

    // **
    // handler selesai terangkut
    Route::get('/pengangkut/selesai-diangkut', [PengangkutController::class, 'selesai_diangkut'])->name('pengangkut.selesai-diangkut');
    Route::get('/pengangkut/selesai-diangkut-datatable', [PengangkutController::class, 'selesai_diangkut_datatable'])->name('pengangkut.selesai-diangkut-datatable');

});

// CONTROLLER UNTUK TESTING
Route::group(['prefix' => 'test'], function () {
    Route::get('/', [TestingController::class, 'index'])->name('testing.home');
    Route::get('/create_kdp', [TestingController::class, 'createKodePermohonan'])->name('testing.createKdp');
});