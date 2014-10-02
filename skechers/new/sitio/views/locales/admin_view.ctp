<div class="col02">
	<h1 class="titulo">Previsualización de <? __('local');?></h1>
	<div class="previsualizar">
		<ul>


            <li><span><? __('Centro comercial'); ?>:</span><p><?= $local['Centroscomercial']['nombre'];?></p></li>
            <li><span><? __('Tienda'); ?>:</span><p><?= $local['Tienda']['nombre'];?></p></li>

			<li><span><? __('Nombre'); ?>:</span><p><?= $local['Local']['nombre']; ?>&nbsp;</p></li>
			<li><span><? __('Direccion'); ?>:</span><p><?= $local['Local']['direccion']; ?>&nbsp;</p></li>
			<li><span><? __('Encargado'); ?>:</span><p><?= $local['Local']['encargado']; ?>&nbsp;</p></li>
			<li><span><? __('Email'); ?>:</span><p><?= $local['Local']['email']; ?>&nbsp;</p></li>
			<li><span><? __('Telefono'); ?>:</span><p><?= $local['Local']['telefono']; ?>&nbsp;</p></li>
		</ul>
	</div>


	<div class="botones">
		<?= $this->Html->link('<span class="editar">Editar</span>', array('action' => 'edit', $local['Local']['id']), array('escape' => false)); ?>
		<?= $this->Html->link('<span class="borrar">Borrar</span>', array('action' => 'delete', $local['Local']['id']), array('escape' => false), sprintf(__('¿Estas seguro de eliminar el registro # %s?', true), $local['Local']['id'])); ?>
	</div>
</div>
