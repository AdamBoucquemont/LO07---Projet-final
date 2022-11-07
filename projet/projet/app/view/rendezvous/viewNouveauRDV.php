
<!-- ----- début viewNouveauxRDV - rendezvous -->
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
  
    echo ("<p> Votre patient a reçu des doses du vaccin <b>".$label_vaccin."</b> </p><br>");
    ?>
    <form role="form" method='get' action='router.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='direRDV'> 
        <?php echo('<input type="hidden" name=\'id_patient\' value=\''.$id_patient.'\'/>'); ?>
        <?php echo('<input type="hidden" name=\'nbr\' value=\''.$exist.'\'/>');?>
        <?php echo('<input type="hidden" name=\'id_vaccin\' value=\''.$id_vaccin.'\'/>');?>
        <label for="id">Centre : </label> <select class="form-control" id='label_centre' name='label_centre' style="width: 200px">
            <?php
            foreach ($label_centre as $id) {
             echo ("<option>$id</option>");
            }
            ?>
        </select>
        <br>
      </div>
      <p/>
      <br>
      <button class="btn btn-primary" type="submit"> Prendre un rendez-vous </button>
    </form>
    <?php
    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentSiteFooter.html';
    ?>
<!-- ----- fin viewNouveauxRDV - rendezvous -->    