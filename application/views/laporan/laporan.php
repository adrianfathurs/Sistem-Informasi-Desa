<div class="container mb-4">
  <div class="wrap">
    <div class="card " style="width: 60rem; ">
    <div class="card-body">
      <h4 class="card-title text-center" style="text-align:center"><b>Sistem Informasi Pengelolaan Keuangan Pembangunan Desa Kedung Pomahan Wetan</b></h4>
      <hr>
        <div style="float:right">
          <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-user-tie fa-2x"></i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="<?php echo site_url('Login/LogOut')?>">Log Out</a></li>
            </ul>
          </div>
        </div>
        <div style="clear:both"></div>
        <?php 
				if($this->session->flashdata('error') !='')
				{
					echo '<div class="alert alert-danger" role="alert">';
					echo $this->session->flashdata('error');
					echo '</div>';
				}
				?>        
        <h4 class="text-center"><b>Laporan</b></h4>      
      <div class="row">
      <div class="contain">
        <div class="wrapper">         
            <form id="form-dokumen" action="<?php echo base_url('laporan/form')?>" method="POST" enctype="multipart/form-data">
            <div class="form">
            <p>
                <label for="">Bulan</label>
                <select name="bulan" id="bulan">
                <option disabled selected> Pilih Bulan</option>     
                <option value="1">Januari</option>             
                <option value="2">Februari</option>             
                <option value="3">Maret</option>             
                <option value="4">April</option>             
                <option value="5">Mei</option>             
                <option value="6">Juni</option>             
                <option value="7">Juli</option>             
                <option value="8">Agustus</option>             
                <option value="9">September</option>             
                <option value="10">Oktober</option>             
                <option value="11">November</option>             
                <option value="12">Desember</option>             
                </select>
            </p>
            <p>
                <label for="">Tahun</label>
                <select id="tahun" name="tahun">
                <option disabled selected> Pilih Tahun</option>
                  <!-- <?php foreach ($dataPenerimaan as $parameter): ?>
                    <option value="<?php echo  substr($parameter['Tanggal_Penerimaan'],0,4);?>"> <?php echo substr($parameter['Tanggal_Penerimaan'],0,4); ?> </option>
                  <?php endforeach;?> --> 
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>                    
                </select>
            </p>
            </div>
            <center>
            <div class="tombol">
                <p>
                    <button type="submit" name="submit" value="kas_umum">Kas Umum</button>
                </p>
                <p>
                    <button type="submit" name="submit" value="penerimaan">Penerimaan</button>
                </p>
                <p>
                    <button type="submit" name="submit" value="pengeluaran">Pengeluaran</button>
                </p>
            </div></center>
            </form>      
        </div>
    </div>
        </div>
        <hr>     
      </div>
    </div>
  </div>
</div>

