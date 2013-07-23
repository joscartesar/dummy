<?php
include_once("model/db.php");

$sql = "SELECT post_id, title FROM post";
$result = $db->fetch($sql);
$post = array();
while ($row = mysqli_fetch_array($result)) {
  $id = $row['post_id'];
  $content = array("title" => $row['title']);
  $post[$id] = $content;
}
?>
<p><a href="index.php?page=add_post">+ Nueva entrada</a></p>
<table cellpadding="5px">
  <thead>
    <tr>
      <th> ID </th>
      <th> TITULO </th>
      <th colspan="2"> OPERACIONES </th>
    </tr>
  </thead>
  <tbody>
<?php
foreach ($post as $key => $value) {
  print '<tr>
          <td>'. $key. '</td>
          <td>'. $value['title']. '</td>
          <td><a href="index.php?page=edit_post&post_id='. $key. '"> editar </a></td>
          <td><a href="index.php?page=delete_post&post_id='. $key. '">  eliminar </a></td>
        </tr>';
}
?>
  </tbody>
</table>

