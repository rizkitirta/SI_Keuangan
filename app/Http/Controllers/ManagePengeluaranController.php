<?php

namespace App\Http\Controllers;

use App\ManagePengeluaran;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;

class ManagePengeluaranController extends Controller
{
    public function index()
    {
        $data = ManagePengeluaran::all();
        return view('pengeluaran.index', compact('data'));
    }

    public function add()
    {
        return view('pengeluaran.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nominal' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
        ]);

        ManagePengeluaran::insert([
            'pengeluaran_id' => Uuid::generate(4),
            'nominal' => $request->nominal,
            'tanggal' => date('Y-m-d', strtotime($request->tanggal)),
            'keterangan' => $request->keterangan,
        ]);

        return redirect(route('pengeluaran.index'));
    }

    public function edit($id)
    {
        $data = ManagePengeluaran::where('pengeluaran_id', $id)->first();
        return view('pengeluaran.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nominal' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
        ]);

        ManagePengeluaran::where('pengeluaran_id', $id)->update([
            'nominal' => $request->nominal,
            'tanggal' => date('Y-m-d', strtotime($request->tanggal)),
            'keterangan' => $request->keterangan,
        ]);

        return redirect(route('pengeluaran.index'));
    }

    public function delete($id)
    {
        ManagePengeluaran::where('pengeluaran_id', $id)->delete();
        return redirect(route('pengeluaran.index'));
    }
}
