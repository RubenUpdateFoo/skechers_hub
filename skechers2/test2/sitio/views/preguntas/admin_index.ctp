<div class="col02">
	<h1 class="titulo"><? __('Preguntas');?></h1>
	<table cellpadding="0" cellspacing="0" class="tabla">
		<tr>
			<th><?= $this->Paginator->sort('nombre'); ?></th>
			<th><?= $this->Paginator->sort('tipo'); ?></th>
			<th class="actions"><? __('Acciones');?></th>
		</tr>
	
		<? foreach ( $preguntas as $pregunta ) : ?>
		<tr>
			<td><?= $pregunta['Pregunta']['nombre']; ?>&nbsp;</td>
			<td><?= $pregunta['Pregunta']['tipo']; ?>&nbsp;</td>
			<td class="actions">
				<?= $this->Html->link($this->Html->image('iconos/clipboard_16.png', array('title' => 'Ver')), array('action' => 'view', $pregunta['Pregunta']['id']), array('escape' => false)); ?>
				<?= $this->Html->link($this->Html->image('iconos/pencil_16.png', array('title' => 'Editar')), array('action' => 'edit', $pregunta['Pregunta']['id']), array('escape' => false)); ?>
				<?= $this->Html->link($this->Html->image('iconos/delete_16.png', array('title' => 'Eliminar')), array('action' => 'delete', $pregunta['Pregunta']['id']), array('escape' => false), sprintf(__('¿Estas seguro de eliminar el registro # %s?', true), $pregunta['Pregunta']['id'])); ?>
			</td>
		</tr>
		<? endforeach; ?>

	</table>

	<div class="paginador">
		<?= $this->Paginator->numbers(array('separator' => false)); ?>
	</div>
</div>