<?php
class ReportesController extends AppController
{
	var $name = 'Reportes';

	function admin_index()
	{
		$this->Reporte->recursive = 0;
		$this->set('reportes', $this->paginate());
	}

	function admin_view($id = null)
	{
		if ( ! $id )
		{
			$this->Session->setFlash(__('Registro inválido', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('reporte', $this->Reporte->read(null, $id));
	}

	function admin_add()
	{
		if ( ! empty($this->data) )
		{
			$this->Reporte->create();
			if ( $this->Reporte->save($this->data) )
			{
				$this->Session->setFlash(__('Registro guardado correctamente', true));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(__('El registro no pudo ser guardado. Por favor intenta nuevamente', true));
			}
		}
		$fotos = $this->Reporte->Foto->find('list');
		$usuarios = $this->Reporte->Usuario->find('list');
		$respuestas = $this->Reporte->Respuestum->find('list');
		$locales = $this->Reporte->Local->find('list');
		$this->set(compact('fotos', 'usuarios', 'respuestas', 'locales'));
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
			if ( $this->Reporte->save($this->data) )
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
			$this->data = $this->Reporte->read(null, $id);
		}
		$fotos = $this->Reporte->Foto->find('list');
		$usuarios = $this->Reporte->Usuario->find('list');
		$respuestas = $this->Reporte->Respuestum->find('list');
		$locales = $this->Reporte->Local->find('list');
		$this->set(compact('fotos', 'usuarios', 'respuestas', 'locales'));
	}

	function admin_delete($id = null)
	{
		if ( ! $id )
		{
			$this->Session->setFlash(__('Registro inválido', true));
			$this->redirect(array('action' => 'index'));
		}
		if ( $this->Reporte->delete($id) )
		{
			$this->Session->setFlash(__('Registro eliminado', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El registro no pudo ser eliminado. Por favor intenta nuevamente', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>