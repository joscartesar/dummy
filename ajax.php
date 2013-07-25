<?php
include_once("model/db_obj.php");
include_once("model/rol_obj.php");

$sql = "SELECT * FROM rol";
$result = $db->fetch($sql);
$roles = array();
while ($row = mysqli_fetch_array($result)) {
  $id = $row['rol_id'];
  $content = array("name" => $row['name']);
  $roles[$id] = $content;
}
print json_encode($roles);

?>
