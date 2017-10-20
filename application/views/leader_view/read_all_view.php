<?php $this->load->view('core_view/header'); ?>
<body style="background-color:#ecf0f1;">
    <div class="wrapper">
     <nav class="navbar navbar-default navbar-static-top color-navbar">
           <div class="container-fluid">
					
					<!-- Brand and toggle get grouped for better mobile display -->
					 <div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						  <span class="sr-only">Toggle navigation</span>
						  <span class="icon-bar"></span>
						  <span class="icon-bar"></span>
						  <span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="<?php echo base_url('dataread');?>" style="color: white;">Web PDRT</a>
					 </div>
				   <div class="collapse navbar-collapse menu-text" id="bs-example-navbar-collapse-1">
      				<ul class="nav navbar-nav">
        					<li class="active"><a href="<?php echo base_url('dataread');?>" style="color:black;">Home <span class="sr-only">(current)</span></a></li>
        					<li><a href="<?php echo base_url('dataread/read_data_permo');?>" style="color:white;">Permohonan</a></li>
        					<li><a href="<?php echo base_url('dataread/read_data_kendali');?>" style="color:white;">Kendali</a></li>
      				</ul>
      			<ul class="nav navbar-nav navbar-right">
        				<li><a href="<?php echo base_url('login/logout'); ?>" style="color:white;">Logout</a></li>
      			</ul>
    				</div><!-- /.navbar-collapse -->
           </div>
           <!-- /.container-fluid -->
        </nav>


        <div class="row">
        	<div class="col-md-12">

		         <div class="container-fluid">
					<div class="card">
						<div class="card-header" data-background-color="red">
	               	<h4 class="title">Tabel Permohonan</h4>
	                  <p class="category">Data Permohonan PDRT</p>
	            	</div>
							<div class="card-block">
								<div class="scroll-if-required">
									<table class="table">
								  <thead>
										<tr>
											 <th>No</th>
											 <th class="column-with-ordering text-left" data-order-by="nama_pemohon" width="10%">Nama Pemohon</th>
											 <th class="column-with-ordering" data-order-by="desa_kel">DESA/KEL</th>
											 <th class="column-with-ordering" data-order-by="kecamatan">Kecamatan</th>
											 <th class="column-with-ordering" data-order-by="fungsi_bangunan" width="13%">Fungsi Bangunan</th>
											 <th class="column-with-ordering" data-order-by="jenis_kegiatan" width="10%">Jenis Kegiatan</th>
											 <th class="column-with-ordering" data-order-by="luas_tanah" width="10%">Luas Tanah</th>
											 <th class="column-with-ordering" data-order-by="no_register">No Register</th>
											 <th class="column-with-ordering" data-order-by="tanggal">Tanggal</th>
											 <th class="column-with-ordering" data-order-by="ilok_ppt">ILOK/IPPT</th>
											 <th class="column-with-ordering" data-order-by="keterangan">Keterangan</th>
										</tr>
								  </thead>
								  <tbody class="table-hover">
									<?php
										$no_data = 0;
										$no = $this->uri->segment('3') + 1;
										foreach ($rows_permo as $row) {
										$no_data++;
										?>
										<tr>
											 <td><?php echo $no_data; ?></td>
											 <td><?php echo $row->nama_pemohon; ?></td>
											 <td><?php echo $row->desa_kel; ?></td>
											 <td><?php echo $row->kecamatan; ?></td>
											 <td><?php echo $row->fungsi_bangunan; ?></td>
											 <td><?php echo $row->jenis_kegiatan; ?></td>
											 <td><?php echo $row->luas_tanah; ?> m<sup>2</sup></td>
											 <td><?php echo $row->no_register; ?></td>
											 <td><?php echo dateFormat('d/m/Y',$row->tanggal); ?></td>
											 <td><?php echo $row->ilok_ppt; ?></td>
											 <td><?php echo $row->keterangan; ?></td>
										</tr>
										  <?php
											 }
										?>
								  </tbody>
							 </table>
										
							</div>
						 </div>
					</div>
        </div>
	        	<div class="row">
					<div class="col-md-6" style="text-align: center;">
						<?php
							echo $this->pagination->create_links();
						?>
					</div>
				</div>
        	</div>
        </div>

        <div class="row">
        	<div class="col-md-12">
 				<div class="container-fluid">
					<div class="card">
						<div class="card-header" data-background-color="red">
	               	<h4 class="title">Tabel Kendali</h4>
	                  <p class="category">Data Kendali PDRT</p>
	            	</div>
							<div class="card-block">
								<div class="scroll-if-required">
									<table class="table">
								  <thead>
										<tr>
											 <th>No</th>
											 <th class="column-with-ordering text-left" data-order-by="nama_pemohon">Nama Pemohon</th>
											 <th class="column-with-ordering" data-order-by="desa_kel">DESA/KEL</th>
											 <th class="column-with-ordering" data-order-by="kecamatan">Kecamatan</th>
											 <th class="column-with-ordering" data-order-by="jenis_kegiatan" width="10%">Jenis Kegiatan</th>
											 <th class="column-with-ordering" data-order-by="no_register">No Register</th>
											 <th class="column-with-ordering" data-order-by="peninjauan_lapangan">Peninjauan Lapangan</th>
											 <th class="column-with-ordering" data-order-by="perhitungan">Perhitungan</th>
											 <th class="column-with-ordering" data-order-by="draft_ketik">Draft Ketik</th>
											 <th class="column-with-ordering" data-order-by="draft_periksa">Draft Periksa</th>
											 <th class="column-with-ordering" data-order-by="denda_ketik">Denda Ketik</th>
											 <th class="column-with-ordering" data-order-by="denda_periksa">Tanggal</th>
											 
										</tr>
								  </thead>
								  <tbody class="table-hover">
									<?php
										$no_data = 0;
										$no = $this->uri->segment('3') + 1;
										foreach ($rows_kendali as $row) {
										$no_data++;
										?>
										<tr>
											 <td><?php echo $no_data; ?></td>
											 <td><?php echo $row->nama_pemohon; ?></td>
											 <td><?php echo $row->desa_kel; ?></td>
											 <td><?php echo $row->kecamatan; ?></td>
											 <td><?php echo $row->jenis_kegiatan; ?></td>
											 <td><?php echo $row->no_register; ?></td>
											 <td><?php echo $row->peninjauan_lapangan; ?></td>
											 <td><?php echo $row->perhitungan; ?></td>
											 <td><?php echo $row->draft_ketik; ?></td>
											 <td><?php echo $row->draft_periksa; ?></td>
											 <td><?php echo $row->denda_ketik; ?></td>
											 <td><?php echo dateFormat('d/m/Y',$row->tanggal); ?></td>
										</tr>
										  <?php
											 }
										?>
								  </tbody>
							 </table>
										<div class="row">
										  <div class="col-md-6">
											 <?php
												echo $this->pagination->create_links();
											 ?>
										  </div>

										</div>
							</div>
						 </div>
					</div>

        		</div>
        	</div>
        </div>

    </div>
</body>
<?php $this->load->view('core_view/footer'); ?>