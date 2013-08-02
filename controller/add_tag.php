<?php
global $path_model;
include_once($path_model. '/tag_obj.php');

$tag = new Tag();
$tag->set_name($_POST['name']);
$tag->_save();

header('Location: http://dev.dummy.local/admin/tags');
?>
