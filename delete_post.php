<?php
include_once("model/db.php");
include_once("model/post_obj.php");

$post = new Post();
$post->set_id($_POST['post_id']);
$post->_delete();

header('Location: http://localhost/dummy/index.php?page=admin&flang=posts');
?>
