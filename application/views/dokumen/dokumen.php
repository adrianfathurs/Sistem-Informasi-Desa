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
            <center>
            <div class="container mb-3">
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
                    <tr>
                          <th>Column 1</th>
                          <th>Column 2</th>
                          <th>Column 2</th>
                    </tr>
                  </thead>
                <?php for($i=0;$i<4;$i++):?>
                  <tbody>
                      <tr>
                          <td>Row 1 Data 1</td>
                          <td>Row 1 Data 2</td>
                          <td>Row 1 Data 2</td>
                      </tr>
                  </tbody>
                  <?php endfor;?>
              </table>
            </div>
        </div>
        </div>
      </div>
     
    </div>
  </div>

</div>

