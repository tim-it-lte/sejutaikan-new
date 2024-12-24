<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permohonansampel;

class TestingController extends Controller
{
    function index() {
        return $this->createKodePermohonan();
    }

    public function createKodePermohonan() {
/*      
        $dataResult = Permohonansampel::all()->count();

        if ($dataResult >= 1) {

            $last = Permohonansampel::whereRaw('kode = (select max(`kode`) from permohonansampels)')->first();
            $urutan = (int) substr($last->kode, 4, 5);
            $urutan++;

        } else {

            $urutan = (int) $dataResult + 1;
        }

        $awalKode = "KDP-";
        $kodePermohonanBaru = $awalKode . sprintf("%05s", $urutan);
        echo "KODE PERMOHONAN (KDP) => $kodePermohonanBaru";
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
        dd($lastRow->kode, $kodePermohonanBaru);
    }
}