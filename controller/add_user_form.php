<?php
include_once("model/db.php");
include_once("model/rol_obj.php");

$sql = "SELECT * FROM rol";
$result = $db->fetch($sql);
$roles = array();
while ($row = mysqli_fetch_array($result)) {
  $id = $row['rol_id'];
  $content = array("name" => $row['name']);
  $roles[$id] = $content;
}
render("add_user_form");
?>
