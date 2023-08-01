@extends('layouts.app')
@section('content')
<style>
    @keyframes blink {
  0% {
    opacity: 1;
  }
  50% {
    opacity: 0.5;
  }
  100% {
    opacity: 1;
  }
}

.animated-star {
  animation: blink 1s infinite;
  color: yellow;
}

.floating-button {
        position: fixed;
        top: 60%;
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
<div class="ts-page-wrapper ts-has-bokeh-bg" id="page-top">
    <main id="ts-main">
        <!--PAGE TITLE
            =========================================================================================================-->
            <section id="page-title" class="border-bottom ts-white-gradient">
            <div class="container">

                <div class="d-block d-sm-flex justify-content-between">

                    <!--Title-->
                    <div class="ts-title mb-0">
                        <h1>{{$data->nama}}</h1>
                        <h5 class="ts-opacity__90">
                            <i class="fa fa-map-marker text-primary"></i>
                            {{$data->nama_wilayah}}
                        </h5>
                    </div>

                    <!--Price-->
                    <h3>
                        <div class="row">
                            <!-- <div class="col text-right">
                                <input type="text" value="daksa.biz.id/detail/{{$id}}" id="myInput" style="position: absolute; left: -9999px;">
                                <a onclick="myFunction()" class="btn btn-light w-100 mt-5" data-toggle="tooltip" data-placement="top" title="" data-original-title="Copy Link">
                                    <i class="fa fa-share-alt"></i>
                                </a>
                            </div> -->
                            <div class="col text-left">
                                <a href="{{$data->link_rute}}" class="btn btn-light w-100 mt-5">
                                    Tunjukan Rute &nbsp<i class="fa fa-location-arrow"></i>
                                </a>
                            </div>
                        </div>
                    </h3>

                </div>

            </div>
        </section>

        <!--GALLERY CAROUSEL
            =========================================================================================================-->
        <div id="gallery-carousel" class="">

            <div class="owl-carousel ts-gallery-carousel ts-gallery-carousel__multi" data-owl-dots="1" data-owl-items="3" data-owl-center="1" data-owl-loop="1">

                <!--Slide-->
                @foreach($galeri as $galeri)
                <div class="slide">
                    <div class="ts-image" data-bg-image="/storage/galeri/{{$galeri->gambar}}">
                        <a href="/storage/galeri/{{$galeri->gambar}}" class="ts-zoom popup-image"><i class="fa fa-search-plus"></i>Zoom</a>
                    </div>
                </div>
                @endforeach

            </div>

        </div>

        <!--CONTENT
            =========================================================================================================-->
        <div id="content">
            <div class="container">
                <div class="row flex-wrap-reverse">

                    <!--RIGHT SIDE
                        =============================================================================================-->
                    <div class="col-md-12 col-lg-12">
                        <!--DESCRIPTION
                            =========================================================================================-->
                        <section id="description">

                            <h3>Deskripsi</h3>

                            @php
                                echo $data->deskripsi
                            @endphp
                        
                        </section>
                        <!-- test -->
                    </div>
                    <!--end col-md-8-->

                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </div>

            <div class="container">
                <div class="row flex-wrap-reverse">
                    <!--RIGHT SIDE
                        =============================================================================================-->
                    <div class="col-md-12 col-lg-12">
                        <!--DESCRIPTION
                            =========================================================================================-->
                            <div class="row mb-4">
                                <div class="col">
                                <section id="fasilitas">
                                    <h3>Fasilitas</h3>
                                    
                                    @foreach($fasilitas as $key)
                                        <div class="mb-2"><span class="mb-4 ml-4"><img src="/storage/icon/{{$key->logo}}" style="max-width:32px;max-height:32px" alt=""> &nbsp{{$key->nama}} </span></div>
                                    @endforeach
                                    <br>
                                    @php
                                        echo $data->deskripsi_fasilitas
                                    @endphp
                                    
                                    </section>
                                </div>
                                
                            </div>
                        <!-- test -->
                    </div>
                    <!--end col-md-8-->

                </div>
                <!--end row-->
            </div>
            <!--end container-->

            <div class="container">
                <div class="row flex-wrap-reverse">
                    <!--RIGHT SIDE
                        =============================================================================================-->
                    <div class="col-md-12 col-lg-12">

                        <!--DESCRIPTION
                            =========================================================================================-->
                        <section>

                            <h3>Map</h3>

                            <div>
                                <?php
                                    // Membaca data dari file JSON
                                    $latitude = $data->latitude;
                                    $longitude = $data->longitude;

                                    // Menyusun URL iframe dengan latitude dan longitude
                                    $iframe_url = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15802.667504825315!2d$longitude!3d$latitude!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa7aafcee7a7:0x8ec086c0f9f28d2e!2sSample%20Location!5e0!3m2!1sen!2sid!4v1627170138612!5m2!1sen!2sid";
                                ?>
                                <iframe
                                    width="100%"
                                    height="450"
                                    frameborder="0"
                                    style="border:0"
                                    src="<?php echo $iframe_url; ?>">
                                </iframe>
                            </div>
                        </section>
                        <!-- test -->
                    </div>
                    <!--end col-md-8-->

                </div>
                <!--end row-->
            </div>
            <!--end container-->

            <div class="container pb-5 mt-5">
                <div class="row flex-wrap-reverse">
                    <!--RIGHT SIDE
                        =============================================================================================-->
                    <div class="col-md-12 col-lg-12">

                        <!--DESCRIPTION
                            =========================================================================================-->
                        <section>
                        <div class="row">
                            <div class="col-sm-1">
                                <h3 style="font-size:20px"><b>Ulasan</b></h3>
                            </div>
                            <div class="col-sm-12">
                                <i class="fas fa-star animated-star"></i> {{round($rate->where('id_tempat',$id)->first() == null ? 0 : $rate->where('id_tempat',$id)->first()->rata_rata,1)}}
                            </div>
                        </div>

                        <p style="font-size:13px">Dari <b>
                            <?php
                                $sum_rate = 0;
                                $max_bar = 1000 / 100;
                                if($rate->where('id_tempat',$id)->first() === null ){
                                    $sum_rate = 0;
                                }else{
                                    $sum_rate = $rate->where('id_tempat',$id)->first()->sangat_memuaskan + $rate->where('id_tempat',$id)->first()->memuaskan + $rate->where('id_tempat',$id)->first()->bagus + $rate->where('id_tempat',$id)->first()->biasa + $rate->where('id_tempat',$id)->first()->kurang;
                                }
                            ?>
                            {{$sum_rate}}
                        </b> yang sudah mengunjungi</p>

                            <div class="row mb-3">
                                <div class="col-2">Sangat Memuaskan</div>
                                <div class="col-4 ml-4">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width:{{$rate->where('id_tempat',$id)->first() === null ? 0 : $rate->where('id_tempat',$id)->first()->sangat_memuaskan/$max_bar}}%" aria-valuenow="1" aria-valuemin="0" aria-valuemax="10000"></div>
                                    </div>
                                </div>
                                <div class="col">{{$rate->where('id_tempat',$id)->first() === null ? 0 : $rate->where('id_tempat',$id)->first()->sangat_memuaskan}}</div>
                            </div>
                           
                            <div class="row mb-3">
                                <div class="col-2">Memuaskan</div>
                                <div class="col-4 ml-4">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width:{{$rate->where('id_tempat',$id)->first() === null ? 0 : $rate->where('id_tempat',$id)->first()->memuaskan/$max_bar}}%" aria-valuenow="1" aria-valuemin="0" aria-valuemax="10000"></div>
                                    </div>
                                </div>
                                <div class="col">{{$rate->where('id_tempat',$id)->first() === null ? 0 : $rate->where('id_tempat',$id)->first()->memuaskan}}</div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-2">Bagus</div>
                                <div class="col-4 ml-4">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width:{{$rate->where('id_tempat',$id)->first() === null ? 0 : $rate->where('id_tempat',$id)->first()->bagus/$max_bar}}%" aria-valuenow="1" aria-valuemin="0" aria-valuemax="10000"></div>
                                    </div>
                                </div>
                                <div class="col">{{$rate->where('id_tempat',$id)->first() === null ? 0 : $rate->where('id_tempat',$id)->first()->bagus}}</div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-2">Biasa</div>
                                <div class="col-4 ml-4">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width:{{$rate->where('id_tempat',$id)->first() === null ? 0 : $rate->where('id_tempat',$id)->first()->biasa/$max_bar}}%" aria-valuenow="1" aria-valuemin="0" aria-valuemax="10000"></div>
                                    </div>
                                </div>
                                <div class="col">{{$rate->where('id_tempat',$id)->first() === null ? 0 : $rate->where('id_tempat',$id)->first()->biasa}}</div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-2">Kurang</div>
                                <div class="col-4 ml-4">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width:{{$rate->where('id_tempat',$id)->first() === null ? 0 : $rate->where('id_tempat',$id)->first()->kurang/$max_bar}}%" aria-valuenow="1" aria-valuemin="0" aria-valuemax="10000"></div>
                                    </div>
                                </div>
                                <div class="col">{{$rate->where('id_tempat',$id)->first() === null ? 0 : $rate->where('id_tempat',$id)->first()->kurang}}</div>
                            </div>
                           
                            
                            @foreach($ulasan as $ulasan_)
                            <div class="row mb-3 mt-3">
                                <div class="col-2">{{$ulasan_->nama}}</div>
                                <div class="col-10">
                                @for ($i = 0; $i < 5; $i++)
                                    @if($i < $ulasan_->rate)
                                        <i class="fas fa-star animated-star"></i>
                                    @else
                                        <i class="fas fa-star"></i>
                                    @endif
                                @endfor

                                </div>
                                <div class="col-12 mt-4">
                                    <p>{{$ulasan_->ulasan}}</p>
                                </div>
                            </div>
                            @endforeach
                            <div class="text-center row">
                                <div class="col text-right">
                                    @if ($ulasan->currentPage() > 1)
                                        <a href="{{ $ulasan->previousPageUrl() }}">Sebelumnya</a>
                                    @endif
                                </div>
                                <div class="col text-left">
                                    @if ($ulasan->hasMorePages())
                                        <a href="{{ $ulasan->nextPageUrl() }}">Selanjutnya</a>
                                    @endif
                                </div>
                            </div>
                        </section>
                        <!-- test -->
                    </div>
                    <!--end col-md-8-->
                </div>
                <!--end row-->
            </div>
            <!--end container-->

            <div class="container pb-5">
                <div class="row flex-wrap-reverse">
                    <!--RIGHT SIDE
                        =============================================================================================-->
                    <div class="col-md-12 col-lg-12">

                        <!--DESCRIPTION
                            =========================================================================================-->
                        <section>

                            <h3>Beri Ulasan</h3>
                            @if ($errors->has('captcha'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('captcha') }}
                                </div>
                            @endif

                            <p>Sudah mengunjungi? Berilah pengalaman Anda!</p>

                            <form action="{{route('postUlasan')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$id}}">
                                <label for=""><b>Nama</b></label>
                                <input type="text" class="form-control" name="nama" required placeholder="Nama Anda" required>
                                <label class="mt-3"><b>Pengalaman</b></label>
                                <select class="form-control" name="rate" required>
                                    <option value="5">5 - Sangat Memuaskan</option>
                                    <option value="4">4 - Memuaskan</option>
                                    <option value="3">3 - Bagus</option>
                                    <option value="2">2 - Biasa</option>
                                    <option value="1">1 - Kurang</option>
                                </select>
                                <label class="mt-3">Pesan</label>
                                <textarea name="ulasan" id="" cols="30" rows="10" class="form-control" placeholder="Berilah pesan pengalaman anda setelah mengunjungi tempat tersebut" required></textarea>
                                <div class="form-group row mt-3">
                                    <div class="col-md-12 captcha">
                                        <img src="{{ Captcha::src('default') }}" alt="Captcha">
                                        <button type="button" class="btn btn-danger" class="reload" onclick="reloadCaptcha()">
                                            &#x21bb;
                                        </button>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha" required>
                                    </div>
                                </div>
                                <button class="btn btn-primary mt-3">Kirim Ulasan</button>
                            </form>
                        </section>
                        <!-- test -->
                    </div>
                    <!--end col-md-8-->

                </div>
                <!--end row-->
            </div>
            <!--end container-->

    </main>

</div>
<!--end page-->

<div class="floating-button">
    <a href="#map" id="btnUp">▲</a>
    <a href="#fitur" id="btnDown">▼</a>
</div>

<script type="text/javascript">
    function reloadCaptcha(){
        $.ajax({
            type: 'GET',
            url: "/reload-captcha",
            success: function (data) {
                var captchaImgSrc = $(data.captcha).attr('src');
                console.log(captchaImgSrc);
                $('.captcha img').attr('src', captchaImgSrc);  // Mengatur URL src pada elemen img
            }
        });
    }

    function myFunction() {
        // Get the text field
        var copyText = document.getElementById("myInput");

        // Select the text field
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text inside the text field
        navigator.clipboard.writeText(copyText.value);

        // Alert the copied text
        alert("Copied the text: " + copyText.value);
    }
</script>

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