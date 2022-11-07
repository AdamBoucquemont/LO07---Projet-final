<!-- ----- début viewModif - stock -->


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
        <input type="hidden" name='action' value='stockModif2'>
        <label for="id">Centre : </label> <select class="form-control" id='centre' name='centre' style="width: 200px">
            <?php
            foreach ($centres as $id) {
             echo ("<option>$id</option>");
            }
            ?>
        </select
        <br>
        <label for="id">Vaccin : </label> <select class="form-control" id='vaccin' name='vaccin' style="width: 200px">
            <?php
            foreach ($vaccins as $id) {
             echo ("<option>$id</option>");
            }
            ?>
        </select>
        <br>
        <label for="id"> Nouvelle quantité : </label><input type="number" name='doses' value='10'>
      </div>
      <p/>
      <button class="btn btn-primary" type="submit"> Envoyer </button>
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentSiteFooter.html'; ?>

  <!-- ----- fin viewModif - stock -->