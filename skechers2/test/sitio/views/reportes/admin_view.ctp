<div class="col02">
	<h1 class="titulo">Previsualización de <? __('reporte');?></h1>
	<div class="previsualizar">
		<ul>
			<li><span><? __('Foto'); ?>:</span><p><?= $this->Html->link($reporte['Foto']['id'], array('controller' => 'fotos', 'action' => 'view', $reporte['Foto']['id'])); ?>&nbsp;</p></li>
			<li><span><? __('Usuario'); ?>:</span><p><?= $this->Html->link($reporte['Usuario']['id'], array('controller' => 'usuarios', 'action' => 'view', $reporte['Usuario']['id'])); ?>&nbsp;</p></li>
			<li><span><? __('Respuesta'); ?>:</span><p><?= $this->Html->link($reporte['Respuesta']['id'], array('controller' => 'respuestas', 'action' => 'view', $reporte['Respuesta']['id'])); ?>&nbsp;</p></li>
			<li><span><? __('Local'); ?>:</span><p><?= $this->Html->link($reporte['Local']['id'], array('controller' => 'locales', 'action' => 'view', $reporte['Local']['id'])); ?>&nbsp;</p></li>
		</ul>
	</div>
	<div class="botones">
		<?= $this->Html->link('<span class="editar">Editar</span>', array('action' => 'edit', $reporte['Reporte']['id']), array('escape' => false)); ?>
		<?= $this->Html->link('<span class="borrar">Borrar</span>', array('action' => 'delete', $reporte['Reporte']['id']), array('escape' => false), sprintf(__('¿Estas seguro de eliminar el registro # %s?', true), $reporte['Reporte']['id'])); ?>
	</div>
</div>
