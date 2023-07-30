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
        $data = DB::table('tempat')->where('id',$id)->get()->first();
        echo json_encode($data);
    }
    public function getTotalKunjungan(){
        echo json_encode(DB::table('vw_kunjungan_bulan')->get());
    }
    public function getTempat($id_wilayah,$id_kategori){
        if($id_wilayah == -1 || $id_kategori == -1){
            // Ambil data tempat dengan kolom gambar dari tabel galeri menggunakan LEFT JOIN
            $data = Tempat::select('tempat.*', DB::raw('MAX(galeri.gambar) as gambar'))
            ->leftJoin('galeri', 'tempat.id', '=', 'galeri.id_tempat')
            ->groupBy('tempat.id')
            ->get();

            // Loop melalui setiap objek $data
            foreach ($data as $item) {
                $fasilitas = DB::table('vw_fasilitas')->where('id_tempat', $item->id)->get();
                $item->fasilitas = $fasilitas;
            }
        }else{
            $data = DB::table('tempat as a')
                    ->leftJoin('galeri as b', 'a.id', '=', 'b.id_tempat')
                    ->select('a.*', DB::raw('MAX(b.gambar) as gambar'))
                    ->where('a.id_wilayah', '=', $id_wilayah)
                    ->where('a.id_kategori', '=', $id_kategori)
                    ->groupBy('a.id')
                    ->get();

            foreach ($data as $item) {
                $fasilitas = DB::table('vw_fasilitas')->where('id_tempat', $item->id)->get();
                $item->fasilitas = $fasilitas;
            }
        }
        echo json_encode($data);
    }
}
