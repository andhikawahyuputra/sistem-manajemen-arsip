<!-- rancangan tampilan tabel data surat -->
<div class="card mt-3 border bg-body-tertiary rounded-3 animate__animated animate__fadeInDown">
  <div class="card-header bg-dark text-white">
  <h6 class="fw-bold"><i class="fas fa-folder-open"></i> Data Arsip Surat</h6>
  </div>
  <div class="card-body mb-0">

    <!-- tombol tambah data arsip surat -->
    <a href="?halaman=arsip_surat&hal=tambahdata" class="btn btn-info mt-2 mb-4"><i class="fas fa-copy"></i> Tambah Data</a>

    <!-- tabel arsip surat -->
    <table class="table table-bordered table-hover shadow">

        <!-- kepala tabel -->
        <tr>
            <th class="text-center" width="3%">No</th>
            <th class="text-center" width="10%">No Surat</th>
            <th class="text-center" width="8%">Tanggal Surat</th>
            <th class="text-center" width="8%">Tanggal Diterima</th>
            <th class="text-center" width="18%">Perihal</th>
            <th class="text-center" width="18%">Divisi Tujuan</th>
            <th class="text-center" width="8%">Pengirim</th>
            <th class="text-center" width="10%">File</th>
            <th class="text-center" width="20%">Aksi</th>
        </tr>

        <!-- program tabel -->
        <?php
            // program untuk memanggil data surat di database ke dalam tabel
            $tampil =mysqli_query($koneksi, "SELECT 
                        tbl_arsip.*,
                        tbl_divisi.nama_divisi,
                        tbl_pengirim_surat.nama_pengirim,
                        tbl_pengirim_surat.no_hp
                     FROM
                        tbl_arsip, tbl_divisi, tbl_pengirim_surat
                     WHERE
                        tbl_arsip.id_divisi = tbl_divisi.id_divisi
                        and tbl_arsip.id_pengirim = tbl_pengirim_surat.id_pengirim
                     ");
            $no = 1;
            while($data =mysqli_fetch_array($tampil)) :
        ?>

        <!-- program badan/isi tabel -->
        <tr>
            <td class="text-center" ><?=$no++?></td>
            <td><?=$data['no_surat']?></td>
            <td><?=$data['tanggal_surat']?></td>
            <td><?=$data['tanggal_diterima']?></td>
            <td><?=$data['perihal']?></td>
            <td><?=$data['nama_divisi']?></td>
            <td><?=$data['nama_pengirim']?> / <?=$data['no_hp']?></td>
            <td class="text-center" >
                <?php
                    //uji apakah ada file atau tidak untuk kolom tabel "file"
                    if(empty($data['file'])){
                        echo " - ";
                    }else{
                ?>
                    <a href="files/<?=$data['file']?>" target="$_blank"><i class="fas fa-file-alt fa-3x"></i></a>
                <?php
                    }
                ?>
            </td>
            <!-- kolom aksi untuk edit dan hapus data -->
            <td class="text-center" >
                <a href="?halaman=arsip_surat&hal=edit&id=<?=$data['id_arsip']?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                <a href="?halaman=arsip_surat&hal=hapus&id=<?=$data['id_arsip']?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')"><i class="fas fa-trash"></i></a>
            </td>
        </tr>
    <?php endwhile; ?>
    </table>
  </div>
</div>