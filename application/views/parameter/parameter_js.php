<script>
$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
<script type="text/javascript">
  $(document).on("click",'.btnEdits',function(){
    var idParameter=$(this).data('id');
    var namaParameter=$(this).data('nama');
    
    console.log(idParameter,namaParameter);
    $("#id_parameter").val(idParameter);
    $("#id_parameter").attr("readonly",true);
    $("#id_parameter").attr("value",idParameter);
    $("#nama_parameter").val(namaParameter);
    $("#nama_parameter").attr("value",namaParameter);
    
});

</script>