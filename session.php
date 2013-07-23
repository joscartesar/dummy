<?php
include_once("model/user_obj.php");
include_once("model/session_obj.php");

session_start();
$session = new Session;
if (isset($_SESSION['session_id'])) {
  $user_id = $user->_check_session($_SESSION['session_id']);
  if (!empty($user_id)) {
    $user->_load($user_id);
  }
  else {
    unset($_SESSION['session_id']);
  }
}

?>
