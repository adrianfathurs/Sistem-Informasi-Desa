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
          <h4 class="text-center"><b>Perangkat Desa</b></h4>
          <div class="wrapping-content">
            

              <form id="form-perangkat" action="<?php echo base_url('PerangkatDesa/formPerangkat')?>" method="POST" enctype="multipart/form-data">
              <div class="row">
                  <div class="col">
                    <div class="mb-3">
                      <label for="id_PD" class="form-label" >ID PD</label>
                      <input type="number"  class="form-control" id="id_PD" name="id_PD">
                    </div>
                    <div class="mb-3">
                      <label for="nama" class="form-label" >Nama</label>
                      <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="mb-3">
                      <label for="tgl_lahir" class="form-label" >Tanggal Lahir</label>
                      <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir">
                    </div>
                  </div>
                  <div class="col">
                    <div class="mb-3">
                      <label for="jabatan" class="form-label">Jabatan</label>
                      <input type="text" class="form-control" id="jabatan" name="jabatan" >
                    </div>
                    <div class="mb-3">
                      <label for="pendidikan" class="form-label">Pendidikan</label>
                      <input type="text" class="form-control" id="pendidikan" name="pendidikan">
                    </div>
                    <div class="mb-3">
                      <label for="pass" class="form-label">Password</label>
                      <input type="password" class="form-control" id="password" name="password">
                    </div>
                  </div>
                </div>
              </div>
              
              <center>
                <div class="row">
                <div class="col">
                <button class="btn btn-secondary"><a href="<?php echo site_url("Dashboard")?>" style="color:white;text-decoration:none;">Kembali</a></button>
                </div>
                <div class="col">
                  <button type="submit" value="upload" class="btn btn-primary">Simpan</button>
                </div>
                <div class="col">
                  <button type="submit" value="hapus" class="btn btn-danger">Hapus</button>
                </div>
              </div>
            </center>
          </form>
            <hr>
            <div class="row">
              <table id="table_id" class="display">
                <thead>
                    <tr class="text-center">
                          <th>No</th>
                          <th>Id PD</th>
                          <th>Nama</th>
                          <th>Tanggal Lahir</th>
                          <th>Jabatan</th>
                          <th>Pendidikan</th>
                          <th>Password</th>
                          <th>Action</th>
                    </tr>
                  </thead>
                <?php $i=1; foreach ($dataPerangkat as $item): ?>
                  <tbody>
                      <tr class="text-center">
                          <td><?php echo $i++?></td>
                          <td><?php echo $item["Id_PD"]?></td>
                          <td><?php echo $item["Nama"]?></td>
                          <td><?php echo $item["Tanggal_lahir"]?></td>
                          <td><?php echo $item["Jabatan"]?></td>    
                          <td><?php echo $item["Pendidikan"]?></td>    
                          <td><?php echo $item["Password"]?></td>    
                          <td><a >
                          <button class="btnEdits" 
                          data-id="<?php echo  $item["Id_PD"]?>"
                          data-nama="<?php echo  $item["Nama"]?>"
                          data-tgl_lahir="<?php echo  $item["Tanggal_lahir"]?>"
                          data-jabatan="<?php echo  $item["Jabatan"]?>"
                          data-pendidikan="<?php echo  $item["Pendidikan"]?>"
                          data-password="<?php echo  $item["Password"]?>"
                          >
                          Edit</button></a></td>    
                      </tr>
                  </tbody>
                  <?php endforeach;?> 
              </table>
            </div>
    </div>
  </div>
</div>

