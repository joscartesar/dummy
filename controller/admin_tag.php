<?php
global $path_model;
include_once($path_model. "/db.php");

$sql = "SELECT * FROM tag";
$result = $db->fetch($sql);
$tag = array();
while ($row = mysqli_fetch_array($result)) {
  $id = $row['tag_id'];
  $content = array("name" => $row['name']);
  $tag[$id] = $content;
}
render("admin_tag");
?>
