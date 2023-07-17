@extends('layouts.app-admin')

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
        <div class="col-6">
            <h3>Tambah Galeri</h3>
        </div>
        <div class="col-6">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">                                       
                <svg class="stroke-icon">
                    <use href="../cuba/assets/svg/icon-sprite.svg#stroke-home"></use>
                </svg></a></li>
            <li class="breadcrumb-item active">Galeri</li>
            </ol>
        </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <!-- Zero Configuration  Starts-->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0 card-no-border">
                <div class="row">
                    <div class="col">
                    <h4>Galeri</h4>
                    </div>
                    <div class="col text-end">
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#wisataModal">Tambahkan Tempat</button>
                        <div class="modal fade" id="wisataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-body">
                                <div class="modal-toggle-wrapper"> 
                                <form action="{{route('postGaleri',$id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <h4 class="text-start pb-4">Tambahkan Foto</h4>
                                    <input type="file" class="form-control" name="foto" required>
                                    <button class="btn btn-primary btn-block mt-3" type="submit">Simpan</button>
                                </form>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                
                <span>Data Tempat adalah kumpulan informasi terkait destinasi tempat-tempat menarik, atraksi, dan fasilitas yang tersedia di suatu daerah atau wilayah. Data ini dapat mencakup berbagai macam informasi seperti nama tempat wisata, lokasi geografis, deskripsi singkat, dan layanan Tunadaksa yang tersedia</span>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="display" id="basic-10">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $data)
                        <tr>
                            <td><img src="/storage/galeri/{{$data->gambar}}" style="max-width: 500px; max-height: 500px;" alt=""></td>
                            <td> 
                                <ul class="action"> 
                                    <li class="delete"><a href="{{route('deleteGaleri',$data->id)}}"><i class="icon-trash"></i></a></li>
                                </ul>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection