<?php
include_once("model/db.php");

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
?>

<?php foreach ($posts as $key => $value) { ?>
<h4><?php print "<a href='index.php?page=post&id=". $key. "'>". $value['title']. "</a>"; ?></h4>
<hr />
<?php 
  print $value['abstract']; 
  print strftime("%A, %d de %B de %Y, %r", $value['date']); 
}
?>
<ul>
  <li><?php if (isset($_GET['index']) && ($_GET['index'] > 1)) {
              $sig = $_GET['index'] - 1;
              print '<a href="index.php?page=list&index='. $sig. '">Anterior</a>';
            }
      ?>
  </li>
  <?php for ($i = 1; $i <= $no_pages; $i++) {
          print '<li><a href="index.php?page=list&index='. $i. '">'. $i. ' </a></li>';
        }
  ?>
  <li><?php if (!isset($_GET['index'])) {
              $sig = 2;
              print '<a href="index.php?page=list&index='. $sig. '">Siguiente</a>';
            }else if (isset($_GET['index']) && ($_GET['index'] < $no_pages)) {
              $sig = $_GET['index'] + 1;
              print '<a href="index.php?page=list&index='. $sig. '">Siguiente</a>';
            }
      ?>
  </li>
</ul>
