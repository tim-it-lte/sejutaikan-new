<?php

namespace App\Http\Controllers;

use App\Models\Jp;
use Auth;
use DataTables;
use Illuminate\Http\Request;

class JPController extends Controller {
    public function index() {
        $c = Jp::all();

        if (Auth::user()->role == 'admin') {
            return view('pages.admin.jenis-permohonan.all', [
                'c' => $c,
            ]);
        }
    }

    // **
    // handler slider datatables
    public function datatables() {
        $result = Jp::latest()->get();
        $no     = 0;
        foreach ($result as $value) {
            $no++;
            $row = [];

            $row[] = $no;

            $row[] = ucwords($value->jenis_permohonan);

            $row[] = '<a href="' . route('admin.jenis-permohonan.edit', ['id' => $value->id]) . '" title="Edit" class="btn btn-sm btn-primary" style="filter: drop-shadow(3px 10px 4px black);"><i class="ti-pencil-alt"></i> edit</a>&nbsp;
                <a href="javascript:void" onclick="delData(' . $value->id . ')" style="filter: drop-shadow(3px 10px 4px black);" title="Delete" class="btn btn-sm btn-danger"><i class="ti-trash"></i>hapus</a>
                ';
            $data[] = $row;
        }
        return DataTables::of($data)->escapeColumns([])->make(true);
    }

    public function create() {
        if (Auth::user()->role == 'admin') {
            return view('pages.admin.jenis-permohonan.create');
        }
    }

    public function store(Request $request) {
        // **
        // handler validation
        $this->validate($request, [
            'permohonan' => 'required|unique:jps,jenis_permohonan',
        ]);

        $insert = Jp::create([
            'jenis_permohonan' => ucwords($request->permohonan),
        ]);

        if ($insert) {
            return redirect()->route('admin.jenis-permohonan.all')->with('success', 'Simpan Data Berhasil');
        } else {
            return redirect()->back()->with('error', 'Simpan Data gagal');
        }
    }

    public function edit($id) {
        $r = Jp::where('id', '=', $id)->first();

        if (Auth::user()->role == 'admin') {
            return view('pages.admin.jenis-permohonan.edit', [
                'result' => $r,
            ]);
        }
    }

    public function update(Request $request, $id) {
        // **
        // handler validation
        $this->validate($request, [
            'permohonan' => 'required|unique:jps,jenis_permohonan,' . $id,
        ]);

        $update = Jp::where('id', '=', $id)->update([
            'jenis_permohonan' => ucwords($request->permohonan),
        ]);

        if ($update) {
            return redirect()->route('admin.jenis-permohonan.all')->with('success', 'Ubah Data Berhasil');
        } else {
            return redirect()->back()->with('error', 'Ubah Data gagal');
        }
    }

    public function destroy($id) {
        $delete = Jp::destroy($id);

        return redirect()->back();
    }
}
