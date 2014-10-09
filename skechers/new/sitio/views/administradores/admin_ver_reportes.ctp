
		<div class="col02">
		<h1 class="titulo">Vista de Reportes</h1>
		<table cellpadding="0" cellspacing="0" class="tabla">	
        <tr>
        <td>
        <?= $this->Form->create('Administrador', array('action' => 'nombredefuncion', 'class' => 'algo')); ?>
        <?= $this->Form->input('nombre', array('type' => 'select')); ?>
        <?= $this->Form->input('nombre', array('type' => 'text')); ?> 
        <?= $this->Form->end(); ?>

      <?php 
        // echo $this->Form->select('field', array(
	    // 'Value 1' => 'Label 1',
	    // 'Value 2' => 'Label 2',
	    // 'Value 3' => 'Label 3'
        //     ));     
       ?>

       <?php 
		         $options = array('Value 1' => 'Label 1',
				                  'Value 2' => 'Label 2');

           echo $this->Form->select('field', $options);
 

        ?>




 

<!-- 		<form name="input" action="" method="post">
			<p>Nombre:<input type="text" name="nombre"></p> 
            <p>Local: <input type="text" name="local"></p>
            <p>Fecha: <input type="text" name="fecha"></p>
            <p> <input type="submit" value="Filtrar"></p>
            
		</form> -->
        </td>
        </tr>

		<tr>
			<th>Usuario_id</th><th>Nombre</th><th>Reporte</th><th>Local</th><th>Fecha</th>
		</tr>

		<? foreach ( $consulta as $con ) : ?>
		<tr>
		    <td><?= $con['Reporte']['usuario_id']; ?></td>	
			<td><?= $con['Usuario']['nombre']; ?></td>
			<td><?= $con['Reporte']['id']; ?></td>
            <td><?= $con['Local']['nombre']; ?></td>
            <td><?= $con['Reporte']['created']; ?></td>
		</tr>

		<? endforeach; ?>

		</table>
        </div>




