<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Laporan Pengeluaran Desa Kedung Pomahan Wetan</title>
    <style>
    .wrap{
      height:250px;
      width:100%;
      padding:0;
      margin:0;
      border:2px;
      border-style: solid;
      border-width: 5px;
      border-color:white;
    }
    .left{
      float:left;
      width:49%;
      border-style: solid;
      border-width: 2px;
      border-color:white;
      height:250px;
      margin:2px;
    }
    .right{
      float:right;
      width:47%;
      height:250px;
      border-style: solid;
      border-width: 2px;
      border-color: white;
      margin:2px;
    }
    .clc{
      clear:both;
    }
    .text-center{
      text-align:center;
    }
  </style>
</head>
<body>
	<h2><center>Laporan Pengeluaran Desa Kedung Pomahan Wetan</center></h2>
    <h2 style="margin-bottom:30px"><center>Periode <?php echo date('d F Y', strtotime($tanggalAwal)) ." - ". date('d F Y', strtotime($tanggalAkhir)) ;?></center></h2>
	<table border="1" cellspacing="0" cellpadding="5" width="100%">
		<thead>
             <tr class="text-center">
                <th>No Urut</th>
                <th>Uraian</th>
                <th>Kode Penerimaan</th>
                <th>Tgl input</th>      
                <th>Nominal</th>      
            </tr>
		</thead>
		<?php $i=1; foreach ($dataPengeluaran as $item): ?>
            <tbody>
                 <tr>
                    <td><?php echo $i++?></td>
                    <td><?php echo $item["Nama_Parameter"]?></td>                                 
                    <td><?php echo $item["Id_Pengeluaran"]?></td>
                    <td><?php echo $item["Tanggal_Pengeluaran"]?></td>
                    <td><?php echo "Rp. " ; echo number_format($item["Nominal"], 2, ",", ".")?></td>
                    
                </tr>
                <?php endforeach;?>
                <tr>
                    <td colspan="4" >Total Pengeluaran</td>
                    <td align="right"><b><?php echo "Rp. " ; echo number_format($total_Pengeluaran->total, 2, ".", ",")?></b></td>
                    
                </tr>
            </tbody>
	</table>
    <div class="wrap" style="margin-top:20px">
      <div class="left">
        <div class="text-center">
              <p>Mengetahui,</p>
              <p>Kepala Desa,</p>
        </div>
        <div class="text-center" style="margin-top:100px">
              <p><?php echo $kepalaDesa?></p>
        </div>
      </div>
      <div class="right">
        <div class="text-center">
                <p>Sleman, <?php echo date('d F Y')?></p>
                <p>Bendahara Kedung Pomahan Wetan,</p>
          </div>
          <div class="text-center" style="margin-top:100px">
                <p><?php echo $bendahara?></p>
          </div>
      </div>
      <div class="clc"></div>
  </div>
</body>
</html>