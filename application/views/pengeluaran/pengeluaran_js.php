<script src="<?php echo base_url() ?>assets/js/autoNumeric.js" ></script>
<script>
$(document).ready( function () {
    $('#table_id').DataTable();
} );

function Change(){
    var a=document.getElementById('select_parameter').value;     
    document.getElementById('nama_parameter').value= a;
}
</script>
<script type="text/javascript">
  $(document).on("click",'#btnEdit',function(){

    var id=$(this).data('id');
    var tanggal=$(this).data('tanggal');
    var nominal=$(this).data('nominal');
    var id_parameter=$(this).data('id_parameter');
    var nama_parameter=$(this).data('nama_parameter');
    // console.log(id,tanggal,nominal,id_parameter,nama_parameter);
    $("#id_pengeluaran").val(id);
    $("#id_pengeluaran").attr("readonly",true);
    $("#id_pengeluaran").attr("value",id);
    $("#select_parameter").val(id_parameter);
    $("#tanggal_pengeluaran").attr("value",tanggal);
    $("#nama_parameter").val(nama_parameter);
    $("#nominal").val(nominal);
});
    $(document).ready(function() {
			$('#nominal').autoNumeric('init');			
		});
</script>