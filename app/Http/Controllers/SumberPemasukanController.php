<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SumberPemasukanController extends Controller
{
    public function index()
    {
        $data = \DB::table('pemasukan')->get();
        return view('sumber.index', compact('data'));
    }

    public function add()
    {
        return view('sumber.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
        ]);

        $nama = $request->nama;

        \DB::table('pemasukan')->insert([
            'id' => \Uuid::generate(4),
            'nama' => $nama,
            'created_at' => date('Y-m-d-H:i:s'),
            'updated_at' => date('Y-m-d-H:i:s'),
        ]);

        return redirect(route('sumber.pemasukan'))->with('success','Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $data = \DB::table('pemasukan')->where('id', $id)->first();
        return view('sumber.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
        ]);

        $nama = $request->nama;

        \DB::table('pemasukan')->where('id', $id)->update([
            'nama' => $nama,
            'updated_at' => date('Y-m-d-H:i:s'),
        ]);

        return redirect(route('sumber.pemasukan'))->with('success','Data Berhasil Diupdate');

    }

    public function delete($id)
    {
        \DB::table('pemasukan')->where('id', $id)->delete();
        return redirect(route('sumber.pemasukan'))->with('success','Data Berhasil Dihapus');
    }
}
