<?php $this->load->view('core_view/header') ?>
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
        					<li><a href="<?php echo base_url();?>" style="color:white;">Home <span class="sr-only">(current)</span></a></li>
        					<li class="active"><a href="<?php echo base_url('pdrtcrud/add_data');?>" style="color:black;">Input</a></li>
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
	
	<div class="container" style="padding: 0px 200px 0px 200px;">
		<div class="card">
			<div class="card-header" data-background-color="red">
	      	<h4 class="title">Form Permohonan PDRT</h4>
	      </div>
			<div class="card-content">
				<form action="<?php echo base_url('pdrtcrud/create'); ?>" method="post">
						<?php validation_errors(); ?>
						<?php form_open(base_url('pdrtcrud/create')); ?>
						  <div class="row">
								<div class="form-group">
								  <div class="col-md-4">
									 <labels>No KTP</labels>
								  </div>
								  <div class="col-md-8">
									 <input type="number" class="form-control" name="no_ktp" size="16" maxlength="4" value="<?php echo set_value('no_ktp'); ?>" placeholder="Contoh : 1279371602936183 - Max Digit 16"/>
									 <?php echo form_error('no_ktp'); ?>
								  </div>
								</div>
						  </div><br>
					
					<div class="row">
								<div class="form-group">
								  <div class="col-md-4">
									 <labels>Nama Pemohon</labels>
								  </div>
								  <div class="col-md-8">
									 <input type="text" class="form-control" name="nama_pemohon" size="50" maxlength="30" value="<?php echo set_value('nama_pemohon'); ?>" placeholder="Masukkan  Nama Lengkap"/>
									 <?php echo form_error('nama_pemohon'); ?>
								  </div>
								</div>
							</div><br>

							<div class="row">
								<div class="form-group">
								  <div class="col-md-4">
									 <labels>Kecamatan</labels>
								  </div>
									 <div class="col-md-8">
										<select name="kecamatan" class="form-control" id="pilih_kecamatan" value="<?php echo set_value('kecamatan'); ?>">
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
										<?php echo form_error('kecamatan'); ?>
								  </div>
								</div>
							</div><br>




							<div class="row">
							 <div class="form-group">
								<div class="col-md-4">
								  <labels>Desa/Kelurahan</labels>
								</div>
								<div class="col-md-8">
								  <select name="desa_kel" class="form-control" id="pilih_desa_kel" value="<?php echo set_value('desa_kel'); ?>">
									 <option>Pilih Desa/Kelurahan</option>
								  </select>
								  <?php echo form_error('desa_kel'); ?>
								</div>
							 </div>
							</div><br>

							

							<div class="row">
							 <div class="form-group">
								<div class="col-md-4">
								  <labels>Fungsi Bangunan</labels>
								</div>
								<div class="col-md-8">
								  <select name="fungsi_bangunan" class="form-control">
									 <option selected>Fungsi Bangunan</option>
									 <option value="Hunian">Hunian</option>
									 <option value="Usaha">Usaha</option>
									 <option value="Keagmaan">Keagamaan</option>
									 <option value="Sosial Budaya">Sosial Budaya</option>
									 <option value="Campuran">Campuran</option>
								  </select>
								  <?php echo form_error('fungsi_bangunan'); ?>
								</div>
							 </div>
							</div><br>			

							<div class="row">
							 <div class="form-group">
								<div class="col-md-4">
								  <labels>Jenis Kegiatan</labels>
								</div>
								<div class="col-md-8">
								  <input type="text" class="form-control" name="jenis_kegiatan" size="50" maxlength="30" value="<?php echo set_value('jenis_kegiatan'); ?>" placeholder="Contoh: Rumah Tinggal/Hotel"/>
								  <?php echo form_error('jenis_kegiatan'); ?>
								</div>
							 </div>
							</div><br>

							 <div class="row">
							 <div class="form-group">
								<div class="col-md-4">
								 <labels>Luas Tanah</labels>
								</div>
								<div class="col-md-8">
									<div class="input-group">
								  		<input type="text" class="form-control" name="luas_tanah" size="30" value="<?php echo set_value('luas_tanah'); ?>" placeholder="Masukkan Luas Tanah"/>
								  		<?php echo form_error('luas_tanah');?>
										<span class="input-group-addon">m<sup>2</sup></span>
									</div>
								</div>
							 </div>
							</div><br>

							<div class="row">
							 <div class="form-group">
								<div class="col-md-4">
								  <labels>No Register</labels>
								</div>
								<div class="col-md-8">
								  <input type="text" class="form-control" name="no_register" size="30" value="<?php echo set_value('no_register'); ?>" placeholder="Masukkan Nomer Register"/>
								  <?php echo form_error('no_register'); ?>
								</div>
							 </div>
							</div><br>

							<div class="row">
							 <div class="form-group">
								<div class="col-md-4">
								  <labels>Tanggal</labels>
								</div>
								<div class="col-md-8">
								  <input type="text" class="form-control" id="datetimepicker4" name="tanggal" size="30" value="<?php echo set_value('tanggal'); ?>" placeholder="Masukkan Tanggal"/>
								  <?php echo form_error('tanggal'); ?>
								</div>
							 </div>
							</div><br>

							<div class="row">
							 <div class="form-group">
								<div class="col-md-4">
								  <labels>ILOK/PPT</labels>
								</div>
								<div class="col-md-8">
								  <input type="text" class="form-control" name="ilok_ppt" size="30" />
								</div>
							 </div>
							</div><br>

							<div class="row">
							 <div class="form-group">
								<div class="col-md-4">
								  <labels>Keterangan</labels>
								</div>
								<div class="col-md-8">
								  <textarea class="form-control" rows="5" name="keterangan" placeholder="Keterangan Untuk Pemohon"></textarea>
								</div>
							 </div>
							</div><br>
							<input type="submit" class="btn pull-right btn-save" name="btnsubmit" value="Simpan Data" />
					<div class="clearfix"></div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
<?php $this->load->view('core_view/footer') ?>