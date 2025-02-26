<!-- rancangan tampilan tabel data arsip laporan -->
<div class="card mt-3 border bg-body-tertiary rounded-3 animate__animated animate__fadeInDown">
  <div class="card-header bg-dark text-white">
  <h6 class="fw-bold"><i class="fas fa-folder-open"></i> Data Arsip Laporan Bawaslu Kabupaten Tanah Datar</h6>
  </div>
  <div class="card-body">

    <!-- tombol tambah data arsip laporan -->
    <div class="container text-center">
        <a href="?halaman=lap_all&hal=tambahdatalapall" class="btn btn-info mt-2 mb-3"><i class="fas fa-copy"></i> Tambah Data</a>
        <a href="modules\arsip_laporan\cetak_lap.php" class="btn btn-warning mt-2 mb-3"><i class="fas fa-print"></i> Cetak Data Arsip</a>
        <a href="?halaman=laporan" class="btn btn-danger mt-2 mb-3"><i class="fas fa-reply-all"></i> Kembali</a>
    </div>

    <!-- tabel arsip surat -->
    <table class="table table-bordered table-hover shadow">

        <!-- kepala tabel -->
        <tr>
            <th class="text-center" width="2%">No</th>
            <th class="text-center" width="10%">Nama Pelaksana</th>
            <th class="text-center" width="10%">Divisi</th>
            <th class="text-center" width="8%">No Form-A</th>
            <th class="text-center" width="10%">Jenis Pemilihan</th>
            <th class="text-center" width="10%">Tahapan Pemilihan</th>
            <th class="text-center" width="10%">Lokasi</th>
            <th class="text-center" width="8%">Tanggal</th>
            <th class="text-center" width="10%">File</th>
            <th class="text-center" width="20%">Aksi</th>
        </tr>

        <!-- program tabel -->
        <?php
            // program untuk memanggil data laporan di database ke dalam tabel
            $tampil =mysqli_query($koneksi, "SELECT 
                        tbl_laporan.*,
                        tbl_divisi.nama_divisi,
                        tbl_pengawas.nama_pengawas,
                        tbl_pengawas.no_hp
                     FROM
                        tbl_laporan, tbl_divisi, tbl_pengawas
                     WHERE
                        tbl_laporan.id_divisi = tbl_divisi.id_divisi
                        and tbl_laporan.id_pengawas = tbl_pengawas.id_pengawas
                     ");
            $no = 1;
            while($data =mysqli_fetch_array($tampil)) :
        ?>

        <!-- program badan/isi tabel -->
        <tr>
            <td class="text-center"><?=$no++?></td>
            <td><?=$data['nama_pengawas']?></td>
            <td><?=$data['nama_divisi']?></td>
            <td><?=$data['no_lap']?></td>
            <td class="text-center"><?=$data['jenis']?></td>
            <td><?=$data['tahapan']?></td>
            <td><?=$data['lokasi']?></td>
            <td><?=$data['tanggal']?></td>
            <td class="text-center">
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
            <td class="text-center">
                <a href="?halaman=lap_all&hal=editlapall&id=<?=$data['id_lap']?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                <a href="?halaman=lap_all&hal=hapuslapall&id=<?=$data['id_lap']?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')"><i class="fas fa-trash"></i></a>
            </td>
        </tr>
    <?php endwhile; ?>
    </table>
  </div>
</div>