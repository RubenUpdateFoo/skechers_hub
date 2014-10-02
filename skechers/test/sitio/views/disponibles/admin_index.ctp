<div class="col02">
	<h1 class="titulo"><? __('Disponibles');?></h1>
	<table cellpadding="0" cellspacing="0" class="tabla">
		<tr>
			<th><?= $this->Paginator->sort('usuario_id'); ?></th>
			<th><?= $this->Paginator->sort('local_id'); ?></th>
			<th class="actions"><? __('Acciones');?></th>
		</tr>
	
		<? foreach ( $disponibles as $disponibl ) : ?>
		<tr>
			<td><?= $this->Html->link($disponibl['Usuario']['id'], array('controller' => 'usuarios', 'action' => 'view', $disponibl['Usuario']['id'])); ?></td>
			<td><?= $this->Html->link($disponibl['Local']['id'], array('controller' => 'locales', 'action' => 'view', $disponibl['Local']['id'])); ?></td>
			<td class="actions">
				<?= $this->Html->link($this->Html->image('iconos/clipboard_16.png', array('title' => 'Ver')), array('action' => 'view', $disponibl['Disponibl']['id']), array('escape' => false)); ?>
				<?= $this->Html->link($this->Html->image('iconos/pencil_16.png', array('title' => 'Editar')), array('action' => 'edit', $disponibl['Disponibl']['id']), array('escape' => false)); ?>
				<?= $this->Html->link($this->Html->image('iconos/delete_16.png', array('title' => 'Eliminar')), array('action' => 'delete', $disponibl['Disponibl']['id']), array('escape' => false), sprintf(__('¿Estas seguro de eliminar el registro # %s?', true), $disponibl['Disponibl']['id'])); ?>
			</td>
		</tr>
		<? endforeach; ?>

	</table>

	<div class="paginador">
		<?= $this->Paginator->numbers(array('separator' => false)); ?>
	</div>
</div>