<?php 

    $title = "Laporan Tiket";

    include "../../layouts/header.php";

?>
    
    <div class="uk-flex uk-flex-column">
        <div class="uk-padding-small uk-flex uk-flex-between">
            <a class='uk-button uk-button-default' href='/training'>Kembali</a>
            <button class='uk-button uk-button-primary' onclick="window.print()">Cetak</button>
        </div>
        <div>
            <table class="uk-table uk-table-striped uk-table-hover uk-box-shadow-large" style="background:white;">
                <thead>
                    <th>NO</th>
                    <th>ID TIKET</th>
                    <th>TGL BELI</th>
                    <th>KUSTOMER</th>
                    <th>BUS</th>
                    <th>JUMLAH TIKET</th>
                    <th>TARIF</th>
                    <th>TOTAL</th>
                    
                </thead>
                <tbody>
                <?php 
                    include "../../config/koneksi.php";
                
                    $sql = "SELECT tiket.id tiket_id,
                                    tiket.tanggal_beli tanggal_beli,
                                    tiket.jumlah tiket_jumlah,
                                    kustomer.id kustomer_id, 
                                    kustomer.nama kustomer_nama, 
                                    bus.no_polisi bus_no,
                                    bus.nama_bus bus_nama, 
                                    bus.tarif tarif_bus, 
                                    SUM( tiket.jumlah * bus.tarif ) total
                            FROM tiket 
                            INNER JOIN kustomer ON tiket.kustomer_id = kustomer.id 
                            INNER JOIN bus ON tiket.no_polisi = bus.no_polisi 
                            GROUP BY tiket.id
                            ";

                    $query = mysqli_query($koneksi, $sql) or die (mysqli_error($koneksi));
                    $index = 1;
                    $total = 0;


                    while($data = mysqli_fetch_array($query)){
                        echo "
                            <tr>
                                <td>$index</td>
                                <td>$data[tiket_id]</td>
                                <td>$data[tanggal_beli]</td>
                                <td>$data[kustomer_id] | $data[kustomer_nama]</td>
                                <td>$data[bus_no] | $data[bus_nama]</td>
                                <td>$data[tiket_jumlah]</td>
                                <td>$data[tarif_bus]</td>
                                <td>$data[total]</td>
                            </tr>
                        ";

                        $total = $total + $data['total'];

                        $index++;
                    }

                    $pajak = $total * 0.1;
                    $grand_total = $total + $pajak;
                    
                ?>
                
                </tbody>
                <tfoot>
                    <tr><td colspan="8"><hr></td></tr>
                    <tr>
                        <td colspan="7"><h4>SUB TOTAL</h4></td>
                        <td><h4>Rp. <?= $total ?></h4></td>
                    </tr><tr>
                        <td colspan="7"><h4>PAJAK 10%</h4></td>
                        <td><h4>Rp. <?= $pajak ?></h4></td>
                    </tr><tr>
                        <td  colspan="7"><h3 class="uk-text-bold">GRAND TOTAL</h3></td>
                        <td><h3 class="uk-text-bold">Rp. <?= $grand_total ?></h3></td>
                    </tr>
                </tfoot>


            </table>
        </div>
    </div>
    

<?php 
    include "../../layouts/footer.php";
?>