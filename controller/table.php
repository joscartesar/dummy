<?php
$b_content = array(
  'username' => $user->get_username(),
);
$content = array(
  'block_header' => render('block', 'header', $b_content),
  'block_menu' => render('block', 'menu'),
);
render('page', 'table', $content);
?>
