<!-- ----- début viewVaccine - rendezvous -->
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
  
    echo ("<h2> C'est bon, le patient est vacciné </h2>");
    echo ("<p> Le vaccin utilisé est le <b>".$label_vaccin." </b> au centre <b>".$label_centre."</b> </p><br>");
    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentSiteFooter.html';
    ?>
<!-- ----- fin viewVaccine - rendezvous -->    