<!-- ----- début viewInserte2 - centre -->


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
     echo ("<h3> Votre centre a était accepté </h3>");
     echo("<ul>");
     echo ("<li>id = " . $results . "</li>");
     echo ("<li>label = " . $_GET['label'] . "</li>");
     echo ("<li>adresse = " . $_GET['adresse'] . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3> Votre centre n'a pas était accepté </h3>");
     echo ("id = " . $_GET['label']);
    }
    
    ?>
    </div>
    <?php
    include $root . '/app/view/fragment/fragmentSiteFooter.html';
    ?>
    <!-- ----- fin viewInserte2 - centre -->