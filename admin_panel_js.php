<?php
include_once("model/db.php");

$sql = "SELECT post_id, title FROM post";
$result = $db->fetch($sql);
$post = array();
while ($row = mysqli_fetch_array($result)) {
  $id = $row['post_id'];
  $content = array("title" => $row['title']);
  $post[$id] = $content;
}
?>
<div id="flang">
  <ul>
    <li id="flang_post">Posts</li>
    <li id="flang_tag">Tags</li>
  </ul>
</div>
<div id="admin_post">
  <?php include_once("admin_post.php"); ?>
</div>
<div id="admin_tag">
  <?php include_once("admin_tag.php"); ?>
</div>
