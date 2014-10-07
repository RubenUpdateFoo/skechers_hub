
<div class="andain">
	<h1>Andain | Desarrollo y Diseño web</h1>
</div>
<div class="validacion">
	<? if ( Configure::read() > 0 ) Debugger::checkSecurityKeys(); ?>

	<? if ( is_writable(TMP) ) : ?>
	<span>El directorio tmp tiene permisos de escritura</span>
	<? else : ?>
	<span class="error">El directorio tmp NO tiene permisos de escritura</span>
	<? endif; ?>
</div>

<div class="validacion">
	<? $settings = Cache::settings(); ?>
	<? if ( ! empty($settings) ) : ?>
	<span><? printf('"%sEngine" es el motor de cache. Para cambiar la configuración edita /config/core.php', $settings['engine']); ?></span>
	<? else : ?>
	<span class="error">El motor de cache NO esta en funcionamiento. Verifica su configuración en /config/core.php</span>
	<? endif; ?>
</div>

<div class="validacion">
	<? $filePresent = null; ?>
	<? if ( file_exists(CONFIGS . 'database.php') ) : ?>
	<span>La configuración de la Base de Datos esta presente</span>
	<? $filePresent = true; ?>
	<? else : ?>
	<span class="error">La configuración de la Base de Datos NO esta presente. Corre el comando "cake bake db_config"</span>
	<? endif; ?>
</div>

<div class="validacion">
	<? if ( ! empty($filePresent) ) : ?>
	<?
	if ( ! class_exists('ConnectionManager') )
		require LIBS . 'model' . DS . 'connection_manager.php';
	$db		= ConnectionManager::getInstance();
 	$connected	= $db->getDataSource('default');
	?>

	<? if ( $connected->isConnected() ) : ?>
	<span>Cake esta conectado a la Base de Datos</span>
	<? else : ?>
	<span class="error">Cake NO se puede conectar a la Base de Datos. Verifica la configuracion en /config/database.php</span>
	<? endif; ?>
	<? endif; ?>
</div>

<div class="admin">
	<?= $this->Html->link('Ir al panel de Administración', '/admin'); ?>
</div>
