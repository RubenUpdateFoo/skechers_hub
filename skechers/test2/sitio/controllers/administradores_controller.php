<?php
class AdministradoresController extends AppController
{
	var $name = 'Administradores';

	

    function admin_test() {
    
    $this->loadModel('Administrador');
	//$tiendas = $this->Administrador->find('all');
	//$locales = $this->Tienda->Local->find('all');
    //prx($tiendas); 


   	$consulta = $this->Administrador->find('all', array('conditions' => array('Administrador.id' =>1)));
   	$this->set(compact('consulta'));

/*
    $this->loadModel('Administrador');
		$administrador = $this->Administrador->find('all', array(
			'fields' => array('Administrador.id',
							  'Administrador.nombre',
				  			  'Administrador.usuario'),
			'contain' => array('Administrador' => array('fields' => array('Administrador.id',
																   'Administrador.nombre')))));
		$this->set(compact('administrador'));
*/


     }





	function admin_login() { }

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