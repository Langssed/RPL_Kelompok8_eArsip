<?php

    @$halaman = $_GET['halaman'];

    if($halaman == "fakultas"){
        include "modul/fakultas/fakultas.php";
    }
    elseif($halaman == "pengirim_surat"){
        include "modul/pengirim_surat/pengirim_surat.php";
    }
    elseif($halaman == "arsip_surat"){
        if(@$_GET['hal'] == "tambahdata" || @$_GET['hal'] == "edit" || @$_GET['hal'] == "hapus"){
            include "modul/arsip/form.php";
        } else {
            include "modul/arsip/data.php";
        }
    }
    else {
        include "modul/home.php";
    }

?>