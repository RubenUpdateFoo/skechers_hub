<?php
	Configure::write('debug', 2);
	Configure::write('log', false);
	Configure::write('App.encoding', 'UTF-8');
	//Configure::write('App.baseUrl', env('SCRIPT_NAME'));
	Configure::write('Routing.prefixes', array('admin','app'));
	Configure::write('Cache.disable', true);
	//Configure::write('Cache.check', true);
	define('LOG_ERROR', 0);

	Configure::write('Session.save', 'php');
	//Configure::write('Session.model', 'Session');
	//Configure::write('Session.table', 'cake_sessions');
	//Configure::write('Session.database', 'default');
	Configure::write('Session.cookie', 'ANDAIN');
	Configure::write('Session.timeout', '120');
	Configure::write('Session.start', true);
	Configure::write('Session.checkAgent', true);

	Configure::write('Security.level', 'medium');
	Configure::write('Security.salt', 'f3fb2a0400c53c595169eebd9c6937c43fb13d10');
	Configure::write('Security.cipherSeed', '356566663734326361666230356361');

	//Configure::write('Asset.timestamp', true);
	//Configure::write('Asset.filter.css', 'css.php');
	//Configure::write('Asset.filter.js', 'custom_javascript_output_filter.php');

	Configure::write('Acl.classname', 'DbAcl');
	Configure::write('Acl.database', 'default');

	//date_default_timezone_set('UTC');
	Cache::config('default', array('engine' => 'File'));
