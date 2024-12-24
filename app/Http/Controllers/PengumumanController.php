<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Auth;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengumumanController extends Controller {
    public function index() {
        $c = Pengumuman::all();

        if (Auth::user()->role == 'admin') {
            return view('pages.admin.pengumuman.all', [
                'c' => $c,
            ]);
        }
    }

    // **
    // handler slider datatables
    public function datatables() {
        $result = Pengumuman::latest()->get();
        $no     = 0;
        foreach ($result as $value) {
            $no++;
            $row = [];

            $row[] = $no;

            $row[] = ucwords($value->judul);

            $row[] = '<a target="_blank" href="' . asset('storage/pengumuman/' . $value->lampiran) . '" class="btn btn-sm btn-success">Lampiran</a>';

            $row[] = '<a href="' . route('admin.pengumuman.edit', ['id' => $value->id]) . '" title="Edit" class="btn btn-sm btn-primary" style="filter: drop-shadow(3px 10px 4px black);"><i class="ti-pencil-alt"></i> edit</a>&nbsp;
                <a style="filter: drop-shadow(3px 10px 4px black);" href="javascript:void" onclick="delData(' . $value->id . ')" title="Delete" class="btn btn-sm btn-danger"><i class="ti-trash"></i>hapus</a>
                ';
            $data[] = $row;
        }
        return DataTables::of($data)->escapeColumns([])->make(true);
    }

    public function create() {
        if (Auth::user()->role == 'admin') {
            return view('pages.admin.pengumuman.create');
        }
    }

    public function store(Request $request) {
        // **
        // handler validation
        $this->validate($request, [
            'judul'    => 'required|unique:pengumumen,judul',
            'lampiran' => 'required',
        ]);

        if ($request->hasFile('lampiran')) {
            $lampiran = $request->file('lampiran');
            $filename = time() . "." . $lampiran->getClientOriginalExtension();
            $request->lampiran->storeAs('pengumuman', $filename);
        } else {
            $filename = '0';
        }

        $insert = Pengumuman::create([
            'judul'    => ucwords($request->judul),
            'lampiran' => $filename,
        ]);

        if ($insert) {
            return redirect()->route('admin.pengumuman.all')->with('success', 'Simpan Data Berhasil');
        } else {
            return redirect()->back()->with('error', 'Simpan Data gagal');
        }
    }

    public function edit($id) {
        $r = Pengumuman::where('id', '=', $id)->first();

        if (Auth::user()->role == 'admin') {
            return view('pages.admin.pengumuman.edit', [
                'result' => $r,
            ]);
        }
    }

    public function update(Request $request, $id) {
        // **
        // handler validation
        $this->validate($request, [
            'judul' => 'required|unique:pengumumen,judul,' . $id,
        ]);

        $dataOld = Pengumuman::where('id', '=', $id)->first();

        if ($request->hasFile('lampiran')) {
            $lampiran = $request->file('lampiran');
            $filename = time() . "." . $lampiran->getClientOriginalExtension();
            $request->lampiran->storeAs('pengumuman', $filename);

            Storage::delete('pengumuman/' . $dataOld->lampiran);
        } else {
            $filename = $dataOld->lampiran;
        }

        $update = Pengumuman::where('id', '=', $id)->update([
            'judul'    => ucwords($request->judul),
            'lampiran' => $filename,
        ]);

        if ($update) {
            return redirect()->route('admin.pengumuman.all')->with('success', 'Ubah Data Berhasil');
        } else {
            return redirect()->back()->with('error', 'Ubah Data gagal');
        }
    }

    public function destroy($id) {
        $dataOld = Pengumuman::where('id', '=', $id)->first();

        Storage::delete('pengumuman/' . $dataOld->lampiran);

        $delete = Pengumuman::destroy($id);

        return redirect()->back();
    }
}
