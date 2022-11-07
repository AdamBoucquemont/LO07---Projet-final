<!-- ----- début viewInsert - centre -->
 

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
        <input type="hidden" name='action' value='centreCreate2'>        
        <label for="id"> label : </label><input type="text" name='label' size='75' value='UTT'>  
        <br>
        <label for="id"> adresse : </label><input type="text" name='adresse' size='75' value='15 rue Marie Currie'>               
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

<!-- ----- fin viewInsert - centre -->