<?php

namespace App\Http\Controllers;

use App\Models\Parameter;
use App\Models\Permohonanparameter;
use App\Models\Permohonansampel;
use Auth;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class CSController extends Controller
{
    public function index()
    {

        $verifikasi = Permohonansampel::where('status', '=', 0)->get();

        $pengkodean_sampel = Permohonansampel::where('status', '=', 3)->get();

        $pengujian = Permohonansampel::where('status', '=', 5)->get();

        $terbit = Permohonansampel::where('status', '=', 8)->get();

        return view('pages.cs.home', [
            'verifikasi'        => $verifikasi,
            'pengkodean_sampel' => $pengkodean_sampel,
            'pengujian'         => $pengujian,
            'terbit'            => $terbit,
        ]);
    }

    public function daftar_terbit_sertifikat()
    {
        $c = Permohonansampel::where('status', '=', 8)->get();

        if (Auth::user()->role == 'cs') {
            return view('pages.cs.terbit.all', [
                'c' => $c,
            ]);
        }
    }

    public function datatable_terbit_sertifikat()
    {
        $result = Permohonansampel::where('status', '=', 8)->orderBy('id', 'DESC')->get();
        $no     = 0;
        foreach ($result as $value) {
            $no++;
            $row = [];

            $row[] = $no;

            $row[] = $value->kode_sampel_lab;

            $row[] = date('d-m-Y', strtotime($value->created_at));

            $row[] = $value->nama;

            $row[] = $value->hp;

            $row[] = $value->alamat;

            if ($value->istte == 0) {
                $row[] = '<a target="_blank" href="' . route('cs.cetak-sertifikat', ['id' => $value->id]) . '" title="Sertifikat" class="btn btn-sm btn-primary" style="filter: drop-shadow(3px 10px 4px black);">Cetak Sertifikat</a>
                ';
            } else {
                $row[] = '<a target="_blank" href="/public/storage/certificate/' . $value->pdf . '" title="Sertifikat" class="btn btn-sm btn-primary" style="filter: drop-shadow(3px 10px 4px black);">Cetak Sertifikat</a>
                ';
            }

            $data[] = $row;
        }
        return DataTables::of($data)->escapeColumns([])->make(true);
    }

    public function daftar_verifikasi_pengujian()
    {
        $c = Permohonansampel::where('status', '=', 5)->get();

        if (Auth::user()->role == 'cs') {
            return view('pages.cs.pengujian.all', [
                'c' => $c,
            ]);
        }
    }

    public function datatable_verifikasi_pengujian()
    {
        $result = Permohonansampel::where('status', '=', 5)->orderBy('id', 'DESC')->get();
        $no     = 0;
        foreach ($result as $value) {
            $no++;
            $row = [];

            $row[] = $no;

            $row[] = $value->kode_sampel_lab;

            $row[] = date('d-m-Y', strtotime($value->created_at));

            $row[] = $value->nama;

            $row[] = $value->hp;

            $row[] = $value->alamat;

            $row[] = '<span class="text-danger">Belum Verifikasi Pengujian</span>';

            $row[] = '<a href="' . route('cs.verifikasi-pengujian.permohonan', ['id' => $value->id]) . '" title="Verifikasi" class="btn btn-sm btn-primary" style="filter: drop-shadow(3px 10px 4px black);">Verifikasi</a>
                ';
            $data[] = $row;
        }
        return DataTables::of($data)->escapeColumns([])->make(true);
    }

    public function verifikasi_pengujian($id)
    {
        $permohonan = Permohonansampel::where('id', '=', $id)->first();

        $parameters = Permohonanparameter::where('permohonansampel_id', '=', $id)->get();

        return view('pages.cs.pengujian.index', [
            'permohonan' => $permohonan,
            'parameters' => $parameters,
        ]);
    }

    public function proses_verifikasi_pengujian(Request $request, $id)
    {
        $this->validate($request, [
            'kode_sampel'    => 'required',
            'tgl_sertifikat' => 'required',
        ]);

        $update = Permohonansampel::where('id', '=', $id)->update([
            'nama'             => $request->nama,
            'perusahaan'       => $request->perusahaan,
            'hp'               => $request->hp,
            'alamat'           => $request->alamat,
            'jenis_sampel'     => $request->jenis_sampel,
            'spesies'          => $request->spesies,
            'negara_tujuan'    => $request->negara_tujuan,
            'kode_sampel_lab'  => $request->kode_sampel,
            'nomor_referensi'  => $request->nomor_referensi,
            'status'           => 6,
            'jumlah_sampel'    => $request->jumlah_sampel,
            'nomor_sertifikat' => $request->nomor_sertifikat,
            'tgl_sertifikat'   => date('Y-m-d', strtotime($request->tgl_sertifikat)),
        ]);

        if ($update) {
            return redirect()->route('cs.all.verifikasi_pengujian')->with('success', 'Verifikasi Berhasil');
        } else {
            return redirect()->back()->with('error', 'Verifikasi gagal');
        }
    }

    public function daftar_permohonan()
    {
        // $c = Permohonansampel::where('status', '=', 0)->get();
        $c = Permohonansampel::whereIn('status', [0, 1, 2, 3, 4, 5, 6, 7, 8])->get();

        if (Auth::user()->role == 'cs') {
            return view('pages.cs.permohonan.all', [
                'c' => $c,
            ]);
        }
    }

    public function daftar_pengkodean_sampel()
    {
        // $c = Permohonansampel::where('status', '=', 3)->get();
        $c = Permohonansampel::whereIn('status', [3, 4, 5, 6, 7, 8])->get();

        if (Auth::user()->role == 'cs') {
            return view('pages.cs.pengkodean.all', [
                'c' => $c,
            ]);
        }
    }

    // **
    // handler daftar permohonan datatables
    public function datatable_daftar_permohonan()
    {
        // $result = Permohonansampel::where('status', '=', 0)->orderBy('id', 'DESC')->get();
        $result = Permohonansampel::whereIn('status', [0, 1, 2, 3, 4, 5, 6, 7, 8])->orderBy('id', 'DESC')->orderBy('status', 'ASC')->get();

        $no     = 0;
        foreach ($result as $value) {
            $no++;
            $row = [];

            $row[] = $no;

            $row[] = $value->kode;

            $row[] = date('d-m-Y', strtotime($value->created_at));

            $row[] = $value->nama;

            $row[] = $value->hp;

            $row[] = $value->alamat;

            // $jp = Jp::where('id', '=', $value->jenis_permohonan_id)->first();

            // $row[] = $jp->jenis_permohonan;

            if ($value->status == 0) {
                $status = '<span class="text-danger">Belum Diterima</span>';
            } else if ($value->status == 1) {
                $status = '<span class="text-success">Sudah Diterima</span>';
            } else {
                $status = '<span class="text-info">Pengujian Lab</span>';
            }

            $row[] = $status;

            $row[] = $value->verifikasi_cs == 0 ? '<a href="' . route('cs.verifikasi.permohonan', ['id' => $value->id]) . '" title="Verifikasi" class="btn btn-sm btn-primary" style="filter: drop-shadow(3px 10px 4px black);">Verifikasi</a>
                ' : '-';
            $data[] = $row;
        }
        return DataTables::of($data)->escapeColumns([])->make(true);
    }

    public function datatable_pengkodean_sampel()
    {
        $result = Permohonansampel::whereIn('status', [3, 4, 5, 6, 7, 8])->orderBy('id', 'DESC')->orderBy('status', 'ASC')->get();
        $no     = 0;
        foreach ($result as $value) {
            $no++;
            $row = [];

            $row[] = $no;

            $row[] = $value->kode;

            $row[] = date('d-m-Y', strtotime($value->created_at));

            $row[] = $value->nama;

            $row[] = $value->hp;

            $row[] = $value->alamat;

            if ($value->status == 3) {
                $status = '<span class="text-danger">Belum Ada Kode Sampel</span>';
            } else {
                $status = '<span class="text-success">Sudah Ada Kode Sampel</span>';
            }

            $row[] = $status;

            $row[] = $value->status == 3 ? '<a href="' . route('cs.pengkodean-permohonan.permohonan', ['id' => $value->id]) . '" title="Pengkodean" class="btn btn-sm btn-primary" style="filter: drop-shadow(3px 10px 4px black);">Pengkodean</a>
                ' : '-';
            $data[] = $row;
        }
        return DataTables::of($data)->escapeColumns([])->make(true);
    }

    public function pengkodean_permohonan($id)
    {
        $permohonan = Permohonansampel::where('id', '=', $id)->first();

        $parameters = Permohonanparameter::where('permohonansampel_id', '=', $id)->get();

        return view('pages.cs.pengkodean.index', [
            'permohonan' => $permohonan,
            'parameters' => $parameters,
        ]);
    }

    public function proses_pengkodean_permohonan(Request $request, $id)
    {
        $this->validate($request, [
            // 'jenis_permohonan' => 'required',
            'nama'        => 'required',
            'perusahaan'  => 'required',
            'hp'          => 'required',
            'alamat'      => 'required',
            'kode_sampel' => 'required',
        ]);

        $permohonan = Permohonansampel::where('id', '=', $id)->update([
            'nama'             => $request->nama,
            'perusahaan'       => $request->perusahaan,
            'hp'               => $request->hp,
            'alamat'           => $request->alamat,
            'jenis_sampel'     => $request->jenis_sampel,
            'spesies'          => $request->spesies,
            'negara_tujuan'    => $request->negara_tujuan,
            'kode_sampel_lab'  => $request->kode_sampel,
            'nomor_referensi'  => $request->nomor_referensi,
            'status'           => 4,
            'nomor_sertifikat' => $request->nomor_sertifikat,
        ]);

        if ($permohonan) {
            return redirect()->route('cs.all.pengkodean-sampel')->with('success', 'Pengkodean Data Berhasil');
        } else {
            return redirect()->back()->with('error', 'Pengkodean Data gagal');
        }
    }

    public function verifikasi_permohonan($id)
    {
        $permohonan = Permohonansampel::where('id', '=', $id)->first();

        $parameters = Parameter::all();

        $parameters_select = Permohonanparameter::where('permohonansampel_id', '=', $id)->get();

        return view('pages.cs.permohonan.verifikasi', [
            'parameters_select' => $parameters_select,
            'parameters'        => $parameters,
            'permohonan'        => $permohonan,
        ]);
    }

    public function verifikasi_data_permohonan(Request $request, $id)
    {

        $permohonan = Permohonansampel::where('id', '=', $id)->first();

        $parameters = [];
        $jumlahs    = [];

        if ($request->parameters != NULL) {
            foreach ($request['parameters'] as $value) {
                $parameters[] = $value;
            }

            foreach ($request['jumlahs'] as $value) {
                $jumlahs[] = $value;
            }
        }

        return view('pages.cs.permohonan.verifikasi-ulang', [
            'parameters' => $parameters,
            'jumlahs'    => $jumlahs,
            'permohonan' => $permohonan,
        ]);
    }

    public function proses_verifikasi_permohonan(Request $request, $id)
    {

        $permohonan = Permohonansampel::where('id', '=', $id)->first();

        $update_permohonan = Permohonansampel::where('id', '=', $id)->update([
            'total'         => $request->total,
            'status'        => 1,
            'verifikasi_cs' => 1,
        ]);

        $delete_parameter = Permohonanparameter::where('permohonansampel_id', '=', $id)->delete();

        if ($request->parameters != NULL && $update_permohonan) {
            $j = 0;
            foreach ($request['parameters'] as $value) {
                $getp   = Parameter::where('id', '=', $value)->first();
                $total_ = $request->jumlahs[$j] * $getp->harga;
                $insert = Permohonanparameter::create([
                    'permohonansampel_id' => $id,
                    'jp_id'               => $getp->jp_id,
                    'parameter_id'        => $value,
                    'harga'               => $getp->harga,
                    'jumlah'              => $request->jumlahs[$j],
                    'total'               => $total_,
                    'nomor'               => $getp->nomor,
                ]);

                $j++;
            }
        }

        if ($update_permohonan) {
            return redirect()->route('cs.all.permohonan')->with('success', 'Verifikasi Data Berhasil');
        } else {
            return redirect()->back()->with('error', 'Simpan Data gagal');
        }
    }

    // report
    public function report(Request $request)
    {

        $get_tahun = $request->tahun != NULL ? $request->tahun : '0';
        $get_bulan = $request->bulan != NULL ? $request->bulan : '0';

        $years = DB::table('permohonansampels')
            ->select(DB::raw('YEAR(created_at) year'))
            ->groupBy('year')
            ->get();

        if ($get_tahun != '0' && $get_bulan != '0') {
            $c = Permohonansampel::whereIn('status', [7, 8])
                ->whereYear('created_at', '=', $get_tahun)
                ->whereMonth('created_at', '=', $get_bulan)
                ->get();
        } else if ($get_tahun == '0' && $get_bulan != '0') {
            $c = Permohonansampel::whereIn('status', [7, 8])
                ->whereMonth('created_at', '=', $get_bulan)
                ->get();
        } else if ($get_tahun != '0' && $get_bulan == '0') {
            $c = Permohonansampel::whereIn('status', [7, 8])
                ->whereYear('created_at', '=', $get_tahun)
                ->get();
        } else {
            $c = Permohonansampel::whereIn('status', [7, 8])->get();
        }

        return view('pages.cs.report.all', [
            'get_tahun' => $get_tahun,
            'get_bulan' => $get_bulan,
            'years'     => $years,
            'c'         => $c,
        ]);
    }

    public function datatable_report($tahun, $bulan)
    {
        //
        if ($tahun != '0' && $bulan != '0') {
            $result = Permohonansampel::whereIn('status', [7, 8])
                ->whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', $bulan)
                ->get();
        } else if ($tahun == '0' && $bulan != '0') {
            $result = Permohonansampel::whereIn('status', [7, 8])
                ->whereMonth('created_at', '=', $bulan)
                ->get();
        } else if ($tahun != '0' && $bulan == '0') {
            $result = Permohonansampel::whereIn('status', [7, 8])
                ->whereYear('created_at', '=', $tahun)
                ->get();
        } else {
            $result = Permohonansampel::whereIn('status', [7, 8])->get();
        }

        $no = 0;
        foreach ($result as $value) {
            $no++;
            $row = [];

            $row[] = $no;

            $row[] = date('d-m-Y', strtotime($value->created_at));

            $row[] = $value->nomor_sertifikat;

            $row[] = $value->nama;

            $row[] = $value->jenis_sampel;

            $parameters_select = Permohonanparameter::where('permohonansampel_id', '=', $value->id)->get();

            $value_p = '';
            foreach ($parameters_select as $p_) {
                $dp = Parameter::where('id', '=', $p_->parameter_id)->first();
                $value_p .= '
                        <li>' . $dp->parameter . ' : ' . $p_->jumlah . '</li>
                ';
            }

            $row[] = $value_p;

            $data[] = $row;
        }
        return DataTables::of($data)->escapeColumns([])->make(true);
    }

    public function pdf_report($tahun, $bulan)
    {
        //
        if ($tahun != '0' && $bulan != '0') {
            $result = Permohonansampel::whereIn('status', [7, 8])
                ->whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', $bulan)
                ->get();
        } else if ($tahun == '0' && $bulan != '0') {
            $result = Permohonansampel::whereIn('status', [7, 8])
                ->whereMonth('created_at', '=', $bulan)
                ->get();
        } else if ($tahun != '0' && $bulan == '0') {
            $result = Permohonansampel::whereIn('status', [7, 8])
                ->whereYear('created_at', '=', $tahun)
                ->get();
        } else {
            $result = Permohonansampel::whereIn('status', [7, 8])->get();
        }

        $pdf = PDF::loadView('pages.cs.report.pdf', compact('result'))->setPaper('a4', 'landscape');

        return $pdf->stream('report.pdf');
    }

    public function all_permohonan_sampel(Request $request)
    {
        $get_tahun = $request->tahun != NULL ? $request->tahun : '0';
        $get_bulan = $request->bulan != NULL ? $request->bulan : '0';

        $years = DB::table('permohonansampels')
            ->select(DB::raw('YEAR(created_at) year'))
            ->groupBy('year')
            ->get();

        if ($get_tahun != '0' && $get_bulan != '0') {
            $c = Permohonansampel::whereIn('status', [1, 2, 3, 4, 5, 6, 7, 8])
                ->whereYear('created_at', '=', $get_tahun)
                ->whereMonth('created_at', '=', $get_bulan)
                ->get();
        } else if ($get_tahun == '0' && $get_bulan != '0') {
            $c = Permohonansampel::whereIn('status', [1, 2, 3, 4, 5, 6, 7, 8])
                ->whereMonth('created_at', '=', $get_bulan)
                ->get();
        } else if ($get_tahun != '0' && $get_bulan == '0') {
            $c = Permohonansampel::whereIn('status', [1, 2, 3, 4, 5, 6, 7, 8])
                ->whereYear('created_at', '=', $get_tahun)
                ->get();
        } else {
            $c = Permohonansampel::whereIn('status', [1, 2, 3, 4, 5, 6, 7, 8])->get();
        }

        return view('pages.cs.report.all-permohonan-sampel', [
            'get_tahun' => $get_tahun,
            'get_bulan' => $get_bulan,
            'years'     => $years,
            'c'         => $c,
        ]);
    }

    public function datatable_all_permohonan_sampel($tahun, $bulan)
    {
        //
        if ($tahun != '0' && $bulan != '0') {
            $result = Permohonansampel::whereIn('status', [1, 2, 3, 4, 5, 6, 7, 8])
                ->whereYear('created_at', '=', $tahun)
                ->whereMonth('created_at', '=', $bulan)
                ->get();
        } else if ($tahun == '0' && $bulan != '0') {
            $result = Permohonansampel::whereIn('status', [1, 2, 3, 4, 5, 6, 7, 8])
                ->whereMonth('created_at', '=', $bulan)
                ->get();
        } else if ($tahun != '0' && $bulan == '0') {
            $result = Permohonansampel::whereIn('status', [1, 2, 3, 4, 5, 6, 7, 8])
                ->whereYear('created_at', '=', $tahun)
                ->get();
        } else {
            $result = Permohonansampel::whereIn('status', [1, 2, 3, 4, 5, 6, 7, 8])->get();
        }

        $no = 0;
        foreach ($result as $value) {
            $no++;
            $row = [];

            $row[] = $no;

            $row[] = date('d-m-Y', strtotime($value->created_at));

            $row[] = $value->nama;

            $row[] = $value->hp;

            $row[] = $value->alamat;

            if ($value->status == 0) {
                $status = '<span class="text-danger">Belum Diterima</span>';
            } else if ($value->status == 1) {
                if ($value->verifikasi_cs == 1 && $value->verifikasi_pemohon == 0 && $value->status_pembayaran == 0) {
                    $status = '<span class="text-success">Lakukan Pembayaran</span>';
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

            $row[] = '<a href="' . route('cs.detail-all-permohonan-sampel', ['id' => $value->id]) . '" target="_blank" class="btn btn-sm btn-primary">Detail</a>';

            $data[] = $row;
        }
        return DataTables::of($data)->escapeColumns([])->make(true);
    }

    public function detail_all_permohonan_sampel($id)
    {
        $permohonan = Permohonansampel::where('id', '=', $id)->first();

        $parameters = Permohonanparameter::where('permohonansampel_id', '=', $id)->get();

        return view('pages.cs.report.detail-all-permohonan-sampel', [
            'permohonan' => $permohonan,
            'parameters' => $parameters,
        ]);
    }
}
