<h1>Плъгин Турбини</h1>
<p><?php echo PLUGIN; ?></p><br/>
<p><?php echo PLUGIN_PATH; ?></p><br/>
<p><?php echo PLUGIN_URL; ?></p><br/>
<p><?php $current_user = wp_get_current_user(); echo $current_user->user_login; ?></p><br/>
<p><?php $current_user = wp_get_current_user(); echo $current_user->user_email; ?></p><br/>
<p><?php $current_user = wp_get_current_user(); echo $current_user->display_name; ?></p><br/>
<p><?php $current_user = wp_get_current_user(); echo $current_user->ID; ?></p><br/>