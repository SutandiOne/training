<?php

    include "../config/koneksi.php";

    $action = $_GET['action'];
    
    if(!isset($action)){
        header("location: index.php");
    }

    if($action == "tambah"){

        $id = $_POST['id'];
        $kustomer_id = $_POST['kustomer_id'];
        $no_polisi = $_POST['no_polisi'];
        $jumlah = $_POST['jumlah'];
        $tanggal_beli = $_POST['tanggal_beli'];

        $sql = "INSERT INTO tiket VALUES ('{$id}','{$kustomer_id}','{$no_polisi}','{$jumlah}','{$tanggal_beli}')";
        $query = mysqli_query($koneksi, $sql);

        if($query){
            header("Location: index.php");

        }else{
            
            $message = 'MYSQL : '.mysqli_error($koneksi);

            include_once "../layouts/alert.php";

        }

    }

    if($action == "ubah"){

        $id = $_GET['id'] ? $id = $_GET['id'] : header("location: index.php");

        $kustomer_id = $_POST['kustomer_id'];
        $no_polisi = $_POST['no_polisi'];
        $jumlah = $_POST['jumlah'];
        $tanggal_beli = $_POST['tanggal_beli'];

        $sql = "UPDATE tiket SET kustomer_id = '{$kustomer_id}', no_polisi = '{$no_polisi}', jumlah = '{$jumlah}', tanggal_beli = '{$tanggal_beli}' WHERE id = '{$id}' ";
        $query = mysqli_query($koneksi, $sql);

        if($query){
            header("location: index.php");

        }else{
            
            $message = 'MYSQL : '.mysqli_error($koneksi);

            include_once "../layouts/alert.php";

        }
    }
    
    if($action == "hapus"){

        $id = $_GET['id'] ? $id = $_GET['id'] : header("location: index.php");
        
        $sql = "DELETE FROM tiket WHERE id = '{$id}' ";

        $query = mysqli_query($koneksi, $sql);

        if($query){
            header("location: index.php");

        }else{
            
            $message = 'MYSQL : '.mysqli_error($koneksi);

            include_once "../layouts/alert.php";

        }


    }



?>