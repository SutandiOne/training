<?php 
    include "../config/koneksi.php";
    $aksi = 'tambah';
    $process = "process.php?action=tambah";

    $id = isset($_GET['id']) ? $_GET['id'] : '';

    if($id){
        
        $query = mysqli_query($koneksi, "SELECT * FROM tiket WHERE id = '{$id}' ") or die (mysqli_error($koneksi));
        $data = mysqli_fetch_array($query);
        $aksi = 'ubah';
        $process = "process.php?action=ubah&id=".$id;
    }

    $queryKustomer = mysqli_query($koneksi, "SELECT id,nama FROM kustomer") or die (mysqli_error($koneksi));
    $queryBus = mysqli_query($koneksi, "SELECT no_polisi,nama_bus FROM bus") or die (mysqli_error($koneksi));

    $title = ucwords($aksi." Tiket");

    include "../layouts/header.php";

?>

    
    <div class="uk-flex uk-flex-column uk-flex-between">
    <form method="POST" action="<?= $process ?>">
    <fieldset class="uk-fieldset">

        <div class="uk-margin">
            <input class="uk-input" type="text" placeholder="ID Tiket" name="id" value="<?= isset($data['id']) ? $data['id'] : '' ?>" <?= $aksi == 'ubah' ? 'readonly' : '' ?> required>
        </div>
        
        <div class="uk-margin">
            <select class="uk-select" name="kustomer_id" required>
                <option value default>Pilih Kustomer</option>
                <?php
                    while ($dataKustomer = mysqli_fetch_array($queryKustomer)) {
                        $selected = $dataKustomer['id'] == $data['kustomer_id'] ? 'selected' : '';
                        echo "
                            <option value='$dataKustomer[id]' $selected>$dataKustomer[id] | $dataKustomer[nama]</option>
                        ";
                    }
                ?>
            </select>
        </div>
        <div class="uk-margin">
        <select class="uk-select" name="no_polisi" required>
                <option value default>Pilih Bus</option>
                <?php
                    while ($dataBus = mysqli_fetch_array($queryBus)) {
                        $selected = $dataBus['no_polisi'] == $data['no_polisi'] ? 'selected' : '';
                        echo "
                            <option value='$dataBus[no_polisi]' $selected>$dataBus[no_polisi] | $dataBus[nama_bus]</option>
                        ";
                    }
                ?>
            </select>
        </div>

        
        <div class="uk-margin">
            <input class="uk-input" type="number" placeholder="Jumlah" name="jumlah" value="<?= isset($data['jumlah']) ? $data['jumlah'] : '' ?>" required>
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="date" placeholder="Tanggal Beli" name="tanggal_beli" value="<?= isset($data['tanggal_beli']) ? $data['tanggal_beli'] : '' ?>" required>
        </div>


       
        <div class="uk-margin uk-flex uk-flex-between">
            <a class='uk-button uk-button-default' href='/training/tiket'>Kembali</a>
            <button type="submit" class="uk-button uk-button-primary uk-text-capitalize"><?= $aksi ?></button>
        </div>

    </fieldset>
</form>
    </div>
   

<?php 
    include "../layouts/footer.php";
?>