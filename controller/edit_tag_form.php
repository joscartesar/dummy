<?php
global $path_model;
include_once($path_model. '/tag_obj.php');

$tag = new Tag();
$tag->_load($_GET['id']);

$b_content = array(
  'username' => $user->get_username(),
);

$content = array(
  'tag' => $tag,
  'block_header' => render('block', 'header', $b_content),
  'block_menu' => render('block', 'menu'),
);

print render('page' ,'edit_tag_form', $content);
?>
