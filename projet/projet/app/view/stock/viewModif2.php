<!-- ----- début viewModif2 - stock -->


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
     echo ("<h3> Vos modifications sont correctes </h3>");
    } 
    else {
     echo ("<h3> Il y a une erreur </h3>");
    }
    ?>
    </div>
    <?php
    include $root . '/app/view/fragment/fragmentSiteFooter.html';
    ?>
<!-- ----- fin viewModif2 - stock -->