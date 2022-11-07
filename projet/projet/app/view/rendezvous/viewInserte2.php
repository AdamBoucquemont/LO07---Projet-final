<!-- ----- début viewInserte2 - rendez-vous -->


<?php
require ($root . '/app/view/fragment/fragmentSiteHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentSiteMenu.html';
    include $root . '/app/view/fragment/fragmentSiteJumbotron.html';
    ?>

   
    <?php
    if ($nouveaux) {
     echo ("Votre rendez vous à bien été enregistré");
     echo ($id_patient." : ".$id_vaccin." : ".$id_centre." : ".$nbr);
    } else {
     echo ("Il y a un problème");
    }
    
    include $root . '/app/view/fragment/fragmentSiteFooter.html';
    ?>
<!-- ----- fin viewInserte2 - rendez-vous -->    