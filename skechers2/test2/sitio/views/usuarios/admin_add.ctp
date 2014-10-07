<div class="col02">
	<?= $this->Form->create('Usuario', array('type' => 'file', 'inputDefaults' => array('class' => 'clase-input', 'div' => false, 'label' => array('class' => 'texto')))); ?>
 	<h1 class="titulo"><? __('Agregar Usuario'); ?></h1>
	<ul class="edit">
		<li><?= $this->Form->input('rut'); ?></li>
		<li><?= $this->Form->input('password'); ?></li>
		<li><?= $this->Form->input('nombre'); ?></li>
		<li><?= $this->Form->input('fono'); ?></li>
		<li><?= $this->Form->input('email'); ?></li>
		<li><?= $this->Form->input('edad'); ?></li>
		<li><?= $this->Form->input('direccion'); ?></li>
	</ul>
	<div class="botones">
		<a href="#" class="submit"><span class="guardar">Guardar</span></a>
	</div>
	<?= $this->Form->end(); ?>
</div>
