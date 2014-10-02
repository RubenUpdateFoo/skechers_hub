<?php
	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
	Router::connect('/admin', array('controller' => 'administradores', 'action' => 'index', 'admin' => true)); //configuramos base "administraqdores"
	Router::connect('/seccion/*', array('controller' => 'pages', 'action' => 'display'));
