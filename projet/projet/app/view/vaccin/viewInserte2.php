<!-- ----- début viewInserte2 - vaccin -->


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
     echo ("<h3> Un nouveau vaccin est disponible </h3>");
     echo("<ul>");
     echo ("<li>id = " . $results . "</li>");
     echo ("<li>label = " . $_GET['label'] . "</li>");
     echo ("<li>doses = " . $_GET['doses'] . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3> Le nouveau vaccin n'a pas était ajouté </h3>");
     echo ("id = " . $_GET['label']);
    }
    ?>
      
    </div>
    
    <?php
    include $root . '/app/view/fragment/fragmentSiteFooter.html';
    ?>
    <!-- ----- fin viewInserte2 - vaccin -->    