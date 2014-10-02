<div class="col02">
	<h1 class="titulo"><? __('Respuestas');?></h1>
	<table cellpadding="0" cellspacing="0" class="tabla">
		<tr>
			<th><?= $this->Paginator->sort('pregunta_id'); ?></th>
			<th class="actions"><? __('Acciones');?></th>
		</tr>
	
		<? foreach ( $respuestas as $respuesta ) : ?>
		<tr>
			<td><?= $this->Html->link($respuesta['Pregunta']['id'], array('controller' => 'preguntas', 'action' => 'view', $respuesta['Pregunta']['id'])); ?></td>
			<td class="actions">
				<?= $this->Html->link($this->Html->image('iconos/clipboard_16.png', array('title' => 'Ver')), array('action' => 'view', $respuesta['Respuesta']['id']), array('escape' => false)); ?>
				<?= $this->Html->link($this->Html->image('iconos/pencil_16.png', array('title' => 'Editar')), array('action' => 'edit', $respuesta['Respuesta']['id']), array('escape' => false)); ?>
				<?= $this->Html->link($this->Html->image('iconos/delete_16.png', array('title' => 'Eliminar')), array('action' => 'delete', $respuesta['Respuesta']['id']), array('escape' => false), sprintf(__('¿Estas seguro de eliminar el registro # %s?', true), $respuesta['Respuesta']['id'])); ?>
			</td>
		</tr>
		<? endforeach; ?>

	</table>

	<div class="paginador">
		<?= $this->Paginator->numbers(array('separator' => false)); ?>
	</div>
</div>