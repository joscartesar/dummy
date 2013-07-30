<?php
include_once("model/user_obj.php");

$user_delete = new User;
$user_delete->set_id($_POST['user_id']);
$user_delete->_delete();

header('Location: http://localhost/dummy/index.php?page=admin&flang=users');
?>

