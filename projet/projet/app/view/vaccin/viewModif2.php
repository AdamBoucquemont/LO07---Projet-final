<!-- ----- début viewModif2 - vaccin -->


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
    if ($results) {
     echo ("<h3> Cela a bien était modifié </h3>");
    }
    else {
     echo ("<h3> Il y a une erreur </h3>");
    }

    ?>
    
    </div>
    
    <?php
    include $root . '/app/view/fragment/fragmentSiteFooter.html';
    ?>
    
<!-- ----- fin viewModif2 - vaccin -->