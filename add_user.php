<?php
include_once("model/user_obj.php");

unset($user->_id);
$user->set_username($_POST['username']);
$user->_save(sha1($_POST['password']));

header('Location: http://localhost/dummy/index.php?page=admin&flang=users');
?>

