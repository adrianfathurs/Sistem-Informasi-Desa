<script type="text/javascript">
        $(document).ready(function(){
 
            $('#tahun').change(function(){                 
                var id=$(this).val();
                
                $.ajax({
                    url : "<?php echo site_url('Laporan/get_bulan');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        console.log(data);
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i]+'>'+data[i]+'</option>';
                        }
                        $('#bulan').html(html);
 
                    }
                });
                return false;
            }); 
             
        });
    </script>