<div class="container">
	<center>
		<?php if($this->session->flashdata('error')){ ?>
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
		</div>
		<?php } ?>
		<div class="wrap">
			<div class="card text-center" style="width: 60rem; ">
				<div class="card-body">
					<h4 class="card-title" style="text-align:center"><b>Sistem Informasi Pengelolaan Keuangan Pembangunan Desa
							Kedung Pomahan Wetan</b></h4>
					<hr>

					<div style="float:right">
						<div class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
								aria-expanded="false">
								<i class="fas fa-user-tie fa-2x"></i>
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdown">								
							
								<li><a class="dropdown-item" href="<?php echo site_url('Login/LogOut')?>">Log Out</a></li>
							</ul>
						</div>
					</div>
					<div style="clear:both"></div>

					<div class="row">
						<div class="col-4">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title"><b>Dokumen</b></h5>
									<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
									<a href="<?php echo base_url("Dokumen")?>" class="btn btn-primary">Dokumen</a>
								</div>
							</div>
						</div>
						<div class="col-4">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title"><b>Perangkat Desa</b></h5>
									<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
									<a href="<?php echo base_url("PerangkatDesa")?>" class="btn btn-primary">Perangkat Desa</a>
								</div>
							</div>
						</div>
						<div class="col-4">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title"><b>Parameter</b></h5>
									<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
									<a href="<?php echo base_url("Parameter")?>" class="btn btn-primary">Parameter</a>
								</div>
							</div>
						</div>
						<div class="col-4 mt-2">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">PENERIMAAN </h5>
									<p class="card-text">PENERIMAAN</p>
									<a href="<?php echo site_url('Penerimaan')?>" class="btn btn-primary">PENERIMAAN</a>
								</div>
							</div>
						</div>
						<div class="col-4 mt-2">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">PENGELUARAN</h5>
									<p class="card-text">PENGELUARAN</p>
									<a href="<?php echo site_url('pengeluaran')?>" class="btn btn-primary">PENGELUARAN</a>
								</div>
							</div>
						</div>
						<div class="col-4 mt-2">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title"><b>Laporan</b></h5>
									<p class="card-text">Laporan</p>
									<a href="<?php echo site_url('laporan')?>" class="btn btn-primary">Laporan</a>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</center>
</div>
