<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasan;
use DB;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalUlasan = DB::table('vw_avg_ulasan')->selectRaw('SUM(total_ulasan) as total_ulasan')->first()->total_ulasan;
        $totalKunjungan = DB::table('tempat')->selectRaw('SUM(total_kunjungan) as total_kunjungan')->first()->total_kunjungan;

        $ulasan = Ulasan::orderBy('created_at', 'desc')->paginate(4);
        return view('admin.dashboard',['ulasan'=>$ulasan , 'totalUlasan'=>$totalUlasan , 'totalKunjungan'=>$totalKunjungan]);
    }

}
