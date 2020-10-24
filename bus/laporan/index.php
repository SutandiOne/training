<?php 

    $title = "Laporan Bus";

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
                    <th>BUS</th>
                    <th>JUMLAH KUSTOMER</th>
                    <th>JUMLAH TIKET</th>
                    <th>TARIF</th>
                    <th>TOTAL</th>
                    
                </thead>
                <tbody>
                <?php 
                    include "../../config/koneksi.php";
                
                    $sql = "SELECT SUM(tiket.jumlah) jumlah_tiket, 
                                    bus.no_polisi bus_no,
                                    bus.nama_bus nama_bus, 
                                    bus.tarif tarif_bus, 
                                    SUM( tiket.jumlah * bus.tarif ) total,
                                    COUNT( tiket.kustomer_id ) jumlah_kustomer
                            FROM tiket 
                            INNER JOIN bus ON tiket.no_polisi = bus.no_polisi 
                            GROUP BY bus.no_polisi
                            ";

                    $query = mysqli_query($koneksi, $sql) or die (mysqli_error($koneksi));
                    $index = 1;
                    $total = 0;

                

                    while($data = mysqli_fetch_array($query)){
                        echo "
                            <tr>
                                <td>$index</td>
                                <td>$data[bus_no] | $data[nama_bus]</td>
                                <td>$data[jumlah_kustomer]</td>
                                <td>$data[jumlah_tiket]</td>
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
                    <tr><td colspan="6"><hr></td></tr>
                    <tr>
                        <td colspan="5"><h4>SUB TOTAL</h4></td>
                        <td><h4>Rp. <?= $total ?></h4></td>
                    </tr><tr>
                        <td colspan="5"><h4>PAJAK 10%</h4></td>
                        <td><h4>Rp. <?= $pajak ?></h4></td>
                    </tr><tr>
                        <td  colspan="5"><h3 class="uk-text-bold">GRAND TOTAL</h3></td>
                        <td><h3 class="uk-text-bold">Rp. <?= $grand_total ?></h3></td>
                    </tr>
                </tfoot>


            </table>
        </div>
    </div>
    

<?php 
    include "../../layouts/footer.php";
?>