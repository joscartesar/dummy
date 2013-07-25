<?php
include_once("model/db.php");
include_once("model/user_obj.php");
include_once("model/rol_obj.php");
include_once("utils.php");

//pr2($_POST);
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

header('Location: http://localhost/dummy/index.php?page=admin&flang=users');
?>

