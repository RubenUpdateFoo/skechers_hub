<div class="col02">
	<h1 class="titulo">Previsualización de <? __('centroscomercial');?></h1>
	<div class="previsualizar">
		<ul>
			<li><span><? __('Nombre'); ?>:</span><p><?= $centroscomercial['Centroscomercial']['nombre']; ?>&nbsp;</p></li>
			<li><span><? __('Direccion'); ?>:</span><p><?= $centroscomercial['Centroscomercial']['direccion']; ?>&nbsp;</p></li>
			<li><span><? __('Latitud'); ?>:</span><p><?= $centroscomercial['Centroscomercial']['latitud']; ?>&nbsp;</p></li>
			<li><span><? __('Longitud'); ?>:</span><p><?= $centroscomercial['Centroscomercial']['longitud']; ?>&nbsp;</p></li>
		</ul>
	</div>
	<div class="botones">
		<?= $this->Html->link('<span class="editar">Editar</span>', array('action' => 'edit', $centroscomercial['Centroscomercial']['id']), array('escape' => false)); ?>
		<?= $this->Html->link('<span class="borrar">Borrar</span>', array('action' => 'delete', $centroscomercial['Centroscomercial']['id']), array('escape' => false), sprintf(__('¿Estas seguro de eliminar el registro # %s?', true), $centroscomercial['Centroscomercial']['id'])); ?>
	</div>
</div>
