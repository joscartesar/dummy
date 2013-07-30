<?php
include_once("model/user_obj.php");
include_once("model/session_obj.php");
include_once("session.php");

session_destroy();
$session = new Session;
$session->_load($user->get_id());
$session->_delete();
unset($_SESSION['session_id']);
header('Location: http://localhost/dummy/index.php');

?>
