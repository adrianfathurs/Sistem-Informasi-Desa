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
        <h4 class="text-center"><b>Penerimaan</b></h4>      
      <div class="row">
      <div class="contain">
        <div class="wrapper">         
            <form id="form-dokumen" action="<?php echo base_url('')?>" method="POST" enctype="multipart/form-data">
            <div class="form">
            <p>
                <label for="">Bulan</label>
                <select  name="bulan" id="bulan">
                <option disabled selected> No selected</option>                  
                </select>
            </p>
            <p>
                <label for="">Tahun</label>
                <select id="tahun" name="tahun">
                <option disabled selected> Select ID Parameter</option>
                  <?php foreach ($dataPenerimaan as $parameter): ?>
                    <option value="<?php echo  substr($parameter['Tanggal_Penerimaan'],0,4);?>"> <?php echo substr($parameter['Tanggal_Penerimaan'],0,4); ?> </option>
                  <?php endforeach;?>
                </select>
            </p>
            </div>
            <center>
            <div class="tombol">
                <p>
                    <button>Kembali</button>
                </p>
                <p>
                    <button type="submit" >Penerimaan</button>
                </p>
                <p>
                    <button type="submit" >Pengeluaran</button>
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

