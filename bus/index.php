<?php 

    $title = "Bus";

    include "../layouts/header.php";

?>
    
    <div class="uk-flex uk-flex-column">
        <div class="uk-padding-small uk-flex uk-flex-between">
            <a class='uk-button uk-button-default' href='/training'>Kembali</a>
            <a class='uk-button uk-button-primary' href='/training/bus/form.php'>Tambah</a>
        </div>
        <div>
            <table class="uk-table uk-table-striped uk-table-hover uk-box-shadow-large" style="background:white;">
                <thead>
                    <th>NO</th>
                    <th>NO POLISI</th>
                    <th>NAMA</th>
                    <th>JUMLAH</th>
                    <th>TARIF</th>
                    <th>AKSI</th>
                </thead>
                <tbody>
                <?php 
                    include "../config/koneksi.php";
                    $query = mysqli_query($koneksi, "SELECT * FROM bus") or die (mysqli_error($koneksi));
                    $index = 1;

                    while($data = mysqli_fetch_array($query)){
                        echo "
                            <tr>
                                <td>{$index}</td>
                                <td>{$data['no_polisi']}</td>
                                <td>{$data['nama_bus']}</td>
                                <td>{$data['jumlah_kursi']}</td>
                                <td>{$data['tarif']}</td>
                                <td>
                                <a class='uk-button uk-button-secondary uk-button-small' href='/training/bus/form.php?id={$data['no_polisi']}'>Ubah</a> 
                                | <a class='uk-button uk-button-danger uk-button-small' href='/training/bus/process.php?action=hapus&id={$data['no_polisi']}'>Hapus</a>
                                </td>
                            </tr>   

                        ";

                        $index++;
                    };
                ?>
                
                </tbody>
            </table>
        </div>
    </div>
    

<?php 
    include "../layouts/footer.php";
?>