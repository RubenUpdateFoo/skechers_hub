<div class="col02">
	<h1 class="titulo">Previsualización de <? __('local');?></h1>
	<div class="previsualizar">
		<ul>
			<li><span><? __('Nombre'); ?>:</span><p><?= $local['Local']['nombre']; ?>&nbsp;</p></li>
			<li><span><? __('Direccion'); ?>:</span><p><?= $local['Local']['direccion']; ?>&nbsp;</p></li>
			<li><span><? __('Comuna'); ?>:</span><p><?= $this->Html->link($local['Comuna']['id'], array('controller' => 'comunas', 'action' => 'view', $local['Comuna']['id'])); ?>&nbsp;</p></li>
		</ul>
	</div>
	<div class="botones">
		<?= $this->Html->link('<span class="editar">Editar</span>', array('action' => 'edit', $local['Local']['id']), array('escape' => false)); ?>
		<?= $this->Html->link('<span class="borrar">Borrar</span>', array('action' => 'delete', $local['Local']['id']), array('escape' => false), sprintf(__('¿Estas seguro de eliminar el registro # %s?', true), $local['Local']['id'])); ?>
	</div>
</div>
