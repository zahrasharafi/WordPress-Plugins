<?php
/*
* Plugin Name: Change Logo
* Description: Change your WordPress login page logo with this 
* Version: 1.0.0
* Author: Zahra Sharafi
* Text Domain: cs_logo
* License : GPL2
*/
if (!defined('WPINC')) {
die;
}
add_action('admin_menu','add_new_menu');

function add_new_menu() {
add_menu_page('Custom Logo','Custom Logo','manage_options','custom_logo','custom_logo_page','dashiicons-art',6);
}
function custom_logo_page()
{
if (!current_user_can('upload_files'))
{
wp_die('You can not change the logo.'));
return;
}
logo_upload_handle();
?>
<h2> Upload your logo here</h2>
<p>You can change WordPress login logo from here:</p>
<form method="post" enctype="multipart/form-data">
<input type="file" id="upload_logo" name="upload logo"/>
<?php submit_button('Upload') ?>
</form>
<?php
}
function logo_upload_handle()
{
if (isset($_FILES['upload_logo']))
{
$logo = $_FILES['upload_logo'];
$uploaded = media_handle_upload('upload_logo',0);
if(is_wp_error($uploaded))
{
echo "Error uploading file:".$uploaded -> get_error_message();
}
else
{
echo "File upload successful!";
}
}
}
function my_login_logo()
{
$uploaded_logo = get_post($id);
?>
<style type="text/css">
h1 a {
background-image: url() !important;
padding-bottom: 30px;
</style>
<?php
}
add_action('login-head','my_login_logo');
?>

