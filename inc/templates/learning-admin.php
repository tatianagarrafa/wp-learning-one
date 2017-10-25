<h1>Learning Theme Options</h1>
<?php settings_errors(); ?>
<form method="post" action="options.php">
	<?php settings_fields( 'learning-settings-group' ); ?>
	<?php do_settings_sections( 'learning_template' ); ?>
	<?php submit_button(); ?>
</form>