@extends('layouts.app-admin')
@section('content')
<style>
    #map { height: 400px; }
</style>
    <div class="container-fluid">        
    <div class="page-title">
        <div class="row">
        <div class="col-6">
            <h4>Dashboard</h4>
        </div>
        <div class="col-6">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">                                       
                <svg class="stroke-icon">
                    <use href="../cuba/assets/svg/icon-sprite.svg#stroke-home"></use>
                </svg></a></li>
            <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
        </div>
    </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
    <div class="row widget-grid">
        <div class="col-xxl-5 col-md-6 box-col-6 col-ed-6"> 
            <div class="row"> 
                <div class="col-xl-12"> 
                    <div class="card">
                    <div class="card-header card-no-border">
                        <div class="header-top">
                        <h5>Total</h5>
                
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <ul class="user-list">
                            <li> 
                                <div class="user-icon primary">
                                    <div class="user-box"><i class="font-primary" data-feather="user-plus"></i></div>
                                </div>
                                <div> 
                                <h5 class="mb-1">{{$totalKunjungan}} Kunjungan</h5>
                                </div>
                            </li>
                            <li> 
                                <div class="user-icon success">
                                    <div class="user-box"><i class="font-success" data-feather="mail"></i></div>
                                </div>
                                <div> 
                                <h5 class="mb-1">{{$totalUlasan}} Ulasan</h5>
                                </div>
                            </li>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="col-xl-12"> 
                    <div class="card growth-wrap">
                    <div class="card-header card-no-border">
                        <div class="header-top">
                            <h5>Pengunjung 2023</h5>
                        </div>
                    </div>
                    <br>
                    <div class="card-body pt-3 pb-5">
                        <div class="growth-wrapper">
                            <div id="growthChart">
                                <canvas id="chartCanvas" class="mt-2"></canvas>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-7 col-xl-5 col-md-6 col-sm-7 notification box-col-6">
        <div class="card height-equal"> 
            <div class="card-header card-no-border">
            <div class="header-top">
                <h5 class="m-0">Notifikasi</h5>
                <div class="card-header-right-icon">
                <!-- <div class="dropdown">
                    <button class="btn dropdown-toggle" id="dropdownMenuButton" type="button" data-bs-toggle="dropdown" aria-expanded="false">Today</button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="#">Today</a><a class="dropdown-item" href="#">Tomorrow</a><a class="dropdown-item" href="#">Yesterday  </a></div>
                </div> -->
                </div>
            </div>
            </div>
            <div class="card-body pt-0">
            <ul> 
                @foreach($ulasan as $key)
                    <li class="d-flex">
                        <div class="activity-dot-primary"></div>
                        <div class="w-100 ms-3">
                        <p class="d-flex justify-content-between mb-2">
                            <span class="date-content light-background">{{ $key->created_at->diffForHumans() }}</span>
                            <span>{{ $key->created_at->diffInDays() }} day ago</span>
                        </p>

                            <h6>Ulasan Terbaru (
                                @if($key->status == 0)
                                    <span class="text-primary">Pending</span>
                                @elseif($key->status == 1)
                                    <span class="text-success">Setuju</span>
                                @elseif($key->status == 2)
                                    <span class="text-danger">Tolak</span>
                                @endif    
                            )
                            <span class="dot-notification"></span></h6>
                            <p class="f-light" title="{{$key->ulasan}}">{{$key->nama}} - {{$key->ulasan}}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
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
            </div>
        </div>
        </div>
    </div>
    </div>
    <div id="map"></div>

    <!-- Container-fluid Ends-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                        iconSize: [32, 32], // Ubah ukuran ikon sesuai kebutuhan
                        iconAnchor: [16, 32], // Ubah titik anchor ikon sesuai kebutuhan
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
                        var popupContent = `<a href="/detail/${item.id}" class="" style="width: 18rem;">
                        <img class="card-img-top" src="/storage/galeri/${item.gambar}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">${item.nama}</h5>
                            <p class="text-truncate" max-width="100px">${truncatedDescription}</p>                                
                        </div>
                        </a>`;
                    }else{
                        var popupContent = `<a href="/detail/${item.id}" class="" style="width: 18rem;">
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

    

        document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById('chartCanvas').getContext('2d');

        fetch('/get-total-kunjungan')
            .then(response => response.json())
            .then(data => {
                const labels = data.map(data => {
                    const monthNames = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                    return monthNames[data.bulan - 1];
                });

                const kunjungan = data.map(data => parseInt(data.total_kunjungan));

                new Chart(ctx, {
                    type: 'line',
                    data: {
                    labels: labels,
                    datasets: [{
                        label: 'Total Kunjungan',
                        data: kunjungan,
                        borderColor: 'green',
                        backgroundColor: 'rgba(0, 0, 255, 0.2)',
                        pointBackgroundColor: ['red', 'green', 'blue', 'yellow', 'purple', 'blue', 'red', 'green', 'blue', 'red', 'green', 'blue'],
                    }]
                    },
                    options: {
                    responsive: true
                    }
                });
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });

  </script>
@endsection