<?php

namespace App\Http\Controllers;

use App\Exports\ExcelExport;
use App\Models\Permohonanparameter;
use App\Models\Permohonansampel;
use Auth;
use DataTables;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class KeuanganController extends Controller {
    public function index() {
        $belum_bayar = Permohonansampel::where([
            ['status', '=', 1],
            ['verifikasi_cs', '=', 1],
            ['verifikasi_pemohon', '=', 1],
            ['status_pembayaran', '=', 0],
        ])->get();

        $dikembalikan = Permohonansampel::where([
            ['status', '=', 1],
            ['verifikasi_cs', '=', 1],
            ['verifikasi_pemohon', '=', 1],
            ['status_pembayaran', '=', 2],
        ])->get();

        $belum_verifikasi = Permohonansampel::where([
            ['status', '=', 1],
            ['verifikasi_cs', '=', 1],
            ['verifikasi_pemohon', '=', 1],
            ['status_pembayaran', '=', 1],
        ])->get();

        $sudah_bayar = Permohonansampel::where('status', '!=', 1)->get();

        return view('pages.keuangan.home', [
            'belum_bayar'      => $belum_bayar,
            'dikembalikan'     => $dikembalikan,
            'belum_verifikasi' => $belum_verifikasi,
            'sudah_bayar'      => $sudah_bayar,
        ]);
    }

    // **
    // handler belum pembayaran
    public function belum_pembayaran() {
        $c = Permohonansampel::where([
            ['status', '=', 1],
            ['verifikasi_cs', '=', 1],
            ['verifikasi_pemohon', '=', 1],
            ['status_pembayaran', '=', 0],
        ])->orWhere([
            ['status', '=', 1],
            ['verifikasi_cs', '=', 1],
            ['verifikasi_pemohon', '=', 1],
            ['status_pembayaran', '=', 1],
        ])->orWhere([
            ['status', '=', 1],
            ['verifikasi_cs', '=', 1],
            ['verifikasi_pemohon', '=', 1],
            ['status_pembayaran', '=', 2],
        ])->get();

        if (Auth::user()->role == 'keuangan') {
            return view('pages.keuangan.pembayaran.belum-bayar', [
                'c' => $c,
            ]);
        }
    }

    // **
    // handler datatable
    public function belum_pembayaran_datatable() {
        $result = Permohonansampel::where([
            ['status', '=', 1],
            ['verifikasi_cs', '=', 1],
            ['verifikasi_pemohon', '=', 1],
            ['status_pembayaran', '=', 0],
        ])->orWhere([
            ['status', '=', 1],
            ['verifikasi_cs', '=', 1],
            ['verifikasi_pemohon', '=', 1],
            ['status_pembayaran', '=', 1],
        ])->orWhere([
            ['status', '=', 1],
            ['verifikasi_cs', '=', 1],
            ['verifikasi_pemohon', '=', 1],
            ['status_pembayaran', '=', 2],
        ])->orderBy('id', 'DESC')->get();

        $no = 0;
        foreach ($result as $value) {
            $no++;
            $row = [];

            $row[] = $value->kode;

            $row[] = $value->nama;

            $row[] = date('d-m-Y', strtotime($value->created_at));

            if ($value->status == 1 && $value->verifikasi_cs == 1 && $value->verifikasi_pemohon == 1 && $value->status_pembayaran == 0) {
                $status = '<span class="text-success">Belum Membayar</span>';
                $aksi   = '-';
            } else if ($value->status == 1 && $value->verifikasi_cs == 1 && $value->verifikasi_pemohon == 1 && $value->status_pembayaran == 1) {
                $status = '<span class="text-success">Belum Verifikasi Pembayaran</span>';
                $aksi   = '<a href="' . route('keuangan.verifikasi.pembayaran', ['id' => $value->id]) . '" title="Verifikasi" class="btn btn-sm btn-primary" style="filter: drop-shadow(3px 10px 4px black);">Verifikasi</a>';
            } else {
                $status = '<span class="text-success">Dikembalikan</span>';
                $aksi   = '<a href="' . route('keuangan.kembalikan-detail.pembayaran', ['id' => $value->id]) . '" title="Detail" class="btn btn-sm btn-primary" style="filter: drop-shadow(3px 10px 4px black);">Detail</a>';
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

    public function verifikasi_view($id) {
        $permohonan = Permohonansampel::where('id', '=', $id)->first();

        $parameters_select = Permohonanparameter::where('permohonansampel_id', '=', $permohonan->id)->get();

        if (Auth::user()->role == 'keuangan') {
            return view('pages.keuangan.pembayaran.verifikasi-view', [
                'permohonan'        => $permohonan,
                'parameters_select' => $parameters_select,
            ]);
        }
    }

    public function verifikasi_proses($id) {
        $permohonan = Permohonansampel::where('id', '=', $id)->update([
            'status' => 2,
        ]);

        if ($permohonan) {
            return redirect()->route('keuangan.sudah-pembayaran')->with('success', 'Sukses Kirim Data');
        } else {
            return redirect()->back()->with('error', 'Gagal Kirim Data');
        }
    }

    public function kembalikan_view($id) {
        $permohonan = Permohonansampel::where('id', '=', $id)->first();

        $parameters_select = Permohonanparameter::where('permohonansampel_id', '=', $permohonan->id)->get();

        if (Auth::user()->role == 'keuangan') {
            return view('pages.keuangan.pembayaran.kembalikan-view', [
                'permohonan'        => $permohonan,
                'parameters_select' => $parameters_select,
            ]);
        }
    }

    public function kembalikan_proses(Request $request, $id) {
        // **
        // handler validation
        $this->validate($request, [
            'pesan_dikembalikan' => 'required',
        ]);

        $proses = Permohonansampel::where('id', '=', $id)->update([
            'pesan_dikembalikan' => $request->pesan_dikembalikan,
            'status_pembayaran'  => 2,
        ]);

        if ($proses) {
            return redirect()->route('keuangan.belum-pembayaran')->with('success', 'sukses Kirim Data');
        } else {
            return redirect()->back()->with('error', 'Gagal Kirim Data');
        }
    }

    public function kembalikan_detail($id) {
        $permohonan = Permohonansampel::where('id', '=', $id)->first();

        $parameters_select = Permohonanparameter::where('permohonansampel_id', '=', $permohonan->id)->get();

        if (Auth::user()->role == 'keuangan') {
            return view('pages.keuangan.pembayaran.kembalikan-detail', [
                'permohonan'        => $permohonan,
                'parameters_select' => $parameters_select,
            ]);
        }
    }

    // **
    // handler sudah pembayaran
    public function sudah_pembayaran(Request $request) {
        // $c = Permohonansampel::where('status', '!=', 1)->get();

        if ($request->tahun != NULL) {
            $c     = Permohonansampel::where('status', '!=', 1)->whereYear('created_at', $request->tahun)->get();
            $tahun = $request->tahun;
        } else {
            $c     = Permohonansampel::where('status', '!=', 1)->get();
            $tahun = 0;
        }

        $years = DB::table('permohonansampels')
            ->selectRaw('year(created_at) year')
            ->groupBy('year')
            ->get();

        if (Auth::user()->role == 'keuangan') {
            return view('pages.keuangan.pembayaran.sudah-bayar', [
                'c'     => $c,
                'years' => $years,
                'tahun' => $tahun,
            ]);
        }
    }

    public function sudah_pembayaran_cetak($tahun) {
        if ($tahun != 0) {
            $result = Permohonansampel::where('status', '!=', 1)->whereYear('created_at', $tahun)->orderBy('id', 'DESC')->get();
        } else {
            $result = Permohonansampel::where('status', '!=', 1)->orderBy('id', 'DESC')->get();
        }

        return Excel::download(new ExcelExport($result), 'pembayaran.xlsx');
    }

    public function sudah_pembayaran_datatable($tahun) {

        if ($tahun != 0) {
            $result = Permohonansampel::where('status', '!=', 1)->whereYear('created_at', $tahun)->orderBy('id', 'DESC')->get();
        } else {
            $result = Permohonansampel::where('status', '!=', 1)->orderBy('id', 'DESC')->get();
        }

        $no = 0;
        foreach ($result as $value) {
            $no++;
            $row = [];

            $row[] = $value->kode;

            $row[] = $value->nama;

            $row[] = date('d-m-Y', strtotime($value->created_at));
            
            $row[] = $value->tgl_bayar != NULL ? date('d-m-Y', strtotime($value->tgl_bayar)) : '-';

            $status = '<span class="text-success">Sudah Membayar</span>';
            $aksi   = '<a href="' . route('keuangan.sudah-membayar-detail.pembayaran', ['id' => $value->id]) . '" title="Detail" class="btn btn-sm btn-primary" style="filter: drop-shadow(3px 10px 4px black);">Detail</a>';

            $row[] = $status;
            $row[] = $aksi;

            $data[] = $row;
        }
        return DataTables::of($data)->escapeColumns([])->make(true);
    }

    public function sudah_membayar_detail($id) {
        $permohonan = Permohonansampel::where('id', '=', $id)->first();

        $parameters_select = Permohonanparameter::where('permohonansampel_id', '=', $permohonan->id)->get();

        if (Auth::user()->role == 'keuangan') {
            return view('pages.keuangan.pembayaran.sudah-bayar-detail', [
                'permohonan'        => $permohonan,
                'parameters_select' => $parameters_select,
            ]);
        }
    }

    public function cetak_sk($id) {
        $permohonan = Permohonansampel::where('id', '=', $id)->first();
        $permohonanParameters = Permohonanparameter::with('Parameter')->where('permohonansampel_id', '=', $permohonan->id)->get();

        if (Auth::user()->role == 'keuangan') {

            return view('pages.keuangan.pembayaran.cetak-sk', [
                'permohonan'        => $permohonan,
                'permohonanParameters' => $permohonanParameters,
            ]);

            $pdf = PDF::loadView('pages.keuangan.pembayaran.cetak-sk', compact('permohonan', 'permohonanParameters'))->setPaper('a4', 'portrait');
            return $pdf->stream('sk_retribusi3.pdf');
        }
        
    }
}
