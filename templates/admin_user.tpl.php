<?php
include_once("model/user_obj.php");

$users = $user->_load_all();
?>
<p><a href="index.php?page=add_user">+ Nuevo usuario</a></p>
<table cellpadding="5px">
  <thead>
    <tr>
      <th> ID </th>
      <th> USERNAME </th>
      <th colspan="2"> OPERACIONES </th>
    </tr>
  </thead>
  <tbody>
<?php foreach ($users as $key => $value) { ?>
    <tr>
      <td><?php print $key; ?></td>
      <td><?php print $value['username']; ?></td>
      <td><a href="index.php?page=edit_user&user_id=<?php print $key; ?>">editar</a></td>
      <td><a href="index.php?page=delete_user&user_id=<?php print $key; ?>">eliminar</a></td>
    </tr>
<?php } ?>
  </tbody>
</table>

