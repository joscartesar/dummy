<?php

$user_delete = new User;
$user_delete->set_id($_POST['user_id']);
$user_delete->_delete();

header('Location: http://dev.dummy.local/admin/users');
?>

