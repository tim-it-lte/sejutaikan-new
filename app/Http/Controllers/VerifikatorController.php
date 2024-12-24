<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Permohonanparameter;
use App\Models\Permohonansampel;
use Auth;
use DataTables;

class VerifikatorController extends Controller {
    public function index() {
        $cp = Permohonansampel::where('status', '=', 6)->get();
        return view('pages.verifikator.home', [
            'cp' => $cp,
        ]);
    }

    public function daftar_permohonan() {
        $c = Permohonansampel::where('status', '=', 6)->orWhere('status', '=', 7)->get();

        if (Auth::user()->role == 'verifikator') {
            return view('pages.verifikator.permohonan.all', [
                'c' => $c,
            ]);
        }
    }

    // **
    // handler daftar permohonan datatables
    public function datatable_daftar_permohonan() {
        $result = Permohonansampel::where('status', '=', 6)->orWhere('status', '=', 7)->latest()->get();
        $no     = 0;
        foreach ($result as $value) {
            $no++;
            $row = [];

            $row[] = $value->kode;

            $row[] = date('d-m-Y', strtotime($value->created_at));

            $row[] = date('d-m-Y', strtotime($value->tgl_diterima));

            $row[] = date('d-m-Y', strtotime($value->tgl_pengujian));

            $row[] = $value->nama;

            $row[] = $value->hp;

            $row[] = $value->alamat;

            $row[] = '<a href="' . route('verifikator.cetak-sertifikat', ['id' => $value->id]) . '" title="Sertifikat" class="btn btn-sm btn-warning" style="filter: drop-shadow(3px 10px 4px black);" target="_blank">Sertifikat</a>';

            if ($value->status == 6) {
                $status = '<span class="text-danger">Belum Diverifikasi</span>';
            } else if ($value->status == 7) {
                $status = '<span class="text-success">Sudah Diverifikasi</span>';
            }

            $row[] = $status;

            $row[] = '<div style="white-space: nowrap;">
            <a href="' . route('verifikator.kembalikan.permohonan', ['id' => $value->id]) . '" title="Kembalikan" class="btn btn-sm btn-danger" style="filter: drop-shadow(3px 10px 4px black);">Kembalikan</a>&nbsp;
            <a href="' . route('verifikator.verifikasi.permohonan', ['id' => $value->id]) . '" title="Verifikasi" class="btn btn-sm btn-primary" style="filter: drop-shadow(3px 10px 4px black);">Verifikasi</a>&nbsp;
                <a href="' . route('verifikator.detail.permohonan', ['id' => $value->id]) . '" title="detail" class="btn btn-sm btn-success" style="filter: drop-shadow(3px 10px 4px black);">Detail</a></div>

                ';
            $data[] = $row;
        }
        return DataTables::of($data)->escapeColumns([])->make(true);
    }

    public function verifikasi_permohonan($id) {
        $update = Permohonansampel::where('id', '=', $id)->update([
            'status' => 7,
        ]);

        if ($update) {
            return redirect()->back()->with('success', 'Verifikasi Pengujian Berhasil');
        } else {
            return redirect()->back()->with('error', 'Verifikasi Pengujian gagal');
        }
    }

    public function detail_permohonan($id) {
        $permohonan = Permohonansampel::where('id', '=', $id)->first();

        $parameters_select = Permohonanparameter::where('permohonansampel_id', '=', $permohonan->id)->get();

        if (Auth::user()->role == 'verifikator') {
            return view('pages.verifikator.permohonan.pengujian-detail', [
                'permohonan'        => $permohonan,
                'parameters_select' => $parameters_select,
            ]);
        }
    }

    public function kembalikan_permohonan($id) {
        $update = Permohonansampel::where('id', '=', $id)->update([
            'status' => 4,
            'kembalikan_verifikator' => 1,
            'date_kembalikan_verifikator' => date("Y-m-d"),
        ]);

        if ($update) {
            return redirect()->back()->with('success', 'Pengujian Berhasil dikembalikan');
        } else {
            return redirect()->back()->with('error', 'Pengujian gagal dikembalikan');
        }
    }
}
