<?php

    include "../config/koneksi.php";

    $action = $_GET['action'];
    
    if(!isset($action)){
        header("location: index.php");
    }

    if($action == "tambah"){

        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $alamat = $_POST['alamat'];

        $sql = "INSERT INTO kustomer VALUES ('{$id}','{$nama}','{$jenis_kelamin}','{$alamat}')";
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

        $nama = $_POST['nama'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $alamat = $_POST['alamat'];

        $sql = "UPDATE kustomer SET nama = '{$nama}', jenis_kelamin = '{$jenis_kelamin}', alamat = '{$alamat}' WHERE id = '{$id}' ";
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
        
        $sql = "DELETE FROM kustomer WHERE id = '{$id}' ";

        $query = mysqli_query($koneksi, $sql);

        if($query){
            header("location: index.php");

        }else{
            
            $message = 'MYSQL : '.mysqli_error($koneksi);

            include_once "../layouts/alert.php";

        }


    }



?>