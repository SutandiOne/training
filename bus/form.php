<?php 

    $aksi = 'tambah';
    $process = "process.php?action=tambah";

    $id = isset($_GET['id']) ? $_GET['id'] : '';

    if($id){
        include "../config/koneksi.php";


        $query = mysqli_query($koneksi, "SELECT * FROM bus WHERE no_polisi = '{$id}' ") or die (mysqli_error($koneksi));
        $data = mysqli_fetch_array($query);
        $aksi = 'ubah';
        $process = "process.php?action=ubah&id=".$id;
    }

    $title = ucwords($aksi." Bus");

    include "../layouts/header.php";

?>

    
    <div class="uk-flex uk-flex-column uk-flex-between">
    <form method="POST" action="<?= $process ?>">
    <fieldset class="uk-fieldset">

        <div class="uk-margin">
            <input class="uk-input" type="text" placeholder="No Polisi" name="no_polisi" value="<?= isset($data['no_polisi']) ? $data['no_polisi'] : '' ?>" <?= $aksi == 'ubah' ? 'readonly' : '' ?> required>
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="text" placeholder="Nama Bus" name="nama_bus" value="<?= isset($data['nama_bus']) ? $data['nama_bus'] : '' ?>" required>
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="number" placeholder="Jumlah" name="jumlah_kursi" value="<?= isset($data['jumlah_kursi']) ? $data['jumlah_kursi'] : '' ?>" required>
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="number" placeholder="Tarif" name="tarif" value="<?= isset($data['tarif']) ? $data['tarif'] : '' ?>" required>
        </div>

        
        


       
        <div class="uk-margin uk-flex uk-flex-between">
            <a class='uk-button uk-button-default' href='/training/bus'>Kembali</a>
            <button type="submit" class="uk-button uk-button-primary uk-text-capitalize"><?= $aksi ?></button>
        </div>

    </fieldset>
</form>
    </div>
   

<?php 
    include "../layouts/footer.php";
?>