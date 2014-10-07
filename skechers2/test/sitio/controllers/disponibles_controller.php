<?php
class DisponiblesController extends AppController
{
	var $name = 'Disponibles';

	function admin_index()
	{
		$this->Disponibl->recursive = 0;
		$this->set('disponibles', $this->paginate());
	}

	function admin_view($id = null)
	{
		if ( ! $id )
		{
			$this->Session->setFlash(__('Registro inválido', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('disponibl', $this->Disponibl->read(null, $id));
	}

	function admin_add()
	{
		if ( ! empty($this->data) )
		{
			$this->Disponibl->create();
			if ( $this->Disponibl->save($this->data) )
			{
				$this->Session->setFlash(__('Registro guardado correctamente', true));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(__('El registro no pudo ser guardado. Por favor intenta nuevamente', true));
			}
		}
		$usuarios = $this->Disponibl->Usuario->find('list');
		$locales = $this->Disponibl->Local->find('list');
		$this->set(compact('usuarios', 'locales'));
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
			if ( $this->Disponibl->save($this->data) )
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
			$this->data = $this->Disponibl->read(null, $id);
		}
		$usuarios = $this->Disponibl->Usuario->find('list');
		$locales = $this->Disponibl->Local->find('list');
		$this->set(compact('usuarios', 'locales'));
	}

	function admin_delete($id = null)
	{
		if ( ! $id )
		{
			$this->Session->setFlash(__('Registro inválido', true));
			$this->redirect(array('action' => 'index'));
		}
		if ( $this->Disponibl->delete($id) )
		{
			$this->Session->setFlash(__('Registro eliminado', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El registro no pudo ser eliminado. Por favor intenta nuevamente', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>