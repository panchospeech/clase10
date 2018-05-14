<?php include('header.php');?>

<?php
$csv = array_map('str_getcsv', file('https://raw.githubusercontent.com/panchospeech/clase10/master/data/top-10.csv'));
      array_walk($csv, function(&$a) use ($csv) {
      $a = array_combine($csv[0], $a);
      });
      array_shift($csv);
?>

<main role="main" class="container">
<h1 class="mb-4">Top 10: Best Videogames</h1>
<div class="row">

<?php for($t = 0; $t < count($csv); $t++){?>
    <div class="col-sm-4 col-md-3 py-3">
    <h4 class="border-top pt-1"><?php print($csv[$t]['videojuego'])?></h4>
    <h6 class="border-top pt-1">Año: <?php print($csv[$t]['año'])?>
    </h6>
    
    <figure style="height:200px; overflow:hidden;">
    
    <img src="
    <?php if ($csv[$t]['img'] == NULL){
        print ("img/gris.png");
    } else {
        print ($csv[$t]['img']);
    };?>" 

    class="img-fluid">
    </figure>

<h6 class="text-small pt-1"> <?php print($csv[$t]['consola'])?></h6>

    <?php if ($csv[$t]['videojuego'] == NULL){
        print '<h6><a href="'.($csv[$t]['url']).'">'.($csv[$t]['consola']).'</a></h6>';
    } else {
        print '<h6><a href="'.($csv[$t]['url']).'">'."ver más".'</a></h6>';
    }?>
   
    </div>
<?php };?>
</div>

</main>
<?php include('footer.php');?>