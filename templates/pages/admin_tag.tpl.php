<p><a href="index.php?page=add_tag">+ Nueva etiqueta</a></p>
<table cellpadding="5px">
  <thead>
    <tr>
      <th> ID </th>
      <th> NOMBRE </th>
      <th colspan="2"> OPERACIONES </th>
    </tr>
  </thead>
  <tbody>
<?php
foreach ($tag as $key => $value) {
  print '<tr>
          <td>'. $key. '</td>
          <td>'. $value['name']. '</td>
          <td><a href="index.php?page=edit_tag&tag_id='. $key. '"> editar </a></td>
          <td><a href="index.php?page=delete_tag&tag_id='. $key. '">  eliminar </a></td>
        </tr>';
}
?>
  </tbody>
</table>
