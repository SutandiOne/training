<?php 

    $title = "Error";

    include "header.php";

?>

    
    <div class="uk-flex uk-flex-column uk-flex-between uk-text-center">
        <div>
            <div uk-alert>
                <p class="uk-text-large"><?= $message ?></p>
            </div>
        </div>
        
    </div>
   

<?php 
    include "footer.php";
?>