<!-- ----- début viewModif - vaccin -->


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
        <input type="hidden" name='action' value='vaccinModif2'>
        <label for="id"> id : </label> <select class="form-control" id='id' name='id' style="width: 100px">
            <?php
            foreach ($results as $id) {
             echo ("<option>$id</option>");
            }
            ?>
        </select>
        <label for="id">Nouvelle quantité </label><input type="number" name='doses' value='2'>
      </div>
      <p/>
      <button class="btn btn-primary" type="submit"> Envoyer </button>
    </form>
    <p/>
  </div>

  <?php 
  include $root . '/app/view/fragment/fragmentSiteFooter.html'; 
  ?>

  <!-- ----- fin viewModif - vaccin -->