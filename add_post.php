<?php
include_once("model/db.php");
include_once("model/post_obj.php");

$post = new Post();
$post->set_title($_POST['title']);
$post->set_body($_POST['body']);
$post->set_abstract("resumen");
$post->_save();
$tags = $_POST['tags'];
$new = true;
$sql = "SELECT post_id FROM post WHERE ";
$sql.= "title='". $_POST['title']. "'";
$row = $db->fetch_row($sql);
$post->_save_tags($row['post_id'], $tags, $new);

header('Location: http://localhost/dummy/index.php?page=admin&flang=posts');
?>
