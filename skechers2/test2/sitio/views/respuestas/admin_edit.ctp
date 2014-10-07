<div class="col02">
	<?= $this->Form->create('Respuesta', array('type' => 'file', 'inputDefaults' => array('class' => 'clase-input', 'div' => false, 'label' => array('class' => 'texto')))); ?>
 	<h1 class="titulo"><? __('Editar Respuesta'); ?></h1>
	<ul class="edit">
		<li><?= $this->Form->input('id'); ?></li>
		<li><?= $this->Form->input('reporte_id'); ?></li>
		<li><?= $this->Form->input('pregunta_id'); ?></li>
		<li><?= $this->Form->input('valor'); ?></li>
	</ul>
	<div class="botones">
		<a href="#" class="submit"><span class="guardar">Guardar</span></a>
	</div>
	<?= $this->Form->end(); ?>
</div>
