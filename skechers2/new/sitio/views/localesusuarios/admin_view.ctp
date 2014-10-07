<div class="col02">
	<h1 class="titulo">Previsualización de <? __('localesusuario');?></h1>
	<div class="previsualizar">
		<ul>
			<li><span><? __('Usuario'); ?>:</span><p><?= $this->Html->link($localesusuario['Usuario']['id'], array('controller' => 'usuarios', 'action' => 'view', $localesusuario['Usuario']['id'])); ?>&nbsp;</p></li>
			<li><span><? __('Local'); ?>:</span><p><?= $this->Html->link($localesusuario['Local']['id'], array('controller' => 'locales', 'action' => 'view', $localesusuario['Local']['id'])); ?>&nbsp;</p></li>
		</ul>
	</div>
	<div class="botones">
		<?= $this->Html->link('<span class="editar">Editar</span>', array('action' => 'edit', $localesusuario['Localesusuario']['id']), array('escape' => false)); ?>
		<?= $this->Html->link('<span class="borrar">Borrar</span>', array('action' => 'delete', $localesusuario['Localesusuario']['id']), array('escape' => false), sprintf(__('¿Estas seguro de eliminar el registro # %s?', true), $localesusuario['Localesusuario']['id'])); ?>
	</div>
</div>
