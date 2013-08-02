<?php
$sql = "SELECT * FROM rol";
$result = $db->fetch($sql);
$roles = array();
while ($row = mysqli_fetch_array($result)) {
  $id = $row['rol_id'];
  $content = array("name" => $row['name']);
  $roles[$id] = $content;
}
$user_edit = new User;
$user_edit->_load($_GET['user_id']);
$rol = $user_edit->get_user_rol();

$b_content = array(
  'username' => $user->get_username(),
);

$content = array(
  'id' => $_GET['user_id'],
  'user' => $user_edit,
  'roles' => $roles,
  'rol' => $rol,
  'block_header' => render('block', 'header', $b_content),
  'block_menu' => render('block', 'menu'),
);

print render('page' ,'edit_user_form', $content);
?>
