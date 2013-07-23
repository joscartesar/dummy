<?php
include_once("model/user_obj.php");
include_once("model/session_obj.php");
include_once("session.php");
include_once("utils.php");

if ($user->_authenticate($_POST['username'], sha1($_POST['password']))) {
  session_destroy();
  session_start();
  $_SESSION['session_id'] = session_id();
  $session = new Session;
  $session->set_user_id($user->get_id());
  $session->set_session_id($_SESSION['session_id']);
  $session->_save();
  header('Location: http://localhost/dummy/index.php?page=admin');
}
else {
  header('Location: http://localhost/dummy/index.php');
}

?>
