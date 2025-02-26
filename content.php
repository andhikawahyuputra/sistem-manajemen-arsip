<?php

    // koneksi atau jaringan setiap halaman yang dibuka atau di klik
    @$halaman = $_GET['halaman'];

    if($halaman == "divisi")
        {
            // tampilkan halaman divisi
            //echo "Tampil Halaman Modul Divisi";
            include "modules/divisi/divisi.php";
        }
        
        elseif ($halaman == "pengirim_surat")
        {
            // tampilkan halaman pengirim surat
            //echo "Tampil Halaman Modul Pengirim Surat";
            include "modules/pengirim_surat/pengirim_surat.php";
        }
        
        elseif ($halaman == "pengawas")
        {
            // tampilkan halaman pengawas
            //echo "Tampil Halaman Modul Pengawas";
            include "modules/pengawas/pengawas.php";
        }

        elseif ($halaman == "beranda")
        {
            // tampilkan halaman beranda
            //echo "Tampil Halaman Modul beranda";
            include "templates/beranda.php";
        }

        elseif ($halaman == "profil")
        {
            // tampilkan halaman profil
            //echo "Tampil Halaman Modul profil";
            include "templates/profil.php";
        }

        elseif ($halaman == "pengaturan")
        {
            // tampilkan halaman pengaturan
            //echo "Tampil Halaman Modul pengaturan";
            include "templates/pengaturan.php";
        }

        elseif($halaman == "arsip_surat")
        {
            // tampilkan halaman arsip surat
            //echo "Tampil Halaman Modul Arsip Surat";
            if(@$_GET['hal'] == "tambahdata" || @$_GET['hal'] == "edit" || @$_GET['hal'] == "hapus")
            {
                include "modules/arsip/form.php";
            }
            else
            {
                include "modules/arsip/data.php";
            }
        }

        elseif($halaman == "laporan")
        {
            // tampilkan halaman laporan
            //echo "Tampil Halaman Modul Laporan";
            include "modules/arsip_laporan/arsip_lap.php";
        }

        elseif($halaman == "lap_all")
        {
            // tampilkan halaman lap all
            //echo "Tampil Halaman Modul lap all";
            if(@$_GET['hal'] == "tambahdatalapall" || @$_GET['hal'] == "editlapall" || @$_GET['hal'] == "hapuslapall")
            {
                include "modules/arsip_laporan/form_lap.php";
            }
            else
            {
                include "modules/arsip_laporan/data_lap.php";
            }
        }

        elseif($halaman == "divisi_sdmo")
        {
            // tampilkan halaman divisi SDMO
            //echo "Tampil Halaman Modul Divisi SDMO";
            if(@$_GET['hal'] == "tambahdatalapsdmo" || @$_GET['hal'] == "editlapsdmo" || @$_GET['hal'] == "hapuslapsdmo")
            {
                include "modules/arsip_laporan/divisi_sdmo/form_lap_sdmo.php";
            }
            else
            {
                include "modules/arsip_laporan/divisi_sdmo/data_lap_sdmo.php";
            }
        }

        elseif($halaman == "divisi_hpph")
        {
            // tampilkan halaman divisi hpph
            //echo "Tampil Halaman Modul Divisi hpph";
            if(@$_GET['hal'] == "tambahdatalaphpph" || @$_GET['hal'] == "editlaphpph" || @$_GET['hal'] == "hapuslaphpph")
            {
                include "modules/arsip_laporan/divisi_hpph/form_lap_hpph.php";
            }
            else
            {
                include "modules/arsip_laporan/divisi_hpph/data_lap_hpph.php";
            }
        }

        elseif($halaman == "divisi_ppps")
        {
            // tampilkan halaman divisi hpph
            //echo "Tampil Halaman Modul Divisi hpph";
            if(@$_GET['hal'] == "tambahdatalapppps" || @$_GET['hal'] == "editlapppps" || @$_GET['hal'] == "hapuslapppps")
            {
                include "modules/arsip_laporan/divisi_ppps/form_lap_ppps.php";
            }
            else
            {
                include "modules/arsip_laporan/divisi_ppps/data_lap_ppps.php";
            }
        }

        else
        {
            //echo "Tampil Halaman Beranda";
            include "templates/home.php";
        }
?>

