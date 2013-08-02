<?php
global $path_model;
include_once('/var/www/dummy/model/tag_obj.php');

$tag = new Tag();
$tag->set_id($_POST['tag_id']);
$tag->_delete();

header('Location: http://dev.dummy.local/admin/tags');
?>
