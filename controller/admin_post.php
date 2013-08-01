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

$b_content = array(
  'username' => $user->get_username(),
);
$content = array(
  'post' => $post,
  'user_rol' => $user->get_user_rol(),
  'block_header' => render('block', 'header' $b_content),
  'block_menu' => render('block', 'menu'),
);
render('page', 'admin_post', $content);
?>
