<?php
class UsuariosController extends AppController
{
  /*----- CODIGOS DE ERRORES------*/
  // 100 = ERROR DE VALIDACION
  // 101 = TOKEN INVALIDO
  // 102 = TOKEN INVALIDO 
  // 103 = TOKEN INVALIDO
  // 105 = CODIGO VACIO  
  var $name = 'Usuarios';


  function app_ingresar_reporte()
  {
    Configure::write('debug',1);
    
     // $rut = $_POST['rut'];
     // $token = $_POST['token'];
     // $llave = 'LALA'.date('d-m-y');
     // $verificador = md5($rut.$llave);
    // if($token == $verificador)
    // {
    $respuestas_vec = $this->params['form'];//recibimos array de gonzo
    $usuario_id     = $respuestas_vec['usuario_id'];
    $latitud        = $respuestas_vec['latitud'];     
    $longitud       = $respuestas_vec['longitud'];
    $comentario     = 'esto es un comentario 4'; 
    $local_id       = 2; //corregir/setiar
    $foto_base      = 'hola mundo';

    
    $test_stock = $this->params['form']['productos'];
    // $test_stock = array('producto_id' => 5,
    //                     'cantidad'    =>  69);
    //prx($this->params['form']);

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
           $this->Usuario->Reporte->create();

           if ( $this->Usuario->Reporte->save($data) )
           { 
             $reporte_id = $this->Usuario->Reporte->id;
            // prx($reporte_id);

           if($this->guardarRespuestas($reporte_id, $respuestas))
              {
               // prx($reporte_id);
               json_encode(array('reporte y respuestas guardados OK'));
              // echo('reporte y respuestas guardados OK'); 
              }
            if($this->guardarFoto($reporte_id,$foto_base))
              {
               // echo('Foto guardada OK');
                json_encode(array('Foto guardada OK')); 
              }
             if($this->guardarStock($reporte_id,$test_stock))
              {
                //die('Stock guardado OK'); 
                json_encode(array('Stock guardado OK')); 
              }          
           }
           else
           {
             die('ERROR: no se ha guardado el reporte');
           }

       /*  } //end if verificador
          else{
             die(json_encode(array('Error' => '103')));
             }  */

  } //end function ingresar reporte



  function guardarRespuestas($reporte_id,$respuestas)
  {

            //prx($_POST)        
            Configure::write('debug',0);                
  
            foreach($respuestas as $index => $respuesta)
            {
                  $respuestas[$index]['reporte_id'] = $reporte_id;
            }
        
            if ( $this->Usuario->Reporte->Respuesta->saveAll($respuestas))
                  { 
                   //echo('datos ingresados OK °°'); 
                   json_encode(array('Respuestas guardado OK'));
                  }
            else
                  { 
                   die('ERROR no se han ingresado datos');
                  }
} 



  function guardarFoto($reporte_id,$base)
  {
      Configure::write('debug',0);   
     // $reporte_id = 3;   
      //$base = 'Este es un string';
      $comentario ='este es un comentario de la  foto';

      $base_foto = base64_encode($base);

            $test1 = array('reporte_id'    =>  $reporte_id,
                            'nombre'       =>  $base_foto,
                            'comentarios'  =>  $comentario) ;

            if ( $this->Usuario->Reporte->Foto->saveAll($test1))
                  { 
                   //echo('Fotos ingresadas OK'); 
                   json_encode(array('Fotos ingresadas OK'));
                  }
            else
                  { 
                   die('ERROR no se han ingresado datos');
                  }
} 


  function guardarStock($reporte_id,$test)
  {
    Configure::write('debug',0); 

            foreach($test as $index => $respuesta)
            {
                  $test[$index]['reporte_id'] = $reporte_id;
            }

            if ( $this->Usuario->Reporte->Stock->saveAll($test))
                  { 
                   die('Stock guardados OK'); 
                  }
            else
                  { 
                   die('ERROR no se han ingresado datos');
                  }

  }

  function app_buscar_producto()
  {
   Configure::write('debug',0);
   // $codigo = '902';
   // $rut = '1234';
   // $token= 'f23e5ba2c7ea683ba4937cd30767b404';
   $rut = $this->params['form']['rut'];
   $token = $this->params['form']['token'];
   $codigo = $this->params['form']['codigo'];
      // prx($this->params['form']);
   $llave = 'LALA'.date('d-m-y');
   $verificador = md5($rut.$llave);

   if($token == $verificador)
   {
    if($codigo=='')
    { 
      die(json_encode(array('Error' => '105')));
    }
    else
       {
  
     $productos = $this->Usuario->Reporte->Stock->Producto->find('all',array('fields'=> array('Producto.id','Producto.codigo','Producto.nombre','Producto.precio'),
       'conditions'=> array('Producto.codigo LIKE' => '%'.$codigo.'%')                           
       ));
     die(json_encode(array('Producto' => $productos))); 
        }//end else
    } //end if 27
     else
        {
          die(json_encode(array('Error' => '101')));
        }
 //prx($connection);
  }


function app_listar_preguntas(){
 
      Configure::write('debug',1);
      
      // $rut = '1234';
      // $token= 'f23e5ba2c7ea683ba4937cd30767b404';

        // $rut = $_POST['rut'];
        // $token = $_POST['token'];

         $rut = $this->params['form']['rut'];
         $token = $this->params['form']['token'];
        
        $llave = 'LALA'.date('d-m-y');
        $verificador = md5($rut.$llave);

       
       if($token == $verificador){

            $listado = array();  
            $preguntas = $this->Usuario->Reporte->Respuesta->Pregunta->find('all',array('fields'=> array('Pregunta.id', 'Pregunta.nombre','Pregunta.tipo')));

               //  prx($preguntas);
                 foreach($preguntas as $pregunta)
                 {
                   $listado[$pregunta['Pregunta']['id']] = $pregunta['Pregunta'];
                   unset($listado[$pregunta['Pregunta']['id']]['id']);
                 }
         
                die(json_encode(array('Listado' => $listado)));
 
         }//end if
       else{
               die(json_encode(array('Error' => '103')));
           }

  }
 


   function app_logueo(){
      Configure::write('debug',0);
      //  header('Access-Control-Allow-Origin: *');
      //  header('Content-Type: text/javascript');

       $rut = $this->params['form']['rut'];
       $clave = $this->params['form']['clave'];
     //  prx($this->params);  
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
      
        Configure::write('debug',1);
        // header('Access-Control-Allow-Origin: *');
        // header('Content-Type: text/javascript');

       // $rut = '15959873-k';
       // $token= '77d3fa392558b4c9dc74c3669ffbda33';

       $rut = $this->params['form']['rut'];
       $token = $this->params['form']['token'];

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

          // $rut = $_POST['rut'];
          // $centrocomercial_id = $_POST['centrocomercial_id'];
          // $token = $_POST['token'];

       $rut = $this->params['form']['rut'];
       $token = $this->params['form']['token'];
       $centrocomercial_id = $this->params['form']['centrocomercial_id'];

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