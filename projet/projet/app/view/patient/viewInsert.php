
<!-- ----- début viewInsert - patient -->
 
<?php 
require ($root . '/app/view/fragment/fragmentSiteHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentSiteMenu.html';
      include $root . '/app/view/fragment/fragmentSiteJumbotron.html';
    ?> 

    <form role="form" method='get' action='router.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='patientCreate2'>        
        <label for="id"> Nom : </label><input type="text" name='nom' size='75' value='Pierre'>
        <br>
        <label for="id"> Prénom : </label><input type="text" name='prenom' size='75' value='Jean'>
        <br>
        <label for="id"> Adresse : </label><input type="text" name='adresse' size='75' value='10 rue de la paix'>               
      </div>
      <p/>
      <br>
      <button class="btn btn-primary" type="submit"> Envoyer </button>
    </form>
    <p/>
  </div>
    
  <?php 
  include $root . '/app/view/fragment/fragmentSiteFooter.html'; 
  ?>

<!-- ----- fin viewInsert - patient -->



