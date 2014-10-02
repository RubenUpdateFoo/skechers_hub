<div class="col02">
	<h1 class="titulo"><? __('Fotos');?></h1>
	<table cellpadding="0" cellspacing="0" class="tabla">
		<tr>
			<th><?= $this->Paginator->sort('reporte_id'); ?></th>
			<th><?= $this->Paginator->sort('nombre'); ?></th>
			<th><?= $this->Paginator->sort('comentarios'); ?></th>
			<th class="actions"><? __('Acciones');?></th>
		</tr>
	
		<? foreach ( $fotos as $foto ) : ?>
		<tr>
			<td><?= $this->Html->link($foto['Reporte']['id'], array('controller' => 'reportes', 'action' => 'view', $foto['Reporte']['id'])); ?></td>
			<td><?= $foto['Foto']['nombre']; ?>&nbsp;</td>
			<td><?= $foto['Foto']['comentarios']; ?>&nbsp;</td>
			<td class="actions">
				<?= $this->Html->link($this->Html->image('iconos/clipboard_16.png', array('title' => 'Ver')), array('action' => 'view', $foto['Foto']['id']), array('escape' => false)); ?>
				<?= $this->Html->link($this->Html->image('iconos/pencil_16.png', array('title' => 'Editar')), array('action' => 'edit', $foto['Foto']['id']), array('escape' => false)); ?>
				<?= $this->Html->link($this->Html->image('iconos/delete_16.png', array('title' => 'Eliminar')), array('action' => 'delete', $foto['Foto']['id']), array('escape' => false), sprintf(__('¿Estas seguro de eliminar el registro # %s?', true), $foto['Foto']['id'])); ?>
			</td>
		</tr>
		<? endforeach; ?>

	</table>

	<div class="paginador">
		<?= $this->Paginator->numbers(array('separator' => false)); ?>
	</div>
</div>