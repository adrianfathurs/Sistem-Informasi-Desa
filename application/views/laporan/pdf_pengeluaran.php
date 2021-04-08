<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Laporan Pengeluaran Desa Kedung Pomahan Wetan</title>
</head>
<body>
	<h3><center>DAFTAR Pengeluaran Desa Kedung Pomahan Wetan</center></h3>
	<table border="1" cellspacing="0" cellpadding="5" width="100%">
		<thead>
            <tr class="text-center">
                <th>No</th>
                <th>Id Pengeluaran</th>
                <th>Tanggal Pengeluaran</th>
                <th>Nominal</th>
                <th>Id Parameter</th>
                <th>Parameter</th>                
            </tr>
		</thead>
		<?php $i=1; foreach ($dataPengeluaran as $item): ?>
            <tbody>
                <tr>
                    <td><?php echo $i++?></td>
                    <td><?php echo $item["Id_Pengeluaran"]?></td>
                    <td><?php echo $item["Tanggal_Pengeluaran"]?></td>
                    <td><?php echo "Rp. " ; echo number_format($item["Nominal"], 2, ".", ",")?></td>
                    <td><?php echo $item["fk_Parameter"]?></td>   
                    <td><?php echo $item["Nama_Parameter"]?></td>                                 
                </tr>
                <?php endforeach;?>
                <tr>
                    <td>Total Pengeluarn</td>
                    <td colspan="3" align="right"><?php echo "Rp. " ; echo number_format($total_Pengeluaran->total, 2, ".", ",")?></td>
                    <td colspan="2"></td>
                </tr>
            </tbody>
	</table>
</body>
</html>