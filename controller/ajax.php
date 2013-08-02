<?php
global $path_model;
include_once($path_model. "/db.php");
include_once($path_model. "/rol_obj.php");

$response = array();
if (!isset($_POST['filter'])) {
  $sql = "SELECT * FROM rol";
  $result = $db->fetch($sql);
  while ($row = mysqli_fetch_array($result)) {
    $id = $row['rol_id'];
    $content = array("name" => $row['name']);
    $response[$id] = $content;
  }
}
else {
//  $filter = filter_input(INPUT_POST, 'filter', FILTER_SANITIZE_STRING);
  $filter = "";
  if (ctype_alpha($_POST['filter'])) {
    $filter = $_POST['filter'];
  }
  $sql = "SELECT rol_id, name FROM rol ";
  $sql.= "WHERE name REGEXP ";
  $sql.= "'^". $filter. "'";
  if ($result = $db->fetch($sql)) {
    while ($row = mysqli_fetch_array($result)) {
      $id = $row['rol_id'];
      $content = array("name" => $row['name']);
      $response[$id] = $content;
    }
  }
}

print json_encode($response);
exit(0);

?>
