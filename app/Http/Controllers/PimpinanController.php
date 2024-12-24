<?php

namespace App\Http\Controllers;

use App\Models\Permohonanparameter;
use App\Models\Permohonansampel;
use App\Models\Ttd;
use Auth;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class PimpinanController extends Controller
{
    public function index()
    {
        $cp = Permohonansampel::where('status', '=', 7)->get();
        return view('pages.pimpinan.home', [
            'cp' => $cp,
        ]);
    }

    public function daftar_permohonan()
    {
        $c = Permohonansampel::where('status', '=', 7)->orWhere('status', '=', 8)->get();

        if (Auth::user()->role == 'pimpinan') {
            return view('pages.pimpinan.permohonan.all', [
                'c' => $c,
            ]);
        }
    }

    // **
    // handler daftar permohonan datatables
    public function datatable_daftar_permohonan()
    {
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

            if ($value->istte == 1 && $value->status == 8) {
                $row[] = '<a href="/public/storage/certificate/' . $value->pdf . '" title="Sertifikat" class="btn btn-sm btn-success" target="_blank" style="filter: drop-shadow(3px 10px 4px black);">Sertifikat</a>';
            } else if ($value->istte == 0 && $value->status == 8) {
                $row[] = '<a href="' . route('pimpinan.cetak-sertifikat', ['id' => $value->id]) . '" title="Sertifikat" class="btn btn-sm btn-success" target="_blank" style="filter: drop-shadow(3px 10px 4px black);">Sertifikat</a>';
            } else {
                $row[] = '<a href="' . route('pimpinan.cetak-sertifikat', ['id' => $value->id]) . '" title="Sertifikat" class="btn btn-sm btn-success" target="_blank" style="filter: drop-shadow(3px 10px 4px black);">Sertifikat</a>';
            }

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

    public function detail_permohonan($id)
    {
        $permohonan = Permohonansampel::where('id', '=', $id)->first();

        $parameters_select = Permohonanparameter::where('permohonansampel_id', '=', $permohonan->id)->get();

        if (Auth::user()->role == 'pimpinan') {
            return view('pages.pimpinan.permohonan.pengujian-detail', [
                'permohonan'        => $permohonan,
                'parameters_select' => $parameters_select,
            ]);
        }
    }

    public function edit_ttd()
    {
        $get_ = Ttd::orderBy('id', 'DESC')->first();

        if (Auth::user()->role == 'pimpinan') {
            return view('pages.pimpinan.ttd.edit', [
                'result' => $get_,
            ]);
        }
    }

    public function update_ttd(Request $request)
    {
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

    public function ttd_permohonan($id)
    {
        $permohonanData = Permohonansampel::where('id', '=', $id)->first();
        if ($permohonanData->istte == 1) {
            $permohonan = Permohonansampel::where('id', '=', $id)->update([
                'status' => 8,
            ]);

            if ($permohonan) {
                return redirect()->back()->with('success', 'Sukses Membubuhi Tanda Tangan Pada Sertifikat Pengujian');
            } else {
                return redirect()->back()->with('error', 'Gagal Proses');
            }
        } else {
            return view('pages.pimpinan.tte.form', [
                'id' => $id,
            ]);
        }
    }

    // baru

    // public function ttd_permohonan($id) {
    //     return view('pages.pimpinan.tte.form', [
    //         'id' => $id,
    //     ]);
    // }

    public function tte_action00(Request $request, $id)
    {
        // Validasi
        $this->validate($request, [
            'passphrase' => 'required',
        ]);

        $id_update = $id;
        // Informasi dan konfigurasi
        $username = 'Sejutaikan';
        $password = '#Sejutaikan';
        $endpoint_upload = 'http://103.151.191.72/api/sign/pdf';
        $uniqueString = bin2hex(random_bytes(10)); // String unik untuk QR Code
        $qrCodeUrl = "https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=" . urlencode($uniqueString);

        // Unduh QR Code
        $tempQrFilePath = storage_path('app/public/temp_qr_code.png');
        $ch = curl_init($qrCodeUrl);
        $fp = fopen($tempQrFilePath, 'wb');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Ikuti redirect jika ada
        curl_setopt($ch, CURLOPT_TIMEOUT, 30); // Set timeout
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);

        // Cek apakah file diunduh dengan benar
        if (!file_exists($tempQrFilePath) || filesize($tempQrFilePath) == 0) {
            return redirect()->back()->with('error', 'Gagal mengunduh QR Code');
        }

        // Muat gambar QR Code
        $qrCodeImage = imagecreatefrompng($tempQrFilePath);
        if (!$qrCodeImage) {
            return redirect()->back()->with('error', 'File QR Code tidak valid');
        }

        // Tambahkan logo
        $logoImage = imagecreatefrompng(public_path('images/logo_sulsel.png'));
        $logoWidth = imagesx($logoImage);
        $logoHeight = imagesy($logoImage);
        $newLogoWidth = 60;
        $newLogoHeight = 60;
        $resizedLogo = imagecreatetruecolor($newLogoWidth, $newLogoHeight);
        imagecopyresampled($resizedLogo, $logoImage, 0, 0, 0, 0, $newLogoWidth, $newLogoHeight, $logoWidth, $logoHeight);

        // Copy logo ke QR Code
        $qrWidth = imagesx($qrCodeImage);
        $qrHeight = imagesy($qrCodeImage);
        $logoX = ($qrWidth / 2) - ($newLogoWidth / 2);
        $logoY = ($qrHeight / 2) - ($newLogoHeight / 2);
        imagecopy($qrCodeImage, $resizedLogo, $logoX, $logoY, 0, 0, $newLogoWidth, $newLogoHeight);

        // Simpan gambar QR Code final
        $finalQrCodePath = storage_path('app/public/final_qr_code.png');
        imagepng($qrCodeImage, $finalQrCodePath);

        // Bersihkan memori gambar
        imagedestroy($qrCodeImage);
        imagedestroy($logoImage);
        imagedestroy($resizedLogo);
        unlink($tempQrFilePath);

        // Load PDF dengan tampilan yang diinginkan, menyertakan gambar QR Code
        $pdf = PDF::loadView('pages.pemohon.permohonan.cetak-sertifikat', [
            'permohonan' => $permohonan,
            'parameters_select' => $parameters_select,
            'qrCodePath' => asset('storage/final_qr_code.png') // Path untuk diakses di view
        ])->setPaper([0, 0, 360, 360], 'portrait');

        $pdfContent = $pdf->output();

        // Kirim file PDF ke endpoint menggunakan Basic Auth
        $response = Http::withBasicAuth($username, $password)
            ->attach('file', $pdfContent, 'sertifikat.pdf')
            ->post($endpoint_upload, [
                'nik' => '7371135309670001',
                'passphrase' => $request->passphrase,
                'tampilan' => 'visible',
                'page' => '1',
                'image' => 'false',
                'linkQR' => 'https://sejutaikan-bpmpp.info/',
                'xAxis' => '20',
                'yAxis' => '60',
                'width' => '130',
                'height' => '130',
            ]);

        // Cek apakah request berhasil
        if ($response->successful()) {
            $fileName = uniqid() . '_signed_sertifikat.pdf';
            $fileContent = $response->body();

            // Simpan file PDF yang ditandatangani
            Storage::disk('public')->put('certificate/' . $fileName, $fileContent);

            // Update status permohonan
            Permohonansampel::where('id', '=', $id_update)->update([
                'status' => 8,
                'pdf'    => $fileName,
            ]);

            return redirect()->route('pimpinan.all.permohonan')->with('success', 'Sukses Pembubuhan TTE');
        } else {
            return redirect()->route('pimpinan.all.permohonan')->with('error', 'Gagal Pembubuhan TTE');
        }
    }


    public function tte_action222(Request $request, $id)
    {
        // **
        // handler validation
        $this->validate($request, [
            'passphrase' => 'required',
        ]);

        // qr code sulsel
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = substr(str_shuffle($characters), 0, 10);

        // Simpan responsenya sebagai file di direktori Laravel
        $fileName = $randomString . $id . 'signed_sertifikat.pdf'; // Nama file yang disimpan
        $data = 'https://sejutaikan-bpmpp.info/public/certificate/' . $fileName;
        $qrCodeUrl = "https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=" . urlencode($data);

        // end

        $id_update = $id;

        $username = 'Sejutaikan';
        $password = '#Sejutaikan';
        $endpoint_upload = 'http://103.151.191.72/api/sign/pdf';

        $get_ = Ttd::orderBy('id', 'DESC')->first();

        // sertifikat non tte
        $permohonan = Permohonansampel::where('id', '=', $id)->first();

        $parameters_select = Permohonanparameter::where('permohonansampel_id', '=', $permohonan->id)->get();

        $pdf = PDF::loadView('pages.pemohon.permohonan.cetak-sertifikat', compact('permohonan', 'parameters_select', 'qrCodeUrl'))->setPaper(0, 0, 360, 360, 'potrait');

        $pdfContent = $pdf->output();

        // Buat request HTTP dengan Basic Auth dan kirim file PDF yang sudah dihasilkan
        $response = Http::withBasicAuth($username, $password)
            ->attach(
                'file',
                $pdfContent,
                'sertifikat.pdf' // Mengirimkan PDF sebagai file
            )->post($endpoint_upload, [
                'nik' => '7371135309670001',
                'passphrase' => $request->passphrase,
                'tampilan' => 'visible',
                'page' => '1',
                'image' => 'false',
                'linkQR' => 'https://sejutaikan-bpmpp.info/',
                'xAxis' => '320',
                'yAxis' => '300',
                'width' => '250',
                'height' => '250',
            ]);

        // Cek apakah request berhasil
        if ($response->successful()) {
            $fileContent = $response->body(); // Dapatkan konten file dari response

            //file_put_contents('public/storage/pdf/'.$fileName,$fileContent);
            //file_put_contents(storage_path('app/public/pdf/'.$fileName), $fileContent);
            Storage::disk('public')->put('certificate/' . $fileName, $fileContent);

            // update status permohonan
            $permohonan = Permohonansampel::where('id', '=', $id_update)->update([
                'status' => 8,
                'pdf'    => $fileName,
            ]);
            return redirect()->route('pimpinan.all.permohonan')->with('success', 'Sukses Pembubuhan TTE');
        } else {
            return redirect()->route('pimpinan.all.permohonan')->with('error', 'Gagal Pembubuhan TTE');
        }
    }

    public function tte_action(Request $request, $id)
    {
        // **
        // handler validation
        $this->validate($request, [
            'passphrase' => 'required',
        ]);

        $id_update = $id;

        $username = 'Sejutaikan';
        $password = '#Sejutaikan';
        $endpoint_upload = 'http://103.151.191.72/api/sign/pdf';

        // 
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = substr(str_shuffle($characters), 0, 10);

        // Simpan responsenya sebagai file di direktori Laravel
        $fileName = $randomString . $id . 'signed_sertifikat.pdf'; // Nama file yang disimpan

        // 

        $get_ = Ttd::orderBy('id', 'DESC')->first();
        // sertifikat non tte
        $permohonan = Permohonansampel::where('id', '=', $id)->first();

        $parameters_select = Permohonanparameter::where('permohonansampel_id', '=', $permohonan->id)->get();

        $pdf = PDF::loadView('pages.pemohon.permohonan.cetak-sertifikat', compact('permohonan', 'parameters_select', 'fileName'))->setPaper(0, 0, 360, 360, 'potrait');

        $pdfContent = $pdf->output();

        // Buat request HTTP dengan Basic Auth dan kirim file PDF yang sudah dihasilkan
        $response = Http::withBasicAuth($username, $password)
            ->attach(
                'file',
                $pdfContent,
                'sertifikat.pdf' // Mengirimkan PDF sebagai file
            )->post($endpoint_upload, [
                'nik' => '7371135309670001',
                'passphrase' => $request->passphrase,
                'tampilan' => 'visible',
                'page' => '1',
                'image' => 'false',
                'linkQR' => 'https://sejutaikan-bpmpp.info/public/storage/certificate/' . $fileName,
                'xAxis' => '320',
                'yAxis' => '120',
                'width' => '250',
                'height' => '250',
            ]);

        // Cek apakah request berhasil
        if ($response->successful()) {


            $fileContent = $response->body(); // Dapatkan konten file dari response

            //file_put_contents('public/storage/pdf/'.$fileName,$fileContent);
            //file_put_contents(storage_path('app/public/pdf/'.$fileName), $fileContent);
            Storage::disk('public')->put('certificate/' . $fileName, $fileContent);

            // update status permohonan
            $permohonan = Permohonansampel::where('id', '=', $id_update)->update([
                'status' => 8,
                'pdf'    => $fileName,
            ]);
            return redirect()->route('pimpinan.all.permohonan')->with('success', 'Sukses Pembubuhan TTE');
        } else {

            return redirect()->route('pimpinan.all.permohonan')->with('error', 'Gagal Pembubuhan TTE');
        }
    }
}
