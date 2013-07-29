<?php
include_once("model/db.php");
include_once("model/post_obj.php");
include_once("model/tag_obj.php");
include_once("utils.php");

$post = new Post();
$post->set_id($_POST['post_id']);
$post->set_title($_POST['title']);
$post->set_body($_POST['body']);
$post->set_abstract($_POST['abstract']);
$post->_save();
$tag = new Tag();
$tag->_load_all();
$new = false;

if (isset($_POST['tags'])) {
  $post->_save_tags($post->get_id(), $_POST['tags'], $new);
}
else {
  $not_set = array();
  $post->_save_tags($post->get_id(), $not_set, $new);
}

header('Location: http://localhost/dummy/index.php?page=admin&flang=posts');
?>
