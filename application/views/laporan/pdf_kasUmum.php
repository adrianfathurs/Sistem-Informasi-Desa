<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <title>Laporan Penerimaan dan Pengeluaran Desa Kedung Pomahan Wetan</title>
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
	<h2 ><center>Kas Umum Desa Kedung Pomahan Wetan</center></h2>
	<h2 style="margin-bottom:30px"><center>Periode <?php echo date('d F Y', strtotime($tanggalAwal)) ." - ". date('d F Y', strtotime($tanggalAkhir)) ;?></center></h2>
	<table border="1" cellspacing="0" cellpadding="5" width="100%">
		<thead>
            <tr class="table text-center">
              <th scope="col">No Urut</th>
              <th scope="col">TGL Input</th>
              <th scope="col">Nama Parameter</th>
              <th scope="col">Penerimaan</th>
              <th scope="col">Pengeluaran</th>
            </tr>
          </thead>
            <tbody>
		        <?php $i=1; foreach ($dataPenerimaan as $item): ?>
                <tr>
                    <td><?php echo $i++?></td>              
                    <td><?php echo $item["Tanggal_Penerimaan"]?></td>              
                    <td><?php echo $item["Nama_Parameter"]?></td>                          
                    <td><?php echo "Rp. " ; echo number_format($item["Nominal"], 2, ",", ".") ?></td>
                    <td>-</td>                       
                </tr>
                <?php endforeach;?>
		        <?php foreach ($dataPengeluaran as $item): ?>
                <tr>
                    <td><?php echo $i++?></td>              
                    <td><?php echo $item["Tanggal_Pengeluaran"]?></td>              
                    <td><?php echo $item["Nama_Parameter"]?></td>              
                    <td>-</td>                               
                    <td><?php echo "Rp. " ; echo number_format($item["Nominal"], 2, ",", ".") ?></td>
                </tr>
                <?php endforeach;?>
            </tbody>
	</table>
    <table style="margin-top:50px" border="1" cellspacing="0" cellpadding="5" width="100%">
        <thead>
         <tr style="border:none">
            <th></th>
            <th></th>
         </tr>
          </thead>
        <tbody>
          <tr>
              <td>Rekap Bulan <?php echo $beforeMonth ?></td>
              <td><?php echo "Rp. " ; echo number_format($totNomBulSebelum, 2, ",", ".") ?></td>
          </tr>
          <tr>
              <td>Rekap Bulan <?php echo $thisMonth ?></td>
              <td><?php echo "Rp. " ; echo number_format($totNomBulSekarang, 2, ",", ".") ?></td>
          </tr>
          <tr>
              <td>Rekap Mulai <?php echo date('d F Y', strtotime($tanggalAwal)) ." - ". date('d F Y', strtotime($tanggalAkhir))  ?> </td>
              <td><b><?php echo "Rp. " ; echo number_format($totSesuaiTanggal, 2, ",", ".") ?></b></td>
          </tr>
          
          </tbody>
    </table>
  </center>
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


