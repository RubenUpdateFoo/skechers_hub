/*jslint browser: true, cap: false, confusion: true, continue: true, css: true, debug: false, devel: true, eqeq: true, evil: false, forin: false, fragment: true, maxerr: 3, newcap: false, plusplus: true, regexp: true, sloppy: true, sub: false, undef: false, unparam: true, vars: false, white: true */
/*globals $, document, webroot, sessionFlash, FB */

/*!
 * Panel de Administracion
 *
 * Andain, Desarrollo y Diseño Web
 * http://www.andain.cl/ <contacto@andain.cl>
 */

//<![CDATA[
$(document).ready(function()
{
	// -------------------- BORDER CORNER
	$('ul.menu li a, div.alerta, div.botones a, table.tabla, div.paginador span, div.previsualizar').corner('rounder 5px');


	// -------------------- SUBMIT DE FORMULARIOS
	$('input, select, option, optgroup, button').live(
	{
		keydown		: function(evento)
		{
			if ( evento.keyCode === 13 )
			{
				$(this).parents('form').submit();
			}
		},
		focus		: function()
		{
			$(this).next('.error-message').fadeOut(300, function()
			{
				$(this).remove();
			});
		}
	});
	$('.submit').live(
	{
		keydown	: function(evento)
		{
			if ( evento.keyCode === 13 )
			{
				$(this).parents('form').submit();
			}
			return false;
		},
		click	: function()
		{
			$(this).parents('form').submit();
			return false;
		}
	});


	// -------------------- SELECTS DE FECHAS
	$('select[name$="[year]"], select[name$="[day]"]').css('width', '80px');
	$('select[name$="[month]"]').css('width', '133px');


	// -------------------- MENU LATERAL
	$('ul.menu li a').click(function()
	{
		// COMPRUEBA SI HAY SUBMENU
		var link	= $(this).attr('href'),
			submenu	= $(this).next('ul'),

			// AL MOSTRAR UN SUBMENU, OCULTAR LOS DEMAS?
			unico	= true;

		// SI EL LINK ES HASH Y TIENE UN SUBMENU, LO MUESTRA U OCULTA
		if ( link === '#' && submenu )
		{
			$(this).next('ul').slideToggle();

			// COMPRUEBA SI EL MENU ACTUAL DEBE SER EL UNICO ABIERTO
			if ( unico )
			{
				$(this).parent().siblings().find('ul:visible').slideToggle();
			}

			// DETIENE LA EJECUCION DEL LINK
			return false;
		}
	})

	// MANTIENE ABIERTO EL MENU CORRESPONDIENTE AL MODULO ACTUAL
	.not('.current').next('ul').hide();


	// -------------------- MENSAJES DE SESION
	if ( typeof sessionFlash != 'undefined' )
	{
		var cuadroMensaje	= $('#session-flash'),
			mensaje			= $(sessionFlash).html(),
			tiempo			= 4,
			autoClose;
		cuadroMensaje.dialog(
		{
			title		: '<b>Mensaje de Sistema</b>',
			modal		: true,
			width		: 500,
			height		: 160,
			buttons		:
			{
				Aceptar		: function()
				{
					$(this).dialog('close');
					clearInterval(autoClose);
				}
			}
		}).html('<div style="text-align: center; margin-top: 20px;">' + mensaje + '</div>');
	
		cuadroMensaje.parent().find('.ui-dialog-buttonpane').prepend('<div class="auto-close">Cierre automatico en <span class="tiempo">' + tiempo + '</span>...</div>');
	
		autoClose	= setInterval(function()
		{
			cuadroMensaje.parent().find('.ui-dialog-buttonpane').find('.tiempo').html(--tiempo);
			if ( tiempo <= 0 )
			{
				clearInterval(autoClose);
				cuadroMensaje.dialog('close');
			}
		}, 1000);
	}
});
//]]>
