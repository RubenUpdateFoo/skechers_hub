<?php
class AdministradoresController extends AppController
{
	var $name = 'Administradores';


    function admin_test2(){ }

    function admin_comuna() {
		$this->loadModel('Comuna');
    	$comunas = $this->Comuna->find('list', array('fields' => array('id', 'nombre')));
		$this->set(compact('comunas'));

       
		$this->loadModel('Tienda');
    	$tiendas = $this->Tienda->find('list', array('fields' => array('nombre')));
		$this->set(compact('tiendas'));


		$this->loadModel('Tienda');
    	$tiendas2 = $this->Tienda->find('list', array('fields' => array('direccion','nombre')));
		$this->set(compact('tiendas2'));


		$this->loadModel('Tienda');
        $consulta = $this->Tienda->find('all');
		$this->set(compact('consulta'));

    }





	function admin_test() {
		/*
		all
		first
		list
		count
		*/

        /*
		$consulta = $this->Administrador->find('count');
		prx($consulta);*/
		/*
		if ($this->Session->check('Test'))
		{
			pr($this->Session->read('Test'));
			prx('EXISTE!!!');
		}
		else
		{
			$this->Session->write('Test', 1);
			prx('NO EXISTE');
		}
		$this->Session->delete('Test');
		*/
		
		
		$this->loadModel('Comuna');
		$comunas = $this->Comuna->find('all', array(
			'fields' => array('Comuna.id',
							  'Comuna.nombre',
				  			  'Comuna.region_id'),
			'contain' => array('Region' => array('fields' => array('Region.id',
																   'Region.nombre')))));
		$this->set(compact('comunas'));
	}

	function admin_login() {

	}

	function admin_logout()
	{
		$this->Session->delete("Auth.{$this->Auth->userModel}");
		$this->redirect($this->Auth->logout());
	}

	function admin_index()
	{
		$this->Administrador->recursive = 0;
		$this->set('administradores', $this->paginate());
	}

	function admin_view($id = null)
	{
		if ( ! $id )
		{
			$this->Session->setFlash(__('Registro inválido', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('administrador', $this->Administrador->read(null, $id));
	}

	function admin_add()
	{
		if ( ! empty($this->data) )
		{
			$this->Administrador->create();
			if ( $this->Administrador->save($this->data) )
			{
				$this->Session->setFlash(__('Registro guardado correctamente', true));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(__('El registro no pudo ser guardado. Por favor intenta nuevamente', true));
			}
		}
	}

	function admin_edit($id = null)
	{
		if ( ! $id && empty($this->data) )
		{
			$this->Session->setFlash(__('Registro inválido', true));
			$this->redirect(array('action' => 'index'));
		}
		if ( ! empty($this->data) )
		{
			if ( $this->Administrador->save($this->data) )
			{
				$this->Session->setFlash(__('Registro guardado correctamente', true));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(__('El registro no pudo ser guardado. Por favor intenta nuevamente', true));
			}
		}
		if ( empty($this->data) )
		{
			$this->data = $this->Administrador->read(null, $id);
		}
	}

	function admin_delete($id = null)
	{
		if ( ! $id )
		{
			$this->Session->setFlash(__('Registro inválido', true));
			$this->redirect(array('action' => 'index'));
		}
		if ( $this->Administrador->delete($id) )
		{
			$this->Session->setFlash(__('Registro eliminado', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El registro no pudo ser eliminado. Por favor intenta nuevamente', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>