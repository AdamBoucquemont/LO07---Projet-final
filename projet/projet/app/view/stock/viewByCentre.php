<!-- ----- début viewByCentre - stock -->


<?php
require ($root . '/app/view/fragment/fragmentSiteHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentSiteMenu.html';
      include $root . '/app/view/fragment/fragmentSiteJumbotron.html';
      ?>

    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col"> Centre </th>
          <th scope = "col"> Quantitée </th>
        </tr>
      </thead>
      <tbody>
          <?php
           foreach ($stocks as $element) {  
                $centres_id = $element->getCentre_id();
                printf("<tr><td>%s</td><td>%d</td></tr>", $TabCentres[$centres_id - 1], $element->getAll_quant());              
           }
          ?>
      </tbody>
    </table>
  </div>
    
  <?php 
  include $root . '/app/view/fragment/fragmentSiteFooter.html'; 
  ?>

  <!-- ----- fin viewByCentre - stock -->