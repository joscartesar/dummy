<?php
include_once("model/user_obj.php");

$user->set_id($_POST['user_id']);
$user->_delete();

header('Location: http://localhost/dummy/index.php?page=admin&flang=users');
?>

