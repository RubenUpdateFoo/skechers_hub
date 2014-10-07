<div class="col02">
	<h1 class="titulo">Previsualización de <? __('respuesta');?></h1>
	<div class="previsualizar">
		<ul>
			<li><span><? __('Reporte'); ?>:</span><p><?= $this->Html->link($respuesta['Reporte']['id'], array('controller' => 'reportes', 'action' => 'view', $respuesta['Reporte']['id'])); ?>&nbsp;</p></li>
			<li><span><? __('Pregunta'); ?>:</span><p><?= $this->Html->link($respuesta['Pregunta']['id'], array('controller' => 'preguntas', 'action' => 'view', $respuesta['Pregunta']['id'])); ?>&nbsp;</p></li>
			<li><span><? __('Valor'); ?>:</span><p><?= $respuesta['Respuesta']['valor']; ?>&nbsp;</p></li>
		</ul>
	</div>
	<div class="botones">
		<?= $this->Html->link('<span class="editar">Editar</span>', array('action' => 'edit', $respuesta['Respuesta']['id']), array('escape' => false)); ?>
		<?= $this->Html->link('<span class="borrar">Borrar</span>', array('action' => 'delete', $respuesta['Respuesta']['id']), array('escape' => false), sprintf(__('¿Estas seguro de eliminar el registro # %s?', true), $respuesta['Respuesta']['id'])); ?>
	</div>
</div>
