<?php
include_once(PATH_MODEL. "/user_obj.php");
include_once(PATH_MODEL. "/session_obj.php");
include_once(PATH_ROOT. "/session.php");

session_destroy();
$session = new Session;
$session->_load($user->get_id());
$session->_delete();
unset($_SESSION['session_id']);
header('Location: http://dev.dummy.local/home');

?>
