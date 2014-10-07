<div class="col02">
	<h1 class="titulo"><? __('Centroscomerciales');?></h1>
	<table cellpadding="0" cellspacing="0" class="tabla">
		<tr>
			<th><?= $this->Paginator->sort('nombre'); ?></th>
			<th><?= $this->Paginator->sort('direccion'); ?></th>
			<th><?= $this->Paginator->sort('latitud'); ?></th>
			<th><?= $this->Paginator->sort('longitud'); ?></th>
			<th class="actions"><? __('Acciones');?></th>
		</tr>
	
		<? foreach ( $centroscomerciales as $centroscomercial ) : ?>
		<tr>
			<td><?= $centroscomercial['Centroscomercial']['nombre']; ?>&nbsp;</td>
			<td><?= $centroscomercial['Centroscomercial']['direccion']; ?>&nbsp;</td>
			<td><?= $centroscomercial['Centroscomercial']['latitud']; ?>&nbsp;</td>
			<td><?= $centroscomercial['Centroscomercial']['longitud']; ?>&nbsp;</td>
			<td class="actions">
				<?= $this->Html->link($this->Html->image('iconos/clipboard_16.png', array('title' => 'Ver')), array('action' => 'view', $centroscomercial['Centroscomercial']['id']), array('escape' => false)); ?>
				<?= $this->Html->link($this->Html->image('iconos/pencil_16.png', array('title' => 'Editar')), array('action' => 'edit', $centroscomercial['Centroscomercial']['id']), array('escape' => false)); ?>
				<?= $this->Html->link($this->Html->image('iconos/delete_16.png', array('title' => 'Eliminar')), array('action' => 'delete', $centroscomercial['Centroscomercial']['id']), array('escape' => false), sprintf(__('¿Estas seguro de eliminar el registro # %s?', true), $centroscomercial['Centroscomercial']['id'])); ?>
			</td>
		</tr>
		<? endforeach; ?>

	</table>

	<div class="paginador">
		<?= $this->Paginator->numbers(array('separator' => false)); ?>
	</div>
</div>