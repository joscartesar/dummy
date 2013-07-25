<?php /*
include_once("model/db.php");
include_once("model/rol_obj.php");

$sql = "SELECT * FROM rol";
$result = $db->fetch($sql);
$rol = array();
while ($row = mysqli_fetch_array($result)) {
  $id = $row['rol_id'];
  $content = array("name" => $row['name']);
  $rol[$id] = $content;
}*/
?>
<script>
  $(document).ready(function(){
    $.ajax({
      type:"POST",
      url:"ajax.php",
      data: dataString,
      dataType: "json",
      success:function(data){
        for (var i=0; i<data.length; i++) {
          
        }
      },
      error:function(){}
    });
  });
</script>
<p><a href="index.php?page=add_rol">+ Nuevo rol</a></p>
<table cellpadding="5px">
  <thead>
    <tr>
      <th> ID </th>
      <th> TIPO </th>
      <th colspan="2"> OPERACIONES </th>
    </tr>
  </thead>
  <tbody>
<?php foreach ($rol as $key => $value) { ?>
    <tr>
      <td><?php print $key; ?></td>
      <td><?php print $value['name']; ?></td>
      <td><a href="index.php?page=edit_rol&rol_id='<?php print $key; ?>'"> editar </a></td>
      <td><a href="index.php?page=delete_rol&rol_id='<?php print $key; ?>'">  eliminar </a></td>
    </tr>
<?php } ?>
  </tbody>
</table>
