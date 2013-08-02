<?php
$sql = "SELECT * FROM rol";
$result = $db->fetch($sql);
$roles = array();
while ($row = mysqli_fetch_array($result)) {
  $id = $row['rol_id'];
  $content = array("name" => $row['name']);
  $roles[$id] = $content;
}

$b_content = array(
  'username' => $user->get_username(),
);

$content = array(
  'roles' => $roles,
  'block_header' => render('block', 'header', $b_content),
  'block_menu' => render('block', 'menu'),
);

print render('page' ,'add_user_form', $content);
?>
