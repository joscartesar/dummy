<?php
global $path_root, $path_model;
include_once($path_model. "/db.php");
include_once($path_root. "/utils.php");

$sql = "SELECT COUNT(*) AS count FROM post";
$row = $db->fetch_row($sql);
$no_pages = ceil($row['count']/5);
$index = "";

$sql = "SELECT * ";
$sql.= "FROM post ORDER BY date DESC ";
if (!isset($_GET['index'])) {
  $sql.= "LIMIT 0,5";
}else {
  $sql.= "LIMIT ". (5 * ($_GET['index'] - 1)). ",5";
  $index = $_GET['index'];
}

$result = $db->fetch($sql);

$posts = array();
while ($row = mysqli_fetch_array($result)) {
  $id = $row['post_id'];
  $value = array("title" => $row['title'],
                   "body" => $row['body'],
                   "date" => $row['date'],
                   "abstract" => $row['abstract']);
  $posts[$id] = $value;
}

$b_content = array(
  'username' => $user->get_username(),
);
$content = array(
  'no_pages' => $no_pages,
  'index' => $index,
  'posts' => $posts,
  'block_header' => render('block', 'header', $b_content),
  'block_menu' => render('block', 'menu'),
);
print render('page', 'list', $content);
?>
