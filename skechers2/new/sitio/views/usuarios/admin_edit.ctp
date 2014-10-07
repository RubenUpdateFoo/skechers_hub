<div class="col02">
	<?= $this->Form->create('Usuario', array('type' => 'file', 'inputDefaults' => array('class' => 'clase-input', 'div' => false, 'label' => array('class' => 'texto')))); ?>
 	<h1 class="titulo"><? __('Editar Usuario'); ?></h1>
 	<style type="text/css"> .pikachu label{display: block;}</style>
	<ul class="edit">
		<li><?= $this->Form->input('id'); ?></li>
		<li><?= $this->Form->input('rut'); ?></li>
		<li><?= $this->Form->input('password'); ?></li>
		<li><?= $this->Form->input('nombre'); ?></li>
		<li><?= $this->Form->input('fono'); ?></li>
		<li><?= $this->Form->input('email'); ?></li>
		<li><?= $this->Form->input('edad'); ?></li>
		<li><?= $this->Form->input('direccion'); ?></li>
		<li class="pikachu"><?= $this->Form->input('Local',array('multiple'=>'checkbox')); ?></li>
	</ul>
	<div class="botones">
		<a href="#" class="submit"><span class="guardar">Guardar</span></a>
	</div>
	<?= $this->Form->end(); ?>
</div>
