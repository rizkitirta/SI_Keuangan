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

        return redirect(route('manage.pemasukan'))->with('success','Data Berhasil Ditambahkan');
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

        \DB::table('manage_pemasukan')->where('pemasukan_id', $id)->update([
            'sumber_pemasukan' => $request->sumber,
            'nominal' => $request->nominal,
            'tanggal' => date('Y-m-d', strtotime($request->tanggal)),
            'keterangan' => $request->keterangan,
        ]);

        return redirect(route('manage.pemasukan'))->with('success','Data Berhasil Diupdate');
    }

    public function delete($id)
    {
       DB::table('manage_pemasukan')->where('pemasukan_id', $id)->delete();
       return redirect(route('manage.pemasukan'))->with('success','Data Berhasil Dihapus');
    }

  
}
