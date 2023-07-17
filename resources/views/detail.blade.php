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
                        <a href="#" class="btn btn-light w-100 mt-5" data-toggle="tooltip" data-placement="top" title="" data-original-title="Share property">
                            <i class="fa fa-share-alt"></i>
                        </a>
                    </h3>

                </div>

            </div>
        </section>

        <!--GALLERY CAROUSEL
            =========================================================================================================-->
        <section id="gallery-carousel" class="">

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

        </section>

        <!--CONTENT
            =========================================================================================================-->
        <section id="content">
            <div class="container">
                <div class="row flex-wrap-reverse">

                    
                    <!--RIGHT SIDE
                        =============================================================================================-->
                    <div class="col-md-12 col-lg-12">

                        <!--DESCRIPTION
                            =========================================================================================-->
                        <section id="description">

                            <h3>Deskripsi</h3>

                            <p>
                                {{$data->deskripsi}}
                            </p>

                        </section>
                        <!-- test -->
                    </div>
                    <!--end col-md-8-->

                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>

        <section>
            <div class="container">
                <div class="row flex-wrap-reverse">

                    
                    <!--RIGHT SIDE
                        =============================================================================================-->
                    <div class="col-md-12 col-lg-12">

                        <!--DESCRIPTION
                            =========================================================================================-->
                        <section>

                            <h3>Aksesbilitas</h3>

                            <ul>
                                <li><p>Pintu Masuk Khusus Pengguna Roda 4</p></li>
                                <li><p>Pintu Masuk Khusus Pengguna Roda 4</p></li>
                            </ul>

                        </section>
                        <!-- test -->
                    </div>
                    <!--end col-md-8-->

                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>

        <section>
            <div class="container">
                <div class="row flex-wrap-reverse">

                    
                    <!--RIGHT SIDE
                        =============================================================================================-->
                    <div class="col-md-12 col-lg-12">

                        <!--DESCRIPTION
                            =========================================================================================-->
                        <section>

                            <h3>Map</h3>

                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31617.014696445196!2d112.4982528840655!3d-7.881795699888658!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7880d9c33a06b1%3A0xe13ff8ae351bb29e!2sTemas%2C%20Kec.%20Batu%2C%20Kota%20Batu%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1689249939253!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                        </section>
                        <!-- test -->
                    </div>
                    <!--end col-md-8-->

                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>

        <section>
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
        </section>

        <section>
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
                                <input type="text" class="form-control" name="nama" required placeholder="Nama Anda">
                                <label class="mt-3"><b>Pengalaman</b></label>
                                <select class="form-control" name="rate" required>
                                    <option>Pilih Angka 1 - 5</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
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
        </section>

    </main>

</div>
<!--end page-->

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
</script>
@endsection