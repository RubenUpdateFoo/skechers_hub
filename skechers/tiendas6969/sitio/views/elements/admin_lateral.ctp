<ul class="menu">
	<?
	// MODULOS
	// Vemos a cual paleta corresponde nuestro submenu y desplegamos la lista de opciones
	if ( isset($vinculos) && ! empty($vinculos) )
	{
		foreach ( $vinculos as $key => $modkeys )
			foreach ( $modkeys as $eachmod => $mods )
				if ( in_array($this->params['controller'], $mods) )
					$activo = $eachmod;

		if ( isset($activo) )
			$modulos = $modkeys[$activo];
	}
	else
	{
		$controllers = App::objects('controller');
		foreach ( $controllers as $controller )
		{
			$human = Inflector::humanize(Inflector::underscore($controller));
			$exclusiones = array('App','Pages');
			if ( ! in_array($controller,$exclusiones) )
				$modulos[$human] = $controller;
		}
	}

    if (isset($modulos)){
        foreach ($modulos as $nombre => $controlador){
            echo "<li>";

            if ($this->params['controller']==$controlador){
                echo $html->link($nombre,'#',array('rel' => $controlador,'class' => 'current'));
            }else{
                echo $html->link($nombre,'#',array('rel' => $controlador,'class' => ''));
            }

            //Obtenemos todas las acciones para admin del controlador
             if ($controlador != 'App') {
                App::import('Controller', $controlador);
                $className = $controlador . 'Controller';
                $actions = get_class_methods($className);
                if (is_array($actions)){
                    foreach($actions as $k => $v) {
                        if ($v{0} == '_') {
                            unset($actions[$k]);
                        }
                        if (substr($v,0,6) != 'admin_'){
                            unset($actions[$k]);
                        }
                        if (array_search($v,array('','admin_add','admin_view','admin_index','admin_delete','admin_edit'))){
                            unset($actions[$k]);
                        }
                    }
                }
                $parentActions = get_class_methods('AppController');
                if (is_array($actions)){
                    $acciones[$controlador] = array_diff($actions, $parentActions);
                }
            }

            //Mostramos los links de cada vista
            echo "<ul>";
            if (($this->action == 'admin_view') && ($this->params['controller']==$controlador)){
                echo "<li>";
                echo $html->link(__('Editar '.Inflector::singularize($nombre),true),array('action' => 'edit', $this->params['pass'][0]));
                echo "</li>";
                echo "<li>";
                echo $html->link(__('Eliminar '.Inflector::singularize($nombre), true),array('action' => 'delete', $this->params['pass'][0]),
                                          null, sprintf(__('Deseas eliminar # %s?', true), $this->params['pass'][0]));
                echo "</li>";
            }
            if (($this->action == 'admin_edit')  && ($this->params['controller']==$controlador)){
                echo "<li>";
                echo $html->link(__('Eliminar '.Inflector::singularize($nombre), true),array('action' => 'delete',  $this->params['pass'][0]),
                                          null, sprintf(__('Deseas eliminar # %s?', true),  $this->params['pass'][0]));
                echo "</li>";
            }
            echo "<li>";
            echo $html->link(__('Agregar',true).' '.$nombre,array('controller' => $controlador,'action' => 'add'));
            echo "</li>";
            echo "<li>";
            echo $html->link(__('Listar',true).' '.$nombre,array('controller' => $controlador,'action' => 'index'));
            echo "</li>";
            //Agregamos las acciones acidionales del controlador
			if (isset($acciones[$controlador]) )
			{
				foreach ($acciones[$controlador] as $accion){
						echo "<li>";
						echo $html->link(Inflector::humanize(substr($accion,6)),array('controller' => $controlador,'action' => $accion));
						echo "</li>";
				}
			}
            echo "</ul></li>";
        }
    }
?>
</ul>

<script type="text/javascript">
$(document).ready(function()
{
	// ABRE EL MENU ACTIVO
	//$('ul.menu li a[rel="<?= $this->params['controller']; ?>"]').next().show();
});
</script>
