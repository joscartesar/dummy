<?php
global $path_model;
include_once($path_model. "/rol_obj.php");

$rol = new Rol;
$rol->set_rol_id($_POST['rol_id']);
$rol->set_rol_name($_POST['name']);
$rol->_save();

header('Location: http://dev.dummy.local/admin/roles');
?>
