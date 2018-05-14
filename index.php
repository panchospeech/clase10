<?php include('header.php');?>
<main role="main" class="container">
<?php
$dato = file_get_contents('https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/4.5_month.geojson');
$json = json_decode($dato,true);
?>
<h1 class="mb-4">Temblores</h1>
<table class="table table-hover">
<thead>
    <tr>
    <th>Fecha</th>
    <th class="text-center">Magnitud</th>
    <th>Lugar</th>
    <th>Detalles</th>
    </tr>
</thead>
<tbody>
<?php for ($n = 0; $n < count($json[features]); $n++) {?>
    <?php if (substr_count($json['features'][$n]['properties']['place'],'Chile') > 0){?>
    <tr>
        <?php //esto es para tener el registro en nuestra hora
        date_default_timezone_set("America/Santiago"); $date_local = date("d-m-Y H:m:s",$json['features'][$n]['properties']['time']/1000);?>
        <td><?php echo ($date_local.' hora local');?></td>
        <td class="text-center"><?php echo ($json['features'][$n]['properties']['mag']);?></td>
        <td><?php $solociudad = substr($json['features'][$n]['properties']['place'], strpos($json['features'][$n]['properties']['place'], "f") + 1); echo $solociudad;?></td>
        <td><a href="single.php?url=<?php echo ($json['features'][$n]['properties']['detail']);?>">Ver detalles</a></td>
    </tr>
    <?php } ;?><!--cierro el if-->
<?php } ;?><!--cierro el for-->
</tbody>
</table>
</main>
<?php include('footer.php');?>