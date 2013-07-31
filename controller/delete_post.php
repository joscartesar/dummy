<?php
include_once(PATH_MODEL. "/db.php");
include_once(PATH_MODEL. "/post_obj.php");

$post = new Post();
$post->set_id($_POST['post_id']);
$post->_delete();

header('Location: http://dev.dummy.local/admin');
?>
