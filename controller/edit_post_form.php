<?php
include_once(PATH_MODEL. "/post_obj.php");
include_once(PATH_MODEL. "/tag_obj.php");

$post = new Post();
$post->_load($_GET['post_id']);
$tag = new Tag();
$tag->_load_all();

render("edit_post_form");
?>
