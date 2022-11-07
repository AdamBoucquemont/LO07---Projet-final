
<!-- ----- début viewInserte2 - patient -->
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
     echo ("<h3>Le nouveau patient a été ajouté </h3>");
     echo("<ul>");
     echo ("<li>id = " . $results . "</li>");
     echo ("<li>nom = " . $_GET['nom'] . "</li>");
     echo ("<li>prénom = " . $_GET['prenom'] . "</li>");
     echo ("<li>adresse = " . $_GET['adresse'] . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3> Le nouveau patient n'a pas était ajouté</h3>");
     echo ("id = " . $results);
    }

    ?>
    </div>
    <?php
    include $root . '/app/view/fragment/fragmentSiteFooter.html';
    ?>
    <!-- ----- fin viewInserte2 - patient -->    

    
    