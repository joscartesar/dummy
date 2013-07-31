<?php
include_once(PATH_MODEL. "/session_obj.php");
include_once(PATH_ROOT. "/session.php");
global $user;
if ($user->_authenticate($_POST['username'], sha1($_POST['password']))) {
  session_destroy();
  session_start();
  $_SESSION['session_id'] = session_id();
  $session = new Session;
  $session->set_user_id($user->get_id());
  $session->set_session_id($_SESSION['session_id']);
  $session->_save();
  header('Location: http://dev.dummy.local/admin?hola=hola');
}
else {
  header('Location: http://dev.dummy.local/home');
}

?>
