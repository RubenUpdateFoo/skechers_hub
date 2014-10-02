<?php
	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
	Router::connect('/admin', array('controller' => 'usuarios', 'action' => 'index', 'admin' => true));
	Router::connect('/seccion/*', array('controller' => 'pages', 'action' => 'display'));
