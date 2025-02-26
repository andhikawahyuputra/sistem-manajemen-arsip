<?php

    //panggil function.php untuk upload file
    include "configs/function.php";

    // uji tombol edit dan hapus
    if(isset($_GET['hal']))
    {
        if($_GET['hal'] == "editlapall")
        {
            //tampilkan data yang akan di edit
            $tampil = mysqli_query($koneksi, "SELECT 
                    tbl_laporan.*,
                    tbl_divisi.nama_divisi,
                    tbl_pengawas.nama_pengawas,
                    tbl_pengawas.no_hp
                    FROM
                    tbl_laporan, tbl_divisi, tbl_pengawas
                    WHERE
                    tbl_laporan.id_divisi = tbl_divisi.id_divisi
                    and tbl_laporan.id_pengawas = tbl_pengawas.id_pengawas
                    and tbl_laporan.id_lap='$_GET[id]'");
            $data = mysqli_fetch_array($tampil);
            if($data)
            {
                //jika data ditemukan, maka data ditampung kedalam variabel
                $vid_pengawas = $data['id_pengawas'];
                $vnama_pengawas = $data['nama_pengawas'];
                $vid_divisi = $data['id_divisi'];
                $vnama_divisi = $data['nama_divisi'];
                $vno_lap = $data['no_lap'];
                $vjenis = $data['jenis'];
                $vtahapan = $data['tahapan'];
                $vlokasi = $data['lokasi'];
                $vtanggal = $data['tanggal'];
                $vfile = $data['file'];
            }
        }
        // jika data arsip laporan dihapus
        elseif($_GET['hal'] == 'hapuslapall')
        {
            $hapus = mysqli_query($koneksi, "DELETE FROM tbl_laporan WHERE id_lap='$_GET[id]'");
            if($hapus){
                echo "<script>
                    alert('Hapus Data Sukses');
                    document.location='?halaman=lap_all';
                </script>";
            }
        }
    }

    // uji jika tombol simpan di klik
    if(isset($_POST['btn_simpanlap']))
    {
        // pengujian data akan di edit
        if(@$_GET['hal'] == "editlapall")
        {
            // perintah edit data
            // cek pilih gambar atau tidak
            if($_FILES['file']['error'] === 4){
                $file = $vfile;
            }else{
                $file = upload();
            }
            $ubah = mysqli_query($koneksi, "UPDATE tbl_laporan SET 
                                            id_pengawas ='$_POST[id_pengawas]',
                                            id_divisi ='$_POST[id_divisi]',
                                            no_lap ='$_POST[no_lap]',
                                            jenis ='$_POST[jenis]',
                                            tahapan ='$_POST[tahapan]',
                                            lokasi ='$_POST[lokasi]',
                                            tanggal ='$_POST[tanggal]',
                                            file ='$file'
                                            where id_lap = '$_GET[id]'");
            if($ubah)
            {
                echo "<script>
                    alert('Edit Data Sukses');
                    document.location='?halaman=lap_all';
                </script>";
            }
            else
            {
                echo "<script>
                    alert('Edit Data Gagal!');
                    document.location='?halaman=lap_all';
                </script>";
            }
        }
        else
        {
            //perintah simpan data baru
            // simpan data
            $file = upload();
            $simpan = mysqli_query($koneksi, "INSERT INTO tbl_laporan 
                                                VALUE (     '', 
                                                            '$_POST[id_pengawas]',
                                                            '$_POST[id_divisi]',
                                                            '$_POST[no_lap]',
                                                            '$_POST[jenis]',
                                                            '$_POST[tahapan]',
                                                            '$_POST[lokasi]',
                                                            '$_POST[tanggal]',
                                                            '$file'
                                                             ) ");
            if($simpan)
            {
                echo "<script>
                    alert('Simpan Data Sukses');
                    document.location='?halaman=lap_all';
                </script>";
            }else
            {
                echo "<script>
                    alert('Simpan Data Gagal!');
                    document.location='?halaman=lap_all';
                </script>";
            }
        }
    }
?>

<!-- rancangan form untuk tambah/edit data arsip laporan -->
<div class="card mt-3 border bg-body-tertiary rounded-3 animate__animated animate__fadeInDown">
  <div class="card-header bg-dark text-white">
  <h6 class="fw-bold"><i class="fas fa-cloud-upload-alt"></i> Form Data Laporan Bawaslu Kabupaten Tanah Datar</h6>
  </div>
  <div class="card-body">
    <form method="post" action="" enctype="multipart/form-data">

    <div class="form-group mt-2">
            <label for="id_pengawas" class="mt-2">Nama Pelaksana Pengawasan</label>
            <select class="form-control mt-2 shadow" name="id_pengawas" required>
                <option value="<?=@$vid_pengawas?>"><?=@$vnama_pengawas?></option>
                <?php
                    $tampil = mysqli_query($koneksi, "SELECT * from tbl_pengawas order by nama_pengawas asc");
                    while($data = mysqli_fetch_array($tampil)){
                        echo "<option value = '$data[id_pengawas]'> $data[nama_pengawas] </option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-group mt-2">
            <label for="id_divisi" class="mt-2">Divisi Pelaksana</label>
            <select class="form-control mt-2 shadow" name="id_divisi" required>
                <option value="<?=@$vid_divisi?>"><?=@$vnama_divisi?></option>
                <?php
                    $tampil = mysqli_query($koneksi, "SELECT * from tbl_divisi order by nama_divisi asc");
                    while($data = mysqli_fetch_array($tampil)){
                        echo "<option value = '$data[id_divisi]'> $data[nama_divisi] </option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="no_lap"class="mt-2">Nomor Laporan Hasil Pengawasan (Form A)</label>
            <input type="text" class="form-control mt-2 shadow" id="no_lap" name="no_lap" value="<?=@$vno_lap?>" required>
        </div>
        <div class="form-group mt-2">
            <label for="jenis"class="mt-2">Jenis Pemilihan</label>
            <select type="text" class="form-control mt-2 shadow" id="jenis" name="jenis" value="<?=@$vjenis?>" required>
                <option></option>
                <option>Pemilihan Umum Tahun 2024</option>
                <option>Pemilihan Serentak Kepala Daerah Tahun 2024</option>
            </select>
        </div>
        <div class="form-group mt-2">
            <label for="tahapan"class="mt-2">Tahapan Pemilihan</label>
            <select type="text" class="form-control mt-2 shadow" id="tahapan" name="tahapan" value="<?=@$vtahapan?>" required>
                <option></option>
                <option>Persiapan</option>
                <option>Penyusunan Peraturan Penyelenggaraan Pemilihan</option>
                <option>Perencanaan Penyelenggaraan yang Meliputi Penetapan Tata Cara dan Jadwal Tahapan Pelaksaaan Pemilihan</option>
                <option>Pembentukan PPK, PPS dan KPPS</option>
                <option>Pembentukan Panitia Pengawas Tingkat Kecamatan, Kelurahan/Desa, serta TPS</option>
                <option>Pemberitahuan dan Pendaftaran Pemantau Pemilihan</option>
                <option>Penyerahan Daftar Penduduk Potensial Pemilih</option>
                <option>Pemutakhiran dan Penyusunan Daftar Pemilih</option>
                <option>Pengumuman Pendaftaran Pasangan Calon</option>
                <option>Pendaftaran Pasangan Calon</option>
                <option>Penelitian Persyaratan Calon</option>
                <option>Penetapan Pasangan Calon</option>
                <option>Pelaksanaan Kampanye</option>
                <option>Pelaksanaan Pemungutan Suara</option>
                <option>Perhitungan Suara dan Rekapitulasi Hasil Perhitungan Suara</option>
                <option>Penetapan Calon Terpilih</option>
                <option>Penyelesaian Pelanggaran dan Sengketa Hasil Pemilihan</option>
                <option>Pengusulan Pengesahan Pengangkatan Calon Terpilih</option>
            </select>
        </div>
        <div class="form-group mt-2">
            <label for="lokasi"class="mt-2">Lokasi Pengawasan</label>
            <input type="text" class="form-control mt-2 shadow" id="lokasi" name="lokasi" value="<?=@$vlokasi?>" required>
        </div>
        <div class="form-group mt-2">
            <label for="tanggal"class="mt-2">Tanggal Pengawasan</label>
            <input type="date" class="form-control mt-2 shadow" id="tanggal" name="tanggal" value="<?=@$vtanggal?>" required>
        </div>
        <div class="form-group mt-2">
            <label for="file"class="mt-2">Pilih File</label>
            <input type="file" class="form-control mt-2 shadow" id="file" name="file" value="<?=@$vfile?>" required>
        </div>

        <button type="submit" name="btn_simpanlap" class="btn btn-info mt-4 mr-2"><i class="fas fa-save"></i> Simpan</button>
        <a href="?halaman=lap_all" class="btn btn-danger mt-4"><i class="fas fa-reply-all"></i> Batal</a>
    </form>
  </div>
</div>
