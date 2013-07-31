<?php
include_once(PATH_MODEL. "/db.php");
include_once(PATH_MODEL. "/tag_obj.php");

$tag = new Tag();
$tag->_load_all();

render("add_post_form");
?>
