<?php
class LocalesusuariosController extends AppController
{
	var $name = 'Localesusuarios';

	function admin_index()
	{
		$this->Localesusuario->recursive = 0;
		$this->set('localesusuarios', $this->paginate());
	}

	function admin_view($id = null)
	{
		if ( ! $id )
		{
			$this->Session->setFlash(__('Registro inválido', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('localesusuario', $this->Localesusuario->read(null, $id));
	}

	function admin_add()
	{
		if ( ! empty($this->data) )
		{
			$this->Localesusuario->create();
			if ( $this->Localesusuario->save($this->data) )
			{
				$this->Session->setFlash(__('Registro guardado correctamente', true));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(__('El registro no pudo ser guardado. Por favor intenta nuevamente', true));
			}
		}
		$usuarios = $this->Localesusuario->Usuario->find('list');
		$locales = $this->Localesusuario->Local->find('list');
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
			if ( $this->Localesusuario->save($this->data) )
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
			$this->data = $this->Localesusuario->read(null, $id);
		}
		$usuarios = $this->Localesusuario->Usuario->find('list');
		$locales = $this->Localesusuario->Local->find('list');
		$this->set(compact('usuarios', 'locales'));
	}

	function admin_delete($id = null)
	{
		if ( ! $id )
		{
			$this->Session->setFlash(__('Registro inválido', true));
			$this->redirect(array('action' => 'index'));
		}
		if ( $this->Localesusuario->delete($id) )
		{
			$this->Session->setFlash(__('Registro eliminado', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El registro no pudo ser eliminado. Por favor intenta nuevamente', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>