<div class="col02">
	<h1 class="titulo"><? __('Comunas');?></h1>
	<table cellpadding="0" cellspacing="0" class="tabla">
		<tr>
			<th><?= $this->Paginator->sort('nombre'); ?></th>
			<th><?= $this->Paginator->sort('region_id'); ?></th>
			<th class="actions"><? __('Acciones');?></th>
		</tr>
	
		<? foreach ( $comunas as $comuna ) : ?>
		<tr>
			<td><?= $comuna['Comuna']['nombre']; ?>&nbsp;</td>
			<td><?= $comuna['Region']['nombre']; ?></td>
			<td class="actions">
				<?= $this->Html->link($this->Html->image('iconos/clipboard_16.png', array('title' => 'Ver')), array('action' => 'view', $comuna['Comuna']['id']), array('escape' => false)); ?>
				<?= $this->Html->link($this->Html->image('iconos/pencil_16.png', array('title' => 'Editar')), array('action' => 'edit', $comuna['Comuna']['id']), array('escape' => false)); ?>
				<?= $this->Html->link($this->Html->image('iconos/delete_16.png', array('title' => 'Eliminar')), array('action' => 'delete', $comuna['Comuna']['id']), array('escape' => false), sprintf(__('¿Estas seguro de eliminar el registro # %s?', true), $comuna['Comuna']['id'])); ?>
			</td>
		</tr>
		<? endforeach; ?>

	</table>

	<div class="paginador">
		<?= $this->Paginator->numbers(array('separator' => false)); ?>
	</div>
</div>