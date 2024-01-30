<?php

    session_start();

    require 'functions.php';


?>




          <select name="ongkir">
            
              <?php foreach ($_SESSION["ongkir"] as $id_ongkir => $jumlah): ?>

        <?php 


            $ambil = query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir' ")[0];

            $pecah = $ambil ;
            $subharga = $pecah ["tarif"]*$jumlah;

            
        ?>
          </select>

        <?php endforeach?>
