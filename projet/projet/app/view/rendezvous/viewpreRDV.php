<!-- ----- début viewFirstRDV - rendezvous -->


<?php
require ($root . '/app/view/fragment/fragmentSiteHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentSiteMenu.html';
    include $root . '/app/view/fragment/fragmentSiteJumbotron.html';
    ?>

    <h3> Il n'y a pas de rendez vous pour ce patint </h3>
    <br>
    <h2> Le premier rendez-vous :</h2>
    <br>
    <form role="form" method='get' action='router.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='direRDV'> 
        <?php echo('<input type="hidden" name=\'id_patient\' value=\''.$id_patient.'\'/>'); ?>
        <?php echo('<input type="hidden" name=\'nbr\' value=\'1\'/>');?>
        <?php echo('<input type="hidden" name=\'id_vaccin\' value=\'0\'/>');?>
        <br>
        <!-- Choix du centre -->  
        <label for="id">Centre : </label> <select class="form-control" id='label_centre' name='label_centre' style="width: 200px">
            <?php
            foreach ($label_centre as $id) {
             echo ("<option>$id</option>");
            }
            ?>
        </select>
      </div>
      <p/>
      <br>
      <button class="btn btn-primary" type="submit"> Envoyer </button>
    </form>
    <?php
            
    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentSiteFooter.html';
    ?>
<!-- ----- fin viewFirstRDV - rendezvous -->    

    
    