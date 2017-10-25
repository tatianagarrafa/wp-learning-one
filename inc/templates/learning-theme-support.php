<h1>Learning Theme Support</h1>
<?php settings_errors(); ?>

<?php 
   // $picture = esc_attr(get_option( 'profile_picture' ));

?>
<div class="infos">

    <form method="post" action="options.php" class="general-form">
        <?php settings_fields( 'learning-theme-support' ); ?>
        <?php do_settings_sections( 'learning_template_theme' ); ?>
        <?php submit_button(); ?>
    </form>
</div>
