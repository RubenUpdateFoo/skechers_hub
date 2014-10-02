<?php
class AppController extends Controller
{
	var $helpers	= array('Session', 'Html', 'Form', 'Text', 'Time', 'Number', 'Javascript');
	var $components	= array('Session',
							'RequestHandler',
							'Auth' => array('userModel'			=> 'Administrador',
											//'userScope'			=> array('Usuario.activo' => true),
											'fields'			=> array('username'		=> 'usuario',
																		 'password'		=> 'clave'),
											'loginAction' 		=> array('controller'	=> 'administradores',		'action' => 'login',	'admin' => true),
											'logoutRedirect' 	=> array('controller'	=> 'administradores',		'action' => 'login',	'admin' => true),
											'loginRedirect' 	=> array('controller'	=> 'administradores',		'action' => 'index',	'admin' => true),
											'loginError'		=> 'Datos de ingreso erroneos',
											'authError'			=> 'No tienes permisos para esta sección',
											'autoRedirect'		=> true
											),
							'DebugKit.Toolbar'	=> array('panels' => array('history'	=> false,
																		   'request'	=> true,
																		   'log'		=> false
																		   )
														 ),
							'Email'
							);

	function beforeFilter()
	{
		// ------------------------------- CREA EL USUARIO ADMIN !!!!
		/**$Usuario	= ClassRegistry::init($this->Auth->userModel);
		if ( ! $Usuario->find('first') )
		{
			$admin		= array($this->Auth->fields['username']	=> 'admin',
								$this->Auth->fields['password']	=> $this->Auth->password('admin'));

			foreach ( $Usuario->_schema as $campo => $atributos )
			{
				if ( ( isset($atributos['key']) && $atributos['key'] == 'primary' ) || in_array($campo, array('created', 'modified', 'updated', $this->Auth->fields['username'], $this->Auth->fields['password'])) || $atributos['default'] )
					continue;

				if ( $atributos['type']	== 'string' )
					$admin[$campo]		= 'admin';
				
				if ( $atributos['type']	== 'boolean' )
					$admin[$campo]		= true;
			}
			$Usuario->save($admin);
		}*/
		// ------------------------------- BORRAR
		// ------------------------------- BORRAR
		// ------------------------------- BORRAR



		// PERMISOS FULL A TODAS LAS PAGINAS SIN PREFIJO
		if ( isset($this->Auth) && ! isset($this->params['prefix']) )
			$this->Auth->allow('*');

		// PETICIONES AJAX
		if ( $this->RequestHandler->isAjax() )
		{
			if ( $this->Session->read('Message.flash') )
				$this->Session->delete('Message.flash');

			Configure::write('debug', 0);
			$this->disableCache();
			$this->layout	= 'ajax';
		}
	}

	function beforeRender()
	{
		// LAYOUT ADMIN
		if ( isset($this->params['prefix']) && in_array($this->params['prefix'], Configure::read('Routing.prefixes')) )
			$this->layout = 'admin';

		// LAYOUT ADMIN LOGIN
		if ( isset($this->params['prefix']) && in_array($this->params['prefix'], Configure::read('Routing.prefixes')) && stripos($this->action, 'login') !== false )
			$this->layout = 'admin_login';

		// VARIABLE CON LOS DATOS DEL USUARIO LOGEADO
		if ( isset($this->Auth) && $this->Auth->user() )
		{
			$this->_refreshAuth();
			$authUser	= $this->Auth->user();
			$this->set('authUser', $authUser[$this->Auth->userModel]);
		}
	}


	/**
	 * Refresca la Session de Auth Controller
	 *
	 * @return	void
	 */
	function _refreshAuth()
	{
		$Usuario	= ClassRegistry::init($this->Auth->userModel);
		$Usuario->recursive	= -1;
		$this->Auth->login($Usuario->findById($this->Auth->user('id')));
	}
}

function prx($data)
{
	pr($data); exit;
}
