<script>
  $(document).ready(function() {
    $.ajax({
      type:"POST",
      url:"ajax.php",
      dataType:"json",
      success:function(data) {
        $.each(data, function(index) {
          var rol_name = data[index].name;
          $("#id_tbody").append('<tr>'+
                                '<td>'+ index +'</td>'+
                                '<td>'+ rol_name +'</td>'+
                                '<td><a href="index.php?page=edit_rol&rol_id='+ index +'">editar</a></td>'+
                                '<td><a href="index.php?page=delete_rol&rol_id='+ index +'">eliminar</a></td>'+
                                '</tr>');
        });
      },
      error:function() {}
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
  <tbody id="id_tbody">
  </tbody>
</table>
