<h1>Learning Sidebar Options</h1>
<?php settings_errors(); ?>

<?php 
    $picture = esc_attr(get_option( 'profile_picture' ));

    $firstName = esc_attr(get_option('first_name'));
    $lastName = esc_attr(get_option('last_name'));
    $name = $firstName . ' ' . $lastName;

    $description = esc_attr(get_option('user_description'));

?>
<div class="infos">
    <section class="sidebar-preview">
        <section class="sidebar">
            <div class="image-container">
                <div class="profile-picture">
                    <div id="profile-picture-preview" class="profile-picture" style="background-image: url(<?php print $picture; ?>);"></div>
                </div>
            </div>
            <h1 class="username"><?php print $name; ?></h1>
            <h3 class="description"><?php print $description; ?></h3>
            <div class="icons">

            </div>

        </section>
    </section>

    <form method="post" action="options.php" class="general-form">
        <?php settings_fields( 'learning-settings-group' ); ?>
        <?php do_settings_sections( 'learning_template' ); ?>
        <?php submit_button(); ?>
    </form>
</div>
