<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $pemasukan = DB::table('manage_pemasukan')->sum('nominal');
       $pengeluaran = DB::table('manage_pengeluaran')->sum('nominal');
        return view('home',compact('pemasukan', 'pengeluaran'));
    }
}
