<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Permohonansampel;
use Auth;
use DataTables;

class PemohonController extends Controller
{
    public function index()
    {
        return view('pages.pemohon.home');
    }

    public function daftar_permohonan()
    {
        $c = Permohonansampel::where('user_id', '=', Auth::user()->id)->get();

        if (Auth::user()->role == 'pemohon') {
            return view('pages.pemohon.permohonan.all', [
                'c' => $c,
            ]);
        }
    }

    // **
    // handler daftar permohonan datatables
    public function datatable_daftar_permohonan()
    {
        $result = Permohonansampel::where('user_id', '=', Auth::user()->id)->orderBy('id', 'DESC')->get();
        $no     = 0;
        foreach ($result as $value) {
            $no++;
            $row = [];

            $row[] = $no;

            $row[] = $value->kode;

            $row[] = $value->nama;

            $row[] = date('d-m-Y', strtotime($value->created_at));

            // $jp = Jp::where('id', '=', $value->jenis_permohonan_id)->first();

            // $row[] = $jp->jenis_permohonan;

            if ($value->status == 0) {
                $status = '<span class="text-danger">Belum Diterima</span>';
                $aksi   = '-';
            } else if ($value->status == 1) {
                if ($value->verifikasi_cs == 1 && $value->verifikasi_pemohon == 0 && $value->status_pembayaran == 0) {
                    $status = '<span class="text-success">Sudah Diverifikasi di CS</span>';
                    $aksi   = '<a href="' . route('pemohon.verifikasi-ulang-permohonan', ['id' => $value->id]) . '" title="Verifikasi" class="btn btn-sm btn-primary" style="filter: drop-shadow(3px 10px 4px black);">Verifikasi</a>';
                } else if ($value->verifikasi_cs == 1 && $value->verifikasi_pemohon == 1 && $value->status_pembayaran == 0) {
                    $status = '<span class="text-success">Sudah Diterima</span>';
                    $aksi   = '<a href="' . route('pemohon.pembayaran', ['id' => $value->id]) . '" title="Lakukan Pembayaran" class="btn btn-sm btn-primary" style="filter: drop-shadow(3px 10px 4px black);">Lakukan Pembayaran</a>';
                } else if ($value->verifikasi_cs == 1 && $value->verifikasi_pemohon == 1 && $value->status_pembayaran == 1) {
                    $status = '<span class="text-success">Belum Verifikasi Pembayaran</span>';
                    $aksi   = '-';
                } else if ($value->verifikasi_cs == 1 && $value->verifikasi_pemohon == 1 && $value->status_pembayaran == 2) {
                    $status = '<span class="text-success">Bukti Bayar TDK Sesuai</span>';
                    $aksi   = '<a href="' . route('pemohon.cek-pesan-dikembalikan', ['id' => $value->id]) . '" title="lihat alasan pengembalian" class="btn btn-sm btn-primary" style="filter: drop-shadow(3px 10px 4px black);">Lihat Alasan Dikembalikan</a>';
                }
            } else if ($value->status == 2) {
                $status = '<span class="text-success">Sudah Pembayaran</span>';
                $aksi   = '-';
            } else if ($value->status == 3) {
                $status = '<span class="text-success">Pengkodean Sampel</span>';
                $aksi   = '-';
            } else if ($value->status == 4) {
                $status = '<span class="text-success">Pengujian</span>';
                $aksi   = '-';
            } else if ($value->status == 5) {
                $status = '<span class="text-success">Selesai Pengujian</span>';
                $aksi   = '-';
            } else if ($value->status == 6) {
                $status = '<span class="text-success">Verifikasi CS</span>';
                $aksi   = '-';
            } else if ($value->status == 7) {
                $status = '<span class="text-success">Verifikasi Sertifikat</span>';
                $aksi   = '-';
            } else if ($value->status == 8) {
                $status = '<span class="text-success">Selesai TTD Sertifikat</span>';
                if ($value->istte == 0) {
                    $aksi   = '<a href="' . route('pemohon.cetak-sertifikat', ['id' => $value->id]) . '" target="_blank" class="btn btn-sm btn-success">Sertifikat</a>';
                } else {
                    $aksi = '<a href="/public/storage/certificate/' . $value->pdf . '" target="_blank" class="btn btn-sm btn-success">Sertifikat</a>';
                }
            } else {
                $status = '-';
                $aksi   = '';
            }

            $row[] = $status;
            $row[] = $aksi;

            // $row[] = '<a href="' . route('admin.berita.edit', ['id' => $value->id]) . '" title="Edit" class="btn btn-sm btn-primary" style="filter: drop-shadow(3px 10px 4px black);"><i class="ti-pencil-alt"></i> edit</a>&nbsp;
            //     <a href="javascript:void" onclick="delData(' . $value->id . ')" style="filter: drop-shadow(3px 10px 4px black);" title="Delete" class="btn btn-sm btn-danger"><i class="ti-trash"></i>hapus</a>
            //     ';
            $data[] = $row;
        }
        return DataTables::of($data)->escapeColumns([])->make(true);
    }
}
