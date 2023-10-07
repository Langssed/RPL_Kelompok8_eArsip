<?php

function upload(){
    $namafile = $_FILES['file']['name'];
    $ukuranfile = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
    $tmpname = $_FILES['file']['tmp_name'];

    $eksfilevalid = ['jpg', 'jpeg', 'png', 'pdf'];
    $eksfile = explode('.', $namafile);
    $eksfile = strtolower(end($eksfile));
    if(!in_array($eksfile, $eksfilevalid)){
        echo "<script> alert('file yang anda upload bukan gambar/file PDF!!') </script>";
        return false;
    }

    if($ukuranfile > 1000000){
        echo "<script> alert('ukuran file anda terlalu besar!!') </script>";
        return false;
    }

    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $eksfile;

    move_uploaded_file($tmpname, 'file/'.$namafilebaru);
    return $namafilebaru;

}

?>