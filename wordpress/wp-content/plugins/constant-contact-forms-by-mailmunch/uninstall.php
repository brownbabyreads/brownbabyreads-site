<?php
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) 
    exit();

delete_option("cc_mm_data");
delete_option("cc_mm_user_email");
delete_option("cc_mm_user_password");
delete_option("cc_mm_guest_user");
?>
