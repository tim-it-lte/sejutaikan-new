<?php

namespace App\Http\Controllers;

use App\Models\Jp;
use App\Models\Parameter;
use App\Models\Permohonanparameter;
use App\Models\Permohonansampel;
use Auth;
use Illuminate\Http\Request;
use PDF;

class PermohonanController extends Controller
{

    public function ajukan_permohonan(Request $request)
    {
        $parameters = Parameter::all();
        $jps        = Jp::all();

        return view('pages.pemohon.ajuan-permohonan.create', [
            'parameters' => $parameters,
            'jps'        => $jps,
        ]);
    }

    public function verifikasi_ajuan_permohonan(Request $request)
    {

        // **
        // handler validation
        $this->validate($request, [
            // 'jenis_permohonan' => 'required',
            'jenis'  => 'required',
            'nama'   => 'required',
            'hp'     => 'required',
            'alamat' => 'required',
        ]);

        $parameters = [];
        $jumlahs    = [];

        if ($request->parameters != NULL) {
            foreach ($request['parameters'] as $value) {
                $parameters[] = $value;
            }

            foreach ($request['jumlahs'] as $value) {
                $jumlahs[] = $value;
            }
        } else {
            return redirect()->route('pemohon.ajukan-permohonan')->with('error', 'Anda Belum Pilih Parameter');
        }

        return view('pages.pemohon.ajuan-permohonan.verifikasi', [
            'parameters'    => $parameters,
            'jumlahs'       => $jumlahs,
            'jenis'         => $request->jenis,
            'nama'          => $request->nama,
            'hp'            => $request->hp,
            'alamat'        => $request->alamat,
            'jenis_sampel'  => $request->jenis_sampel,
            'spesies'       => $request->spesies,
            'kode_sampel'   => $request->kode_sampel,
            'negara_tujuan' => $request->negara_tujuan,
            'jumlah_sampel' => $request->jumlah_sampel,
            'perusahaan'    => $request->perusahaan,
        ]);
    }

    public function proses_ajuan_permohonan(Request $request)
    {
        /*
        * Buat no. Permohonan (KDP) baru, tiap tahun mulai lagi dari KDP-00001
        */
        $lastNumber = 0;
        $nowYear = date('Y');
        $permohonansLastYear = Permohonansampel::whereYear('created_at', $nowYear)->orderBy('kode', 'DESC');

        if ($permohonansLastYear->count() >= 1) {
            $lastRow = $permohonansLastYear->first();
            $lastNumber = (int) substr($lastRow->kode, 4, 5);
        }

        $lastNumber++;
        $prefix = "KDP-";
        $kodePermohonanBaru = $prefix . sprintf("%05s", $lastNumber);

        $jp_ = Jp::orderBy('id', 'ASC')->first();

        /*
        * INSERT ke Database
        */
        $insert_permohonan = Permohonansampel::create([
            'user_id'             => Auth::user()->id,
            'jenis_permohonan_id' => $jp_->id,
            'kode'                => $kodePermohonanBaru,
            'jenis'               => $request->jenis,
            'nama'                => $request->nama,
            'perusahaan'          => $request->perusahaan,
            'hp'                  => $request->hp,
            'alamat'              => $request->alamat,
            'total'               => $request->total,
            'jenis_sampel'        => $request->jenis_sampel,
            'spesies'             => $request->spesies,
            'kode_sampel'         => $request->kode_sampel,
            'negara_tujuan'       => $request->negara_tujuan,
            'jumlah_sampel'       => $request->jumlah_sampel,
            'istte'               => 1,
        ]);

        if ($request->parameters != NULL && $insert_permohonan) {
            $j = 0;
            foreach ($request['parameters'] as $value) {
                $getp   = Parameter::where('id', '=', $value)->first();
                $total_ = $request->jumlahs[$j] * $getp->harga;
                $insert = Permohonanparameter::create([
                    'permohonansampel_id' => $insert_permohonan->id,
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

        if ($insert_permohonan) {
            return view('pages.pemohon.ajuan-permohonan.sukses', [
                'kode' => $insert_permohonan->kode,
            ]);
        } else {
            return redirect()->route('pemohon.ajukan-permohonan')->with('error', 'Gagal Kirim Data');
        }
    }

    // **
    // permohonan
    public function verifikasi_ulang_permohonan($id)
    {
        $permohonan = Permohonansampel::where('id', '=', $id)->first();

        $parameters = Permohonanparameter::where('permohonansampel_id', '=', $id)->get();

        return view('pages.pemohon.verifikasi-ulang.index', [
            'permohonan' => $permohonan,
            'parameters' => $parameters,
        ]);
    }

    public function proses_verifikasi_ulang_permohonan(Request $request, $id)
    {
        $permohonan = Permohonansampel::where('id', '=', $id)->update([
            'verifikasi_pemohon' => 1,
        ]);

        if ($permohonan) {
            return redirect()->route('pemohon.all.permohonan')->with('error', 'Sukses Verifikasi Permohonan');
        } else {
            return redirect()->route('pemohon.all.permohonan')->with('error', 'Gagal Verifikasi Permohonan');
        }
    }

    public function pilih_parameter_lainnya($id)
    {
        $permohonan = Permohonansampel::where('id', '=', $id)->first();

        $parameters_select = Permohonanparameter::where('permohonansampel_id', '=', $id)->get();

        $parameters = Parameter::all();

        function in_array_r($needle, $haystack, $strict = false)
        {
            foreach ($haystack as $item) {
                if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
                    return true;
                }
            }

            return false;
        }

        // **

        foreach ($parameters_select as $parameter) {
            $row = [];

            $row['id'] = $parameter->parameter_id;

            $parameters_select_[] = $row;
        }

        //

        foreach ($parameters as $value) {
            if (!in_array_r($value->id, $parameters_select_)) {
                $row = [];

                $row['id'] = $value->id;

                $row['jp_id'] = $value->jp_id;

                $row['parameter'] = $value->parameter;

                $row['harga'] = $value->harga;

                $row['nomor'] = $value->nomor;

                $row['aktif'] = $value->aktif;

                $row['pesan'] = $value->pesan;

                $parameters_[] = $row;
            }
        }

        $jps = Jp::all();

        return view('pages.pemohon.verifikasi-ulang.pilih-parameter-lainnya', [
            'permohonan'        => $permohonan,
            'parameters_select' => $parameters_select,
            'jps'               => $jps,
            'parameters'        => $parameters_,
        ]);
    }

    public function verifikasi_pilih_parameter_lainnya(Request $request, $id)
    {
        // **
        // handler validation
        $this->validate($request, [
            // 'jenis_permohonan' => 'required',
            'jenis' => 'required',
            'nama'  => 'required',
        ]);

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
        } else {
            return redirect()->route('pemohon.pilih-parameter-lainnya', ['id' => $id])->with('error', 'Anda Belum Pilih Parameter');
        }

        return view('pages.pemohon.verifikasi-ulang.verifikasi', [
            'parameters'       => $parameters,
            'jumlahs'          => $jumlahs,
            'jenis_permohonan' => $request->jenis_permohonan,
            'jenis'            => $request->jenis,
            'nama'             => $request->nama,
            'perusahaan'       => $request->perusahaan,
            'hp'               => $request->hp,
            'alamat'           => $request->alamat,
            'permohonan'       => $permohonan,
            'jenis_sampel'     => $request->jenis_sampel,
            'spesies'          => $request->spesies,
            'kode_sampel'      => $request->kode_sampel,
            'negara_tujuan'    => $request->negara_tujuan,
            'jumlah_sampel'    => $request->jumlah_sampel,
        ]);
    }

    public function proses_pilih_parameter_lainnya(Request $request, $id)
    {

        $jp_ = Jp::orderBy('id', 'ASC')->first();

        $update_permohonan = Permohonansampel::where('id', '=', $id)->update([
            'jenis_permohonan_id' => $jp_->id,
            'jenis'               => $request->jenis,
            'nama'                => $request->nama,
            'perusahaan'          => $request->perusahaan,
            'hp'                  => $request->hp,
            'alamat'              => $request->alamat,
            'total'               => $request->total,
            'status'              => 0,
            'verifikasi_cs'       => 0,
            'verifikasi_pemohon'  => 0,
            'jenis_sampel'        => $request->jenis_sampel,
            'spesies'             => $request->spesies,
            'kode_sampel'         => $request->kode_sampel,
            'negara_tujuan'       => $request->negara_tujuan,
            'jumlah_sampel'       => $request->jumlah_sampel,
        ]);

        $delete_parameter = Permohonanparameter::where('permohonansampel_id', '=', $id)->delete();

        if ($request->parameters != NULL && $delete_parameter) {
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
            return redirect()->route('pemohon.all.permohonan')->with('success', 'Ajukan Ulang Permohonan Berhasil');
        } else {
            return redirect()->route('pemohon.pilih-parameter-lainnya', ['id' => $id])->with('error', 'Gagal Kirim Data');
        }
    }

    // **
    // pembayaran
    public function pembayaran($id)
    {
        $permohonan = Permohonansampel::where('id', '=', $id)->first();

        $parameters_select = Permohonanparameter::where('permohonansampel_id', '=', $permohonan->id)->get();

        return view('pages.pemohon.pembayaran.index', [
            'permohonan'        => $permohonan,
            'parameters_select' => $parameters_select,
        ]);
    }

    public function proses_pembayaran(Request $request, $id)
    {
        // **
        // handler validation
        $this->validate($request, [
            'foto' => 'required',
        ]);

        if ($request->hasFile('foto')) {
            $foto     = $request->file('foto');
            $filename = time() . "." . $foto->getClientOriginalExtension();
            $request->foto->storeAs('bukti-bayar', $filename);
        }

        $permohonan = Permohonansampel::where('id', '=', $id)->update([
            'status_pembayaran' => 1,
            'bukti_bayar'       => $filename,
            'tgl_bayar'         => date('Y-m-d')
        ]);

        if ($permohonan) {
            return redirect()->route('pemohon.all.permohonan')->with('success', 'Kirim Bukti Bayar Berhasil');
        } else {
            return redirect()->back()->with('error', 'Gagal Kirim Data');
        }
    }

    public function cek_pesan_dikembalikan($id)
    {
        $permohonan = Permohonansampel::where('id', '=', $id)->first();

        $parameters_select = Permohonanparameter::where('permohonansampel_id', '=', $permohonan->id)->get();

        return view('pages.pemohon.pembayaran.lihat-alasan-dikembalikan', [
            'permohonan'        => $permohonan,
            'parameters_select' => $parameters_select,
        ]);
    }

    public function cetak_sertifikat($id)
    {
        $permohonan = Permohonansampel::where('id', '=', $id)->first();
        $parameters_select = Permohonanparameter::where('permohonansampel_id', '=', $permohonan->id)->get();

        $pdf = PDF::loadView('pages.pemohon.permohonan.cetak-sertifikat', compact('permohonan', 'parameters_select'))->setPaper(0, 0, 609.4488, 935.433, 'potrait');
        return $pdf->stream('sertifikat.pdf');
    }
}
