<?php
global $path_model;
include_once($path_model. "/db.php");
include_once($path_model. "/post_obj.php");

$post = new Post();
$post->set_id($_POST['post_id']);
$post->_delete();

header('Location: http://dev.dummy.local/admin/posts');
?>
