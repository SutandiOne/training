<?php 

    $title = "Program List";

    include "layouts/header.php";

?>

    
    <div class="uk-flex uk-flex-column uk-flex-between uk-padding-small">
        <div>
            <div class="uk-card uk-card-hover uk-card-body uk-card-default">
                <h1 class="uk-card-title">Kustomer</h1>
                <a href="/training/kustomer">Selengkapnya</a>
            </div>
        </div>
        <div class="uk-flex">
   
            <div class="uk-card uk-card-hover uk-card-body uk-card-primary uk-flex-auto">
                <h1 class="uk-card-title">Bus</h1>
                <a href="/training/bus">Selengkapnya</a>
                </div>
                <div class="uk-card uk-card-hover uk-card-body uk-card-primary uk-flex-last">
                    <h1 class="uk-card-title">Laporan</h1>
                    <a href="/training/bus/laporan">Selengkapnya</a>
                </div>
            </div>
      
         
        <div class="uk-flex">
            <div class="uk-card uk-card-hover uk-card-body uk-card-secondary uk-flex-auto">
                <h1 class="uk-card-title">Tiket</h1>
                <a href="/training/tiket">Selengkapnya</a>
            </div>
            <div class="uk-card uk-card-hover uk-card-body uk-card-secondary uk-flex-last">
                    <h1 class="uk-card-title">Laporan</h1>
                    <a href="/training/tiket/laporan">Selengkapnya</a>
                </div>
        </div>
      
    </div>
   

<?php 
    include "layouts/footer.php";
?>