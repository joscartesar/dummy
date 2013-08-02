<?php
global $path_model;
include_once($path_model. '/rol_obj.php');

$user_add = new User;
unset($user_add->_id);
$user_add->set_username($_POST['username']);
$user_add->_save(sha1($_POST['password']));
$sql = "SELECT user_id FROM user WHERE username='". $_POST['username']."'";
$row = $db->fetch_row($sql);
$user_add->set_id($row['user_id']);
$rol = new Rol;
$rol->_load($_POST['rol_list']);
$rol->rol2user($user_add->get_id());

header('Location: http://dev.dummy.local/admin/users');
?>

