<?php
global $path_model;
include_once($path_model. "/rol_obj.php");

$rol = new Rol;
$rol->_load($_GET['id']);

$b_content = array(
  'username' => $user->get_username(),
);

$content = array(
  'rol' => $rol,
  'block_header' => render('block', 'header', $b_content),
  'block_menu' => render('block', 'menu'),
);

print render('page' ,'edit_rol_form', $content);
?>
