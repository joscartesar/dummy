<?php
include_once("model/db.php");
include_once("utils.php");

$sql = "SELECT COUNT(*) AS count FROM post";
$row = $db->fetch_row($sql);
$no_pages = ceil($row['count']/5);

$sql = "SELECT * ";
$sql.= "FROM post ORDER BY date DESC ";
if (!isset($_GET['index'])) {
  $sql.= "LIMIT 0,5";
}else {
  $sql.= "LIMIT ". (5 * ($_GET['index'] - 1)). ",5";
}

$result = $db->fetch($sql);

$posts = array();
while ($row = mysqli_fetch_array($result)) {
  $id = $row['post_id'];
  $content = array("title" => $row['title'], 
                   "body" => $row['body'], 
                   "date" => $row['date'], 
                   "abstract" => $row['abstract']);
  $posts[$id] = $content;
}

render("list");

?>

