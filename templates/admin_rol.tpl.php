<script src="/js/rol_admin_table.js"></script>
<div>
  <form>
    <label for="id_search">Buscar: </label>
    <input id="id_search" type="text" name="filter" />
  </form>
</div>
<div>
  <p><a href="index.php?page=add_rol">+ Nuevo rol</a></p>
</div>
<div>
  <table cellpadding="5px">
    <thead>
      <tr>
        <th> ID </th>
        <th> TIPO </th>
        <th colspan="2"> OPERACIONES </th>
      </tr>
    </thead>
    <tbody id="id_tbody">
    </tbody>
  </table>
</div>
