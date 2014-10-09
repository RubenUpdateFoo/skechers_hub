<?php
class AdministradoresController extends AppController
{
	var $name = 'Administradores';

	

    function admin_ver_reportes($fecha =  null, $local = null, $usuario = null){
    

    //administradores/ver_reportes?fecha=2014-10-08&usuario=1&local=2
		     Configure::write('debug',0);
		    // prx($this->params['url']);
		     $this->loadModel('Reporte');
		     
		  //    $conditions = null;
		  //    $id_user = 1;
		 	// 	if($fecha !== null ){
				// 	$conditions[] = array('Reporte.created >=' => $fecha.' 00:00:00');
				// }
				// if($usuario !== null){
				// 	$conditions[] = array('Reporte.usuario_id' => $usuario);
				// }
				// if($local !== null){
				// 	$conditions[] = array('Reporte.local_id' => $local);
				// }

		  //    prx($conditions);
            // $fecha = '2014-10-07 17:00:25'
		    $fecha = null; $usuario =null; $local = null;


			if(isset($fecha) && isset($usuario) && isset($local) )
			{
				$conditions =array('Reporte.usuario_id'=>$usuario,
					                'Reporte.local_id' => $local,
									'Reporte.created' => $fecha );	
			}
			elseif($fecha == null && isset($usuario) && isset($local))
			{
				$conditions = array('Reporte.usuario_id'=>$usuario,'Reporte.local_id'=>$local); 
				               	 
			}
			elseif($fecha == null && $usuario == null && isset($local))
			{
				$conditions = array('or'=>array(array('Reporte.local_id'=>$local)
						                     ),
				               );	         	 
			}
			elseif($usuario == null && isset($fecha) && $local == null)
			{
				$conditions = array('or'=>array(array('Reporte.created'=>$fecha)
						                     ),
				               );	         	 
			}
			elseif(isset($usuario) && isset($fecha) && $local == null)
			{
				$conditions = array('or'=>array(array('Reporte.created'=>$fecha),
					                            array('Reporte.usuario_id' => $usuario)
						                     ),
				               );	         	 
			}	
			elseif(isset($local) && isset($fecha) && $usuario == null)
			{
				$conditions = array('or'=>array(array('Reporte.created'=>$fecha),
					                            array('Local.usuario_id' => $local)
						                     ),
				               );	         	 
			}

			elseif($local == null && $fecha == null && isset($usuario))
			{
				$conditions = array('or'=>array(array('Reporte.usuario_id'=>$usuario)
						                     ),
				               );	         	 
			}
			elseif(isset($usuario) && $fecha == null && isset($local))
			{
				$conditions = array('or'=>array(array('Reporte.local_id'=>$local),
					                           array('Reporte.usuario_id' => $usuario)
						                     ),
				               );	         	 
			}

 

			$consulta = $this->Reporte->find('all', array('limit' => 20,
														  'contain' => array('Usuario' => array('fields' => array('Usuario.nombre')
														  										),
														  					 'Local'  => array('fields' => array('Local.nombre')
														  					 				  )
														  					),
														  'fields' => array('Reporte.id', 'Reporte.usuario_id', 'Reporte.created'),
														  'conditions' => $conditions
														  )
											);

				if($fecha == null && $usuario == null && $local == null )
			   {
			       $consulta = $this->Reporte->find('all', array('limit' => 20,
														  'contain' => array('Usuario' => array('fields' => array('Usuario.nombre')
														  										),
														  					 'Local'  => array('fields' => array('Local.nombre')
														  					 				  )
														  					),
														  'fields' => array('Reporte.id', 'Reporte.usuario_id', 'Reporte.created')
														  )
											      );
			   }



			
				$this->set(compact('consulta'));


     }//end function


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