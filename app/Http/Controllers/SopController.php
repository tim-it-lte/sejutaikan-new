<?php

namespace App\Http\Controllers;

use App\Models\Sop;
use Auth;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SopController extends Controller {
    public function index() {
        $c = Sop::all();

        if (Auth::user()->role == 'admin') {
            return view('pages.admin.sop.all', [
                'c' => $c,
            ]);
        }
    }

    // **
    // handler slider datatables
    public function datatables() {
        $result = Sop::orderBy('id', 'ASC')->get();
        $no     = 0;
        foreach ($result as $value) {
            $no++;
            $row = [];

            $row[] = $no;

            $row[] = '<img src="' . asset('storage/sop/' . $value->gambar) . '" alt="" style="max-width: 90px; filter: drop-shadow(3px 10px 4px black);">';

            $row[] = '<a href="' . route('admin.sop.edit', ['id' => $value->id]) . '" title="Edit" class="btn btn-sm btn-primary" style="filter: drop-shadow(3px 10px 4px black);"><i class="ti-pencil-alt"></i> edit</a>&nbsp;
                <a href="javascript:void" onclick="delData(' . $value->id . ')" style="filter: drop-shadow(3px 10px 4px black);" title="Delete" class="btn btn-sm btn-danger"><i class="ti-trash"></i>hapus</a>
                ';
            $data[] = $row;
        }
        return DataTables::of($data)->escapeColumns([])->make(true);
    }

    public function create() {
        if (Auth::user()->role == 'admin') {
            return view('pages.admin.sop.create');
        }
    }

    public function store(Request $request) {
        // **
        // handler validation
        $this->validate($request, [
            'gambar' => 'required',
        ]);

        if ($request->hasFile('gambar')) {
            $gambar   = $request->file('gambar');
            $filename = time() . "." . $gambar->getClientOriginalExtension();
            $request->gambar->storeAs('sop', $filename);
        }

        $insert = Sop::create([
            'gambar' => $filename,
        ]);

        if ($insert) {
            return redirect()->route('admin.sop.all')->with('success', 'Simpan Data Berhasil');
        } else {
            return redirect()->back()->with('error', 'Simpan Data gagal');
        }
    }

    public function edit($id) {
        $r = Sop::where('id', '=', $id)->first();

        if (Auth::user()->role == 'admin') {
            return view('pages.admin.sop.edit', [
                'result' => $r,
            ]);
        }
    }

    public function update(Request $request, $id) {
        // **
        // handler validation
        $this->validate($request, [
            'gambar' => 'required',
        ]);

        if ($request->hasFile('gambar')) {
            $gambar   = $request->file('gambar');
            $filename = time() . "." . $gambar->getClientOriginalExtension();
            $request->gambar->storeAs('sop', $filename);
        }

        $update = Sop::where('id', '=', $id)->update([
            'gambar' => $filename,
        ]);

        if ($update) {
            return redirect()->route('admin.sop.all')->with('success', 'Ubah Data Berhasil');
        } else {
            return redirect()->back()->with('error', 'Ubah Data gagal');
        }
    }

    public function destroy($id) {
        $sopOld = Sop::where('id', '=', $id)->first();

        Storage::delete('sop/' . $sopOld->gambar);

        $delete = Sop::destroy($id);

        return redirect()->back();
    }
}
