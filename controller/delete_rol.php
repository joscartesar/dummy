<?php
global $path_model;
include_once('/var/www/dummy/model/rol_obj.php');

$rol = new Rol;
$rol->set_rol_id($_POST['rol_id']);
$rol->_delete();

header('Location: http://dev.dummy.local/admin/roles');
?>
