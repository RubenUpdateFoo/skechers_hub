<?= $this->Html->docType('xhtml-trans'); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?= $this->Html->charset(); ?>
		<?= $this->Html->tag('title', "Administración | {$title_for_layout}"); ?>
		<?= $this->Html->meta('icon'); ?>
		<?= $this->Html->script('www.andain.cl-jquery-1.6.2.min'); ?>
		<?= $this->Html->script('www.andain.cl-jquery.tmpl.min'); ?>
		<?= $this->Html->script('www.andain.cl-corner'); ?>
		<?= $this->Html->script('www.andain.cl-funciones-admin'); ?>
		<?= $this->Html->css('admin-gestion'); ?>
		<?= $scripts_for_layout; ?>
	</head>
	<body>
		<!-- CONTENEDOR GENERAL -->
		<div id="admin">
			<div class="login">
				<h2 class="subtitulo">Administración</h2>

				<!-- LOGIN -->
				<? if ( $this->Session->check('Message.auth') ) : ?>
				<div class="alerta" style="padding: 5px;">
					<?= $this->Session->flash('auth'); ?></div>
				<? endif; ?>

				<?= $this->Form->create('Administrador'); ?>
					<label>
						<span style="width: 60px; float: left; margin-top: 7px; margin-left: 70px">Usuario:</span>
						<?= $this->Form->input('usuario', array('label' => false, 'div' => false, 'class' => 'clase-input', 'style' => 'width: 150px;')); ?>
					</label>
					<br />
					<br />
					<label>
						<span style="width: 60px; float:left; margin-top: 7px; margin-left: 70px">Clave:</span>
						<?= $this->Form->input('clave', array('label' => false, 'type' => 'password', 'div' => false, 'class' => 'clase-input', 'style' => 'width: 150px;')); ?>
					</label>
				
					<div class="botones">
						<a href="#" class="submit"><span class="entrar">Entrar</span></a>
					</div>
				<?= $this->Form->end(); ?>

			</div>
		</div>
	</body>
</html>
