<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests\CaptchaRequest;
use App\Models\Ulasan;
use App\Models\VwTempat;
use App\Models\Tempat;
use Illuminate\Pagination\Paginator;

class PublicController extends Controller
{
    public function index(){

        $data = DB::table('vw_tempat')->orderBy('total_kunjungan', 'desc')->take(3)->get();
        $fasilitas = DB::table('vw_fasilitas')->get();
        $galeri = DB::table('galeri')->get();
        $kategori = DB::table('kategori')->get();
        $wilayah = DB::table('wilayah')->get();
        // echo json_encode($galeri->where('id_tempat',2)->first());die();

        // echo $galeri->where('id_tempat',3)->first()->gambar;die();
        return view('index' , ['data'=>$data , 'fasilitas'=>$fasilitas , 'galeri'=>$galeri , 'kategori'=>$kategori , 'wilayah'=> $wilayah]);
    }
    public function rekomendasi(){
        $data = VwTempat::orderBy('total_kunjungan', 'desc')->paginate(12);
        $fasilitas = DB::table('vw_fasilitas')->get();
        $galeri = DB::table('galeri')->get();
        $kategori = DB::table('kategori')->get();
        $wilayah = DB::table('wilayah')->get();
        $type = ['0'];
        $kota_id = 0;
        // echo json_encode($galeri->where('id_tempat',2)->first());die();
        return view('rekomendasi' , ['data'=>$data , 'fasilitas'=>$fasilitas , 'galeri'=>$galeri , 'kategori'=>$kategori , 'wilayah'=> $wilayah , 'type'=>$type , 'kota_id'=>$kota_id]);
    }
    public function detail($id){
        $data = DB::table('vw_tempat')->where('id',$id)->get()->first();
        $galeri = DB::table('galeri')->where('id_tempat',$id)->get();
        $ulasan = Ulasan::where('id_tempat',$id)->where('status',1)->paginate(3);
        $id = $id;
        $rate = DB::table('ulasan')
                ->select('id_tempat',
                    DB::raw('SUM(CASE WHEN rate = 1 THEN 1 ELSE 0 END) AS kurang'),
                    DB::raw('SUM(CASE WHEN rate = 2 THEN 1 ELSE 0 END) AS biasa'),
                    DB::raw('SUM(CASE WHEN rate = 3 THEN 1 ELSE 0 END) AS bagus'),
                    DB::raw('SUM(CASE WHEN rate = 4 THEN 1 ELSE 0 END) AS memuaskan'),
                    DB::raw('SUM(CASE WHEN rate = 5 THEN 1 ELSE 0 END) AS sangat_memuaskan'),
                    DB::raw('AVG(rate) AS rata_rata')
                )
                ->groupBy('id_tempat')
                ->get();
        $data_detail = Tempat::where('id',$id)->first();
        $data_detail->update([
            'total_kunjungan'=> $data->total_kunjungan == null ? 1 : ($data->total_kunjungan+1),
        ]);

        return view('detail' , ['data'=>$data , 'galeri'=>$galeri , 'ulasan'=>$ulasan , 'id'=>$id , 'rate'=> $rate]);
    }
    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }

    public function postUlasan(CaptchaRequest $request)
    {
        Ulasan::create([
            'id_tempat' => $request->id,
            'nama' => $request->nama,
            'ulasan' => $request->ulasan,
            'status' => 0,
            'rate' => $request->rate
        ]);

        return back();
    }

    public function FilterRekomendasi(Request $request){
        $data_ = VwTempat::orderBy('total_kunjungan', 'desc');
        if($request->type){
            for ($i=0; $i < count($request->type); $i++) {
                $data_->orWhere('id_kategori', $request->type[$i]);
            }
        }
        if ($request->kota != null) {
            $data_->where('id_wilayah', $request->kota);
        }
        $data = $data_->paginate(12);

        
        $fasilitas = DB::table('vw_fasilitas')->get();
        $galeri = DB::table('galeri')->get();
        $kategori = DB::table('kategori')->get();
        $wilayah = DB::table('wilayah')->get();
        $type = $request->type == null ? ['0'] : $request->type ;
        $kota_id = $request->kota;
        // echo json_encode($galeri->where('id_tempat',2)->first());die();
        return view('rekomendasi' , ['data'=>$data , 'fasilitas'=>$fasilitas , 'galeri'=>$galeri , 'kategori'=>$kategori , 'wilayah'=> $wilayah , 'type'=>$type , 'kota_id'=>$kota_id]);
    }

}
