<div class="wrap">
    <h1><?= esc_html(get_admin_page_title()); ?></h1>
    <?php 
    	settings_errors(); 
    ?>
    <form method="post" action="options.php">
    	<?php 
	    	settings_fields('xsight_smsotp_setting');
	    	do_settings_sections( 'telkom_xsight_smsotp_setting' );
    		submit_button("Save Setting");
    	?>
    </form>
</div>