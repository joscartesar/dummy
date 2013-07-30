<?php
include_once("./model/post_obj.php");
include_once("./model/tag_obj.php");

$post = new Post();
$post->_load($_GET['post_id']);
$tag = new Tag();
$tag->_load_all();

render("edit_post_form");
?>
