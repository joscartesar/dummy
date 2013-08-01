<?php
global $path_model;
include_once($path_model. "/user_obj.php");

$users = $user->_load_all();
render("admin_user");
?>
