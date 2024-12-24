<?php

namespace App\Http\Controllers;

use App\Models\Permohonanparameter;
use App\Models\Permohonansampel;
use Auth;
use DataTables;
use Illuminate\Http\Request;

class PengangkutController extends Controller {
    public function index() {
        $segera_diangkut  = Permohonansampel::where('status', '=', 2)->get();
        $selesai_diangkut = Permohonansampel::where('status', '=', 3)->get();
        return view('pages.pengangkut.home', [
            'segera_diangkut'  => $segera_diangkut,
            'selesai_diangkut' => $selesai_diangkut,
        ]);
    }

    // **
    // handler segera diangkut
    public function diangkut() {
        $c = Permohonansampel::where('status', '=', 2)->get();

        if (Auth::user()->role == 'pengangkut') {
            return view('pages.pengangkut.pengangkutan.segera-diangkut', [
                'c' => $c,
            ]);
        }
    }

    // **
    // handler datatable
    public function diangkut_datatable() {
        $result = Permohonansampel::where('status', '=', 2)->orderBy('id', 'DESC')->get();

        $no = 0;
        foreach ($result as $value) {
            $no++;
            $row = [];

            $row[] = $value->kode;

            $row[] = $value->nama;

            $row[] = date('d-m-Y', strtotime($value->created_at));

            $row[] = '<a href="' . route('pengangkut.diangkut-view', ['id' => $value->id]) . '" title="Angkut" class="btn btn-sm btn-primary" style="filter: drop-shadow(3px 10px 4px black);">Angkut</a>&nbsp;
                <a href="' . route('pengangkut.diangkut-detail', ['id' => $value->id]) . '" title="Detail" class="btn btn-sm btn-success" style="filter: drop-shadow(3px 10px 4px black);">Detail</a>
            ';

            $data[] = $row;
        }
        return DataTables::of($data)->escapeColumns([])->make(true);
    }

    public function diangkut_detail($id) {
        $permohonan = Permohonansampel::where('id', '=', $id)->first();

        $parameters_select = Permohonanparameter::where('permohonansampel_id', '=', $permohonan->id)->get();

        if (Auth::user()->role == 'pengangkut') {
            return view('pages.pengangkut.pengangkutan.diangkut-detail', [
                'permohonan'        => $permohonan,
                'parameters_select' => $parameters_select,
            ]);
        }
    }

    public function diangkut_view($id) {
        $permohonan = Permohonansampel::where('id', '=', $id)->first();

        if (Auth::user()->role == 'pengangkut') {
            return view('pages.pengangkut.pengangkutan.diangkut-view', [
                'permohonan' => $permohonan,
            ]);
        }
    }

    public function diangkut_proses(Request $request, $id) {
        // **
        // handler validation
        $this->validate($request, [
            'jumlah_sampel' => 'required',
        ]);

        $proses = Permohonansampel::where('id', '=', $id)->update([
            'jumlah_sampel' => $request->jumlah_sampel,
            'tgl_diterima'  => date('Y-m-d'),
            'status'        => 3,
        ]);

        if ($proses) {
            return redirect()->route('pengangkut.diangkut')->with('success', 'Sukses Kirim Data');
        } else {
            return redirect()->back()->with('error', 'Gagal Kirim Data');
        }
    }

    // **
    // handler selesai diangkut
    public function selesai_diangkut() {
        $c = Permohonansampel::where('status', '=', 3)->get();

        if (Auth::user()->role == 'pengangkut') {
            return view('pages.pengangkut.pengangkutan.selesai-diangkut', [
                'c' => $c,
            ]);
        }
    }

    // **
    // handler datatable
    public function selesai_diangkut_datatable() {
        $result = Permohonansampel::where('status', '=', 3)->orderBy('id', 'DESC')->get();

        $no = 0;
        foreach ($result as $value) {
            $no++;
            $row = [];

            $row[] = $value->kode;

            $row[] = $value->nama;

            $row[] = date('d-m-Y', strtotime($value->tgl_diterima));

            $row[] = '
                <a href="' . route('pengangkut.diangkut-detail', ['id' => $value->id]) . '" title="Detail" class="btn btn-sm btn-success" style="filter: drop-shadow(3px 10px 4px black);">Detail</a>
            ';

            $data[] = $row;
        }
        return DataTables::of($data)->escapeColumns([])->make(true);
    }
}
