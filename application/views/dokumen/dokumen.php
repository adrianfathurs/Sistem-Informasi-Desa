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
              <li><a class="dropdown-item" href="#">Log Out</a></li>
            </ul>
          </div>
        </div>
        <div style="clear:both"></div>
        <h4 class="text-center"><b>Dokumen</b></h4>
      
      <div class="row">
        <div class="col">
          <div class="wrapping-content">
            <form id="form-dokumen" action="<?php echo base_url('Dokumen/upload')?>" method="POST" enctype="multipart/form-data">
              <div class="mb-2">
                <label for="id_dokumen" class="form-label">ID Dokumen</label>
                <input type="number" class="form-control" id="id_dokumen" name="id_dokumen" >
              </div>
              <div class="mb-2">
                <label for="nama_dokumen" class="form-label">Nama Dokumen</label>
                <input type="text" class="form-control" id="nama_dokumen" name="nama_dokumen">
              </div>
              <div class="mb-2">
              <label for="fileDokumen" class="form-label">Browse </label>
              <input class="form-control"  type="file" id="image" name="image" >
              </div>
            <center>
            <div class="container mb-2">
              <div class="row mx-auto">
                <div class="col-4">
                <button type="submit" class="btn btn-secondary">Kembali</button>
                </div>
                <div class="col-4">
                <button type="submit" id="form-dokumen-save" class="btn btn-primary" value="Upload">Simpan</button>
                </div>
                <div class="col-4">
                <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
              </div>
            </div>
            </form>      
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
              <table id="table_id" class="table-responsive">
                <thead>
                    <tr class="text-center">
                          <th>No</th>
                          <th>Id Dokumen</th>
                          <th>Nama Dokumen</th>
                          <th>File</th>
                          <th>Nama Perangkat Desa</th>
                          <th>Actions</th>
                    </tr>
                  </thead>
                <?php $i=1; foreach ($dataDokumen as $item): ?>
                  <tbody>
                      <tr class="text-center">
                          <td><?php echo $i++?></td>
                          <td><?php echo $item["Id_Dok"]?></td>
                          <td><?php echo $item["Nama_Dokumen"]?></td>
                          <td><a target="_blank" href="<?php echo base_url("Dokumen/download/").$item["File_Name"]?>"><?php echo $item["File_Name"]?></a></td>
                          <td><?php echo $item["fk_PD"]?></td>    
                          <td><button id="btnEdit" data-id="<?php echo $item["Id_Dok"] ?>" data-nama="<?php echo $item["Nama_Dokumen"] ?>" data-file="<?php echo $item["File_Name"] ?>"  >Edit</button></td>    
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

