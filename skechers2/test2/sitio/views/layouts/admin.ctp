<?= $this->Html->docType('xhtml-trans'); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?= $this->Html->charset(); ?>
		<?= $this->Html->tag('title', "Administración | {$title_for_layout}"); ?>
		<?= $this->Html->meta('icon'); ?>

		<!-- HOJAS DE ESTILO -->
		<?= $this->Html->css('admin-gestion'); ?>
		<?= $this->Html->css('admin-andain-m4/jquery-ui'); ?>

		<!-- ARCHIVOS JAVASCRIPT -->
		<? if ( $mensaje = $this->Session->flash() ) : ?>
		<?= $this->Html->scriptBlock("var sessionFlash = '{$mensaje}';"); ?>
		<? endif; ?>
		<?= $this->Html->scriptBlock("var webroot = '{$this->webroot}';"); ?>
		<?= $this->Html->script('www.andain.cl-jquery-1.6.2.min'); ?>
		<?= $this->Html->script('www.andain.cl-jquery.tmpl.min'); ?>
		<?= $this->Html->script('www.andain.cl-jquery-ui.1.9m4.min'); ?>
		<?= $this->Html->script('www.andain.cl-corner'); ?>
		<?= $this->Html->script('www.andain.cl-funciones-admin'); ?>
		<?= $scripts_for_layout; ?>
	</head>
	<body>
		<!-- CONTENEDOR GENERAL -->
		<div id="admin">

			<!-- HEADER -->
			<div class="head">
				<div class="logo">
					<?= $this->Html->image('admin/logo-admin.png'); ?>
				</div>
				<h2 class="usuario">Bienvenido(a):
					<?= $this->Html->link('<b class="icon">' . @$authUser['nombre'] . '&nbsp;</b>',
										  array('controller' => 'usuarios', 'action' => 'view', @$authUser['id']),
										  array('escape' => false)); ?>
					<!--
					/ Tareas pendientes: <a href="#"><b class="tarea">02</b></a> /
					/-->
					<?= $this->Html->link('<b class="salir">Salir</b>',
										  array('controller' => 'usuarios', 'action' => 'logout'),
										  array('escape' => false)); ?>

				</h2>
			</div>

			<!-- CONTENIDOS -->
			<div class="top-sombra"></div>
			<div class="wrapper">

				<!-- MENSAJES DE SESION -->
				<div id="session-flash"></div>

				<!-- TABS DE NAVEGACION -->
				<?
                $vinculos = array('Mantenedores'	=> array('Usuarios'			=> 'usuarios',
															 'Administradores'	=> 'administradores',
                                                             'Centroscomerciales'	=> 'centroscomerciales',
                                                             'Fotos'	=> 'fotos',
                                                             'Locales'	=> 'locales',
                                                             'Localesusuarios'	=> 'localesusuarios',
                                                             'Preguntas'	=> 'preguntas',
                                                             'Reportes'	=> 'reportes',
                                                             'Respuestas'	=> 'respuestas',
                                                             'Stocks'	=> 'stocks',
                                                             'Tiendas'	=> 'tiendas'

															 ));

				// EXCLUSIONES DONDE APARECERAN LOS MENUS
				$exclusiones = array ('usuarios' => array('login', 'logout'));

				// Generamos los tab de navegacion y el menu lateral
				if ( ! in_array($this->params['controller'], $exclusiones) )
				{
					if ( ! isset($exclusiones[$this->params['controller']]) )
						$exclusiones[$this->params['controller']] = array();

					if ( ! in_array($this->params['action'], $exclusiones[$this->params['controller']]) )
					{
						if ( isset($vinculos) )
						{
							echo $this->element('admin_lateral', array('vinculos' => array($vinculos)));
							if ( isset($authUser) )
							{
								echo '<ul class="tab">';
								foreach ($vinculos as $modkey => $mod)
								{
									$class = (in_array($this->params['controller'], $mod) ? 'current' : '');
									echo "<li class='{$class}'><span class='left'>&nbsp;</span>";
									echo $this->Html->link($modkey, array('controller' => current($mod), 'action' => 'index'));
									echo '<span class="right">&nbsp;</span></li>';
								}
								echo '</ul>';
							}
						}
						else
							echo $this->element('admin_lateral');
					}
				}
				?>

				<!-- VISTA PRINCIPAL -->
				<?= $content_for_layout; ?>

			</div>

			<!-- PIE DE PAGINA -->
			<div class="footer">
				<?= $this->Html->link($this->Html->image('admin/andain-pie.png'),
									  'http://www.andain.cl/',
									  array('escape' => false, 'target' => '_blank', 'title' => 'Andain | Desarrollo y Diseño Web')); ?>
			</div>
		</div>
	</body>
</html>
