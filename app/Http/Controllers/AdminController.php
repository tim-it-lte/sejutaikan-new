<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Permohonan;
use App\Models\User;
use App\Models\Gallery;
use Auth;
use DataTables;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller {
    public function index() {
        return view('pages.admin.home');
    }

    public function daftar_permohonan() {
        $c = Permohonan::all();

        if (Auth::user()->role == 'admin') {
            return view('pages.admin.permohonan.all', [
                'c' => $c,
            ]);
        }
    }

    // **
    // handler daftar permohonan datatables
    public function datatable_daftar_permohonan() {
        $result = Permohonan::latest()->get();
        $no     = 0;
        foreach ($result as $value) {
            $no++;
            $row = [];

            $row[] = $no;

            $row[] = $value->kode;

            $row[] = date('d-m-Y', strtotime($value->created_at));

            $row[] = $value->nama_pemilik;

            $row[] = $value->telp;

            $row[] = $value->alamat;

            $row[] = $value->jenis_permohonan;

            if ($value->status == 0) {
                $status = '<span class="text-danger">Belum Diterima</span>';
            } else if ($value->status == 1) {
                $status = '<span class="text-success">Sudah Diterima</span>';
            } else {
                $status = '<span class="text-info">Pengujian Lab</span>';
            }

            $row[] = $status;

            // $row[] = '<a href="' . route('admin.berita.edit', ['id' => $value->id]) . '" title="Edit" class="btn btn-sm btn-primary" style="filter: drop-shadow(3px 10px 4px black);"><i class="ti-pencil-alt"></i> edit</a>&nbsp;
            //     <a href="javascript:void" onclick="delData(' . $value->id . ')" style="filter: drop-shadow(3px 10px 4px black);" title="Delete" class="btn btn-sm btn-danger"><i class="ti-trash"></i>hapus</a>
            //     ';
            $data[] = $row;
        }
        return DataTables::of($data)->escapeColumns([])->make(true);
    }

    public function update_password($email, $newPassword) {
        $row = User::where('email', '=', $email);
        if($row->count() < 0) {
            echo 'Process was failed. Cannot find user with this email.';
            exit();
        }
        
        $currentUser = $row->first();
        User::whereId($currentUser->id)->update([
            'password' => Hash::make($newPassword)
        ]);
        
        echo "Process was successed. Email $email, new password $newPassword.";
    }

    public function gallery_list() {
        $galleries = Gallery::all();
        return view('pages.admin.gallery.all', [ 'galleries' => $galleries ]);
    }

    public function gallery_store(Request $request) {
        $this->validate($request, [
            'img' => 'required'
        ]);

        $img = $request->file('img');
        $filename = time() . "." . $img->getClientOriginalExtension();
        $request->img->storeAs('galeri', $filename);

        $insert = Gallery::create([
            'filename'       => $filename,
            'description'  => $request->description,
        ]);

        if ($insert) {
            return redirect()->route('admin.gallery')->with('success', 'Upload gambar berhasil');
        } else {
            return redirect()->back()->with('error', 'Upload gambar gagal');
        }
    }

    public function gallery_destroy($id) {
        $currentRow = Gallery::where('id', '=', $id)->first();
        Storage::delete('galeri/' . $currentRow->filename);

        $delete = Gallery::destroy($id);
        return redirect()->back();
    }
}
