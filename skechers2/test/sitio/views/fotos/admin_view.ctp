<div class="col02">
	<h1 class="titulo">Previsualización de <? __('foto');?></h1>
	<div class="previsualizar">
		<ul>
			<li><span><? __('Nombre'); ?>:</span><p><?= $foto['Foto']['nombre']; ?>&nbsp;</p></li>
			<li><span><? __('Comentarios'); ?>:</span><p><?= $foto['Foto']['comentarios']; ?>&nbsp;</p></li>
		</ul>
	</div>
	<div class="botones">
		<?= $this->Html->link('<span class="editar">Editar</span>', array('action' => 'edit', $foto['Foto']['id']), array('escape' => false)); ?>
		<?= $this->Html->link('<span class="borrar">Borrar</span>', array('action' => 'delete', $foto['Foto']['id']), array('escape' => false), sprintf(__('¿Estas seguro de eliminar el registro # %s?', true), $foto['Foto']['id'])); ?>
	</div>
</div>
