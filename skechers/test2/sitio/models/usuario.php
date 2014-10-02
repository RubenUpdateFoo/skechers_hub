<?php
class Usuario extends AppModel
{
	// CONFIGURACION DB
	var $name			= 'Usuario';

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
	var $validate = array(
		'rut' => array(
			'notempty' => array(
				'rule'			=> array('notempty'),
				'last'			=> true,
				//'message'		=> 'Mensaje de validación personalizado',
				//'allowEmpty'	=> true,
				//'required'		=> false,
				//'on'			=> 'update', // Solo valida en operaciones de 'create' o 'update'
			),
		),
		'password' => array(
			'notempty' => array(
				'rule'			=> array('notempty'),
				'last'			=> true,
				//'message'		=> 'Mensaje de validación personalizado',
				//'allowEmpty'	=> true,
				//'required'		=> false,
				//'on'			=> 'update', // Solo valida en operaciones de 'create' o 'update'
			),
		),
		'nombre' => array(
			'notempty' => array(
				'rule'			=> array('notempty'),
				'last'			=> true,
				//'message'		=> 'Mensaje de validación personalizado',
				//'allowEmpty'	=> true,
				//'required'		=> false,
				//'on'			=> 'update', // Solo valida en operaciones de 'create' o 'update'
			),
		),
		'fono' => array(
			'notempty' => array(
				'rule'			=> array('notempty'),
				'last'			=> true,
				//'message'		=> 'Mensaje de validación personalizado',
				//'allowEmpty'	=> true,
				//'required'		=> false,
				//'on'			=> 'update', // Solo valida en operaciones de 'create' o 'update'
			),
		),
		'email' => array(
			'email' => array(
				'rule'			=> array('email'),
				'last'			=> true,
				//'message'		=> 'Mensaje de validación personalizado',
				//'allowEmpty'	=> true,
				//'required'		=> false,
				//'on'			=> 'update', // Solo valida en operaciones de 'create' o 'update'
			),
		),
	);

	// ASOCIACIONES
	var $hasMany = array(
		'Localesusuario' => array(
			'className'				=> 'Localesusuario',
			'foreignKey'			=> 'usuario_id',
			'dependent'				=> false,
			'conditions'			=> '',
			'fields'				=> '',
			'order'					=> '',
			'limit'					=> '',
			'offset'				=> '',
			'exclusive'				=> '',
			'finderQuery'			=> '',
			'counterQuery'			=> ''
		),
		'Reporte' => array(
			'className'				=> 'Reporte',
			'foreignKey'			=> 'usuario_id',
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