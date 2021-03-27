<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Excel;

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

        $pemasukan = DB::table('manage_pemasukan')
            ->join('pemasukan', 'manage_pemasukan.sumber_pemasukan', '=', 'pemasukan.id')
            ->whereBetween('tanggal', [$dari, $sampai])->get();

        $total_pemasukan = DB::table('manage_pemasukan')
            ->join('pemasukan', 'manage_pemasukan.sumber_pemasukan', '=', 'pemasukan.id')
            ->whereBetween('tanggal', [$dari, $sampai])->sum('nominal');

        $pengeluaran = DB::table('manage_pengeluaran')
            ->whereBetween('tanggal', [$dari, $sampai])->get();

        $total_pengeluaran = DB::table('manage_pengeluaran')
            ->whereBetween('tanggal', [$dari, $sampai])->sum('nominal');

        return view('Laporan.index', compact('pemasukan','total_pemasukan', 'pengeluaran', 'total_pengeluaran', 'dari', 'sampai'));
    }

    public function exportExcel($dari, $sampai)
    {
        $title = 'Laporan Excel';
        $pengeluaran = DB::table('manage_pengeluaran')
            ->whereBetween('tanggal', [$dari, $sampai])->get();

        $total_pengeluaran = DB::table('manage_pengeluaran')
            ->whereBetween('tanggal', [$dari, $sampai])->sum('nominal');

        \Excel::create($title, function ($excel) use ($pengeluaran, $total_pengeluaran) {
            $excel->sheet('Sheetname', function ($sheet) use ($pengeluaran, $total_pengeluaran) {

                $sheet->loadView('Laporan.laporan_detail_excel')
                    ->with('pengeluaran', $pengeluaran)
                    ->with('total_pengeluaran', $total_pengeluaran);

            });
        })->export('xls');

    }

}
