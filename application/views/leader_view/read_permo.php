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
        					<li><a href="<?php echo base_url('dataread');?>" style="color:white;">Home <span class="sr-only">(current)</span></a></li>
        					<li class="active"><a href="<?php echo base_url('dataread/read_data_permo');?>" style="color:black;">Permohonan</a></li>
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
            <form action="<?php echo base_url(); ?>dataread/search_permo" method="post" id="form_searchbar4">
                <div class="col-md-6" style="padding-left:30px;">
                    <input type="text" class="form-control form-inline" name="data_keyword" placeholder="Search Anything...">
                </div>
                <div class="col-md-1">
                    <button class="btn btn-default btn-round"><i class="fa fa-search"></i></button>
                </div>
            </form>
            <form action="<?php echo base_url(); ?>dataread/range_tanggal_permo" method="post" id="form_range_tanggal">
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

		 <div class="row">
		   <form action="<?php echo base_url();?>dataread/filter_permo" method="post">
		         <div class="col-sm-2" style="padding-left:30px;">
		            <select class="form-control form-inline" id="pilih_kecamatan" name="kecamatan">
		                <option value="base" selected>Pilih kecamatan</option>
		                <option value="Babakan Madang">Babakan Madang</option>
		                <option value="Bojonggede">Bojonggede</option>
		                <option value="Caringin">Caringin</option>
		                <option value="Cariu">Cariu</option>
		                <option value="Ciampea">Ciampea</option>
		                <option value="Ciawi">Ciawi</option>
		                <option value="Cibinong">Cibinong</option>
		                <option value="Cibungbulang">Cibungbulang</option>
		                <option value="Cigombong">Cigombong</option>
		                <option value="Cigudeg">Cigudeg</option>
		                <option value="Cijeruk">Cijeruk</option>
		                <option value="Cileungsi">Cileungsi</option>
		                <option value="Ciomas">Ciomas</option>
		                <option value="Cisarua">Cisarua</option>
		                <option value="Ciseeng">Ciseeng</option>
		                <option value="Citereup">Citereup</option>
		                <option value="Dramaga">Dramaga</option>
		                <option value="Gunung Putri">Gunung Putri</option>
		                <option value="Gunung Sindur">Gunung Sindur</option>
		                <option value="Jasinga">Jasinga</option>
		                <option value="Jonggol">Jonggol</option>
		                <option value="Kemang">Kemang</option>
		                <option value="Klapanunggal">Klapanunggal</option>
		                <option value="Leuwiliang">Leuwiliang</option>
		                <option value="Leuwisadeng">Leuwisadeng</option>
		                <option value="Megamendung">Megamendung</option>
		                <option value="Nanggung">Nanggung</option>
		                <option value="Pamijahan">Pamijahan</option>
		                <option value="Parung">Parung</option>
		                <option value="Parung Panjang">Parung Panjang</option>
		                <option value="Ranca Bungur">Ranca Bungur</option>
		                <option value="Rumpin">Rumpin</option>
		                <option value="Sukajaya">Sukajaya</option>
		                <option value="Sukamakmur">Sukamakmur</option>
		                <option value="Sukaraja">Sukaraja</option>
		                <option value="Tajur halang">Tajur halang</option>
		                <option value="Tamansari">Tamansari</option>
		                <option value="Tanjungsari">Tanjungsari</option>
		                <option value="Tenjo">Tenjo</option>
		                <option value="Tenjolaya">Tenjolaya</option>
		            </select>
		        </div>
		        <div class="col-sm-2">
		            <select class="form-control" id="pilih_desa_kel" name="desa_kel">
		                <option>Pilih Desa/Kelurahan</option>
		            </select>
		        </div>  
		        <div class="col-sm-2">
		            <select class="form-control form-inline" name="fungsi_bangunan">
		                <option selected="selected" disabled="disabled" value="">Fungsi Bangunan</option>
		                <option value="Hunian">Hunian</option>
		                <option value="Usaha">Usaha</option>
		                <option value="Keagmaan">Keagamaan</option>
		                <option value="Sosial Budaya">Sosial Budaya</option>
		                <option value="Campuran">Campuran</option>
		            </select>
		        </div>
		        <div class="col-md-1">
		            <input class="btn btn-success" type="submit" name="btnsubmit" value="filter">
		        </div>
		    </form>

		</div>
		<br>
 
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
										foreach ($rows as $row) {
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
				<div class="col-md-12" style="text-align: center;">
					<?php
						echo $this->pagination->create_links();
					?>
				</div>
			</div>
	</div>
<?php $this->load->view('core_view/footer'); ?>
</body>
