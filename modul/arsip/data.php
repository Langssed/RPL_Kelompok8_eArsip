<div class="card mt-3">
  <div class="card-header bg-info text-white">
    Data Arsip Surat
  </div>
  <div class="card-body">
    <a href="?halaman=arsip_surat&hal=tambahdata" class="btn btn-info mb-3">Tambah Data</a>
   <table class="table table-boderd table-hovered tabel-striped">
        <tr>
            <th>No</th>
            <th>No Surat</th>
            <th>Tanggal Surat</th>
            <th>Tanggal Diterima</th>
            <th>Prihal</th>
            <th>Fakultas / Tujuan</th>
            <th>Pengirim</th>
            <th>File</th>
            <th>Aksi</th>
        </tr>
        <?php
            $tampil = mysqli_query($koneksi, "
                        SELECT 
                         tbl_arsip.*,
                         tbl_fakultas.nama_fakultas,
                         tbl_pengirim_surat.nama_pengirim, tbl_pengirim_surat.no_hp
                        FROM
                         tbl_arsip, tbl_fakultas, tbl_pengirim_surat
                        WHERE
                         tbl_arsip.id_fakultas = tbl_fakultas.id_fakultas
                         and tbl_arsip.id_pengirim = tbl_pengirim_surat.id_pengirim_surat
                        ");
            $no = 1;
            while($data = mysqli_fetch_array($tampil)) :

        ?>
        <tr>
            <td><?=$no++?></td>
            <td><?=$data['no_surat']?></td>
            <td><?=$data['tanggal_surat']?></td>
            <td><?=$data['tanggal_diterima']?></td>
            <td><?=$data['prihal']?></td>
            <td><?=$data['nama_fakultas']?></td>
            <td><?=$data['nama_pengirim']?> / <?=$data['no_hp']?></td>
            <td>
                <?php
                    if(empty($data['file'])){
                        echo " - ";
                    } else {
                ?>
                    <a href="file/<?=$data['file']?>" target="$_blank"> Lihat file</a>
                <?php
                    }
                ?>
            </td>
            <td>
              <a href="?halaman=arsip_surat&hal=edit&id=<?=$data['id_arsip']?>" class="btn btn-success
              ">Edit </a>
              <a href="?halaman=arsip_surat&hal=hapus&id=<?=$data['id_arsip']?>" class="btn btn-danger
              "onclick="return confirm('Apakah yakin ingin menghapus data ini?')">Hapus </a>
            </td>
        </tr>
    <?php endwhile; ?>
   </table>
  </div>
</div>