<?php
include_once("./model/db.php");
include_once("./model/tag_obj.php");

$tag = new Tag();
$tag->_load_all();

render("add_post_form");
?>
