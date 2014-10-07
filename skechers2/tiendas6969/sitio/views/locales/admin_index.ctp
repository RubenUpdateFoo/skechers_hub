<div class="col02">
	<h1 class="titulo"><? __('Locales');?></h1>
	<table cellpadding="0" cellspacing="0" class="tabla">
		<tr>
			<th><?= $this->Paginator->sort('nombre'); ?></th>
			<th><?= $this->Paginator->sort('direccion'); ?></th>
			<th><?= $this->Paginator->sort('comuna_id'); ?></th>
			<th class="actions"><? __('Acciones');?></th>
		</tr>
	
		<? foreach ( $locales as $local ) : ?>
		<tr>
			<td><?= $local['Local']['nombre']; ?>&nbsp;</td>
			<td><?= $local['Local']['direccion']; ?>&nbsp;</td>
			<td><?= $this->Html->link($local['Comuna']['id'], array('controller' => 'comunas', 'action' => 'view', $local['Comuna']['id'])); ?></td>
			<td class="actions">
				<?= $this->Html->link($this->Html->image('iconos/clipboard_16.png', array('title' => 'Ver')), array('action' => 'view', $local['Local']['id']), array('escape' => false)); ?>
				<?= $this->Html->link($this->Html->image('iconos/pencil_16.png', array('title' => 'Editar')), array('action' => 'edit', $local['Local']['id']), array('escape' => false)); ?>
				<?= $this->Html->link($this->Html->image('iconos/delete_16.png', array('title' => 'Eliminar')), array('action' => 'delete', $local['Local']['id']), array('escape' => false), sprintf(__('¿Estas seguro de eliminar el registro # %s?', true), $local['Local']['id'])); ?>
			</td>
		</tr>
		<? endforeach; ?>

	</table>

	<div class="paginador">
		<?= $this->Paginator->numbers(array('separator' => false)); ?>
	</div>
</div>