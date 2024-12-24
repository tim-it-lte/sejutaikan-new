<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Auth;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller {
    public function index() {
        $c = Berita::all();

        if (Auth::user()->role == 'admin') {
            return view('pages.admin.berita.all', [
                'c' => $c,
            ]);
        }
    }

    // **
    // handler slider datatables
    public function datatables() {
        $result = Berita::latest()->get();
        $no     = 0;
        foreach ($result as $value) {
            $no++;
            $row = [];

            $row[] = $no;

            $row[] = '<img src="' . asset('storage/berita/' . $value->foto) . '" alt="" style="max-width: 90px; filter: drop-shadow(3px 10px 4px black);">';

            $row[] = ucwords($value->judul);

            $row[] = '<div class="d-flex align-items-center"><a href="' . route('admin.berita.edit', ['id' => $value->id]) . '" title="Edit" class="btn btn-sm btn-primary mr-2" style="filter: drop-shadow(3px 10px 4px black);"><i class="ti-pencil-alt"></i> edit</a>&nbsp;
                <a href="javascript:void" onclick="delData(' . $value->id . ')" style="filter: drop-shadow(3px 10px 4px black);" title="Delete" class="btn btn-sm btn-danger"><i class="ti-trash"></i>hapus</a>
                </div>';
            $data[] = $row;
        }
        return DataTables::of($data)->escapeColumns([])->make(true);
    }

    public function create() {
        if (Auth::user()->role == 'admin') {
            return view('pages.admin.berita.create');
        }
    }

    public function store(Request $request) {
        // **
        // handler validation
        $this->validate($request, [
            'judul' => 'required|unique:beritas,judul',
            'isi'   => 'required|min:10',
            'foto'  => 'required',
        ]);

        if ($request->hasFile('foto')) {
            $foto     = $request->file('foto');
            $filename = time() . "." . $foto->getClientOriginalExtension();
            $request->foto->storeAs('berita', $filename);
        } else {
            $filename = 'default.png';
        }

        // **
        // handler foto
        if ($request->hasFile('lampiran')) {
            $lampiran          = $request->file('lampiran');
            $filename_lampiran = time() . "." . $lampiran->getClientOriginalExtension();
            $request->lampiran->storeAs('berita', $filename_lampiran);
        }

        $insert = Berita::create([
            'judul'      => ucwords($request->judul),
            'slug_judul' => Str::slug($request->judul, '-'),
            'isi'        => $request->isi,
            'file'       => $request->hasFile('lampiran') ? $filename_lampiran : '0',
            'foto'       => $filename,
            'url_video'  => $request->url_video,
        ]);

        if ($insert) {
            return redirect()->route('admin.berita.all')->with('success', 'Simpan Data Berhasil');
        } else {
            return redirect()->back()->with('error', 'Simpan Data gagal');
        }
    }

    public function edit($id) {
        $r = Berita::where('id', '=', $id)->first();

        if (Auth::user()->role == 'admin') {
            return view('pages.admin.berita.edit', [
                'result' => $r,
            ]);
        }
    }

    public function update(Request $request, $id) {
        // **
        // handler validation
        $this->validate($request, [
            'judul' => 'required|unique:beritas,judul,' . $id,
            'isi'   => 'required|min:10',
        ]);

        $dataOld = Berita::where('id', '=', $id)->first();

        if ($request->hasFile('foto')) {
            $foto     = $request->file('foto');
            $filename = time() . "." . $foto->getClientOriginalExtension();
            $request->foto->storeAs('berita', $filename);

            if ($dataOld->foto != '0') {
                Storage::delete('berita/' . $dataOld->foto);
            }
        } else {
            $filename = $dataOld->foto;
        }

        // **
        // handler foto
        if ($request->hasFile('lampiran')) {
            $lampiran          = $request->file('lampiran');
            $filename_lampiran = time() . "." . $lampiran->getClientOriginalExtension();
            $request->lampiran->storeAs('berita', $filename_lampiran);

            Storage::delete('berita/' . $dataOld->file);
        } else {
            $filename_lampiran = $dataOld->file;
        }

        $update = Berita::where('id', '=', $id)->update([
            'judul'      => ucwords($request->judul),
            'slug_judul' => Str::slug($request->judul, '-'),
            'isi'        => $request->isi,
            'file'       => $filename_lampiran,
            'foto'       => $filename,
            'url_video'  => $request->url_video,
        ]);

        if ($update) {
            return redirect()->route('admin.berita.all')->with('success', 'Ubah Data Berhasil');
        } else {
            return redirect()->back()->with('error', 'Ubah Kegiatan gagal');
        }
    }

    public function destroy($id) {
        $beritaOld = Berita::where('id', '=', $id)->first();

        if ($beritaOld->foto != 'default.jpg') {
            Storage::delete('berita/' . $beritaOld->foto);
        }

        $delete = Berita::destroy($id);

        return redirect()->back();
    }
}
