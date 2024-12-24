<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Responden;
use App\Models\Optionkuisioners;
use App\Models\Survei;
use App\Models\Pertanyaan;
use Auth;
use DataTables;

class SurveiController extends Controller {
    public function index() {
        $c = Responden::orderBy('id', 'DESC')->get();
        
        //pengelompokkan skor
        $count_jawaban_sangat_baik=0;
        $count_jawaban_baik=0;
        $count_jawaban_kurang_baik=0;
        $count_jawaban_tidak_baik=0;
        
        $result_survei = Survei::all();
        foreach ($result_survei as $value) {
            
            $result_answer = Optionkuisioners::where('id', '=', $value->pertanyaan_id)->get();
            
            foreach ($result_answer as $value){

                if($value->bobot==4){
                    $count_jawaban_sangat_baik++;
                }else if($value->bobot==3){
                    $count_jawaban_baik++;
                }else if($value->bobot==2){
                    $count_jawaban_kurang_baik++;
                }else if($value->bobot==1){
                    $count_jawaban_tidak_baik++;
                }

            }
            
        }
        
        $skor_jawaban_sangat_baik = $count_jawaban_sangat_baik*4;
        $skor_jawaban_baik= $count_jawaban_baik*3;
        $skor_jawaban_kurang_baik= $count_jawaban_kurang_baik*2;
        $skor_jawaban_tidak_baik= $count_jawaban_tidak_baik*1;
        $total_skor = $skor_jawaban_sangat_baik+$skor_jawaban_baik+$skor_jawaban_kurang_baik+$skor_jawaban_tidak_baik;
        
        //interpretasi skor perhitungan
        $total_responden = Responden::whereYear('created_at', '=', date('Y'))->count();
        $total_pertanyaan = Pertanyaan::all()->count();
        
        $y = 4*$total_responden*$total_pertanyaan;
        $x = 1*$total_responden*$total_pertanyaan;    

        //persentase kepuasan    
        $persentase = ($total_skor!=0)?($total_skor/$y)*100 : 0;
        

        if (Auth::user()->role == 'admin') {
            return view('pages.admin.survei.all', [
                'c' => $c,
                'hasil_skm' => $persentase >= 100 ? $persentase-(($persentase-100)+3) : $persentase,
            ]);
        }
    }

    // **
    // handler slider datatables
    public function datatables() {
        $result = Responden::latest()->get();
        $no     = 0;
        foreach ($result as $value) {
            $no++;
            $row = [];

            $row[] = $no;

            $row[] = $value->nama;

            $row[] = $value->email;

            $row[] = date('d-m-Y', strtotime($value->created_at));

            $row[] = '<a style="filter: drop-shadow(3px 10px 4px black);" href="' . route('admin.detail.survei', ['id' => $value->id]) . '" title="Detail" class="btn btn-sm btn-primary"><i class="ti-pencil-alt"></i> Detail</a>&nbsp;
                <a style="filter: drop-shadow(3px 10px 4px black);" href="javascript:void" onclick="delData(' . $value->id . ')" title="Delete" class="btn btn-sm btn-danger"><i class="ti-trash"></i>hapus</a>
                ';
            $data[] = $row;
        }
        return DataTables::of($data)->escapeColumns([])->make(true);
    }

    public function detail($id) {
        $r = Responden::where('id', '=', $id)->first();

        if (Auth::user()->role == 'admin') {
            return view('pages.admin.survei.detail', [
                'result' => $r,
            ]);
        }
    }

    public function destroy($id) {
        $delete = Responden::destroy($id);

        if ($delete) {
            return redirect()->back()->with('success', 'Hapus Data Berhasil');
        } else {
            return redirect()->back()->with('error', 'Hapus Data gagal');
        }
    }
}
