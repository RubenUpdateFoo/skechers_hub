<?php
/**
 * As of 1.3, additional rules for the inflector are added below
 *
 * Inflector::rules('singular', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 * Inflector::rules('plural', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 *
 */

// INFLECCIONES EN ESPAÑOL
Inflector::rules('singular',	array('rules'			=> array('/(categoria)s$/i'				=> '\1',
																 '/(padre)s$/i'					=> '\1',
																 '/(banner)s$/i'				=> '\1',

																 '/([r|d|j|n|l|m|y|z])es$/i'	=> '\1',
																 '/as$/i'						=> 'a',
																 '/([ti])a$/i'					=> '\1a'),
									  'irregular'		=> array(),
									  'uninflected'		=> array()
									  )
				 );

Inflector::rules('plural',		array('rules'			=> array('/(categoria)$/i'				=> '\1s',
																 '/(padre)$/i'					=> '\1s',
																 '/(banner)$/i'					=> '\1',

																 '/([r|d|j|n|l|m|y|z])$/i'		=> '\1es',
																 '/a$/i'						=> '\1as'),
									  'irregular'		=> array(),
									  'uninflected'		=> array()
									  )
				 );
