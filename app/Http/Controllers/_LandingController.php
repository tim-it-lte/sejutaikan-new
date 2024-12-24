<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Berita;
use App\Models\Jp;
use App\Models\Pengaduan;
use App\Models\Pengumuman;
use App\Models\Permohonansampel;
use App\Models\Pertanyaan;
use App\Models\Responden;
use App\Models\Sop;
use App\Models\Survei;
use App\Models\User;
use DataTables;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class LandingController extends Controller {
    public function index() {
        $beritas = Berita::latest()->get();
        return view('pages.landing.beranda', [
            'beritas' => $beritas,
        ]);
    }

    public function sop() {
        $sop     = Sop::all();
        $beritas = Berita::latest()->limit(4)->get();
        return view('pages.landing.sop.index', [
            'sop'     => $sop,
            'beritas' => $beritas,
        ]);
    }

    public function berita() {
        $beritas = Berita::latest()->get();
        return view('pages.landing.berita.all', [
            'beritas' => $beritas,
        ]);
    }

    public function berita_detail($slug) {
        $beritas = Berita::latest()->limit(4)->get();
        $berita  = Berita::where('slug_judul', '=', $slug)->first();
        return view('pages.landing.berita.detail', [
            'berita'  => $berita,
            'beritas' => $beritas,
        ]);
    }

    public function survei() {
        return view('pages.landing.survei');
    }

    public function proses_survei(Request $request) {
        $this->validate($request, [
            'nama'          => 'required',
            'email'         => 'required',
            'pekerjaan'     => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $insert_responden = Responden::create([
            'nama'          => $request->nama,
            'email'         => $request->email,
            'pekerjaan'     => $request->pekerjaan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'saran'         => $request->saran,
        ]);

        $jml_pertanyaan = Pertanyaan::all()->count();

        $i = 1;
        for ($i = 1; $i <= $jml_pertanyaan; $i++) {
            $insert = Survei::create([
                'pertanyaan_id' => $i,
                'responden_id'  => $insert_responden->id,
                'jawaban'       => $request->input('jawab_' . $i) == NULL ? 'Sangat Baik' : $request->input('jawab_' . $i),
            ]);
        }

        if ($insert) {
            return view('pages.landing.sukses-survei');
        } else {
            return redirect()->back()->with('error', 'Gagal Kirim Data');
        }
    }

    // **
    // permohonan pengujian
    public function permohonan_pengujian() {
        return view('pages.landing.form-permohonan-pengujian');
    }

    public function post_permohonan_pengujian(Request $request) {
        $this->validate($request, [
            'nama'             => 'required',
            'email'            => 'required|email|unique:users,email',
            'telp'             => 'required',
            'alamat'           => 'required',
            'jenis_permohonan' => 'required',
        ]);

        $random = Str::random(6);

        $insert_user = User::create([
            'name'        => $request->nama,
            'email'       => $request->email,
            'password'    => Hash::make($random),
            'role'        => 'pemohon',
            'ps_string'   => $random,
            'is_verified' => 1,
        ]);

        if ($insert_user) {
            $dataResult = Permohonan::all()->count();

            if ($dataResult >= 1) {
                $last = Permohonan::whereRaw('kode = (select max(`kode`) from permohonans)')->first();

                $urutan = (int) substr($last->kode, 4, 5);

                $urutan++;
            } else {

                $urutan = (int) $dataResult + 1;
            }

            $awalKode           = "KDP-";
            $kodePermohonanBaru = $awalKode . sprintf("%05s", $urutan);

            $insert_permohonan = Permohonan::create([
                'user_id'          => $insert_user->id,
                'kode'             => $kodePermohonanBaru,
                'nama_pemilik'     => $request->nama,
                'alamat'           => $request->alamat,
                'jenis_permohonan' => $request->jenis_permohonan,
                'telp'             => $request->telp,
            ]);

            // **
            // handle email notifikasi
            $email = $request->email;
            $data  = [
                'title'    => 'Selamat datang!',
                'email'    => $request->email,
                'password' => $insert_user->ps_string,
                'kode'     => $insert_permohonan->kode,
            ];
            Mail::to($email)->send(new SendMail($data));

            // **
            return view('pages.landing.sukses-permohonan', [
                'res_email'       => $request->email,
                'res_password'    => $insert_user->ps_string,
                'kode_permohonan' => $insert_permohonan->kode,
            ]);
        } else {
            return redirect()->back()->with('error', 'Gagal Kirim Data');
        }
    }

    // **
    // handle pantau permohonan
    public function pantau_permohonan() {
        $c = Permohonansampel::all();

        return view('pages.landing.pantau-permohonan', [
            'c' => $c,
        ]);
    }

    public function datatable_pantau_permohonan() {
        $result = Permohonansampel::latest()->get();
        $no     = 0;
        foreach ($result as $value) {
            $no++;
            $row = [];

            $row[] = $no;

            $row[] = $value->kode;

            $row[] = $value->nama;

            $row[] = date('d-m-Y', strtotime($value->created_at));

            $getjp = Jp::where('id', '=', $value->jenis_permohonan_id)->first();

            // $row[] = $getjp->jenis_permohonan;

            // if ($value->status == 0) {
            //     $status = '<span class="text-danger">Belum Diterima</span>';
            // } else if ($value->status == 1) {
            //     $status = '<span class="text-success">Sudah Diterima</span>';
            // } else {
            //     $status = '<span class="text-info">Pengujian Lab</span>';
            // }

            if ($value->status == 0) {
                $status = '<span class="text-danger">Belum Diterima</span>';
            } else if ($value->status == 1) {
                if ($value->verifikasi_cs == 1 && $value->verifikasi_pemohon == 0 && $value->status_pembayaran == 0) {
                    $status = '<span class="text-success">Sudah Diverifikasi Di CS</span>';
                } else if ($value->verifikasi_cs == 1 && $value->verifikasi_pemohon == 1 && $value->status_pembayaran == 0) {
                    $status = '<span class="text-success">Sudah Diterima</span>';
                } else if ($value->verifikasi_cs == 1 && $value->verifikasi_pemohon == 1 && $value->status_pembayaran == 1) {
                    $status = '<span class="text-success">Belum Verifikasi Pembayaran</span>';
                } else if ($value->verifikasi_cs == 1 && $value->verifikasi_pemohon == 1 && $value->status_pembayaran == 2) {
                    $status = '<span class="text-success">Bukti Bayar TDK Sesuai</span>';
                }
            } else if ($value->status == 2) {
                $status = '<span class="text-success">Sudah Pembayaran</span>';
            } else if ($value->status == 3) {
                $status = '<span class="text-success">Pengkodean Sampel</span>';
            } else if ($value->status == 4) {
                $status = '<span class="text-success">Pengujian</span>';
            } else if ($value->status == 5) {
                $status = '<span class="text-success">Selesai Pengujian</span>';
            } else if ($value->status == 6) {
                $status = '<span class="text-success">Verifikasi CS</span>';
            } else if ($value->status == 7) {
                $status = '<span class="text-success">Verifikasi Sertifikat</span>';
            } else if ($value->status == 8) {
                $status = '<span class="text-success">Selesai TTD Sertifikat</span>';
            } else {
                $status = '-';
            }

            $row[] = $status;

            $data[] = $row;
        }
        return DataTables::of($data)->escapeColumns([])->make(true);
    }

    // **
    // pengumuman
    public function pengumuman() {
        $c = Pengumuman::all();

        return view('pages.landing.pengumuman', [
            'c' => $c,
        ]);
    }

    public function datatable_pengumuman() {
        $result = Pengumuman::latest()->get();
        $no     = 0;
        foreach ($result as $value) {
            $no++;
            $row = [];

            $row[] = $no;

            $row[] = $value->judul;

            $row[] = '<a target="_blank" href="' . asset('storage/pengumuman/' . $value->lampiran) . '" class="btn btn-sm btn-success" style="filter: drop-shadow(3px 10px 4px black);">Download</a>';

            $data[] = $row;
        }
        return DataTables::of($data)->escapeColumns([])->make(true);
    }

    // **
    // registrasi
    public function proses_registrasi(Request $request) {
        $this->validate($request, [
            'nama'                => 'required',
            'email'               => 'required|email|unique:users,email',
            'password'            => 'required|min:6',
            'konfirmasi_password' => 'required_with:password|same:password|min:6',
        ]);

        $insert = User::create([
            'name'        => $request->nama,
            'email'       => $request->email,
            'password'    => Hash::make($request->password),
            'role'        => 'pemohon',
            'ps_string'   => $request->password,
            'is_verified' => 1,
        ]);

        if ($insert) {
            return view('pages.landing.sukses-registrasi');
        } else {
            return redirect()->back()->with('error', 'Gagal Kirim Data');
        }
    }

    // **
    // pengaduan
    public function pengaduan() {
        return view('pages.landing.pengaduan');
    }

    public function proses_pengaduan(Request $request) {
        $this->validate($request, [
            'nama'    => 'required',
            'email'   => 'required',
            'subject' => 'required',
            'pesan'   => 'required',
        ]);

        $insert = Pengaduan::create([
            'nama'    => $request->nama,
            'email'   => $request->email,
            'subject' => $request->subject,
            'pesan'   => $request->pesan,
        ]);

        if ($insert) {
            return view('pages.landing.sukses-pengaduan');
        } else {
            return redirect()->back()->with('error', 'Gagal Kirim Data');
        }
    }
    
    public function alur_permohonan() {
        return view('pages.landing.alur-permohonan');
    }
    
    // handler tentang
    public function tentang() {
        return view('pages.landing.tentang');
    }
}
