
<!-- ----- début viewChoixPatient - rendezvous -->
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
        <input type="hidden" name='action' value='rendezvousNVRDV'>
        <label for="id">Patient : </label> <select class="form-control" id='nom' name='nom' style="width: 200px">
            <?php
            foreach ($nomprenom as $element) {
             echo ("<option>$element</option>");
            }
            ?>
        </select>
      </div>
      <p/>
      <button class="btn btn-primary" type="submit"> Envoyer </button>
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentSiteFooter.html'; ?>

  <!-- ----- fin viewModif - stock -->