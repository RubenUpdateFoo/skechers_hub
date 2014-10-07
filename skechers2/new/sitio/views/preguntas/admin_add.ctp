<div class="col02">
	<?= $this->Form->create('Pregunta', array('type' => 'file', 'inputDefaults' => array('class' => 'clase-input', 'div' => false, 'label' => array('class' => 'texto')))); ?>
 	<h1 class="titulo"><? __('Agregar Pregunta'); ?></h1>
	<ul class="edit">
		<li><?= $this->Form->input('nombre'); ?></li>

      <li><label class="texto">Tipo</label>
          <input type="radio" value="0" name="data[Pregunta][tipo]"></input>
          <label>si</label>
          <input type="radio" value="1" name="data[Pregunta][tipo]"></input>
          <label>no</label> </li></ul>

	<div class="botones">
		<a href="#" class="submit"><span class="guardar">Guardar</span></a>
	</div>


	<?= $this->Form->end(); ?>
</div>
