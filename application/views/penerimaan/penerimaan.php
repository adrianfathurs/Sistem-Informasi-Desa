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
        <h4 class="text-center"><b>Penerimaan</b></h4>      
      <div class="row">
      <div class="contain">

    <div class="wrapper"> 
    <div>        
        <form action="">
        <div class="form">
        <p>
            <label for="">ID Penerimaan</label>
            <input type="text">
        </p>
        <p>
            <label for="">Tanggal Penerimaan</label>
            <input type="text">
        </p>
        <p>
            <label for="">Nominal</label>
            <input type="text">
        </p>
        <p>           
            <input type="text">
        </p>
        <p>
        <label for="">ID Parameter</label>
            <input type="text">
        </p>
        </div>
        <center>
        <div class="tombol">
            <p>
                <button>Send</button>
            </p>
            <p>
                <button>Send</button>
            </p>
            <p>
                <button>Send</button>
            </p>
        </div></center>
        </form>
    </div>
    </div>
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
                <!-- <?php $i=1; foreach ($dataDokumen as $item): ?>
                  <tbody>
                      <tr class="text-center">
                          <td><?php echo $i++?></td>
                          <td><?php echo $item["Id_Dok"]?></td>
                          <td><?php echo $item["Nama_Dokumen"]?></td>
                          <td><a target="_blank" href="<?php echo base_url("Dokumen/download/").$item["File_Name"]?>"><?php echo $item["File_Name"]?></a></td>
                          <td><?php echo $item["fk_PD"]?></td>    
                          <td><a><button >Edit</button></a></td>    
                      </tr>
                  </tbody>
                  <?php endforeach;?> -->
              </table>
            </div>
        </div>
        </div>
      </div>
     
    </div>
  </div>

</div>
