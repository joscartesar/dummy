<?php
$tag = new Tag();
$tag->set_id($_POST['tag_id']);
$tag->set_name($_POST['name']);
$tag->_save();

header('Location: http://dev.dummy.local/admin/tags');
?>
