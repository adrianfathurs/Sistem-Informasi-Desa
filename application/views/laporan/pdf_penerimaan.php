<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Laporan Penerimaan Desa Kedung Pomahan Wetan</title>
</head>
<body>
	<h3><center>DAFTAR Penerimaan Desa Kedung Pomahan Wetan</center></h3>
	<table border="1" cellspacing="0" cellpadding="5" width="100%">
		<thead>
            <tr class="text-center">
                <th>No</th>
                <th>Id Penerimaan</th>
                <th>Tanggal Penerimaan</th>
                <th>Nominal</th>
                <th>Id Parameter</th>
                <th>Parameter</th>                
            </tr>
		</thead>
		<?php $i=1; foreach ($dataPenerimaan as $item): ?>
            <tbody>
                <tr>
                    <td><?php echo $i++?></td>
                    <td><?php echo $item["Id_Penerimaan"]?></td>
                    <td><?php echo $item["Tanggal_Penerimaan"]?></td>
                    <td><?php echo "Rp. " ; echo number_format($item["Nominal"], 2, ".", ",")?></td>
                    <td><?php echo $item["fk_Parameter"]?></td>   
                    <td><?php echo $item["Nama_Parameter"]?></td>                                 
                </tr>
            </tbody>
        <?php endforeach;?>
	</table>
</body>
</html>