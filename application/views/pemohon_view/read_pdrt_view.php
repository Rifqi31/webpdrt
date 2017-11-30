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
						<a class="navbar-brand" href="<?php echo base_url();?>" style="color: white;">Web PDRT</a>
					 </div>
				   <div class="collapse navbar-collapse menu-text" id="bs-example-navbar-collapse-1">
      				<ul class="nav navbar-nav">
        					<li class="active"><a href="<?php echo base_url();?>" style="color:black;">Home <span class="sr-only">(current)</span></a></li>
        					<li><a href="<?php echo base_url('pdrtcrud/add_data');?>" style="color:white;">Input</a></li>
        					<li class="dropdown">
          					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:white;">Tables <span class="caret"></span></a>
          						<ul class="dropdown-menu">
										<li><a href="<?php echo base_url();?>pdrtcrud/read_datapermo">Tabel Permohonan</a></li>
										<li><a href="<?php echo base_url();?>pdrtcrud/read_datakendali">Tabel Kendali</a></li>
          						</ul>
        					</li>
      				</ul>
      			<ul class="nav navbar-nav navbar-right">
        				<li><a href="<?php echo base_url('login/logout'); ?>" style="color:white;">Logout</a></li>
      			</ul>
    				</div><!-- /.navbar-collapse -->
           </div>
           <!-- /.container-fluid -->
        </nav>


        <div class="row">
            <form action="<?php echo base_url(); ?>pdrtcrud/searchanything" method="post" id="form_searchbar">
                <div class="col-md-6" style="padding-left:30px;">
                    <input type="text" class="form-control form-inline" name="anything" placeholder="Search Anything...">
                </div>
                <div class="col-md-1">
                    <button class="btn btn-default btn-round"><i class="fa fa-search"></i></button>
                </div>
            </form>
            <form action="<?php echo base_url(); ?>pdrtcrud/rangetanggal" method="post" id="form_range_tanggal">
                <div class="col-md-2">
                    <input type="text" class="form-control form-inline" name="tgl_awal" id="datetimepicker4" placeholder="tanggal awal">
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control form-inline" name="tgl_akhir" id="datetimepicker5" placeholder="tanggal akhir">
                </div>
                <div class="col-md-1">
                    <button class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div><br>

        <?php $this->load->view('core_view/filter'); ?>

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
											 <th class="column-with-ordering" data-order-by="kecamatan">Kecamatan</th>
											 <th class="column-with-ordering" data-order-by="desa_kel">DESA/KEL</th>
											 <th class="column-with-ordering" data-order-by="fungsi_bangunan" width="13%">Fungsi Bangunan</th>
											 <th class="column-with-ordering" data-order-by="jenis_kegiatan" width="10%">Jenis Kegiatan</th>
											 <th class="column-with-ordering" data-order-by="luas_tanah" width="10%">Luas Tanah</th>
											 <th class="column-with-ordering" data-order-by="no_register">No Register</th>
											 <th class="column-with-ordering" data-order-by="tanggal">Tanggal</th>
											 <th class="column-with-ordering" data-order-by="ilok_ppt">ILOK/IPPT</th>
											 <th class="column-with-ordering" data-order-by="keterangan">Keterangan</th>
											 <th class="column-with-ordering" data-order-by="nomer_kk">Nomer KK</th>
										</tr>
								  </thead>
								  <tbody class="table-hover">
									<?php
										$no_data = 0;
										$no = $this->uri->segment('3') + 1;
										foreach ($rows as $row) {
										$no_data++;
										?>
										<tr>
											 <td><?php echo $no_data; ?></td>
											 <td><?php echo $row->nama_pemohon; ?></td>
											 <td><?php echo $row->kecamatan; ?></td>
											 <td><?php echo $row->desa_kel; ?></td>
											 <td><?php echo $row->fungsi_bangunan; ?></td>
											 <td><?php echo $row->jenis_kegiatan; ?></td>
											 <td><?php echo $row->luas_tanah; ?> m<sup>2</sup></td>
											 <td><?php echo $row->no_register; ?></td>
											 <td><?php echo dateFormat('d/m/Y',$row->tanggal); ?></td>
											 <td><?php echo $row->ilok_ppt; ?></td>
											 <td><?php echo $row->keterangan; ?></td>
											<td>
												<a type="button" class="btn btn-primary" href="<?php echo base_url();?>pdrtcrud/edit_data/<?php echo $row->id; ?>" data-toggle="tooltip" data-placement="top" title="Ubah Data"><i class="fa fa-pencil" aria-hidden="true"></i></a>

												<a class="btn btn-danger" href="<?php echo base_url();?>pdrtcrud/delete/<?php echo $row->id; ?>" data-toggle="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
											</td>
										</tr>
										  <?php
											 }
										?>
								  </tbody>
							 </table>
										
							</div>
						 </div>
					</div>
					<?php $this->load->view('core_view/filter_export_permo'); ?>
					<div class="row">
						<div class="col-md-12" style="text-align: center;">
							<?php
								echo $this->pagination->create_links();
							?>
						</div>

					</div>
        </div>
	</div>
<?php $this->load->view('core_view/footer'); ?>
</body>
