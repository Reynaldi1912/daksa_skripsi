<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Fasilitas;
use App\Models\Wilayah;
use App\Models\Kategori;
use App\Models\Tempat;
use App\Models\Galeri;
use App\Models\TempatFasilitas;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Ulasan;

class TempatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function masterTempat()
    {
        $fasilitas = DB::table('fasilitas')->get();
        $wilayah = DB::table('wilayah')->get();
        $kategori = DB::table('kategori')->get();
        $tempat = DB::table('vw_tempat')->get();
        return view('admin.master-tempat',['fasilitas' => $fasilitas ,'wilayah' => $wilayah , 'kategori'=>$kategori ,'tempat'=> $tempat]);
    }
    public function postFasilitas(Request $request)
    {
        Fasilitas::create([
            'nama' => $request->nama,
            'logo' => $request->logo
        ]);
        return redirect()->route('masterTempat')->with('success','Berhasil Tambah Fasilitas');
    }
    public function editFasilitas(Request $request)
    {
        $fasilitas = Fasilitas::where('id',$request->id_fasilitas)->first();
        $fasilitas->update([
            'nama' => $request->nama,
            'logo' => $request->logo
        ]);
        return redirect()->route('masterTempat')->with('warning','Berhasil Edit Fasilitas');
    }
    public function postWilayah(Request $request)
    {
        Wilayah::create([
            'nama' => $request->nama
        ]);
        return redirect()->route('masterTempat')->with('success','Berhasil Tambah Wilayah');
    }
    public function editWilayah(Request $request)
    {
        $wilayah = Wilayah::where('id',$request->id_wilayah)->first();
        $wilayah->update([
            'nama' => $request->nama
        ]);
        return redirect()->route('masterTempat')->with('warning','Berhasil Edit Wilayah');
    }
    public function postKategori(Request $request)
    {
        $file = $request->file('svg');

        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $path = $file->storeAs('svg', $filename, 'public');
            
            Kategori::create([
                'nama' => $request->nama,
                'svg' => $filename
            ]);
        }
        return redirect()->route('masterTempat')->with('success','Berhasil Tambah Kategori');
    }
    public function editKategori(Request $request)
    {
        $file = $request->file('svg');

        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $path = $file->storeAs('svg', $filename, 'public');

            $kategori = Kategori::where('id',$request->id_kategori)->first();
            $kategori->update([
                'nama' => $request->nama,
                'svg' => $filename
            ]);
        }else{
            $kategori = Kategori::where('id',$request->id_kategori)->first();
            $kategori->update([
                'nama' => $request->nama,
            ]);
        }
        return redirect()->route('masterTempat')->with('warning','Berhasil Edit Kategori');
    }
    public function postGaleri(Request $request , $id)
    {
        $file = $request->file('foto');

        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $path = $file->storeAs('galeri', $filename, 'public');
            
            Galeri::create([
                'id_tempat'=> $id,
                'gambar'=>$filename
            ]);
        }
        return back()->with('success','Berhasil Menambahkan Foto');
    }
    
    public function postTempat(Request $request)
    {
        Tempat::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'id_wilayah' => $request->lokasi,
            'id_kategori' => $request->kategori,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'link_rute' => $request->link_rute
        ]);
        
        $tempat = Tempat::latest()->first(); 
        
        for ($i=0; $i < sizeof($request->fasilitas); $i++) {
            TempatFasilitas::create([
                'id_tempat' => $tempat->id,
                'id_fasilitas' => $request->fasilitas[$i]
            ]);
        }
        
        return redirect()->route('masterTempat')->with('success','Berhasil Menambahkan Tempat');
    }

    public function editTempat(Request $request)
    {
        $tempat = Tempat::where('id',$request->id_tempat)->first();
        $tempat->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'id_wilayah' => $request->lokasi,
            'id_kategori' => $request->kategori,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'link_rute' => $request->link_rute
        ]);
        
        if($request->fasilitas != null){
            TempatFasilitas::where('id_tempat',$tempat->id)->delete(); 
        
            for ($i=0; $i < sizeof($request->fasilitas); $i++) {
                TempatFasilitas::create ([
                    'id_tempat' => $tempat->id,
                    'id_fasilitas' => $request->fasilitas[$i]
                ]);
            }
        }
        
        return redirect()->route('masterTempat')->with('success','Berhasil Mengedit Fasilitas');
    }

    public function deleteFasilitas($id){
        Fasilitas::find($id)->delete();
        return redirect()->route('masterTempat')->with('error','berhasil hapus');
    }
    public function deleteWilayah($id){
        Wilayah::find($id)->delete();
        return redirect()->route('masterTempat')->with('error','berhasil hapus');
    }

    public function deleteKategori($id){
        Kategori::find($id)->delete();
        return redirect()->route('masterTempat')->with('error','berhasil hapus');
    }
    public function deleteTempat($id){
        Tempat::find($id)->delete();
        TempatFasilitas::where('id_tempat',$id)->delete();
        return redirect()->route('masterTempat')->with('error','berhasil hapus');
    }

    public function masterUlasan()
    {
        $result = DB::table('ulasan')
        ->selectRaw('COUNT(id) AS count, CASE WHEN status = 1 THEN "Disetujui" WHEN status = 2 THEN "Ditolak" WHEN status = 0 THEN "Pending" END AS status_text')
        ->groupBy('status')
        ->get();

        $ulasan = DB::table('ulasan')->get();
        return view('admin.master-ulasan' , ['ulasan'=>$ulasan ,'result'=>$result]);
    }
    public function galeriTempat($id)
    {
        $data = DB::table('galeri')->where('id_tempat',$id)->get();
        $id = $id;
        return view('admin.galeri-tempat' , ['data'=>$data , 'id'=>$id]);
    }
    public function deleteGaleri($id){
        Galeri::find($id)->delete();
        return back()->with('error','Berhasil Menghapus Foto');
    }

    public function ApproveUlasan($id){
        $ulasan = Ulasan::where('id',$id)->first();
        $ulasan->update([
            'status'=> 1
        ]);

        return back()->with('success','Berhasil Menyetujui');
    }
    public function TolakUlasan($id){
        $ulasan = Ulasan::where('id',$id)->first();
        $ulasan->update([
            'status'=> 2
        ]);

        return back()->with('success','Berhasil Tolak Ulasan');
    }
    public function DeleteUlasan($id){
        $ulasan = Ulasan::where('id',$id)->first();
        $ulasan->delete();

        return back()->with('error','Berhasil Hapus Ulasan');
    }
    public function masterUlasanDisetujui()
    {
        $result = DB::table('ulasan')
        ->selectRaw('COUNT(id) AS count, CASE WHEN status = 1 THEN "Disetujui" WHEN status = 2 THEN "Ditolak" WHEN status = 0 THEN "Pending" END AS status_text')
        ->groupBy('status')
        ->get();

        $ulasan = DB::table('ulasan')->where('status',1)->get();
        return view('admin.master-ulasan' , ['ulasan'=>$ulasan , 'result'=>$result]);
    }
    public function masterUlasanDitolak()
    {
        $result = DB::table('ulasan')
        ->selectRaw('COUNT(id) AS count, CASE WHEN status = 1 THEN "Disetujui" WHEN status = 2 THEN "Ditolak" WHEN status = 0 THEN "Pending" END AS status_text')
        ->groupBy('status')
        ->get();

        $ulasan = DB::table('ulasan')->where('status',2)->get();
        return view('admin.master-ulasan' , ['ulasan'=>$ulasan , 'result'=>$result]);
    }
    public function masterUlasanDipending()
    {
        $result = DB::table('ulasan')
                ->selectRaw('COUNT(id) AS count, CASE WHEN status = 1 THEN "Disetujui" WHEN status = 2 THEN "Ditolak" WHEN status = 0 THEN "Pending" END AS status_text')
                ->groupBy('status')
                ->get();

        $ulasan = DB::table('ulasan')->where('status',0)->get();
        return view('admin.master-ulasan' , ['ulasan'=>$ulasan , 'result'=>$result]);
    }
}
