<?php
include_once("model/tag_obj.php");

$tag = new Tag();
$tag->_load($_GET['tag_id']);
render("edit_tag_form");
?>
