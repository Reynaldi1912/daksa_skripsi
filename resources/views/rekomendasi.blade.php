@extends('layouts.app')
@section('content')
<style>
    .floating-button {
            position: fixed;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            padding: 10px;
            border-radius: 5px;
            display: flex;
            flex-direction: column;
            align-items: center;
            z-index: 9999; /* Atur nilai z-index ke angka yang besar */
        }

        .floating-button a {
            color: #fff;
            text-decoration: none;
            margin-bottom: 20px;
        }
        .floating-button {
            position: fixed;
            /* bottom: 20px; */
            right: 20px;
            display: flex;
            flex-direction: column;
        }
        .floating-button a {
            display: block;
            background-color: #007bff;
            color: #fff;
            opacity: 0.3;
            text-align: center;
            /* padding: 10px; */
            /* margin-top: 10px; */
            margin-bottom: 10px;
            border-radius: 10%;
            width: 40px;
            height: 40px;
            text-decoration: none;
            font-size: 18px;
        }
</style>
<br><br><br><br>
    <section id="ts-main">
    <section id="search-form">
            <div class="container">

                <form action="{{route('FilterRekomendasi')}}" class="ts-form" method="post">
                    @csrf
                    <section id="type-select" class="ts-icons-checkboxes mb-1">
                        <?php
                            $i = 1;
                        ?>
                        @foreach($kategori as $kategori)
                            <!--Lands Icon-->
                            <div class="form-group form-check ts-icon-checkbox">
                                <input type="checkbox" class="form-check-input" id="type_{{$i}}" name="type[]" value="{{$kategori->id}}" @if(in_array($kategori->id, $type)) checked @endif>
                                    <label class="form-check-label ts-box" for="type_{{$i}}">
                                        <span class="ts-icon-checkbox-image">
                                            <img src="storage/svg/{{$kategori->svg}}" alt="">
                                        </span>
                                    <span class="ts-icon-checkbox-text">{{$kategori->nama}}</span>
                                    <i class="fa fa-times-circle"></i>
                                </label>
                            </div>
                        <?php
                            $i++;
                        ?>
                        @endforeach
                    </section>

                    <!--BOX WRAPPER
                        =============================================================================================-->
                    <section class="ts-box p-0">

                        <!--PRIMARY SEARCH INPUTS
                            =========================================================================================-->
                        <div class="form-row px-4 py-3">

                            <!--Other inputs-->
                            <div class="col-md-12">
                                <div class="form-row">

                                    <!--Type-->
                                    <div class="col-sm-6">
                                        <select class="custom-select my-2" id="kota" name="kota">
                                            @foreach($wilayah as $wilayah)
                                                <option value="{{$wilayah->id}}" @if($wilayah->id == $kota_id) selected @endif>{{$wilayah->nama}}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    
                                    <!--Submit button-->
                                    <div class="col-sm-6">
                                        <div class="form-group my-2">
                                            <button type="submit" class="btn btn-primary w-100" id="search-btn">Cari
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                <!--end row-->
                            </div>
                            <!--end col-md-8-->

                        </div>
                        <!--end form-row-->
                    </section>
                </form>
                <!--end #form-search-->
            </div>
            <!--end container-->
        </section>
        <!--end #search-form-->

        <!-- FEATURED PROPERTIES
        =============================================================================================================-->
        <section id="featured-properties" class="ts-block pt-5">
            <div class="container">
                <div class="row">
                    @foreach($data as $key => $data_)
                    <!--Item-->
                    <div class="col-sm-{{ $key < 3 ? '4' : '3' }} col-lg-{{ $key < 3 ? '4' : '3' }}">

                        <div class="card ts-item ts-card ts-item__lg">

                            <!--Card Image-->
                            <a href="{{ route('detail', $data_->id) }}" class="card-img ts-item__image" data-bg-image="{{ $galeri->where('id_tempat', $data_->id)->isEmpty() ? 'assets/img/img-item-thumb-03.jpg' : 'storage/galeri/' . $galeri->where('id_tempat', $data_->id)->first()->gambar }}">
                                <figure class="ts-item__info">
                                    <h4>{{$data_->nama}}</h4>
                                    <aside>
                                        <i class="fa fa-map-marker mr-2"></i>
                                        {{$data_->nama_wilayah}}
                                    </aside>
                                </figure>
                            </a>

                            <!--Card Body-->
                            <div class="card-body">
                                <div class="ts-description-lists">
                                    <dl>
                                        <dt>Fasilitas</dt>
                                        @foreach($fasilitas->where('id_tempat',$data_->id) as $fasilitass)
                                            <span class=""><img src="/storage/icon/{{$fasilitass->logo}}" style="max-width:32px;max-height:32px" alt=""> </span>
                                        @endforeach
                                    </dl>
                                </div>
                            </div>

                            <!--Card Footer-->
                            <a href="{{route('detail',$data_->id)}}" class="card-footer">
                                <span class="ts-btn-arrow">Detail</span>
                            </a>

                        </div>
                        <!--end ts-item-->
                    </div>
                    @endforeach
                    <!--end Item col-md-3-->
                </div>
                <!--end row-->
                <div class="text-center row">
                    <div class="col text-right">
                        @if ($data->currentPage() > 1)
                            <a class="btn btn-primary" href="{{ $data->previousPageUrl() }}">Sebelumnya</a>
                        @endif
                    </div>
                    <div class="col text-left">
                        @if ($data->hasMorePages())
                            <a class="btn btn-primary" href="{{ $data->nextPageUrl() }}">Selanjutnya</a>
                        @endif
                    </div>
                </div>
            </div>
            <!--end container-->
        </section>
    </section>

<div class="floating-button">
    <a href="#map" id="btnUp">▲</a>
    <a href="#fitur" id="btnDown">▼</a>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    const btnUp = document.getElementById("btnUp");
    const btnDown = document.getElementById("btnDown");
    const sections = document.querySelectorAll("section");
    let currentSectionIndex = 0;

    // Function to scroll to the current section
    function scrollToSection(index) {
      sections[index].scrollIntoView({
        behavior: "smooth",
        block: "start",
      });
    }

    btnUp.addEventListener("click", function (event) {
      event.preventDefault();
      currentSectionIndex = Math.max(0, currentSectionIndex - 1);
      scrollToSection(currentSectionIndex);
    });

    btnDown.addEventListener("click", function (event) {
      event.preventDefault();
      currentSectionIndex = Math.min(sections.length - 1, currentSectionIndex + 1);
      scrollToSection(currentSectionIndex);
    });
  });
</script>
@endsection