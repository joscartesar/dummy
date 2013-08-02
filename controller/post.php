<?php
global $path_model;
include_once($path_model. "/db.php");
include_once($path_model. "/post_obj.php");

$post = new Post();
$post->_load($_GET['post_id']);

$b_content = array(
  'username' => $user->get_username(),
);
$content = array(
  'sanitized_title' => filter_xss($post->get_title()),
  'sanitized_body' => filter_xss($post->get_body()),
  'post' => $post,
  'block_header' => render('block', 'header', $b_content),
  'block_menu' => render('block', 'menu'),
);
print render('page', 'post', $content);
?>
