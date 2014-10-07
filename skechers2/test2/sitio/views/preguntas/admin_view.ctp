<div class="col02">
	<h1 class="titulo">Previsualización de <? __('pregunta');?></h1>
	<div class="previsualizar">
		<ul>
			<li><span><? __('Nombre'); ?>:</span><p><?= $pregunta['Pregunta']['nombre']; ?>&nbsp;</p></li>
			<li><span><? __('Tipo'); ?>:</span><p><?= $pregunta['Pregunta']['tipo']; ?>&nbsp;</p></li>
		</ul>
	</div>
	<div class="botones">
		<?= $this->Html->link('<span class="editar">Editar</span>', array('action' => 'edit', $pregunta['Pregunta']['id']), array('escape' => false)); ?>
		<?= $this->Html->link('<span class="borrar">Borrar</span>', array('action' => 'delete', $pregunta['Pregunta']['id']), array('escape' => false), sprintf(__('¿Estas seguro de eliminar el registro # %s?', true), $pregunta['Pregunta']['id'])); ?>
	</div>
</div>
