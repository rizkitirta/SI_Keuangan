<?php

namespace App\Http\Controllers;

use Faker\Provider\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Facades\Datatables;

class ManagePemasukanController extends Controller
{
    public function index()
    {
        $data = \DB::table('manage_pemasukan as a')->join('pemasukan as b', 'a.sumber_pemasukan', '=', 'b.id')->get();
        return view('Pemasukan.index', compact('data'));
    }

    public function add()
    {
        $sumbers = DB::table('pemasukan')->get();
        return view('Pemasukan.add', compact('sumbers'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'sumber' => 'required',
            'nominal' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
        ]);

        \DB::table('manage_pemasukan')->insert([
            'pemasukan_id' => \Uuid::generate(4),
            'sumber_pemasukan' => $request->sumber,
            'nominal' => $request->nominal,
            'tanggal' => date('Y-m-d', strtotime($request->tanggal)),
            'keterangan' => $request->keterangan,
        ]);

        return redirect(route('manage.pemasukan'));
    }

    public function edit($id)
    {
        $sumbers = DB::table('pemasukan')->get();
        $data = DB::table('manage_pemasukan')->where('pemasukan_id', $id)->first();
        return view('Pemasukan.edit', compact('data', 'sumbers'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'sumber' => 'required',
            'nominal' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
        ]);

        \DB::table('manage_pemasukan')->where('pemasukan_id',$id)->update([
            'sumber_pemasukan' => $request->sumber,
            'nominal' => $request->nominal,
            'tanggal' => date('Y-m-d', strtotime($request->tanggal)),
            'keterangan' => $request->keterangan,
        ]);

        return redirect(route('manage.pemasukan'));
    }

    public function yajra(Request $request)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $pemasukan = \DB::table('manage_pemasukan as a')->join('pemasukan as b', 'a.sumber_pemasukan', '=', 'b.id')->select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'a.pemasukan_id',
            'a.sumber_pemasukan',
            'b.nama',
            'a.nominal',
            'a.tanggal',
            'a.keterangan']);
        $datatables = Datatables::of($pemasukan)
            ->addColumn('action', function ($ps) {
                $url_edit = route('pemasukan.edit', $ps->pemasukan_id);
                return '<a href="' . $url_edit . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <a href="#edit-' . $ps->pemasukan_id . '" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-delete"></i> Hapus</a>';
            })->editColumn('nominal', function ($ps) {
            $nominal = $ps->nominal;
            $nominal = 'Rp ' . number_format($nominal, 0);
            $nominal = str_replace(',', '.', $nominal);
            return $nominal;
        })->editColumn('tanggal', function ($ps) {
            $tanggal = $ps->tanggal;
            $tanggal = date('d M Y', strtotime($tanggal));
            return $tanggal;
        });

        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }

        return $datatables->make(true);
    }
}
