
<!-- ----- début viewAll - patient -->
<?php

require ($root . '/app/view/fragment/fragmentSiteHeader.html');
?>

<body>
  <div class="container">
      <div class="navbar-header">
      <?php
      include $root . '/app/view/fragment/fragmentSiteMenu.html';
      include $root . '/app/view/fragment/fragmentSiteJumbotron.html';
      ?>

    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">id</th>
          <th scope = "col">nom</th>
          <th scope = "col">prenom</th>
          <th scope = "col">adresse</th>
        </tr>
      </thead>
      <tbody>
          <?php        
          foreach ($results as $element) {
           printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%s</td></tr>", $element->getId(), 
             $element->getNom(), $element->getPrenom(), $element->getAdresse());
          }
          ?>
      </tbody>
    </table>
          </div>
  </div>
  <?php include $root . '/app/view/fragment/fragmentSiteFooter.html'; ?>

  <!-- ----- fin viewAll - patient -->
  
  
  