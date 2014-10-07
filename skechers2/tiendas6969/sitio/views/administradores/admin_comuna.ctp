<div style="background-color:black; color:white;">

<? foreach ($comunas as $index => $comuna) : ?>
<?= $index.' - '.$comuna; ?><br>
<? endforeach; ?>

<br><br>

<? foreach ($tiendas as $tienda) : ?>
<?= $tienda; ?><br>
<? endforeach; ?>

<br><br>

<? foreach ($tiendas2 as $index => $tienda) : ?>
<?= $index.' - '.$tienda; ?><br>
<? endforeach; ?>


<br><br>
<? foreach ($consulta as $tienda) : ?>
<?= $tienda['Tienda']['nombre']; ?><br>
<? endforeach; ?>
<br><br>

</div>