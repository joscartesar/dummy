<?php
include_once("model/user_obj.php");
include_once("model/rol_obj.php");

$user_edit = new User;
$user_edit->set_id($_POST['user_id']);
$user_edit->set_username($_POST['username']);
$user_edit->_save(sha1($_POST['password']));
$rol = new Rol;
$rol->_load($_POST['rol_list']);
$rol->unroluser($_POST['user_id']);
$rol->rol2user($_POST['user_id']);

header('Location: http://localhost/dummy/index.php?page=admin&flang=users');
?>

