<?php
include_once("model/user_obj.php");

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

render("edit_user_form");
?>
