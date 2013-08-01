<?php
global $path_root, $path_model;
include_once($path_model. "/user_obj.php");
include_once($path_model. "/session_obj.php");
include_once($path_root. "/session.php");

session_destroy();
$session = new Session;
$session->_load($user->get_id());
$session->_delete();
unset($_SESSION['session_id']);
header('Location: http://dev.dummy.local/home');

?>
