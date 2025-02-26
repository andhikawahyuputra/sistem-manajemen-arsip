<?php
//buat koneksi database
//persiapan identitas server
$server     = "localhost";  //nama server
$user       = "root";       //username database server
$pass       = "";           //password database server
$database   = "dbarsip";    //nama database
//koneksi database
$koneksi = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($koneksi));
?>
<style>

h1, h2, h3, h4, h5 {
  page-break-after: avoid;
}

@page {
  size: A4 landscape;
  margin-top: 1.5cm;
  margin-bottom: 1cm;
  margin-right: 2cm;
  margin-left: 2cm;
  padding: 2px;
}

table {
  border-collapse: collapse;
  font-size: 9pt;
  width: 100%;
}

th, td {
  text-align: left;
  vertical-align: top;
  padding: 8px;
  border-bottom: 1px solid #ddd;
}

</style>

    <center>
    <h3>Data Arsip Laporan Divisi HPPH | Bawaslu Kabupaten Tanah Datar</h3>
    <hr class="border"></hr>
    </center>
    <table class="table border table-bordered table-hover">
        <tr>
            <th class="text-center" width="2%">No</th>
            <th>Nama Pelaksana</th>
            <th>No Form-A</th>
            <th>Jenis Pemilihan</th>
            <th>Tahapan Pemilihan</th>
            <th>Lokasi</th>
            <th>Tanggal</th>
            <th width="5%">File</th>
        </tr>
        <?php
            $tampil =mysqli_query($koneksi, "SELECT 
                        tbl_laporan.*,
                        tbl_divisi.nama_divisi,
                        tbl_pengawas.nama_pengawas,
                        tbl_pengawas.no_hp
                     FROM
                        tbl_laporan, tbl_divisi, tbl_pengawas
                     WHERE
                        tbl_laporan.id_divisi = tbl_divisi.id_divisi
                        and tbl_laporan.id_pengawas = tbl_pengawas.id_pengawas and tbl_divisi.id_divisi=2;
                     ");
            $no = 1;
            while($data =mysqli_fetch_array($tampil)) :
        ?>
        <tr>
            <td class="text-center"><?=$no++?></td>
            <td class="text-center"><?=$data['nama_pengawas']?></td>
            <td class="text-center"><?=$data['no_lap']?></td>
            <td class="text-center"><?=$data['jenis']?></td>
            <td class="text-center"><?=$data['tahapan']?></td>
            <td class="text-center"><?=$data['lokasi']?></td>
            <td class="text-center"><?=$data['tanggal']?></td>
            <td class="text-center"><a>files/<?=$data['file']?></a></td>
        </tr>
        <?php endwhile; ?>
    </table>

<script>
    window.print();
    window.onafterprint = function(event) {
    window.history.back();
};
</script>