<?php

/* @var $this yii\web\View */

$this->title = 'Home';
?>
<div class="site-index">
    <div class="jumbotron">
        <h1>Hi , Admin</h1>
        <p class="lead">Selamat Datang di Aplikasi Absensi Pegawai.</p>
    </div>
    <div class="row">
            <div class="col-sm-6 col-md-11"">
                    <p>
                  Sistem aplikasi absen pegawai adalah sebuah aplikasi yang dapat membantu manajemen dalam melakukan peniliaian performa pegawai berdasarkan presentase kehadiran dan memudahkan pegawai dalam melakukan kegiatan pencatatan kehadiran dan absensi di luar kantor.
                 </p>
                 <p>
                Sistem aplikasi absen pegawai ini sebagai jawaban terhadap Manajemen Kepegawaian untuk memantapkan administrasi Kepegawaian sebagai upaya untuk memenuhi kebutuhan informasi data pegawai yang cepat, tepat, akuntabel, dan up to date. 
                </p>
            </div>
    </div>
    <div class="body-content">
    <div class="row">
            <div class="col-sm-6">
                <h2>Data Pegawai</h2>

                <p> Admin dapat melakukan edit data, tambah data, hapus data dan cetak laporan pegawai pada menu data pegawai.
                </p>
                <p><a class="btn btn-lg btn-success" href="/employee">Cek Data Pegawai</a></p>
            </div>
            <div class="col-sm-5">
                <h2>Data Absen</h2>

                <p> Admin dapat melakukan edit data, tambah data, hapus data dan cetak laporan pegawai pada menu data absen.
                </p>
                <p><a class="btn btn-lg btn-success" href="/attendance">Cek Data Absen</a></p>
            </div>
   
      </div>
    </div>
    
</div>
