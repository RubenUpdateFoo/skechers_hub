<?php
class Producto extends AppModel
{
	// CONFIGURACION DB
	var $name			= 'Producto';
	var $displayField	= 'nombre';

	// BEHAVIORS
	/*
	var $actsAs			= array(// SLUGS
								'Sluggable'	=> array('label' => 'nombre', 'overwrite' => true, 'length' => 120, 'translation' => 'utf-8'),

								// IMAGE UPLOAD
								'Image'		=> array('fields' =>
													 array('imagen' => array('versions' => array(array('prefix'	=> 'mini',
																									   'width'	=> '200',
																									   'height'	=> '200',
																									   'crop'	=> true
																									   )
																								 ),
																			 'image_types'	=> array('jpg', 'jpeg', 'gif', 'png')
																			 )
														   )
													 )
								);
	*/

	// VALIDACIONES

	// ASOCIACIONES
	var $belongsTo = array(
		'Categoria' => array(
			'className'				=> 'Categoria',
			'foreignKey'			=> 'categoria_id',
			'conditions'			=> '',
			'fields'				=> '',
			'order'					=> '',
			'counterCache'			=> false,
			'counterScope'			=> array('Asociado.modelo' => 'Categoria')
		),
		'Coleccion' => array(
			'className'				=> 'Coleccion',
			'foreignKey'			=> 'coleccion_id',
			'conditions'			=> '',
			'fields'				=> '',
			'order'					=> '',
			'counterCache'			=> false,
			'counterScope'			=> array('Asociado.modelo' => 'Coleccion')
		),
		'Color' => array(
			'className'				=> 'Color',
			'foreignKey'			=> 'color_id',
			'conditions'			=> '',
			'fields'				=> '',
			'order'					=> '',
			'counterCache'			=> false,
			'counterScope'			=> array('Asociado.modelo' => 'Color')
		),
		'Color2' => array(
			'className'				=> 'Color2',
			'foreignKey'			=> 'color2_id',
			'conditions'			=> '',
			'fields'				=> '',
			'order'					=> '',
			'counterCache'			=> false,
			'counterScope'			=> array('Asociado.modelo' => 'Color2')
		),
		'Descripcion' => array(
			'className'				=> 'Descripcion',
			'foreignKey'			=> 'descripcion_id',
			'conditions'			=> '',
			'fields'				=> '',
			'order'					=> '',
			'counterCache'			=> false,
			'counterScope'			=> array('Asociado.modelo' => 'Descripcion')
		)
	);
	var $hasMany = array(
		'Stock' => array(
			'className'				=> 'Stock',
			'foreignKey'			=> 'producto_id',
			'dependent'				=> false,
			'conditions'			=> '',
			'fields'				=> '',
			'order'					=> '',
			'limit'					=> '',
			'offset'				=> '',
			'exclusive'				=> '',
			'finderQuery'			=> '',
			'counterQuery'			=> ''
		)
	);
}
?>