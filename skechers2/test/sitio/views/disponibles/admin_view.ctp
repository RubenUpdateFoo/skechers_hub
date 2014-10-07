<div class="col02">
	<h1 class="titulo">Previsualización de <? __('disponibl');?></h1>
	<div class="previsualizar">
		<ul>
			<li><span><? __('Usuario'); ?>:</span><p><?= $this->Html->link($disponibl['Usuario']['id'], array('controller' => 'usuarios', 'action' => 'view', $disponibl['Usuario']['id'])); ?>&nbsp;</p></li>
			<li><span><? __('Local'); ?>:</span><p><?= $this->Html->link($disponibl['Local']['id'], array('controller' => 'locales', 'action' => 'view', $disponibl['Local']['id'])); ?>&nbsp;</p></li>
		</ul>
	</div>
	<div class="botones">
		<?= $this->Html->link('<span class="editar">Editar</span>', array('action' => 'edit', $disponibl['Disponibl']['id']), array('escape' => false)); ?>
		<?= $this->Html->link('<span class="borrar">Borrar</span>', array('action' => 'delete', $disponibl['Disponibl']['id']), array('escape' => false), sprintf(__('¿Estas seguro de eliminar el registro # %s?', true), $disponibl['Disponibl']['id'])); ?>
	</div>
</div>
