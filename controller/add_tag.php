<?php
include_once("model/db.php");
include_once("model/tag_obj.php");

$tag = new Tag();
$tag->set_name($_POST['name']);
$tag->_save();

header('Location: http://localhost/dummy/index.php?page=admin&flang=tags');
?>
