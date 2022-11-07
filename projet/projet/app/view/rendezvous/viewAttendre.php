<!-- ----- début viewAttendre - rendezvous -->
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
    echo ("<h2> Il n'y a plus de dose pour le moment </h2>");
    
    include $root . '/app/view/fragment/fragmentSiteFooter.html';
    ?>
      
<!-- ----- fin viewAttendre - rendezvous -->    

    
    