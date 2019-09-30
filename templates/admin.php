<div class="wrap">
    <h1>Плъгин Турбини</h1>
    <?php settings_errors(); ?>

    <form method="post" action="options.php">
        <?php  
            settings_fields( 'turbines_options_group' );
            do_settings_sections( 'turbines_plugin' );
            submit_button();
        ?>
    </form>
</div>