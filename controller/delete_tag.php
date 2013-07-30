<?php
include_once("model/db.php");
include_once("model/tag_obj.php");

$tag = new Tag();
$tag->set_id($_POST['tag_id']);
$tag->_delete();

header('Location: http://localhost/dummy/index.php?page=admin&flang=tags')
?>
