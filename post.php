<?php
include_once("model/db.php");
include_once("model/post_obj.php");

$post = new Post();
$post->_load($_GET['id']);
?>

<h4><?php print $post->get_title(); ?></h4>
<div><?php print $post->get_body(); ?></div>
<div><?php print strftime("%A, %d de %B de %Y, %r", $post->get_date()); ?></div>
<div>
  <ul class="contentParagraph">
  <?php foreach ($post->_tags as $key => $value) { ?>
    <li><a href="http://www.google.com"><?php print $value['name']; ?></a></li>
  <?php } ?>
  </ul>
</div>
