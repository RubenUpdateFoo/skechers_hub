<?php
class UsuariosController extends AppController
{
	/*----- CODIGOS DE ERRORES------*/
	// 100 = ERROR DE VALIDACION
	// 101 = TOKEN INVALIDO
	// 102 = TOKEN INVALIDO 
  // 103 = TOKEN INVALIDO

	var $name = 'Usuarios';

  function app_ingresar_reporte()
  {

    Configure::write('debug',1);

    $this->loadModel('Reporte');

    $respuestas_vec = $this->params['form'];//recibimos array de gonzo

    $usuario_id = $respuestas_vec['usuario_id'];
    $latitud    = $respuestas_vec['latitud'];     
    $longitud   = $respuestas_vec['longitud'];
    $comentario = 'esto es un comentario 4'; 
    $local_id   = 2;

          $respuestas = array();
          foreach($respuestas_vec['respuestas'] as $resp)
          {
             $respuestas[] = $resp;
          
          }

                  $data = array('Reporte' => array(  'usuario_id' => $usuario_id,
                                                     'local_id'   => $local_id,
                                                     'comentario' => $comentario,
                                                     'latitud'    => $latitud,
                                                     'longitud'   => $longitud ));  
                   $this->Reporte->create();

                   if ( $this->Reporte->save($data) )
                   { 
                     $reporte_id = $this->Reporte->id;

                   if($this->guardarRespuestas($reporte_id, $respuestas))
                      {
                        die('reporte y respuestas guardados OK'); 
                      }
                  
                   }
                   else
                   {
                     die('ERROR: no se ha guardado el reporte');
                   }
  } //end function ingresar reporte






 //
 //id usuario, id pregunta, id respuesta
 //valor, pregunta_id 
  function guardarRespuestas($reporte_id,$respuestas)
  {
            //prx($_POST)        
            Configure::write('debug',1);        
            
            $this->loadModel('Respuesta');

            foreach($respuestas as $index => $respuesta)
            {
                     $respuestas[$index]['reporte_id'] = $reporte_id;
            }
            //prx($respuestas);
        
            if ( $this->Respuesta->saveAll($respuestas))
                  { 
                   die('datos ingresados OK'); 
                  }
            else
                  { 
                   die('ERROR no se han ingresado datos');
                  }
} 






function app_listar_preguntas(){
 
      Configure::write('debug',0);
      
      //$rut = '15959873-k';
      //$token= 'f349a423be60e8b5bd041cda70c4f0fe';

        $rut = $_POST['rut'];
        $token = $_POST['token'];

        $llave = 'LALA'.date('d-m-y');
        $verificador = md5($rut.$llave);

       if($token == $verificador){

            $listado = array();  
            $this->loadModel('Pregunta');
            $preguntas = $this->Pregunta->find('all',array('fields'=> array('Pregunta.id', 'Pregunta.nombre','Pregunta.tipo')));

                 foreach($preguntas as $pregunta)
                 {
                   $listado[$pregunta['Pregunta']['id']] = $pregunta['Pregunta'];
                   unset($listado[$pregunta['Pregunta']['id']]['id']);
                 }
                 //prx($listado);
                die(json_encode(array('Listado' => $listado)));

       }//end if
      else{
          die(json_encode(array('Error' => '103')));
          }

  }
 


   function app_logueo(){
        
      Configure::write('debug',1);
      //  header('Access-Control-Allow-Origin: *');
      //  header('Content-Type: text/javascript');

       $rut = $_POST['rut'];
  		 $clave = $_POST['clave'];
 
      // $rut = '1234';
      // $clave ='1234'; 

      // $rut = '15959873-k';
       //$clave ='1234'; 

   		$clave = $this->Auth->password($clave);

   		$usuario = $this->Usuario->find('first',array('fields'=>array('Usuario.id','Usuario.nombre','Usuario.rut'),
   			                                                           'conditions' => array('Usuario.rut' => $rut,
																                                                         'Usuario.password' => $clave)));
      

    
        $llave = 'LALA'.date('d-m-y');
        $token = md5($rut.$llave);
        
         if($usuario)
         {
	     	       die(json_encode(array('Usuario' => $usuario, 'Acceso' => 'OK','Token' => $token)));

         }else{
	     	       die(json_encode(array('Error' => '100')));
              }
    }



   function app_listar_centros(){
      
       // Configure::write('debug',1);
        // header('Access-Control-Allow-Origin: *');
        // header('Content-Type: text/javascript');

       // $rut = '15959873-k';
       // $token= '77d3fa392558b4c9dc74c3669ffbda33';
       $rut = $_POST['rut'];
       $token = $_POST['token'];

        $llave = 'LALA'.date('d-m-y');
        $verificador = md5($rut.$llave);
       
        if($token == $verificador){

        	$usuario = $this->Usuario->find('first',array('fields'=>array('Usuario.id','Usuario.nombre','Usuario.rut','Usuario.password'),
        		'conditions' => array('Usuario.rut'=>$rut),
        		'contain' => array('Local' => array('Centroscomercial'))			   
        ));

        	$locales = array();
        	if($usuario['Local'])
        	{   

        		foreach($usuario['Local'] as $local)
        		{   
        			$locales[$local['Centroscomercial']['id']] = $local['Centroscomercial']['nombre'];
        		} 
        	}
        	  die(json_encode(array('Locales' => $locales))); 

        } //end if
        else{
        	die(json_encode(array('Error' => '101')));
        }
    }



function app_listar_locales(){
     
        Configure::write('debug',0);

          $rut = $_POST['rut'];
          $centrocomercial_id = $_POST['centrocomercial_id'];
          $token = $_POST['token'];

        // $rut = '15959873-k';
        // $token= '77d3fa392558b4c9dc74c3669ffbda33';
        // $centrocomercial_id = 3;

        $llave = 'LALA'.date('d-m-y');
        $verificador = md5($rut.$llave);

        if($token == $verificador){
      
                      $usuario = $this->Usuario->find('first',array('fields'=>array('Usuario.id'),
        	           'conditions' => array('Usuario.rut' => $rut),
			               'contain' => array('Local' => array('conditions' => array('Local.centroscomercial_id' => $centrocomercial_id),
			               'Tienda'))
			                ));  

        $locales = array();
        if($usuario['Local']) 
        { 
        	       foreach($usuario['Local'] as $local)
        	      {                     
                  $locales[$local['id']] = $local['nombre'];
                }//end foreach 

        }
        die(json_encode(array('Locales' => $locales))); 

        } //end if
        else{die(json_encode(array('Error' => '102')));}

       }//end function

//_________________________________________________________________________________________




/*FUNCION DE PRUEBAS*/
function app_foo(){
        Configure::write('debug',1);

        //$con = $this->Usuario->find('all');
        //$con = $this->Usuario->find('all',array('fields'=> array('Usuario.nombre')));

        /*$con = $this->Usuario->find('all',array('fields'=> array('Usuario.nombre'),
	                             'conditions'=> array('Usuario.id' => array(1,2,3,4))
	                             )); */

        /*  //condicional mayor o menor que
        $con = $this->Usuario->find('all',array('fields'=> array('Usuario.id','Usuario.nombre'),
	                             'conditions'=> array('Usuario.id >=' => 3)
	                             ));
        */
      
     
        // $con = $this->Usuario->find('all',array('fields'=> array('Usuario.id','Usuario.nombre'),
	       //                       'conditions'=> array('Usuario.id >=' => 3,'Usuario.id <=' => 4),
	       //                       'order' => array('Usuario.id' => 'DESC') 
	       //                       ));
        // prx($con);

        
        
       // $rut = '15959873-k';
       // $usuario = $this->Usuario->find('first',array('conditions' => array('Usuario.rut' => $rut),
			  //                                            'contain' => array('Local'=> array('fields'=>array('Local.nombre')))
       //                                               ));

     
      
      //prx($usuario);


 //  $usuario = $this->Usuario->find('first',array('fields'=>array('Usuario.id','Usuario.nombre','Usuario.rut','Usuario.password'),
 // 'conditions' => array('Usuario.rut'=>$rut),
 // 'contain' => array('Local' => array('Centroscomercial'))   





}




















	function admin_login() { }

	function admin_logout()
	{
		$this->Session->delete("Auth.{$this->Auth->userModel}");
		$this->redirect($this->Auth->logout());
	}

	function admin_index()
	{
		$this->Usuario->recursive = 0;
		$this->set('usuarios', $this->paginate());
	}

	function admin_view($id = null)
	{
		// $id = id del usuario
		if ( ! $id )
		{
			$this->Session->setFlash(__('Registro inválido', true));
			$this->redirect(array('action' => 'index'));
		}
	
        /* consulta con join cake style */
		$usuario = $this->Usuario->find('first',array('conditions' => array('Usuario.id' => $id),
			                                          'contain' => array('Local')));
   	    $this->set(compact('usuario'));
	}



	function admin_add()
	{
		if ( ! empty($this->data) ) //lo que viene del formulario
		{

			//prx($this->data);
            $clave = $this->Auth->password($this->data['Usuario']['password']);
            $this->data['Usuario']['password'] = $clave;

			$this->Usuario->create();
			if ( $this->Usuario->save($this->data) )
			{
				$this->Session->setFlash(__('Registro guardado correctamente', true));
				$this->redirect(array('action' => 'index'));
			}

			else
			{
				$this->Session->setFlash(__('El registro no pudo ser guardado. Por favor intenta nuevamente', true));
			}
		}

		$locales = $this->Usuario->Local->find('list');
		$this->set(compact('locales'));

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
			$clave = $this->Auth->password($this->data['Usuario']['password']);
            $this->data['Usuario']['password'] = $clave;

			if ( $this->Usuario->save($this->data) )
			{
				$this->Session->setFlash(__('Registro guardado correctamente', true));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(__('El registro no pudo ser guardado. Por favor intenta nuevamente', true));
			}
		}


		if ( empty($this->data) ) //para llenar formulario y editar incluido los checkbox
		{
			$this->data = $this->Usuario->find('first',array('conditions' => array('Usuario.id' => $id),
															 'contain' => array('Local')));
			unset($this->data['Usuario']['password']); //para borrar campo del input
		}


     	$locales = $this->Usuario->Local->find('list');
		$this->set(compact('locales'));

	}

	function admin_delete($id = null)
	{
		if ( ! $id )
		{
			$this->Session->setFlash(__('Registro inválido', true));
			$this->redirect(array('action' => 'index'));
		}
		if ( $this->Usuario->delete($id) )
		{
			$this->Session->setFlash(__('Registro eliminado', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El registro no pudo ser eliminado. Por favor intenta nuevamente', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>