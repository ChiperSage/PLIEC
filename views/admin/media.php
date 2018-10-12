<!-- jQuery and jQuery UI (REQUIRED) -->
<link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<!-- elFinder CSS (REQUIRED) -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>upload/css/elfinder.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>upload/css/theme.css">

<!-- elFinder JS (REQUIRED) -->
<script src="<?php echo base_url() ?>upload/js/elfinder.min.js"></script>

<!-- elFinder translation (OPTIONAL) -->
<script src="<?php echo base_url() ?>upload/js/i18n/elfinder.ru.js"></script>

<!-- elFinder initialization (REQUIRED) -->
<script type="text/javascript" charset="utf-8">
// Documentation for client options:
// https://github.com/Studio-42/elFinder/wiki/Client-configuration-options

$(document).ready(function() {
	$('#elfinder').elfinder({
	url : '<?php echo base_url() ?>upload/php/connector.minimal.php'  // connector URL (REQUIRED)
	// , lang: 'ru'                    // language (OPTIONAL)
	});
});
</script>

		<h3>Upload</h3>

		<!-- Element where elFinder will be created (REQUIRED) -->
		<div id="elfinder"></div>

