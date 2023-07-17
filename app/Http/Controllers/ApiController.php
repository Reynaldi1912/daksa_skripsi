<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Tempat;

class ApiController extends Controller
{
    public function getFasilitasById($id){
        echo json_encode(DB::table('fasilitas')->where('id',$id)->get()->first());
    }
    public function getWilayahById($id){
        echo json_encode(DB::table('wilayah')->where('id',$id)->get()->first());
    }
    public function getKategoriById($id){
        echo json_encode(DB::table('kategori')->where('id',$id)->get()->first());
    }
    public function getTempatById($id){
        echo json_encode(DB::table('tempat')->where('id',$id)->get()->first());
    }
    public function getTotalKunjungan(){
        echo json_encode(DB::table('vw_kunjungan_bulan')->get());
    }
    public function getTempat($id_wilayah,$id_kategori){
        if($id_wilayah == -1 || $id_kategori == -1){
            $data = Tempat::select('tempat.*', DB::raw('MAX(galeri.gambar) as gambar'))
                    ->leftJoin('galeri', 'tempat.id', '=', 'galeri.id_tempat')
                    ->groupBy('tempat.id')
                    ->get();
        }else{
            $data = DB::table('tempat as a')
                    ->leftJoin('galeri as b', 'a.id', '=', 'b.id_tempat')
                    ->select('a.*', DB::raw('MAX(b.gambar) as gambar'))
                    ->where('a.id_wilayah', '=', $id_wilayah)
                    ->where('a.id_kategori', '=', $id_kategori)
                    ->groupBy('a.id')
                    ->get();
        }
        echo json_encode($data);
    }
}
