<?php
global $path_model;
include_once($path_model. "/db.php");
include_once($path_model. "/tag_obj.php");

$tag = new Tag();
$tag->_load_all();

$b_content = array(
  'username' => $user->get_username(),
);

$content = array(
  'tags' => $tag,
  'block_header' => render('block', 'header', $b_content),
  'block_menu' => render('block', 'menu'),
);

print render('page' ,'add_post_form', $content);
?>
