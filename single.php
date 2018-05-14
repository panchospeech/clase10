<?php include('header.php');?>
<main role="main" class="container">
<?php
$la_url = $_GET['url'];
$nuevojson = file_get_contents($la_url);
$json_data = json_decode($nuevojson,true);
?>
<h1 class="mb-2">Detalles del temblor</h1>
<h3 class="mb-4"><?php print($json_data[properties][title])?></h3>
<code>
<pre>
<?php print_r($json_data);?>
</pre>
</code>

</main>
<?php include('footer.php');?>