<?php
$form = array(
  '#attributes' => array(
    '#action' => 'login_action',
    '#method' => 'post',
  ),
  '#elements' => array(
    'id_username' => array(
      '#element' => 'input',
      '#type' => 'text',
      '#name' => 'username',
      '#label' => 'Username: ',
    ),
    'id_password' => array(
      '#element' => 'input',
      '#type' => 'password',
      '#name' => 'password',
      '#label' => 'Password: ',
    ),
    'id_submit' => array(
      '#element' => 'input',
      '#type' => 'submit',
      '#value' => 'login',
    ),
  ),
);
$b_content = array(
  'username' => $user->get_username(),
);
$content = array(
  'block_header' => render('block', 'header', $b_content),
  'block_menu' => render('block', 'menu'),
  'form_login' => render_form($form),
);

print render('page', 'login_form', $content);
?>
