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
            <form id="form-dokumen" action="<?php echo base_url('Penerimaan/form')?>" method="POST" enctype="multipart/form-data">
            <div class="form">
            <p>
                <label for="">ID Penerimaan</label>
                <input type="text" name="id_penerimaan" id="id_penerimaan">
            </p>
            <p>
                <label for="">ID Parameter</label>
                <select id="select_parameter" name="id_parameter" onChange="Change()">
                <option disabled selected> Select ID Parameter</option>
                  <?php foreach ($dataParameter as $parameter): ?>
                    <option value="<?php echo $parameter['Nama_Parameter']?>"> <?php echo $parameter['Id_Parameter'] ?> </option>
                  <?php endforeach;?>
                </select>
            </p>
            <p>
                <label for="">Tanggal Penerimaan</label>
                <input type="date" name="tanggal_penerimaan" id="tanggal_penerimaan">
            </p>
            <p>           
                <input type="text" id="nama_parameter" name="nama_parameter" placeholder="Nama Parameter" readonly>
            </p>
            <p>
            <label for="">Nominal</label>
                <input type="text" name="nominal" id="nominal" placeholder=" Rp. ">
            </p>
            </div>
            <center>
            <div class="tombol">
                <p>
                    <button>Kembali</button>
                </p>
                <p>
                    <button type="submit" name="submit" value="Simpan">Simpan</button>
                </p>
                <p>
                    <button type="submit" name="submit" value="Hapus">Hapus</button>
                </p>
            </div></center>
            </form>      
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
                          <th>Id Penerimaan</th>
                          <th>Tanggal Penerimaan</th>
                          <th>Nominal</th>
                          <th>Id Parameter</th>
                          <th>Parameter</th>
                          <th></th>
                    </tr>
                  </thead>
                <?php $i=1; foreach ($dataPenerimaan as $item): ?>
                  <tbody>
                      <tr class="text-center">
                          <td><?php echo $i++?></td>
                          <td><?php echo $item["Id_Penerimaan"]?></td>
                          <td><?php echo $item["Tanggal_Penerimaan"]?></td>
                          <td><?php echo "Rp. " ; echo number_format($item["Nominal"], 2, ".", ",")?></td>
                          <td><?php echo $item["fk_Parameter"]?></td>   
                          <td><?php echo $item["Nama_Parameter"]?></td>    
                          <td><button style="width:100%" id="btnEdit"
                                      data-id="<?php echo $item["Id_Penerimaan"] ?>"
                                      data-tanggal="<?php echo $item["Tanggal_Penerimaan"] ?>"
                                      data-nominal="<?php echo number_format($item["Nominal"], 2, ".", ",") ?>"
                                      data-id_parameter="<?php echo $item["fk_Parameter"] ?>"
                                      data-nama_parameter="<?php echo $item["Nama_Parameter"] ?>"
                                      >edit</button></td>    
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

