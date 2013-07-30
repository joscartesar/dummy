<?php
include_once("model/rol_obj.php");

$rol = new Rol;
$rol->set_rol_name($_POST['name']);
$rol->_save();

header('Location: http://localhost/dummy/index.php?page=admin&flang=roles');
?>
