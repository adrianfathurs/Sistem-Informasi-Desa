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
        <h4 class="text-center"><b>Parameter</b></h4>
      
      <div class="row">
        <div class="col">
          <div class="wrapping-content">
            <form id="form-parameter" action="<?php echo base_url('Parameter/formParameter')?>" method="POST" enctype="multipart/form-data">
              <div class="mb-2">
                <label for="id_parameter" class="form-label">ID Parameter</label>
                <input type="number" class="form-control" id="id_parameter" name="id_parameter" required >
              </div>
              <div class="mb-2">
                <label for="nama_parameter" class="form-label" >Nama Parameter</label>
                <input type="text" class="form-control" id="nama_parameter" name="nama_parameter" required>
              </div>
            <center>
            <div class="container mb-2">
              <div class="row mx-auto">
                <div class="col-4">  
                <button class="btn btn-secondary"><a href="<?php echo site_url("Dashboard")?>" style="color:white;text-decoration:none;">Kembali</a></button>
                </div>
                <div class="col-4">
                <button type="submit" name="submit" id="form-dokumen-save" class="btn btn-primary" value="upload">Simpan</button>
                </div>
                <div class="col-4">
                <button type="submit" name="submit" value="hapus" class="btn btn-danger">Hapus</button>
                </div>
              </div>
              </form>      
            </div>
            </center>
          </div>
        </div>
        <hr>
        <div>
          <h4 class="text-center"><b>Table Document</b></h4>
        </div>
        <div class="wrapping-content">
          <div class="container">
            <div class="row mt-2">
              <table id="table_id" class="display">
                <thead>
                    <tr class="text-center">
                          <th>No</th>
                          <th>Id Paramater</th>
                          <th>Nama Parameter</th>
                          <th>Action</th>
                          
                    </tr>
                  </thead>
                <?php $i=1; foreach ($dataParameter as $item): ?>
                  <tbody>
                      <tr class="text-center">
                          <td><?php echo $i++?></td>
                          <td><?php echo $item["Id_Parameter"]?></td>
                          <td><?php echo $item["Nama_Parameter"]?></td>   
                          <td><button class="btnEdits" data-id="<?php echo $item["Id_Parameter"] ?>" data-nama="<?php echo $item["Nama_Parameter"] ?>">Edit</button></td>    
                      </tr>
                  </tbody>
                  <?php endforeach;?> 
              </table>
            </div>
        </div>
        </div>
      </div>
     
    </div>
  </div>

</div>

