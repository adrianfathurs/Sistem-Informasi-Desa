<div class="container mb-4">
	<div class="wrap">
		<div class="card " style="width: 60rem; ">
			<div class="card-body">
				<h4 class="card-title text-center" style="text-align:center"><b>Sistem Informasi Pengelolaan Keuangan
						Pembangunan Desa Kedung Pomahan Wetan</b></h4>
				<hr>
				<div style="float:right">
					<div class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
							aria-expanded="false">
							<i class="fas fa-user-tie fa-2x"></i>
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="#">Action</a></li>
							<li><a class="dropdown-item" href="#">Another action</a></li>
							<li>
								<hr class="dropdown-divider">
							</li>
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
							<form id="form-dokumen" action="<?php echo base_url('laporan/form')?>" method="POST"
								enctype="multipart/form-data">
								<div class="form">
									<p>
										<label for="">Periode Awal</label>
										<input type="date" name="tanggal_awal">
									</p>
									<p>
										<label for="">periode akhir</label>
										<input type="date" name="tanggal_akhir">
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
									</div>
								</center>
							</form>
						</div>
					</div>
				</div>
        <center>
        <div class="col-4">  
                <button class="btn " style="width:120px; border-color:black;"><a href="<?php echo site_url("Dashboard")?>" style="color:black;display:block;">Kembali</a></button>
                </div>
        </center>
				<hr>
			</div>
		</div>
	</div>
</div>
