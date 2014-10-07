<?php
class LocalesController extends AppController
{
	var $name = 'Locales';

	function admin_index()
	{
		$this->Local->recursive = 0;
		$this->set('locales', $this->paginate());

	}



	function admin_view($id = null)
	{
		if ( ! $id )
		{
			$this->Session->setFlash(__('Registro inválido', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('local', $this->Local->read(null, $id));
	}

	function admin_add()
	{
		if ( ! empty($this->data) )
		{
			$this->Local->create();
			if ( $this->Local->save($this->data) )
			{
				$this->Session->setFlash(__('Registro guardado correctamente', true));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(__('El registro no pudo ser guardado. Por favor intenta nuevamente', true));
			}
		}
		//$comunas = $this->Local->Comuna->find('list');
		//$this->set(compact('comunas'));

     	$comunas = $this->Local->Comuna->find('list', array('fields' => array('Comuna.id', 'Comuna.nombre')));
		$this->set(compact('comunas'));


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
			if ( $this->Local->save($this->data) )
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
			$this->data = $this->Local->read(null, $id);
		}
		$comunas = $this->Local->Comuna->find('list');
		$this->set(compact('comunas'));
	}

	function admin_delete($id = null)
	{
		if ( ! $id )
		{
			$this->Session->setFlash(__('Registro inválido', true));
			$this->redirect(array('action' => 'index'));
		}
		if ( $this->Local->delete($id) )
		{
			$this->Session->setFlash(__('Registro eliminado', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El registro no pudo ser eliminado. Por favor intenta nuevamente', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>