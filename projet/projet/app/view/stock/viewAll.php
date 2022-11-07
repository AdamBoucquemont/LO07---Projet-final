<!-- ----- début viewAll - stock -->


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
          <th scope = "col"> Vaccin </th>
          <th scope = "col"> Quantitée </th>
        </tr>
      </thead>
      
      <tbody>
          <?php
           $collapse_centre = array();
           $ind = -1;
           $val = 'nul';
           foreach ($stocks as $element) {
               if ($val != $element->getCentre_id()){
                   $val = $element->getCentre_id();
                   $ind = $ind + 1;
                   $collapse_centre[$ind] = 0;
               }
               $collapse_centre[$ind] = $collapse_centre[$ind] + 1;
           }
           $ind = -1;
           $jnd = 0;
           foreach ($stocks as $element) {
               
                $vaccins_id = $element->getVaccin_id();
                $centres_id = $element->getCentre_id();
                
                if ($ind != $collapse_centre[$jnd]-1){
                    $ind = $ind + 1;
                }
                else {
                    $ind = 0;
                    $jnd = $jnd + 1;
                }
                
                if ($ind == 0){
                    printf("<tr><td rowspan=\"%d\" >%s</td><td>%s</td><td>%d</td></tr>", $collapse_centre[$jnd], $TabCentres[$centres_id - 1], $TabVaccins[$vaccins_id - 1], $element->getQuantite());
                }
                else{
                    printf("<tr><td>%s</td><td>%d</td></tr>",$TabVaccins[$vaccins_id - 1], $element->getQuantite());
                }
           }
          ?>
      </tbody>
    </table>
  </div>
  <?php 
  include $root . '/app/view/fragment/fragmentSiteFooter.html'; 
  ?>

  <!-- ----- fin viewAll - stock -->