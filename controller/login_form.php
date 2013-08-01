<?php
$content = array(
  'block_header' => render('block', 'header' array()),
  'block_menu' => render('block', 'menu', array()),
);
print render('page', 'login_form', $content);
?>
