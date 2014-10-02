<div class="col02">
	<h1 class="titulo">Previsualización de <? __('usuario');?></h1>
	<div class="previsualizar">
		<ul>
			<li><span><? __('Rut'); ?>:</span><p><?= $usuario['Usuario']['rut']; ?>&nbsp;</p></li>
			<li><span><? __('Nombre'); ?>:</span><p><?= $usuario['Usuario']['nombre']; ?>&nbsp;</p></li>
			<li><span><? __('Fono'); ?>:</span><p><?= $usuario['Usuario']['fono']; ?>&nbsp;</p></li>
			<li><span><? __('Email'); ?>:</span><p><?= $usuario['Usuario']['email']; ?>&nbsp;</p></li>
			<li><span><? __('Edad'); ?>:</span><p><?= $usuario['Usuario']['edad']; ?>&nbsp;</p></li>
			<li><span><? __('Direccion'); ?>:</span><p><?= $usuario['Usuario']['direccion']; ?>&nbsp;</p></li>
		</ul>
	</div>
	<div class="botones">
		<?= $this->Html->link('<span class="editar">Editar</span>', array('action' => 'edit', $usuario['Usuario']['id']), array('escape' => false)); ?>
		<?= $this->Html->link('<span class="borrar">Borrar</span>', array('action' => 'delete', $usuario['Usuario']['id']), array('escape' => false), sprintf(__('¿Estas seguro de eliminar el registro # %s?', true), $usuario['Usuario']['id'])); ?>
	</div>
</div>
