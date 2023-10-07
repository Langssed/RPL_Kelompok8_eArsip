<?php
    if(isset($_POST['bsimpan'])){
        if($_GET['hal'] == "edit"){
          $ubah = mysqli_query($koneksi, "UPDATE tbl_fakultas SET nama_fakultas = '$_POST[nama_fakultas]'
          where id_fakultas ='$_GET[id]'");
          if($ubah){
              echo "<script>
                      alert('Ubah Data Sukses');
                      document.location='?halaman=fakultas';
                  </script>";
        }
      }else {
          $simpan = mysqli_query($koneksi, "INSERT INTO tbl_fakultas VALUES ('', '$_POST[nama_fakultas]') ");
          if($simpan){
              echo "<script>
                      alert('Simpan Data Sukses');
                      document.location='?halaman=fakultas';
                  </script>";
          }
        }
    }

    if(isset($_GET['hal'])){
      if($_GET['hal'] == "edit"){
        $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_fakultas where id_fakultas='$_GET[id]'");
        $data = mysqli_fetch_array($tampil);
        if($data){
          $vnama_fakultas = $data['nama_fakultas'];
        }
      } else {
        $hapus = mysqli_query($koneksi, "DELETE FROM tbl_fakultas WHERE id_fakultas='$_GET[id]'");
        if($hapus){
          echo "<script>
                  alert('Menghapus Data Sukses');
                  document.location='?halaman=fakultas';
                </script>";
        }
      }
    }

?>

<div class="card mt-3">
  <div class="card-header bg-info text-white">
    Form Data Fakultas
  </div>
  <div class="card-body">
    <form method="post" action="">
    <div class="form-group">
        <label for="nama_fakultas">Nama Fakultas</label>
        <input type="text" class="form-control" id="nama_fakultas" name="nama_fakultas" value="<?=@$vnama_fakultas?>">
    </div>
    <button type="submit" name="bsimpan" class="btn btn-primary">Simpan</button>
    <button type="reset" name="bbatal" class="btn btn-danger">Batal</button>
    </form>
  </div>
</div>

<div class="card mt-3">
  <div class="card-header bg-info text-white">
    Data Fakultas
  </div>
  <div class="card-body">
   <table class="table table-boderd table-hovered tabel-striped">
        <tr>
            <th>No</th>
            <th>Nama Fakultas</th>
            <th>Aksi</th>
        </tr>
        <?php
            $tampil = mysqli_query($koneksi, "SELECT * from tbl_fakultas order by id_fakultas desc");
            $no = 1;
            while($data = mysqli_fetch_array($tampil)) :

        ?>
        <tr>
            <td><?=$no++?></td>
            <td><?=$data['nama_fakultas']?></td>
            <td>
              <a href="?halaman=fakultas&hal=edit&id=<?=$data['id_fakultas']?>" class="btn btn-success
              ">Edit </a>
              <a href="?halaman=fakultas&hal=hapus&id=<?=$data['id_fakultas']?>" class="btn btn-danger
              "onclick="return confirm('Apakah yakin ingin menghapus data ini?')">Hapus </a>
            </td>
        </tr>
    <?php endwhile; ?>
   </table>
  </div>
</div>