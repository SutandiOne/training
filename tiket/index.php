<?php 

    $title = "Tiket";

    include "../layouts/header.php";

?>
    
    <div class="uk-flex uk-flex-column">
        <div class="uk-padding-small uk-flex uk-flex-between">
            <a class='uk-button uk-button-default' href='/training'>Kembali</a>
            <a class='uk-button uk-button-primary' href='/training/tiket/form.php'>Tambah</a>
        </div>
        <div>
            <table class="uk-table uk-table-striped uk-table-hover uk-box-shadow-large" style="background:white;">
                <thead>
                    <th>NO</th>
                    <th>ID TIKET</th>
                    <th>ID KUSTOMER</th>
                    <th>NO POLISI</th>
                    <th>JUMLAH</th>
                    <th>TGL</th>
                    <th>AKSI</th>
                </thead>
                <tbody>
                <?php 
                    include "../config/koneksi.php";
                    $query = mysqli_query($koneksi, "SELECT * FROM tiket") or die (mysqli_error($koneksi));
                    $index = 1;

                    while($data = mysqli_fetch_array($query)){
                        echo "
                            <tr>
                                <td>{$index}</td>
                                <td>{$data['id']}</td>
                                <td>{$data['kustomer_id']}</td>
                                <td>{$data['no_polisi']}</td>
                                <td>{$data['jumlah']}</td>
                                <td>{$data['tanggal_beli']}</td>
                                <td>
                                <a class='uk-button uk-button-secondary uk-button-small' href='/training/tiket/form.php?id={$data['id']}'>Ubah</a> 
                                | <a class='uk-button uk-button-danger uk-button-small' href='/training/tiket/process.php?action=hapus&id={$data['id']}'>Hapus</a>
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