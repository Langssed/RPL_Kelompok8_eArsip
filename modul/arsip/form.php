<?php

    include "config/function.php";

    if(isset($_GET['hal'])){
        if($_GET['hal'] == "edit"){
          $tampil = mysqli_query($koneksi, "SELECT 
                                              tbl_arsip.*,
                                              tbl_fakultas.nama_fakultas,
                                              tbl_pengirim_surat.nama_pengirim, tbl_pengirim_surat.no_hp
                                          FROM
                                              tbl_arsip, tbl_fakultas, tbl_pengirim_surat
                                          WHERE
                                              tbl_arsip.id_fakultas = tbl_fakultas.id_fakultas
                                              and tbl_arsip.id_pengirim = tbl_pengirim_surat.id_pengirim_surat
                                              and tbl_arsip.id_arsip='$_GET[id]'");
          $data = mysqli_fetch_array($tampil);
          if($data){
            $vno_surat = $data['no_surat'];
            $vtanggal_surat = $data['tanggal_surat'];
            $vtanggal_diterima = $data['tanggal_diterima'];
            $vprihal = $data['prihal'];
            $vid_fakultas = $data['id_fakultas'];
            $vnama_fakultas = $data['nama_fakultas'];
            $vid_pengirim = $data['id_pengirim'];
            $vnama_pengirim = $data['nama_pengirim'];
            $vfile = $data['file'];
          }
        } elseif($_GET['hal'] == 'hapus') {
              $hapus = mysqli_query($koneksi, "DELETE FROM tbl_arsip WHERE id_arsip='$_GET[id]'");
              if($hapus){
              echo "<script>
                      alert('Menghapus Data Sukses');
                      document.location='?halaman=arsip_surat';
                      </script>";
              }
        }
      }

    if(isset($_POST['bsimpan'])){
        if(@$_GET['hal'] == "edit"){

            if($_FILES['file']['error'] === 4){
                $file = $vfile;
            } else {
                $file = upload();
            }

        $ubah = mysqli_query($koneksi, "UPDATE tbl_arsip SET 
                                                        no_surat = '$_POST[no_surat]',
                                                        tanggal_surat = '$_POST[tanggal_surat]',
                                                        tanggal_diterima = '$_POST[tanggal_diterima]',
                                                        prihal = '$_POST[prihal]',
                                                        id_fakultas = '$_POST[id_fakultas]',
                                                        id_pengirim = '$_POST[id_pengirim]',
                                                        file = '$file'
                                        where id_arsip ='$_GET[id]'");
          if($ubah){
              echo "<script>
                      alert('Ubah Data Sukses');
                      document.location='?halaman=arsip_surat';
                  </script>";
        } else {
            echo "<script>
                      alert('Ubah Data GAGAL!');
                      document.location='?halaman=arsip_surat';
                  </script>";
        }
      }else {
             $file = upload();
            $simpan = mysqli_query($koneksi, "INSERT INTO tbl_arsip VALUES ('', 
                                                                            '$_POST[no_surat]',
                                                                            '$_POST[tanggal_surat]',
                                                                            '$_POST[tanggal_diterima]',
                                                                            '$_POST[prihal]',
                                                                            '$_POST[id_fakultas]',
                                                                            '$_POST[id_pengirim]',
                                                                            '$file'
                                                                            ) ");
          if($simpan){
              echo "<script>
                      alert('Simpan Data Sukses');
                      document.location='?halaman=arsip_surat';
                  </script>";
          } else {
            echo "<script>
                      alert('Simpan Data GAGAL!');
                      document.location='?halaman=arsip_surat';
                  </script>";
          }
        }
    }

?>

<div class="card mt-3">
  <div class="card-header bg-info text-white">
    Form Data Arsip Surat
  </div>
  <div class="card-body">
    <form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label for="no_surat">No. Surat</label>
        <input type="text" class="form-control" id="no_surat" name="no_surat" value="<?=@$vno_surat?>">
    </div>
    <div class="form-group">
        <label for="tanggal_surat">Tanggal Surat</label>
        <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat" value="<?=@$vtanggal_surat?>">
    </div>
    <div class="form-group">
        <label for="tanggal_diterima">Tanggal Diterima</label>
        <input type="date" class="form-control" id="tanggal_diterima" name="tanggal_diterima" value="<?=@$vtanggal_diterima?>">
    </div>
    <div class="form-group">
        <label for="prihal">prihal</label>
        <input type="text" class="form-control" id="prihal" name="prihal" value="<?=@$vprihal?>">
    <div class="form-group">
        <label for="id_fakultas">Fakultas / Tujuan</label>
        <select class="form-control" name="id_fakultas">
            <option value="<?=@$vid_fakultas?>"><?=@$vnama_fakultas?></option>
            <?php
                $tampil = mysqli_query($koneksi, "SELECT * from tbl_fakultas order by
                    nama_fakultas asc");
                while($data = mysqli_fetch_array($tampil)){
                    echo "<option value = '$data[id_fakultas]'> $data[nama_fakultas] </option> ";
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="id_pengirim">Pengirim Surat</label>
        <select class="form-control" name="id_pengirim">
            <option value="<?=@$vid_pengirim?>"><?=@$vnama_pengirim?></option>
            <?php
                $tampil = mysqli_query($koneksi, "SELECT * from tbl_pengirim_surat order by
                    nama_pengirim asc");
                while($data = mysqli_fetch_array($tampil)){
                    echo "<option value = '$data[id_pengirim_surat]'> $data[nama_pengirim] </option> ";
                }
            ?>
        </select>
    </div>
    </div>
    
    <div class="form-group">
        <label for="file">Pilih File</label>
        <input type="file" class="form-control" id="file" name="file" value="<?=@$vfile?>">
    </div>
    <button type="submit" name="bsimpan" class="btn btn-primary">Simpan</button>
    <a type="reset" name="bbatal" class="btn btn-danger" href="?halaman=arsip_surat">Batal</a>
    </form>
  </div>
</div>