<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Uuid;

class ManagePengeluaranController extends Controller
{
    public function index()
    {
        $data = DB::table('manage_pengeluaran')->get();
        return view('Pengeluaran.index', compact('data'));
    }

    public function add()
    {
        return view('Pengeluaran.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nominal' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
        ]);

        DB::table('manage_pengeluaran')->insert([
            'pengeluaran_id' => \Uuid::generate(4),
            'nominal' => $request->nominal,
            'tanggal' => date('Y-m-d', strtotime($request->tanggal)),
            'keterangan' => $request->keterangan,
        ]);

        return redirect(route('pengeluaran.index'));
    }

    public function edit($id)
    {
        $data = DB::table('manage_pengeluaran')->where('pengeluaran_id', $id)->first();
        return view('Pengeluaran.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'nominal' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
        ]);

        DB::table('manage_pengeluaran')->where('pengeluaran_id', $id)->update([
            'nominal' => $request->nominal,
            'tanggal' => date('Y-m-d', strtotime($request->tanggal)),
            'keterangan' => $request->keterangan,
        ]);

        return redirect(route('pengeluaran.index'));

    }
}
