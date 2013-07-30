<?php
include_once("model/rol_obj.php");

$rol = new Rol;
$rol->_load($_GET['rol_id']);

render("edit_rol_form");
?>
