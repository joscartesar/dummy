<?php
$b_content = array(
  'username' => $user->get_username(),
);

$content = array(
  'id' => $_GET['id'],
  'block_header' => render('block', 'header', $b_content),
  'block_menu' => render('block', 'menu'),
);

print render('page' ,'delete_user_form', $content);
?>
