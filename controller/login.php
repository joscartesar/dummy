<?php
global $path_root, $path_model, $user;
print $path_model;
exit();
include_once($path_model. "/user_obj.php");
include_once($path_model. "/session_obj.php");
include_once($path_root. "/session.php");
/*
if ($user->_authenticate($_POST['username'], sha1($_POST['password']))) {
  session_destroy();
  session_start();
  $_SESSION['session_id'] = session_id();
  $session = new Session;
  $session->set_user_id($user->get_id());
  $session->set_session_id($_SESSION['session_id']);
  $session->_save();
  header('Location: http://dev.dummy.local/admin');
}
else {
  header('Location: http://dev.dummy.local/home');
}
*/
?>
