<?php

    include "../config/koneksi.php";

    $action = $_GET['action'];
    
    if(!isset($action)){
        header("location: index.php");
    }

    if($action == "tambah"){

        $id = $_POST['no_polisi'];
        $nama = $_POST['nama_bus'];
        $jumlah = $_POST['jumlah_kursi'];
        $tarif = $_POST['tarif'];

        $sql = "INSERT INTO bus VALUES ('{$id}','{$nama}','{$jumlah}','{$tarif}')";
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

        $nama = $_POST['nama_bus'];
        $jumlah = $_POST['jumlah_kursi'];
        $tarif = $_POST['tarif'];

        $sql = "UPDATE bus SET nama_bus = '{$nama}', jumlah_kursi = '{$jumlah}', tarif = '{$tarif}' WHERE no_polisi = '{$id}' ";
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
        
        $sql = "DELETE FROM bus WHERE id = '{$id}' ";

        $query = mysqli_query($koneksi, $sql);

        if($query){
            header("location: index.php");

        }else{
            
            $message = 'MYSQL : '.mysqli_error($koneksi);

            include_once "../layouts/alert.php";

        }


    }



?>