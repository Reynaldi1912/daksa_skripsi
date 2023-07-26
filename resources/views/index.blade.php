@extends('layouts.app')
@section('content')

<style>
    #map { height: 400px; }
</style>
    <!-- HERO MAP
    =================================================================================================================-->
    <section id="ts-hero" class="mb-0 flex-wrap">

        <!-- MAP
        =============================================================================================================-->
        <div class="ts-map w-100 ts-min-h__30vh ts-z-index__1">

            <!-- <div id="ts-map-hero" class="h-100"
                 data-ts-map-leaflet-provider="https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}{r}.png"
                 data-ts-map-leaflet-attribution="&copy; <a href='http://www.openstreetmap.org/copyright'>OpenStreetMap</a> &copy; <a href='http://cartodb.com/attributions'>CartoDB</a>"
                 data-ts-map-zoom="13"
                 data-ts-map-controls="1"
                 data-ts-map-center-latitude="40.702411"
                 data-ts-map-center-longitude="-73.556842"
                 data-ts-locale="en-US"
                 data-ts-currency="USD"
                 data-ts-unit="m<sup>2</sup>"
                 data-ts-display-additional-info="area_Area;bedrooms_Bedrooms;bathrooms_Bathrooms;rooms_Rooms"
            >
            </div> -->

            <div id="map"></div>


        </div>

        <!--SEARCH FORM
            =========================================================================================================-->
        <section id="search-form" class="ts-form__map-horizontal ts-z-index__2">
            <div class="container">

                <form id="form-search" class="ts-form">

                    <section class="ts-box p-0">
                        <!--PRIMARY SEARCH INPUTS
                            =========================================================================================-->
                        <div class="form-row px-4 py-3">

                            <!--Other inputs-->
                            <div class="col-md-12">
                                <div class="form-row">
                                    <!--Type-->
                                    <div class="col-sm-4">
                                        <select class="custom-select my-2" id="wilayah" name="wilayah">
                                            <option value="-1">All</option>
                                           @foreach($wilayah as $wilayah_)
                                                <option value="{{$wilayah_->id}}">{{$wilayah_->nama}}</option>
                                           @endforeach
                                        </select>
                                    </div>

                                    <!--Status-->
                                    <div class="col-sm-4">
                                        <select class="custom-select my-2" id="kategori" name="kategori">
                                            <option value="-1">All</option>
                                            @foreach($kategori as $kategori_)
                                                <option value="{{$kategori_->id}}">{{$kategori_->nama}}</option>
                                           @endforeach
                                        </select>
                                    </div>

                                    <!--Submit button-->
                                    <div class="col-sm-4">
                                        <div class="form-group my-2">
                                            <button type="submit" class="btn btn-primary w-100" id="search-btn">Search
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

    </section>
    <!--end ts-hero-->

    <!--*********************************************************************************************************-->
    <!-- MAIN ***************************************************************************************************-->
    <!--*********************************************************************************************************-->

    <main id="ts-main">
    <section id="ts-footer-main bg-secondary">
            <div class="container">
                <div class="row">

                    <!--Brand and description-->
                    <div class="col-md-6">
                        <a href="#" class="brand d-flex justify-content-center pt-3">
                            <img src="assets/img/vector.png" alt="" width="80%">
                        </a>
                    </div>

                    <!--Navigation-->
                    <div class="col-md-6 d-flex align-items-center">
                        <div class="row">
                            <div class="col-12">
                                <h2><b>Daksa</b></h2>
                            </div>
                            <div class="col">
                                <p>DAKSA (Disabilitas Karya Anak Bangsa) memiliki peran yang penting dalam sistem informasi layanan umum penyedia fasilitas umum untuk disabilitas tunadaksa. DAKSA bertindak sebagai lembaga atau organisasi yang memberikan dukungan dan layanan khusus bagi penyandang disabilitas tunadaksa.</p>
                            </div>
                        </div>
                        
                    </div>


                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>

        <section class="ts-block bg-white">
            <div class="container py-4">
                <div class="row">

                    <!--Feature-->
                    <div class="col-sm-6 col-md-3">
                        <div class="ts-feature">

                            <figure class="ts-feature__icon p-2">
                                    <span class="ts-circle">
                                        <i class="fa fa-check"></i>
                                    </span>
                                <img src="assets/img/touch.png" alt="">
                            </figure>

                            <h4>Akses Mudah</h4>

                            <p>Sistem ini menyediakan akses mudah bagi penyandang disabilitas tunadaksa untuk mencari dan mengetahui fasilitas umum yang ramah bagi mereka.</p>

                        </div>
                    </div>

                    <!--Feature-->
                    <div class="col-sm-6 col-md-3">
                        <div class="ts-feature">

                            <figure class="ts-feature__icon p-2">
                                    <span class="ts-circle">
                                        <i class="fa fa-check"></i>
                                    </span>
                                <img src="assets/img/maps.png" alt="">
                            </figure>

                            <h4>Pemetaan Lokasi</h4>

                            <p>Sistem ini dilengkapi dengan peta digital yang memudahkan penyandang disabilitas tunadaksa dalam menemukan lokasi fasilitas umum yang ramah bagi mereka</p>

                        </div>
                    </div>

                    <!--Feature-->
                    <div class="col-sm-6 col-md-3">
                        <div class="ts-feature">

                            <figure class="ts-feature__icon p-2">
                                    <span class="ts-circle">
                                        <i class="fa fa-check"></i>
                                    </span>
                                <img src="assets/img/docs.png" alt="">
                            </figure>

                            <h4>Informasi Detail</h4>

                            <p>Sistem ini memberikan informasi detail tentang fasilitas yang disediakan, seperti toilet khusus, parkir khusus, dan akses ramp.</p>

                        </div>
                    </div>

                    <!--Feature-->
                    <div class="col-sm-6 col-md-3">
                        <div class="ts-feature">

                            <figure class="ts-feature__icon p-2">
                                    <span class="ts-circle">
                                        <i class="fa fa-check"></i>
                                    </span>
                                <img src="assets/img/heart.png" alt="">
                            </figure>

                            <h4>Ulasan</h4>

                            <p>Sistem ini menyediakan ulasan dan penilaian dari pengguna tunadaksa yang telah menggunakan fasilitas tersebut.</p>

                        </div>
                    </div>

                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>
        <!--end ts-block-->

        <!-- FEATURED PROPERTIES
        =============================================================================================================-->
        <section class="ts-block pt-5">
            <div class="container">

                <!--Title-->
                <div class="ts-title text-center">
                    <h2>Yang Paling Populer</h2>
                </div>

                <div class="row">

                    <!--Item-->
                    @foreach($data as $key)
                    <div class="col-sm-4 col-lg-4">
                        <div class="card ts-item ts-card ts-item__lg">

                            <!--Ribbon-->
                            <div class="ts-ribbon">
                                <i class="fa fa-thumbs-up"></i>
                            </div>

                            <!--Card Image-->
                            <a href="{{ route('detail', $key->id) }}" class="card-img ts-item__image" data-bg-image="{{ $galeri->where('id_tempat', $key->id)->isEmpty() ? 'assets/img/img-item-thumb-03.jpg' : 'storage/galeri/' . $galeri->where('id_tempat', $key->id)->first()->gambar }}">
                                <figure class="ts-item__info">
                                    <h4>{{$key->nama}}</h4>
                                    <aside>
                                        <i class="fa fa-map-marker mr-2"></i>
                                        {{$key->nama_wilayah}}
                                    </aside>
                                </figure>
                            </a>

                            <!--Card Body-->
                            <div class="card-body">
                                <div class="ts-description-lists">
                                    <dl>
                                        <dt>Fasilitas</dt>
                                        @foreach($fasilitas->where('id_tempat',$key->id) as $fasilitass)
                                            <span class=""><img src="/storage/icon/{{$fasilitass->logo}}" style="max-width:32px;max-height:32px" alt=""> </span>
                                        @endforeach                                        
                                    </dl>
                                </div>
                            </div>

                            <!--Card Footer-->
                            <a href="{{route('detail',$key->id)}}" class="card-footer">
                                <span class="ts-btn-arrow">Detail</span>
                            </a>

                        </div>
                        <!--end ts-item-->
                    </div>
                    <!--end Item col-md-4-->
                    @endforeach
                </div>
                <!--end row-->

                <!--All properties button-->
                <div class="text-center mt-3">
                    <a href="{{route('rekomendasi')}}" class="btn btn-outline-dark ts-btn-border-muted">Show All Properties</a>
                </div>

            </div>
            <!--end container-->
        </section>

        <!-- FEATURES
        =============================================================================================================-->
    </main>

    <!--*********************************************************************************************************-->
    <!--************ FOOTER *************************************************************************************-->
    <!--*********************************************************************************************************-->
        <script>
            var map = L.map('map').setView([-7.9771206, 112.6340291], 12);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            $(document).ready(function() {
                fetch('/get-tempat/-1/-1')
                    .then(response => response.json())
                    .then(data => {
                    data.forEach(item => {
                        var icon = L.divIcon({
                            className: 'custom-marker-icon',
                            iconSize: [1,1],
                            iconAnchor: [1,1],
                            html: `<img src="/assets/leaflet.png" alt="Marker Icon">`
                        });

                        var marker = L.marker([item.latitude, item.longitude], { icon: icon }).addTo(map);

                        const MAX_LENGTH = 100; // Batasan jumlah karakter yang ditampilkan

                            // Menghapus tag HTML menggunakan fungsi replace
                            const cleanDescription = item.deskripsi.replace(/<[^>]+>/g, '');

                            // Memotong teks deskripsi menjadi panjang yang diinginkan
                            const truncatedDescription = cleanDescription.length > MAX_LENGTH
                            ? cleanDescription.substring(0, MAX_LENGTH) + '...' // Tambahkan titik-titik untuk menandakan bahwa teks telah dipotong
                            : cleanDescription;

                            var popupContent = null;
                            if(item.gambar !== null){
                                var popupContent = `<a href="/detail/${item.id}" class="card" style="width: 18rem;">
                                <img class="card-img-top" src="/storage/galeri/${item.gambar}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">${item.nama}</h5>
                                    <p class="text-truncate" max-width="100px">${truncatedDescription}</p>                                
                                </div>
                                </a>`;
                            }else{
                                var popupContent = `<a href="/detail/${item.id}" class="card" style="width: 18rem;">
                                <img class="card-img-top" src="/assets/img/img-item-thumb-03.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">${item.nama}</h5>
                                    <p class="text-truncate" max-width="100px">${truncatedDescription}</p>                                
                                </div>
                                </a>`;
                            }

                        marker.bindPopup(popupContent, {
                        minWidth: 200
                        });

                        marker.on('click', function() {
                        this.openPopup();
                        });
                    });
                    })
                    .catch(error => console.error('Error:', error));
                });

            var form = document.getElementById('form-search');

            // Tambahkan penanganan acara pengiriman formulir
            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Mencegah pengiriman formulir yang standar

                // Dapatkan nilai-nilai filter dari elemen formulir
                var wilayah = document.getElementById('wilayah').value;
                var kategori = document.getElementById('kategori').value;

                // Lakukan permintaan AJAX ke backend dengan nilai-nilai filter
                fetch('/get-tempat/'+wilayah+'/'+kategori)
                    .then(response => response.json())
                    .then(data => {
                        // Hapus semua marker yang ada di peta
                        map.eachLayer(function(layer) {
                            if (layer instanceof L.Marker) {
                                map.removeLayer(layer);
                            }
                        });

                        // Tambahkan marker baru berdasarkan data yang diterima
                        data.forEach(item => {
                            var icon = L.divIcon({
                                className: 'custom-marker-icon',
                                iconSize: [1,1],
                                iconAnchor: [1,1],
                                html: `<img src="/assets/leaflet.png" alt="Marker Icon">`
                            });

                            var marker = L.marker([item.latitude, item.longitude], { icon: icon }).addTo(map);

                            const MAX_LENGTH = 100; // Batasan jumlah karakter yang ditampilkan

                            // Menghapus tag HTML menggunakan fungsi replace
                            const cleanDescription = item.deskripsi.replace(/<[^>]+>/g, '');

                            // Memotong teks deskripsi menjadi panjang yang diinginkan
                            const truncatedDescription = cleanDescription.length > MAX_LENGTH
                            ? cleanDescription.substring(0, MAX_LENGTH) + '...' // Tambahkan titik-titik untuk menandakan bahwa teks telah dipotong
                            : cleanDescription;


                            var popupContent = null;
                            if(item.gambar !== null){
                                var popupContent = `<a href="/detail/${item.id}" class="card" style="width: 18rem;">
                                <img class="card-img-top" src="/storage/galeri/${item.gambar}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">${item.nama}</h5>
                                    <p class="text-truncate" max-width="100px">${truncatedDescription}</p>                                
                                </div>
                                </a>`;
                            }else{
                                var popupContent = `<a href="/detail/${item.id}" class="card" style="width: 18rem;">
                                <img class="card-img-top" src="/assets/img/img-item-thumb-03.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">${item.nama}</h5>
                                    <p class="text-truncate" max-width="100px">${truncatedDescription}</p>                                
                                </div>
                                </a>`;
                            }

                            marker.bindPopup(popupContent, {
                                minWidth: 200
                            });

                            marker.on('click', function() {
                                this.openPopup();
                            });
                        });
                    })
                    .catch(error => console.error('Error:', error));
            });

         </script>

@endsection