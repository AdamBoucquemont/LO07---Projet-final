<!-- ----- début viewInsert - vaccin -->
 

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
        <input type="hidden" name='action' value='vaccinCreate2'>        
        <label for="id"> Label : </label><input type="text" name='label' size='75' value='Newvaccin'>                           
        <label for="id"> Doses : </label><input type="number" name='doses' value='3'>               
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

<!-- ----- fin viewInsert - vaccin -->