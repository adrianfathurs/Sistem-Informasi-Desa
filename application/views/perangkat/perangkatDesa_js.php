<script>
$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
<script type="text/javascript">
  $(document).on("click",'.btnEdits',function(){

    var id=$(this).data('id');
    var nama=$(this).data('nama');
    var tanggal_lahir=$(this).data('tgl_lahir');
    var jabatan=$(this).data('jabatan');
    var pendidikan=$(this).data('pendidikan');
    var password=$(this).data('password');
   
    console.log(id,nama,tanggal_lahir,jabatan,pendidikan,password);
    $("#id_PD").val(id);
    $("#id_PD").attr("readonly",true);
    $("#id_PD").attr("value",id);
    $("#nama").val(nama);
    $("#tgl_lahir").val(tanggal_lahir);
    $("#jabatan").val(jabatan);
    $("#pendidikan").val(pendidikan);
    $("#password").val(password);
    
   
});

</script>