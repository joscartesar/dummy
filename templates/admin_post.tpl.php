<p><a href="admin/post/add">+ Nueva entrada</a></p>
<table cellpadding="5px">
  <thead>
    <tr>
      <th> ID </th>
      <th> TITULO </th>
    <?php if ($user->get_user_rol() == "admin") { ?>
      <th colspan="2"> OPERACIONES </th>
    <?php } ?>
    </tr>
  </thead>
  <tbody>
<?php foreach ($post as $key => $value) { ?>
    <tr>
      <td><?php print $key; ?></td>
      <td><?php print $value['title']; ?></td>
    <?php if ($user->get_user_rol() == "admin") { ?>
      <td><a href="index.php?page=edit_post&post_id='<?php print $key; ?>'"> editar </a></td>
      <td><a href="index.php?page=delete_post&post_id='<?php print $key; ?>'">  eliminar </a></td>
    <?php } ?>
    </tr>
<?php } ?>
  </tbody>
</table>

