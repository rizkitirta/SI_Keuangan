<?php

namespace App\Http\Controllers;

use App\Pemasukan;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;

class PemasukanController extends Controller
{
    public function index()
    {
        $data = Pemasukan::all();
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

        Pemasukan::insert([
            'id' => Uuid::generate(4),
            'nama' => $request->nama,
            'created_at' => date('Y-m-d-H:i:s'),
            'updated_at' => date('Y-m-d-H:i:s'),
        ]);

        return redirect(route('sumber.pemasukan'));
    }

    public function edit($id)
    {
        $data = Pemasukan::where('id', $id)->first();
        return view('sumber.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
        ]);

        Pemasukan::where('id', $id)->update([
            'nama' => $request->nama,
            'updated_at' => date('Y-m-d-H:i:s'),
        ]);

        return redirect(route('sumber.pemasukan'));
    }

    public function delete($id)
    {
        Pemasukan::where('id', $id)->delete();
        return redirect(route('sumber.pemasukan'));
    }
}
