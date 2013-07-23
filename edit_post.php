<?php
include_once("model/db.php");
include_once("model/post_obj.php");
include_once("model/tag_obj.php");
include_once("utils.php");

$post = new Post();
$post->set_id($_POST['post_id']);
$post->set_title($_POST['title']);
$post->set_body($_POST['body']);
$post->set_abstract($_POST['abstract']);
$post->_save();
$tag = new Tag();
$tag->_load_all();
$new = false;

/*$sql = "SELECT t.tag_id AS tag_id, t.name AS name FROM tag AS t ";
$sql.= "INNER JOIN post_tag AS pt ON pt.tag_id = t.tag_id ";
$sql.= "WHERE pt.post_id=". $_POST['post_id'];
$result = $db->fetch($sql);
while ($row = mysqli_fetch_array($result)) {
  $id = $row['tag_id'];
  $content = array("name" => $row['name']);
  $tags[$id] = $content;
}*/
if (isset($_POST['tags'])) {
  $post->_save_tags($post->get_id(), $_POST['tags'], $new);
}
else {
  $not_set = array();
  $post->_save_tags($post->get_id(), $not_set, $new);
}

header('Location: http://localhost/dummy/index.php?page=admin&flang=posts');
?>
