<?php
global $path_model;
include_once($path_model. "/db.php");
include_once($path_model. "/user_obj.php");

$sql = "SELECT post_id, title FROM post";
$result = $db->fetch($sql);
$post = array();
while ($row = mysqli_fetch_array($result)) {
  $id = $row['post_id'];
  $content = array("title" => $row['title']);
  $post[$id] = $content;
}
render("admin_post");
?>
