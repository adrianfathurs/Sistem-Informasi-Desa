
<script>
$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>

<script type="text/javascript">
  $(document).on("click",'#btnEdit',function(){

    var id=$(this).data('id');
    var namaDokumen=$(this).data('nama');
    var fileName=$(this).data('file');
    console.log(id,namaDokumen,fileName);
    $("#id_dokumen").val(id);
    $("#id_dokumen").attr("readonly",true);
    $("#id_dokumen").attr("value",id);
});
</script>
