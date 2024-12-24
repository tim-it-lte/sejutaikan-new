<?php

namespace App\Http\Controllers;

use App\Models\Permohonanparameter;
use App\Models\Permohonansampel;
use App\Models\Ttd;
use Auth;
use Illuminate\Http\Request;

class PimpinanController extends Controller {
    public function index() {
        $cp = Permohonansampel::where('status', '=', 7)->get();
        return view('pages.pimpinan.home', [
            'cp' => $cp,
        ]);
    }

    public function daftar_permohonan() {
        $c = Permohonansampel::where('status', '=', 7)->orWhere('status', '=', 8)->get();

        if (Auth::user()->role == 'pimpinan') {
            return view('pages.pimpinan.permohonan.all', [
                'c' => $c,
            ]);
        }
    }

    // **
    // handler daftar permohonan datatables
    public function datatable_daftar_permohonan() {
        $result = Permohonansampel::where('status', '=', 7)->orWhere('status', '=', 8)->get();
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

            $row[] = '<a href="' . route('pimpinan.cetak-sertifikat', ['id' => $value->id]) . '" title="Sertifikat" class="btn btn-sm btn-success" target="_blank" style="filter: drop-shadow(3px 10px 4px black);">Sertifikat</a>';

            if ($value->status == 7) {
                $status = '<span class="text-danger">Belum dibubuhi Tanda Tangan</span>';
                $aksi   = '<div style="margin-bottom: 2px;"><a href="' . route('pimpinan.ttd.permohonan', ['id' => $value->id]) . '" title="Bubuhi Tanda Tangan" class="btn btn-sm btn-primary" style="filter: drop-shadow(3px 10px 4px black);">Bubuhi Tanda Tangan</a>
                <a href="' . route('pimpinan.detail.permohonan', ['id' => $value->id]) . '" title="detail" class="btn btn-sm btn-success" style="filter: drop-shadow(3px 10px 4px black);">Detail</a></div>

                ';
            } else if ($value->status == 8) {
                $status = '<span class="text-success">Sudah dibubuhi Tanda Tangan</span>';
                $aksi   = '<div style="white-space: nowrap;">
                <a href="' . route('pimpinan.detail.permohonan', ['id' => $value->id]) . '" title="detail" class="btn btn-sm btn-success" style="filter: drop-shadow(3px 10px 4px black);">Detail</a></div>

                ';
            }

            $row[] = $status;
            $row[] = $aksi;

            $row[]  =
            $data[] = $row;
        }
        // return DataTables::of($data)->escapeColumns([])->make(true);
        $output = ['data' => $data];
        return response()->json($output);
    }

    public function detail_permohonan($id) {
        $permohonan = Permohonansampel::where('id', '=', $id)->first();

        $parameters_select = Permohonanparameter::where('permohonansampel_id', '=', $permohonan->id)->get();

        if (Auth::user()->role == 'pimpinan') {
            return view('pages.pimpinan.permohonan.pengujian-detail', [
                'permohonan'        => $permohonan,
                'parameters_select' => $parameters_select,
            ]);
        }
    }

    public function edit_ttd() {
        $get_ = Ttd::orderBy('id', 'DESC')->first();

        if (Auth::user()->role == 'pimpinan') {
            return view('pages.pimpinan.ttd.edit', [
                'result' => $get_,
            ]);
        }
    }

    public function update_ttd(Request $request) {
        // **
        // handler validation
        $this->validate($request, [
            'nama'    => 'required',
            'jabatan' => 'required',
        ]);
        
        $get_ = Ttd::orderBy('id', 'DESC')->first();

        if ($request->hasFile('ttd')) {
            $ttd      = $request->file('ttd');
            $filename = time() . "." . $ttd->getClientOriginalExtension();
            $request->ttd->storeAs('ttd', $filename);
        } else {
            $filename = $get_->ttd;
        }

        if ($request->hasFile('stempel')) {
            $stempel          = $request->file('stempel');
            $filename_stempel = time() . "." . $stempel->getClientOriginalExtension();
            $request->stempel->storeAs('ttd', $filename_stempel);
        } else {
            $filename_stempel = $get_->stempel;
        }

        $get_ = Ttd::orderBy('id', 'DESC')->first();

        $proses = Ttd::where('id', '=', $get_->id)->update([
            'nama'    => $request->nama,
            'jabatan' => $request->jabatan,
            'ttd'     => $filename,
            'stempel' => $filename_stempel,
        ]);

        if ($proses) {
            return redirect()->back()->with('success', 'Sukses Simpan Data');
        } else {
            return redirect()->back()->with('error', 'Gagal Simpan Data');
        }
    }

    public function ttd_permohonan($id) {
        $permohonan = Permohonansampel::where('id', '=', $id)->update([
            'status' => 8,
        ]);

        if ($permohonan) {
            return redirect()->back()->with('success', 'Sukses Membubuhi Tanda Tangan Pada Sertifikat Pengujian');
        } else {
            return redirect()->back()->with('error', 'Gagal Proses');
        }
    }
}
