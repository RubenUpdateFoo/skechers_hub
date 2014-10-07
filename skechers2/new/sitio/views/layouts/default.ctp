<?= $this->Html->docType('xhtml-trans'); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?= $this->Html->charset(); ?>
		<?= $this->Html->tag('title', "Andain | Desarrollo y Diseño Web"); ?>
		<?= $this->Html->meta('icon'); ?>

		<!-- HOJAS DE ESTILO -->
		<?= $this->Html->css('andain-home'); ?>

		<!-- ARCHIVOS JAVASCRIPT -->
		<?= $this->Html->scriptBlock("var webroot = '{$this->webroot}';"); ?>
		<?= $this->Html->script('www.andain.cl-jquery-1.6.2.min'); ?>
		<?= $this->Html->script('www.andain.cl-jquery.tmpl.min'); ?>
		<?= $this->Html->script('www.andain.cl-funciones'); ?>
		<?= $scripts_for_layout; ?>
	</head>
	<body>
		<?= $content_for_layout; ?>
	</body>
</html>
