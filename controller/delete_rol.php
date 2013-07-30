<?php
include_once("model/rol_obj.php");

$rol = new Rol;
$rol->set_rol_id($_POST['rol_id']);
$rol->_delete();

header('Location: http://localhost/dummy/index.php?page=admin&flang=roles');
?>
