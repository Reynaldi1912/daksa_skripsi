@extends('layouts.app-admin')

@section('content')
   <!-- include summernote css/js -->
   
   <link rel="stylesheet" type="text/css" href="../cuba/assets/css/vendors/summernote.css">
  

<div class="container-fluid">
    <div class="page-title">
        <div class="row">
        <div class="col-6">
            <h3>Data Tempat</h3>
        </div>
        <div class="col-6">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">                                       
                <svg class="stroke-icon">
                    <use href="../cuba/assets/svg/icon-sprite.svg#stroke-home"></use>
                </svg></a></li>
            <li class="breadcrumb-item active">Data Tempat</li>
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
                        <h4>Nama Tempat</h4>
                      </div>
                      <div class="col text-end">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#wisataModal">Tambahkan Tempat</button>
                          <div class="modal fade" id="wisataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                              <div class="modal-content">
                                <div class="modal-body">
                                  <div class="modal-toggle-wrapper"> 
                                    <form action="{{route('postTempat')}}" method="post">
                                      @csrf
                                      <h4 class="text-start pb-4">Tambahkan Tempat</h4>
                                      <input type="text" class="form-control mb-2" placeholder="Nama Tempat" name="nama" required>
                                      <textarea id="summernote" name="deskripsi" class="mt-3"></textarea>
                                      <textarea name="link_rute" id="" cols="10" rows="10" class="form-control mt-3 mb-2" placeholder="Link Rute"></textarea>
                                      <textarea id="summernote3" name="deskripsi_fasilitas"></textarea>
                                      <select name="lokasi" class="form-control mt-3">
                                        <option value="">Pilih Lokasi</option>
                                        @foreach($wilayah as $wilayahs)
                                          <option value="{{$wilayahs->id}}">{{$wilayahs->nama}}</option>
                                        @endforeach
                                      </select>
                                      <select name="kategori" class="form-control mt-3">
                                        <option value="">Pilih Kategori</option>
                                        @foreach($kategori as $kategoris)
                                          <option value="{{$kategoris->id}}">{{$kategoris->nama}}</option>
                                        @endforeach
                                      </select>
                                      <div class="mt-3 text-start">
                                        <label class="form-label" for="exampleFormControlSelect12">Fasilitas</label>
                                        <select class="js-example-basic-multiple" name="fasilitas[]" multiple="multiple">
                                          @foreach($fasilitas as $fasilitass)
                                            <option value="{{$fasilitass->id}}">{{$fasilitass->nama}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                      <input type="text" class="form-control mb-3" placeholder="Latitude" name="latitude" required>
                                      <input type="text" class="form-control" placeholder="Longitude" name="longitude" required>
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
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Lokasi</th>
                            <th>Tanggal Penambahan</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($tempat as $tempats)
                          <tr>
                            <td>{{$tempats->nama}}</td>
                            <td class="text-truncate tooltip-hover" title="{{$tempats->deskripsi}}" data-toggle="tooltip" data-placement="top" style="max-width: 200px;">{{$tempats->deskripsi}}</td>
                            <td>{{$tempats->nama_wilayah}}</td>
                            <td>{{$tempats->created_at}}</td>
                            <td>{{$tempats->latitude}}</td>
                            <td>{{$tempats->longitude}}</td>
                            <td> 
                              <ul class="action"> 
                                <li class="add me-2"> <a href="{{route('galeriTempat',$tempats->id)}}"><i class="icon-files"></i></a></li>
                                <li class="edit"> <a data-bs-toggle="modal" data-original-title="test" data-bs-target="#editModalTempat" onclick="editTempat({{$tempats->id}})"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="{{route('deleteTempat',$tempats->id)}}"><i class="icon-trash"></i></a></li>
                                
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
              <!-- Zero Configuration  Ends-->
              <!-- Complex headers (rowspan and colspan) Starts-->
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header pb-0 card-no-border">
                    <div class="row">
                      <div class="col">
                        <h4>kategori</h4>
                      </div>
                      <div class="col text-end">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#kategoriModal">Tambahkan Kategori</button>
                          <div class="modal fade" id="kategoriModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-body">
                                  <div class="modal-toggle-wrapper"> 
                                    <form action="{{route('postKategori')}}" method="post"  enctype="multipart/form-data">
                                      @csrf
                                      <h4 class="text-start pb-4">Tambahkan Kategori</h4>
                                      <input type="text" class="form-control" placeholder="Nama Kategori" name="nama" required>
                                      <h6 class="text-start pt-4">Icon Kategori (svg)</h6>
                                      <input type="file" class="form-control mt-3" name="svg" required>
                                      <h6 class="text-start pt-4">Icon Pin (png)</h6>
                                      <input type="file" class="form-control mt-3" name="pin_icon">
                                      <button class="btn btn-primary btn-block mt-3" type="submit">Simpan</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                    </div>
                    
                    <span>Penambahan kategori seperti kantor pelayanan masyarakat, pariwisata, dan lainnya dalam sistem informasi layanan umum penyedia fasilitas untuk disabilitas tunadaksa memiliki manfaat signifikan. Dengan adanya kategori ini, pengguna dapat dengan mudah menemukan informasi tentang berbagai layanan dan fasilitas yang relevan dengan kebutuhan mereka.</span>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="display" id="basic-6">
                        <thead>
                          <tr>
                            <th>Nama</th>
                            <th>Tanggal Pembuatan</th>
                            <th>Icon Pin</th>
                            <th>Icon Kategori</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($kategori as $kategori_)
                          <tr>
                            <td>{{$kategori_->nama}}</td>
                            <td>{{$kategori_->created_at}}</td>
                            <td><img src="/storage/pin_icon/{{$kategori_->pin_icon}}" alt="Marker Icon" style="width: 32px;"></td>
                            <td><img src="/storage/svg/{{$kategori_->svg}}" alt="Marker Icon" style="width: 32px;"></td>
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a data-bs-toggle="modal" data-original-title="test" data-bs-target="#editModalKategori" onclick="editKategori({{$kategori_->id}})"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="{{route('deleteKategori',$kategori_->id)}}"><i class="icon-trash"></i></a></li>
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
              <!-- Complex headers (rowspan and colspan) Ends-->
              <!-- State saving Starts-->
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header pb-0 card-no-border">
                  <div class="row">
                      <div class="col">
                        <h4>Wilayah</h4>
                      </div>
                      <div class="col text-end">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#wilayahModal">Tambahkan Wilayah</button>
                          <div class="modal fade" id="wilayahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-body">
                                  <div class="modal-toggle-wrapper"> 
                                    <form action="{{route('postWilayah')}}" method="post">
                                      @csrf
                                      <h4 class="text-start pb-4">Tambahkan Wilayah</h4>
                                      <input type="text" class="form-control" placeholder="Nama Wilayah" name="nama" required>
                                      <button class="btn btn-primary btn-block mt-3" type="submit">Simpan</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                    </div>
                    <span>Penambahan kategori kota dalam sistem informasi layanan umum penyedia fasilitas untuk disabilitas tunadaksa memberikan kemudahan dalam mengakses informasi spesifik tentang fasilitas yang tersedia di berbagai kota. Dengan adanya kategori ini, pengguna dapat menemukan informasi yang relevan dengan kota yang mereka tuju</span>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="display" id="basic-9">
                        <thead>
                          <tr>
                            <th>Nama</th>
                            <th>Tanggal Pembuatan</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($wilayah as $wilayah_)
                            <tr>
                              <td>{{$wilayah_->nama}}</td>
                              <td>{{$wilayah_->created_at}}</td>
                              <td> 
                                <ul class="action"> 
                                  <li class="edit"> <a data-bs-toggle="modal" data-original-title="test" data-bs-target="#editModalWilayah" onclick="editWilayah({{$wilayah_->id}});"><i class="icon-pencil-alt"></i></a></li>
                                  <li class="delete"><a href="{{route('deleteWilayah',$wilayah_->id)}}"><i class="icon-trash"></i></a></li>
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
              <!-- State saving Ends-->
              <!-- Scroll - vertical dynamic Starts-->
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header pb-0 card-no-border">
                    <div class="row">
                      <div class="col">
                        <h4>Fasilitas Tunadaksa</h4>
                      </div>
                      <div class="col text-end">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">Tambahkan Fasilitas</button>
                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-body">
                                  <div class="modal-toggle-wrapper"> 
                                    <form action="{{route('postFasilitas')}}" method="post" enctype="multipart/form-data">
                                      @csrf
                                      <h4 class="text-start pb-4">Tambahkan Fasilitas</h4>
                                      <input type="text" class="form-control mb-3" placeholder="Nama Fasilitas" name="nama" required>
                                      <input type="file" class="form-control mt-3" name="svg" required>
                                      <button class="btn btn-primary btn-block mt-3" type="submit">Simpan</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                    </div>
                    <span>Penambahan kategori macam-macam fasilitas bagi tunadaksa dalam sistem informasi layanan umum penyedia fasilitas merupakan langkah penting dalam meningkatkan aksesibilitas dan kehidupan sehari-hari mereka.</span>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive user-datatable">
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Tanggal Pembuatan</th>
                            <th>Logo</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                        @foreach($fasilitas as $fasilitas_)
                            <tr>
                              <td>{{$fasilitas_->nama}}</td>
                              <td>{{$fasilitas_->created_at}}</td>
                              <td><img src="/storage/icon/{{$fasilitas_->logo}}" style="max-width:32px;max-height:32px" alt=""></td>
                              <td> 
                                <ul class="action"> 
                                  <li class="edit"> <a data-bs-toggle="modal" data-original-title="test" data-bs-target="#editModalFasilitas" onclick="editFasilitas({{$fasilitas_->id}});"><i class="icon-pencil-alt"></i></a></li>
                                  <li class="delete"><a href="{{route('deleteFasilitas',$fasilitas_->id)}}"><i class="icon-trash"></i></a></li>
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
              <!-- Scroll - vertical dynamic Ends-->
            </div>
          </div>

          <div class="modal fade" id="editModalFasilitas" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-body">
                  <div class="modal-toggle-wrapper"> 
                    <form action="{{route('editFasilitas')}}" method="post"  enctype="multipart/form-data">
                      @csrf
                      @method('patch')
                      <h4 class="text-start pb-4">Edit fasilitas</h4>
                      <input type="hidden" id="id_fasilitas" name="id_fasilitas">
                      <input type="text" class="form-control" placeholder="Nama Fasilitas" name="nama" id="nama_fasilitas" required>
                      <input type="file" class="form-control mt-3" name="svg" required>
                      <button class="btn btn-primary btn-block mt-3" type="submit">Simpan</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="editModalWilayah" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-body">
                  <div class="modal-toggle-wrapper"> 
                    <form action="{{route('editWilayah')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method('patch')
                      <h4 class="text-start pb-4">Edit Wilayah</h4>
                      <input type="hidden" id="id_wilayah" name="id_wilayah">
                      <input type="text" class="form-control" placeholder="Nama Wilayah" name="nama" id="nama_wilayah" required>
                      <button class="btn btn-primary btn-block mt-3" type="submit">Simpan</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="editModalKategori" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-body">
                  <div class="modal-toggle-wrapper"> 
                    <form action="{{route('editKategori')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method('patch')
                      <h4 class="text-start pb-4">Edit Kategori</h4>
                      <input type="hidden" id="id_kategori" name="id_kategori">
                      <input type="text" class="form-control" placeholder="Nama Kategori" name="nama" id="nama_kategori" required>
                      <h6 class="text-start pt-4">Icon Kategori (svg)</h6>
                      <input type="file" class="form-control mt-3" name="svg">
                      <h6 class="text-start pt-4">Icon Pin (png)</h6>
                      <input type="file" class="form-control mt-3" name="pin_icon">
                      <button class="btn btn-primary btn-block mt-3" type="submit">Simpan</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="editModalTempat" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
              <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                  <div class="modal-body">
                    <div class="modal-toggle-wrapper"> 
                      <form action="{{route('editTempat')}}" method="post">
                        @csrf
                        @method('patch')
                        <input type="hidden" id="id_tempat" name="id_tempat">
                        <h4 class="text-start pb-4">Edit Tempat</h4>
                        <input type="text" class="form-control mb-2" placeholder="Nama Tempat" name="nama" id="nama_edit" required>
                        <textarea id="summernote1" name="deskripsi" class="mt-3"></textarea>
                        <textarea name="link_rute" id="link_rute" cols="10" rows="10" class="form-control mt-3 mb-2" placeholder="Link Rute"></textarea>
                        <textarea id="summernote4" name="deskripsi_fasilitas" class="mt-3"></textarea>

                        <select name="lokasi" class="form-control mt-3" id="lokasi_edit">
                          <option value="">Pilih Lokasi</option>
                          @foreach($wilayah as $wilayah_)
                            <option value="{{$wilayah_->id}}">{{$wilayah_->nama}}</option>
                          @endforeach
                          
                        </select>
                        <select name="kategori" class="form-control mt-3" id="kategori_edit">
                          <option value="">Pilih Kategori</option>
                          @foreach($kategori as $kategori_)
                            <option value="{{$kategori_->id}}">{{$kategori_->nama}}</option>
                          @endforeach
                        </select>
                        <div class="mt-3 text-start">
                          <label class="form-label" for="exampleFormControlSelect12">Fasilitas</label>
                          <select class="js-example-basic-multiple" name="fasilitas[]" multiple="multiple" id="fasilitas_edit">
                            @foreach($fasilitas as $fasilitas_)
                              <option value="{{$fasilitas_->id}}">{{$fasilitas_->nama}}</option>
                            @endforeach
                          </select>
                        </div>
                        <input type="text" class="form-control mb-3" placeholder="Latitude" name="latitude" id="latitude_edit" required>
                        <input type="text" class="form-control" placeholder="Longitude" name="longitude" id="longitude_edit" required>
                        <button class="btn btn-primary btn-block mt-3" type="submit">Simpan</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>


          <script>
            $(document).ready(function() {
                  $('.js-example-basic-multiple').select2();
                  $('#summernote').summernote({
                    placeholder: 'Deskripsi',
                    direction:'ltr',
                    tabsize: 2,
                    height: 200
                  }); 
                  
                  $('#summernote3').summernote({
                    placeholder: 'Deskripsi Fasilitas',
                    direction:'ltr',
                    tabsize: 2,
                    height: 200
                  });
                 
            });

            function editFasilitas(id){
              $.ajax({
                  type: 'GET',
                  dataType: 'json',
                  url: "/get-fasilitas/"+id,
                  success: function (data) {
                    console.log(id);
                      document.getElementById('nama_fasilitas').value=data.nama;
                      document.getElementById('id_fasilitas').value=data.id;

                  }
              });
            }

            function editWilayah(id){
              $.ajax({
                  type: 'GET',
                  dataType: 'json',
                  url: "/get-wilayah/"+id,
                  success: function (data) {
                      document.getElementById('nama_wilayah').value=data.nama;
                      document.getElementById('id_wilayah').value=id;
                  }
              });
            }
            
            function editKategori(id){
              $.ajax({
                  type: 'GET',
                  dataType: 'json',
                  url: "/get-kategori/"+id,
                  success: function (data) {
                      document.getElementById('id_kategori').value=data.id;
                      document.getElementById('nama_kategori').value=data.nama;
                  }
              });
            }

            function editTempat(id){
              $.ajax({
                  type: 'GET',
                  dataType: 'json',
                  url: "/get-tempat/"+id,
                  success: function (data) {
                      document.getElementById('id_tempat').value=data.id;
                      document.getElementById('nama_edit').value=data.nama;
                      $('#summernote1').summernote('code', data.deskripsi);     
                      $('#summernote4').summernote('code', data.deskripsi_fasilitas);                                                                       
                      document.getElementById('lokasi_edit').value = data.id_wilayah;
                      document.getElementById('kategori_edit').value = data.id_kategori;
                      document.getElementById('latitude_edit').value = data.latitude;
                      document.getElementById('longitude_edit').value = data.longitude;
                      document.getElementById('link_rute').value = data.link_rute;
                  }
              });
            }
          </script>

    <script src="../cuba/assets/js/editor/summernote/summernote.js"></script>
    <script src="../cuba/assets/js/editor/summernote/summernote.custom.js"></script>

@endsection
