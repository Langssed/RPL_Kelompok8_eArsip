<?php
session_start();
if(empty($_SESSION['id_user']) or empty($_SESSION['username'])){
    echo "<script>
            alert('maaf, untuk mengakses halaman ini harap melakukan login terlebih dahulu')
             document.location='index.php';
        </script>";
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <title>Arsip Fakultas</title>
  </head>
  <body>
    <!-- Awal Navbar / Menu -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class = "container">
                <a class="navbar-brand" href="?">E-Arsip</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="?">Beranda <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?halaman=fakultas">Data Fakultas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?halaman=pengirim_surat">Data Pengirim Surat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?halaman=arsip_surat">Data Arsip Surat</a>
                </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    
    </nav>
    <!-- Akhir Navbar / Menu -->

    <!-- Awal container -->
        <div class = "container">