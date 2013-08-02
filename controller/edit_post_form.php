<?php
global $path_model;
include_once($path_model. "/post_obj.php");
include_once($path_model. "/tag_obj.php");

$post = new Post();
$post->_load($_GET['id']);
$tag = new Tag();
$tag->_load_all();

$b_content = array(
  'username' => $user->get_username(),
);

$content = array(
  'post' => $post,
  'tags' => $tag,
  'block_header' => render('block', 'header', $b_content),
  'block_menu' => render('block', 'menu'),
);

print render('page' ,'edit_post_form', $content);
?>
