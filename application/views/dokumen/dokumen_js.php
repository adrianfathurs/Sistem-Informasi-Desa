
<script>
$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
<script>
$('#form-dokumen-save').on('click', function(e){
	  console.log("berhasil");
        e.preventDefault();
        
        const href = $('#form-dokumen').attr('action');

        Swal.fire({
            title: 'Perhatian',
            text: "Data Anda Berhasil Tersimpan",
            icon: 'success',
           
            confirmButtonColor: '#49cd23',
            confirmButtonText: 'Sudah Paham!'
            }).then((result) => {
            if (result.value) {
              document.location.href = href;
            }
        });
        });
</script>