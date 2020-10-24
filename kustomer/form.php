<?php 

    $aksi = 'tambah';
    $process = "process.php?action=tambah";

    $id = isset($_GET['id']) ? $_GET['id'] : '';

    if($id){
        include "../config/koneksi.php";


        $query = mysqli_query($koneksi, "SELECT * FROM kustomer WHERE id = '{$id}' ") or die (mysqli_error($koneksi));
        $data = mysqli_fetch_array($query);
        $aksi = 'ubah';
        $process = "process.php?action=ubah&id=".$id;
    }

    $title = ucwords($aksi." Kustomer");

    include "../layouts/header.php";

?>

    
    <div class="uk-flex uk-flex-column uk-flex-between">
    <form method="POST" action="<?= $process ?>">
    <fieldset class="uk-fieldset">

        <div class="uk-margin">
            <input class="uk-input" type="text" placeholder="ID Kustomer" name="id" value="<?= isset($data['id']) ? $data['id'] : '' ?>" <?= $aksi == 'ubah' ? 'readonly' : '' ?> required>
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="text" placeholder="Nama Kustomer" name="nama" value="<?= isset($data['nama']) ? $data['nama'] : '' ?>" required>
        </div>

        
        <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">

            <?php 
                $jk = isset($data['jenis_kelamin']) ? $data['jenis_kelamin'] : 'L';
            ?>
            <label><input class="uk-radio" type="radio" name="jenis_kelamin" value="L" <?= $jk == 'L' ? 'checked' : '' ?>> Laki-laki</label>
            <label><input class="uk-radio" type="radio" name="jenis_kelamin" value="P" <?= $jk == 'P' ? 'checked' : '' ?>> Perempuan</label>
        </div>

        <div class="uk-margin">
            <textarea class="uk-textarea" rows="5" placeholder="Alamat" name="alamat" required><?= isset($data['alamat']) ? $data['alamat'] : '' ?></textarea>
        </div>


       
        <div class="uk-margin uk-flex uk-flex-between">
            <a class='uk-button uk-button-default' href='/training/kustomer'>Kembali</a>
            <button type="submit" class="uk-button uk-button-primary uk-text-capitalize"><?= $aksi ?></button>
        </div>

    </fieldset>
</form>
    </div>
   

<?php 
    include "../layouts/footer.php";
?>