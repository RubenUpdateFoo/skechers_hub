<div class="col02">
	<h1 class="titulo"><? __('Reportes');?></h1>
	<table cellpadding="0" cellspacing="0" class="tabla">
		<tr>
			<th><?= $this->Paginator->sort('usuario_id'); ?></th>
			<th><?= $this->Paginator->sort('local_id'); ?></th>
			<th><?= $this->Paginator->sort('comentario'); ?></th>
			<th class="actions"><? __('Acciones');?></th>
		</tr>
	
		<? foreach ( $reportes as $reporte ) : ?>
		<tr>
			<td><?= $this->Html->link($reporte['Usuario']['id'], array('controller' => 'usuarios', 'action' => 'view', $reporte['Usuario']['id'])); ?></td>
			<td><?= $this->Html->link($reporte['Local']['id'], array('controller' => 'locales', 'action' => 'view', $reporte['Local']['id'])); ?></td>
			<td><?= $reporte['Reporte']['comentario']; ?>&nbsp;</td>
			<td class="actions">
				<?= $this->Html->link($this->Html->image('iconos/clipboard_16.png', array('title' => 'Ver')), array('action' => 'view', $reporte['Reporte']['id']), array('escape' => false)); ?>
				<?= $this->Html->link($this->Html->image('iconos/pencil_16.png', array('title' => 'Editar')), array('action' => 'edit', $reporte['Reporte']['id']), array('escape' => false)); ?>
				<?= $this->Html->link($this->Html->image('iconos/delete_16.png', array('title' => 'Eliminar')), array('action' => 'delete', $reporte['Reporte']['id']), array('escape' => false), sprintf(__('¿Estas seguro de eliminar el registro # %s?', true), $reporte['Reporte']['id'])); ?>
			</td>
		</tr>
		<? endforeach; ?>

	</table>

	<div class="paginador">
		<?= $this->Paginator->numbers(array('separator' => false)); ?>
	</div>
</div>