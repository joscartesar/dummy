<?php
global $path_model;
include_once($path_model. "/db.php");
include_once($path_model. "/user_obj.php");


$pieces = explode('/',$_GET['q']);
if (count($pieces) > 1) {
  $admin_page = $pieces[1];
}
else {
  $admin_page = 'posts';
}
switch ($admin_page) {
  case 'posts':
    $sql = "SELECT post_id AS id, title AS field FROM post";
    break;
  case 'roles':
    $sql = "SELECT rol_id AS id, name AS field FROM rol";
    break;
  case 'tags':
    $sql = "SELECT tag_id AS id, name AS field FROM tag";
    break;
  case 'users':
    $sql = "SELECT user_id AS id, username AS field FROM user";
    break;
  default:
    $sql = "SELECT post_id AS id, title AS field FROM post";
}

$rows = array();
$result = $db->fetch($sql);
while ($row = mysqli_fetch_array($result)) {
  $id = $row['id'];
  $value = array("field" => $row['field']);
  $rows[$id] = $value;
}

$at_content = array(
  'admin_page' => $admin_page,
  'user_rol' => $user->get_user_rol(),
  'rows' => $rows,
);

$b_content = array(
  'username' => $user->get_username(),
);
$content = array(
  'user_rol' => $user->get_user_rol(),
  'block_header' => render('block', 'header', $b_content),
  'block_menu' => render('block', 'menu'),
  'block_admin_table' => render('block', 'admin_table', $at_content),
);
render('page', 'admin_panel', $content);
?>
