<?php

namespace App\Http\Controllers;

use App\Models\Jp;
use App\Models\Parameter;
use Auth;
use DataTables;
use Illuminate\Http\Request;
use PDF;

class ParameterController extends Controller {
    public function index(Request $request) {

        if ($request->jenis_pengujian != NULL) {
            $c  = Parameter::where('jp_id', '=', $request->jenis_pengujian)->get();
            $jp = $request->jenis_pengujian;
        } else {
            $c  = Parameter::all();
            $jp = 0;
        }

        $jps = Jp::all();

        if (Auth::user()->role == 'admin') {
            return view('pages.admin.master-parameter.all', [
                'c'   => $c,
                'jps' => $jps,
                'jp'  => $jp,
            ]);
        }
    }

    // **
    // handler slider datatables
    public function datatables($jp) {

        if ($jp != 0) {
            // $result = Parameter::where('jp_id', '=', $jp)->orderBy('id', 'DESC')->get();
            $result = Parameter::where('jp_id', '=', $jp)->orderBy('nomor', 'ASC')->get();
        } else {
            // $result = Parameter::orderBy('id', 'DESC')->get();
            $result = Parameter::orderBy('nomor', 'ASC')->get();
        }

        // $no     = 1;
        foreach ($result as $value) {
            $row = [];

            // $row[] = $no;

            $jp = Jp::where('id', '=', $value->jp_id)->first();

            $row[] = $jp->jenis_permohonan;

            $row[] = $value->parameter;

            $row[] = $value->nomor;

            $row[] = number_format($value->harga, 0, ',', '.');

            if ($value->aktif != 0) {
                $row[] = '
                        <a href="' . route('admin.parameter.edit', ['id' => $value->id]) . '" title="Nonaktif" class="btn btn-sm btn-danger" style="filter: drop-shadow(3px 10px 4px black);" data-toggle="modal" data-target="#exampleModalCenter" onclick="getId(' . $value->id . ')">Nonaktif</a>
                ';
            } else {
                $row[] = '
                        <a href="' . route('admin.parameter.aktif', ['id' => $value->id]) . '" title="Aktif" class="btn btn-sm btn-primary" style="filter: drop-shadow(3px 10px 4px black);"><i class="ti-pencil-alt"></i>Aktif</a>
                ';
            }

            $row[] = '<div style="white-space: nowrap;"><a href="' . route('admin.parameter.edit', ['id' => $value->id]) . '" title="Edit" class="btn btn-sm btn-primary" style="filter: drop-shadow(3px 10px 4px black);"><i class="ti-pencil-alt"></i> edit</a>&nbsp;
                <a href="javascript:void" onclick="delData(' . $value->id . ')" style="filter: drop-shadow(3px 10px 4px black);" title="Delete" class="btn btn-sm btn-danger"><i class="ti-trash"></i>hapus</a></div>
                ';
            $data[] = $row;
            // $no++;
        }
        // return DataTables::of($data)->escapeColumns([])->make(true);
        $output = ['data' => $data];
        return response()->json($output);
    }

    public function create() {
        $jps = JP::orderBy('id', 'DESC')->get();
        if (Auth::user()->role == 'admin') {
            return view('pages.admin.master-parameter.create', [ 'jps' => $jps ]);
        }
    }

    public function store(Request $request) {
        // **
        // handler validation
        $this->validate($request, [
            'jenis_pengujian' => 'required',
            'parameter'       => 'required|unique:parameters,parameter',
        ]);

        $insert = Parameter::create([
            'jp_id'     => $request->jenis_pengujian,
            'parameter' => $request->parameter,
            'metode_uji' => $request->metode_uji,
            'nomor'     => $request->nomor,
            'harga'     => $request->harga != NUll ? str_replace(".", "", $request->harga) : 0,
        ]);

        if ($insert) {
            return redirect()->route('admin.parameter.all')->with('success', 'Simpan Data Berhasil');
        } else {
            return redirect()->back()->with('error', 'Simpan Data gagal');
        }
    }

    public function edit($id) {
        $r = Parameter::where('id', '=', $id)->first();
        $jps = JP::orderBy('id', 'DESC')->get();

        if (Auth::user()->role == 'admin') {
            return view('pages.admin.master-parameter.edit', [
                'result' => $r,
                'jps' => $jps
            ]);
        }
    }

    public function update(Request $request, $id) {
        // **
        // handler validation
        $this->validate($request, [
            'jenis_pengujian' => 'required',
            'parameter'       => 'required|unique:parameters,parameter,' . $id,
        ]);

        $update = Parameter::where('id', '=', $id)->update([
            'jp_id'     => $request->jenis_pengujian,
            'parameter' => $request->parameter,
            'metode_uji' => $request->metode_uji,
            'nomor'     => $request->nomor,
            'harga'     => $request->harga != NUll ? str_replace(".", "", $request->harga) : 0,
        ]);

        if ($update) {
            return redirect()->route('admin.parameter.all')->with('success', 'Ubah Data Berhasil');
        } else {
            return redirect()->back()->with('error', 'Ubah Data gagal');
        }
    }

    public function destroy($id) {
        $delete = Parameter::destroy($id);

        return redirect()->back();
    }

    public function proses_nonaktif(Request $request) {
        $update = Parameter::where('id', '=', $request->id)->update([
            'pesan' => $request->pesan,
            'aktif' => 0,
        ]);

        if ($update) {
            return redirect()->route('admin.parameter.all')->with('success', 'Nonaktifkan Parameter Berhasil');
        } else {
            return redirect()->back()->with('error', 'Nonaktifkan Parameter Gagal');
        }
    }

    public function aktif($id) {
        $update = Parameter::where('id', '=', $id)->update([
            'pesan' => '',
            'aktif' => 1,
        ]);

        if ($update) {
            return redirect()->route('admin.parameter.all')->with('success', 'Aktifkan Parameter Berhasil');
        } else {
            return redirect()->back()->with('error', 'Aktifkan Parameter Gagal');
        }
    }

    public function download() {
        $parameters = Parameter::orderBy('id', 'DESC')->where('aktif', '=', 1)->get();
        // return view('pages.admin.master-parameter.report', [ 'parameter' => $parameters ]);
        
        $pdf = PDF::loadView('pages.admin.master-parameter.report', [ 'parameter' => $parameters ]);
        $pdf->setPaper('a4', 'portrait');
        return $pdf->stream('laporan_parameter_tersedia.pdf');
    }
}
