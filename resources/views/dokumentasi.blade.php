@extends('layouts.app')
@section('content')
<style>
  /* CSS untuk memberikan jarak antara setiap <li style="margin-bottom: 10px;"> pada daftar */
  ol {
    margin-bottom: 20px; /* Tambahkan jarak 10px antara setiap <li style="margin-bottom: 10px;"> dalam <ol> */
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
<section></section>
<div class="ts-main container" >
<img src="/assets/dokumentasi/atas.png" alt="" style="margin-bottom: 10px;">
<p style="color:black;">Website DAKSA adalah sebuah platform Sistem Informasi Geografis (SIG) yang dirancang khusus untuk menyediakan informasi lengkap tentang fasilitas umum yang ramah bagi tuna daksa di Kota Malang. Berikut adalah deskripsi cara penggunaan website DAKSA</p>

<br>

<section></section>

<h3><b>Cara Menggunakan Website Daksa</b></h3>
<ol>
    <li style="margin-bottom: 10px;">
        Buka browser dan ketikkan alamat website DAKSA di URL: <a href="www.daksa.biz.id" style="color:blue;">www.daksa.biz.id</a>
    </li>
    <section></section>
    <li style="margin-bottom: 10px;">
        Pada halaman utama muncul dengan peta tampilan yang interaktif.
        <br>
        <img src="/assets/dokumentasi/gambar1.png" width="200px" alt="" style="margin-bottom: 10px;">
    </li>
    <section></section>
    <li style="margin-bottom: 10px;">
        Pada tampilan peta, Anda akan melihat peta Kota Malang dengan berbagai ikon dan marka yang menunjukkan lokasi fasilitas umum yang ramah bagi tuna daksa.
    </li>
    <section></section>
    <li style="margin-bottom: 10px;">
        Untuk memperbesar atau memperkecil tampilan peta, gunakan tombol zoom “+” “-” yang ada di kiri peta.
        <br>
        <img src="/assets/dokumentasi/gambar2.png" width="200px" alt="" style="margin-bottom: 10px;">
    </li>
    <section></section>
    <li style="margin-bottom: 10px;">
        Untuk mencari Kategori Tempat yang spesifik, Anda dapat menggunakan kotak pencarian yang disediakan di bawah peta. di kotak pencarian pertama memilih kota yang ingin anda tuju, dan yang kedua memilih kategori tempat yang anda ingin kunjungi
    </li>
    <section></section>
    <li style="margin-bottom: 10px;">
    Untuk mencari Kategori Tempat yang spesifik, Anda dapat menggunakan kotak pencarian yang disediakan di bawah peta.
    </li>
    <section></section>
    <li style="margin-bottom: 10px;">
        Masukkan nama lokasi dan jenis kategori yang Anda cari pada kotak pencarian, lalu tekan tombol "Cari".
        <br>
        <img src="/assets/dokumentasi/gambar3.png" width="200px" alt="" style="margin-bottom: 10px;">
    </li>
    <section></section>
    <li style="margin-bottom: 10px;">
        Hasil pencarian akan ditampilkan di peta dengan ikon dan marka yang sesuai dengan tempat yang Anda cari.
        <br>
        <img src="/assets/dokumentasi/gambar4.png" width="200px" alt="" style="margin-bottom: 10px;">
    </li>
    <li style="margin-bottom: 10px;">
        Tekan salah satu ikon atau marka pada peta Informasi maka ditampilkan dalam pop-up atau panel yang berisi nama Tempat dan Fasilitas.
        <br>
        <img src="/assets/dokumentasi/gambar5.png" width="200px" alt="" style="margin-bottom: 10px;">
    </li>
    <li style="margin-bottom: 10px;">
        Jika menekan pop-up atau panel Informasi yang sudah ditampilkan maka akan ditunjukkan informasi yang detail berisi nama Tempat, fasilitas, alamat, deskripsi, dan informasi penting lainnya.
        <br>
        <img src="/assets/dokumentasi/gambar6.png" width="200px" alt="" style="margin-bottom: 10px;">
    </li>
    <section></section>
    <li style="margin-bottom: 10px;">
        Untuk menggunakan fitur navigasi, klik ikon atau tombol yang menunjukkan simbol arah atau rute pada peta.
        <br>
        <img src="/assets/dokumentasi/gambar7.png" width="200px" alt="" style="margin-bottom: 10px;">
    </li>
    <section></section>
    <li style="margin-bottom: 10px;">
        Setelah mengklik ikon navigasi, masukkan lokasi awal Anda, misalnya alamat rumah atau titik koordinat Anda.
        <br>
        <img src="/assets/dokumentasi/gambar8.png" width="200px" alt="" style="margin-bottom: 10px;">
    </li>
    <section></section>
    <li style="margin-bottom: 10px;">
        Sistem akan menampilkan rute terbaik untuk mencapai tujuan Anda, serta estimasi waktu perjalanan. Anda juga dapat memilih mode transportasi yang berbeda, tergantung pada kebutuhan Anda.
        <br>
        <img src="/assets/dokumentasi/gambar9.png" width="200px" alt="" style="margin-bottom: 10px;">
    </li>
    <section></section>
    <li style="margin-bottom: 10px;">
        Setelah menentukan rute, Anda dapat mengikuti petunjuk arah pada peta untuk mencapai tujuan Anda dengan mudah.
    </li>
    <section></section>
    <li style="margin-bottom: 10px;">
    <p style="color:black;">Selamat menggunakan fitur maps di tampilan awal website DAKSA untuk menemukan fasilitas umum yang ramah bagi tuna daksa di Kota Malang dengan lebih mudah dan nyaman.</p>
    </li>
</ol>

</div>

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
