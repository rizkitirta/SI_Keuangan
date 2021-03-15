<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index()
    {
        return view('Laporan.index');
    }

    public function cari(Request $request)
    {
        $this->validate($request, [
            'dari' => 'required',
            'sampai' => 'required',
        ]);

        $dari = date('Y-m-d', strtotime($request->dari));
        $sampai = date('Y-m-d', strtotime($request->sampai));

        // $pemasukan = DB::table('manage_pemasukan as p')
        // ->join('pemasukan as s', 'p.sumber_pemasukan', '=', 's.id')
        // ->whereBetween('tanggal', [$dari, $sampai])->get();

        // $total_pemasukan = DB::table('manage_pemasukan as p')
        // ->join('pemasukan as s', 'p.sumber_pemasukan', '=', 's.id')
        // ->whereBetween('tanggal', [$dari, $sampai])->sum('nominal');


        $pengeluaran = DB::table('manage_pengeluaran')
        ->whereBetween('tanggal', [$dari, $sampai])->get();

        $total_pengeluaran = DB::table('manage_pengeluaran')
        ->whereBetween('tanggal', [$dari, $sampai])->sum('nominal');

        return view('Laporan.index', compact('pengeluaran','total_pengeluaran'));
    }

  
}
