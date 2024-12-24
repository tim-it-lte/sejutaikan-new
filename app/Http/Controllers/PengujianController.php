<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\Keterangan;
use App\Models\Parameter;
use App\Models\Permohonanparameter;
use App\Models\Permohonansampel;
use App\Models\Jp;
use Auth;
use DataTables;
use Illuminate\Http\Request;

class PengujianController extends Controller {
    public function index() {
        $segera_pengujian  = Permohonansampel::where('status', '=', 4)->get();
        $selesai_pengujian = Permohonansampel::where('status', '=', 5)->get();
        $pengujian_dikembalikan = Permohonansampel::where([
            ['status', '=', 4],
            ['kembalikan_verifikator', '=', 1]
        ])->get();
        return view('pages.pengujian.home', [
            'segera_pengujian'  => $segera_pengujian,
            'selesai_pengujian' => $selesai_pengujian,
            'pengujian_dikembalikan' => $pengujian_dikembalikan,
        ]);
    }

    public function segera_pengujian() {
        $c = Permohonansampel::where('status', '=', 4)->get();

        if (Auth::user()->role == 'pengujian') {
            return view('pages.pengujian.pengujian.segera-pengujian', [
                'c' => $c,
            ]);
        }
    }

    // **
    // handler datatable
    public function segera_pengujian_datatable() {
        $result = Permohonansampel::where('status', '=', 4)->orderBy('id', 'DESC')->get();

        $no = 0;
        foreach ($result as $value) {
            $no++;
            $row = [];

            $row[] = $value->kode;

            $row[] = $value->kode_sampel_lab;

            $row[] = date('d-m-Y', strtotime($value->tgl_diterima));

            $row[] = '<a href="' . route('pengujian.selesai-pengujian-action', ['id' => $value->id]) . '" title="Selesai Pengujian" class="btn btn-sm btn-primary" style="filter: drop-shadow(3px 10px 4px black);">Selesai Pengujian</a>&nbsp;
                <a href="' . route('pengujian.segera-pengujian-detail', ['id' => $value->id]) . '" title="Detail" class="btn btn-sm btn-success" style="filter: drop-shadow(3px 10px 4px black);">Detail</a>
            ';

            $data[] = $row;
        }
        return DataTables::of($data)->escapeColumns([])->make(true);
        // $output = ['data' => $data];
        // return response()->json($output);
    }

    public function segera_pengujian_detail($id) {
        $permohonan = Permohonansampel::where('id', '=', $id)->first();

        $parameters_select = Permohonanparameter::where('permohonansampel_id', '=', $permohonan->id)->get();

        if (Auth::user()->role == 'pengujian') {
            return view('pages.pengujian.pengujian.segera-pengujian-detail', [
                'permohonan'        => $permohonan,
                'parameters_select' => $parameters_select,
            ]);
        }
    }

    public function selesai_pengujian_action($id) {
        $permohonan = Permohonansampel::where('id', '=', $id)->first();

        $parameters_select = Permohonanparameter::where('permohonansampel_id', '=', $permohonan->id)->get();
        // $parameters_select = Permohonanparameter::where('permohonansampel_id', '=', $permohonan->id)
        //     ->join('parameters', 'permohonanparameters.parameter_id', '=', 'parameters.id')
        //     ->select('permohonanparameters.*', 'parameters.parameter AS nama_parameter')
        //     ->orderBy('permohonanparameters.jp_id', 'DESC')
        //     ->orderBy('parameters.nomor', 'ASC')
        //     ->get();

        if (Auth::user()->role == 'pengujian') {
            return view('pages.pengujian.pengujian.selesai-pengujian-action', [
                'permohonan'        => $permohonan,
                'parameters_select' => $parameters_select,
            ]);
        }
    }

    public function selesai_pengujian_proses(Request $request, $id) {

        $permohonan = Permohonansampel::where('id', '=', $id)->first();

        $parameters_select = Permohonanparameter::where('permohonansampel_id', '=', $permohonan->id)->get();

        // **
        // handler validation
        $this->validate($request, [
            'tgl_pengujian' => 'required',
        ]);

        $no = 1;
        foreach ($parameters_select as $param) {
            // **
            // handler validation
            $this->validate($request, [
                'metode_uji' . $no   => 'required',
                'hasil_satu' . $no   => 'required',
                'hasil_dua' . $no    => 'required',
                'hasil_tiga' . $no   => 'required',
                'hasil_empat' . $no  => 'required',
                'hasil_lima' . $no   => 'required',
                'standar_mutu' . $no => 'required',
            ]);
            $no++;
        }

        $proses = Permohonansampel::where('id', '=', $id)->update([
            'tgl_pengujian' => date('Y-m-d', strtotime($request->tgl_pengujian)),
            'status'        => 5,
        ]);

        if ($proses) {
            $no_ = 1;
            $h_  = ['hasil_satu', 'hasil_dua', 'hasil_tiga', 'hasil_empat', 'hasil_lima'];
            foreach ($parameters_select as $param) {
                $insert_hasil = Hasil::insert([
                    'permohonansampel_id'    => $id,
                    'jp_id'                  => $param->jp_id,
                    'parameter_id'           => $param->parameter_id,
                    'permohonanparameter_id' => $param->id,
                    'hasil'                  => $request->input('hasil_satu' . $no_),
                    'standar_mutu'           => $request->input('standar_mutu' . $no_),
                    'metode_uji'             => $request->input('metode_uji' . $no_),
                ]);

                $insert_hasil = Hasil::insert([
                    'permohonansampel_id'    => $id,
                    'jp_id'                  => $param->jp_id,
                    'parameter_id'           => $param->parameter_id,
                    'permohonanparameter_id' => $param->id,
                    'hasil'                  => $request->input('hasil_dua' . $no_),
                    'standar_mutu'           => $request->input('standar_mutu' . $no_),
                    'metode_uji'             => $request->input('metode_uji' . $no_),
                ]);

                $insert_hasil = Hasil::insert([
                    'permohonansampel_id'    => $id,
                    'jp_id'                  => $param->jp_id,
                    'parameter_id'           => $param->parameter_id,
                    'permohonanparameter_id' => $param->id,
                    'hasil'                  => $request->input('hasil_tiga' . $no_),
                    'standar_mutu'           => $request->input('standar_mutu' . $no_),
                    'metode_uji'             => $request->input('metode_uji' . $no_),
                ]);

                $insert_hasil = Hasil::insert([
                    'permohonansampel_id'    => $id,
                    'jp_id'                  => $param->jp_id,
                    'parameter_id'           => $param->parameter_id,
                    'permohonanparameter_id' => $param->id,
                    'hasil'                  => $request->input('hasil_empat' . $no_),
                    'standar_mutu'           => $request->input('standar_mutu' . $no_),
                    'metode_uji'             => $request->input('metode_uji' . $no_),
                ]);

                $insert_hasil = Hasil::insert([
                    'permohonansampel_id'    => $id,
                    'jp_id'                  => $param->jp_id,
                    'parameter_id'           => $param->parameter_id,
                    'permohonanparameter_id' => $param->id,
                    'hasil'                  => $request->input('hasil_lima' . $no_),
                    'standar_mutu'           => $request->input('standar_mutu' . $no_),
                    'metode_uji'             => $request->input('metode_uji' . $no_),
                ]);
                $no_++;
            }
        }

        if ($request->keterangan) {
            foreach ($request->keterangan as $ket) {
                $insert_ket = Keterangan::create([
                    'permohonansampel_id' => $permohonan->id,
                    'keterangan'          => $ket,
                ]);
            }
        }

        if ($proses) {
            return redirect()->route('pengujian.segera-pengujian')->with('success', 'Sukses Kirim Data');
        } else {
            return redirect()->back()->with('error', 'Gagal Kirim Data');
        }
    }

    public function edit_pengujian_dikembalikan_proses(Request $request, $id) {
        $permohonan = Permohonansampel::where('id', '=', $id)->first();

        $parameters_select = Permohonanparameter::where('permohonansampel_id', '=', $permohonan->id)->get();

        $no = 1;
        foreach ($parameters_select as $param) {
            // **
            // handler validation
            $this->validate($request, [
                'metode_uji' . $no   => 'required',
                'hasil_satu' . $no   => 'required',
                'hasil_dua' . $no    => 'required',
                'hasil_tiga' . $no   => 'required',
                'hasil_empat' . $no  => 'required',
                'hasil_lima' . $no   => 'required',
                'standar_mutu' . $no => 'required',
            ]);
            $no++;
        }

        $proses = Permohonansampel::where('id', '=', $id)->update([
            'tgl_pengujian' => date('Y-m-d', strtotime($request->tgl_pengujian)),
            'status'        => 5,
            'kembalikan_verifikator' => 0,
        ]);

        $no_ = 1;
        $h_  = ['hasil_satu', 'hasil_dua', 'hasil_tiga', 'hasil_empat', 'hasil_lima'];
        foreach ($parameters_select as $param_) { 
            $get_pr = Parameter::where('id','=',$param_->parameter_id)->first();
            $hasil_get = Hasil::where([
                            ['permohonansampel_id','=',$permohonan->id],
                            ['jp_id','=',$param_->jp_id],
                            ['parameter_id','=',$param_->parameter_id],
                            ['permohonanparameter_id','=',$param_->id]
                        ])->get();

            $key = 0;
            foreach($hasil_get as $hasil_value) {
                if ($proses) {

                    if ($key == 0) {
                        $update_hasil = Hasil::where('id','=', $hasil_value->id)->update([
                            'hasil'                  => $request->input('hasil_satu' . $no_),
                            'standar_mutu'           => $request->input('standar_mutu' . $no_),
                            'metode_uji'             => $request->input('metode_uji' . $no_),
                        ]);
                    }

                    if ($key == 1) {
                        $update_hasil = Hasil::where('id','=', $hasil_value->id)->update([
                            'hasil'                  => $request->input('hasil_dua' . $no_),
                            'standar_mutu'           => $request->input('standar_mutu' . $no_),
                            'metode_uji'             => $request->input('metode_uji' . $no_),
                        ]);
                    }

                    if ($key == 2) {
                        $update_hasil = Hasil::where('id','=', $hasil_value->id)->update([
                            'hasil'                  => $request->input('hasil_tiga' . $no_),
                            'standar_mutu'           => $request->input('standar_mutu' . $no_),
                            'metode_uji'             => $request->input('metode_uji' . $no_),
                        ]);
                    }

                    if ($key == 3) {
                        $update_hasil = Hasil::where('id','=', $hasil_value->id)->update([
                            'hasil'                  => $request->input('hasil_empat' . $no_),
                            'standar_mutu'           => $request->input('standar_mutu' . $no_),
                            'metode_uji'             => $request->input('metode_uji' . $no_),
                        ]);
                    }

                    if ($key == 4) {
                        $update_hasil = Hasil::where('id','=', $hasil_value->id)->update([
                            'hasil'                  => $request->input('hasil_lima' . $no_),
                            'standar_mutu'           => $request->input('standar_mutu' . $no_),
                            'metode_uji'             => $request->input('metode_uji' . $no_),
                        ]);
                    }
                }
                $key++;
            }
            $no_++;
        }

        $ket_get = Keterangan::where('permohonansampel_id','=',$permohonan->id)->get();

        foreach($ket_get as $k => $ket_value) {
            if ($request->keterangan) {
                    $update_ket = Keterangan::where('id','=',$ket_value->id)->update([
                        'keterangan'          => $request->keterangan[$k],
                    ]);
            }
        }

        if ($proses) {
            return redirect()->route('pengujian.segera-pengujian')->with('success', 'Sukses Kirim Data');
        } else {
            return redirect()->back()->with('error', 'Gagal Kirim Data');
        }
    }

    public function selesai_pengujian() {
        $c = Permohonansampel::where('status', '=', 5)->get();

        if (Auth::user()->role == 'pengujian') {
            return view('pages.pengujian.pengujian.selesai-pengujian', [
                'c' => $c,
            ]);
        }
    }

    public function pengujian_dikembalikan() {
        $c = Permohonansampel::where([
            ['status', '=', 4],
            ['kembalikan_verifikator', '=', 1]
        ])->get();

        if (Auth::user()->role == 'pengujian') {
            return view('pages.pengujian.pengujian.pengujian-dikembalikan', [
                'c' => $c,
            ]);
        }
    }

    // **
    // handler datatable
    public function pengujian_dikembalikan_datatable() {
        $result = Permohonansampel::where([
            ['status', '=', 4],
            ['kembalikan_verifikator', '=', 1]
        ])->orderBy('id', 'DESC')->get();

        $no = 0;
        foreach ($result as $value) {
            $no++;
            $row = [];

            $row[] = $value->kode;

            $row[] = $value->kode_sampel_lab;

            $row[] = date('d-m-Y', strtotime($value->tgl_diterima));

            $row[] = date('d-m-Y', strtotime($value->tgl_pengujian));

            $row[] = '
                <a href="' . route('pengujian.edit-pengujian-dikembalikan', ['id' => $value->id]) . '" title="Edit" class="btn btn-sm btn-success" style="filter: drop-shadow(3px 10px 4px black);">Edit</a>
            ';

            $data[] = $row;
        }
         return DataTables::of($data)->escapeColumns([])->make(true);
    }   

    public function edit_pengujian_dikembalikan($id) {
        $permohonan = Permohonansampel::where('id', '=', $id)->first();

        $parameters_select = Permohonanparameter::where('permohonansampel_id', '=', $permohonan->id)->get();

        if (Auth::user()->role == 'pengujian') {
            return view('pages.pengujian.pengujian.edit-pengujian-dikembalikan', [
                'permohonan'        => $permohonan,
                'parameters_select' => $parameters_select,
            ]);
        }
    }   

    // **
    // handler datatable
    public function selesai_pengujian_datatable() {
        $result = Permohonansampel::where('status', '=', 5)->orderBy('id', 'DESC')->get();

        $no = 0;
        foreach ($result as $value) {
            $no++;
            $row = [];

            $row[] = $value->kode;

            $row[] = $value->kode_sampel_lab;

            $row[] = date('d-m-Y', strtotime($value->tgl_diterima));

            $row[] = date('d-m-Y', strtotime($value->tgl_pengujian));

            $row[] = '
                <a href="' . route('pengujian.segera-pengujian-detail', ['id' => $value->id]) . '" title="Detail" class="btn btn-sm btn-success" style="filter: drop-shadow(3px 10px 4px black);">Detail</a>
            ';

            $data[] = $row;
        }
        return DataTables::of($data)->escapeColumns([])->make(true);
    }

    public function selesai_pengujian_detail($id) {
        $permohonan = Permohonansampel::where('id', '=', $id)->first();

        $parameters_select = Permohonanparameter::where('permohonansampel_id', '=', $permohonan->id)->get();

        if (Auth::user()->role == 'pengujian') {
            return view('pages.pengujian.pengujian.selesai-pengujian-detail', [
                'permohonan'        => $permohonan,
                'parameters_select' => $parameters_select,
            ]);
        }
    }
}
