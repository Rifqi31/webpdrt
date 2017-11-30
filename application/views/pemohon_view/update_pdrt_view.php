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
                  <li><a href="<?php echo base_url();?>" style="color:white;">Home <span class="sr-only">(current)</span></a></li>
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

        <div class="container" style="padding: 0px 200px 0px 200px;">
          <div class="card">
            <div class="card-header" data-background-color="red">
              <h4 class="title">Form Permohonan PDRT</h4>
            </div>
            <div class="card-content">
            <?php foreach($rows as $row) { ?>
               <form action="<?php echo base_url('pdrtcrud/update');?>" method="post" id="form_update_permo">
                <div class="row">
                  <div class="form-group">
                      <div class="col-sm-4">
                         <labels>Nama Pemohon</labels>
                      </div>
                      <div class="col-md-8">
                        <input type="hidden" class="form-control" name="id" size="50" maxlength="100" value="<?php echo $row->id; ?>" />
                        <input type="text" class="form-control" name="nama_pemohon" size="50" maxlength="100" value="<?php echo $row->nama_pemohon; ?>" />
                      </div>
                  </div>
                </div><br>

              <div class="row">
                <div class="form-group">
                    <div class="col-sm-4">
                       <labels>Kecamatan</labels>
                    </div>
                    <div class="col-md-8">
                       <select name="kecamatan" class="form-control" id="pilih_kecamatan" value="<?php echo set_value('kecamatan'); ?>">
                          <option value="base" selected>Pilih kecamatan</option>
                          <option value="Babakan Madang" <?php echo set_select('kecamatan','Babakan Madang', ($row->kecamatan == 'Babakan Madang')); ?>>Babakan Madang</option>
                          
                          <option value="Bojonggede" <?php echo set_select('kecamatan','Bojonggede', ($row->kecamatan == 'Bojonggede')); ?>>Bojonggede</option>

                          <option value="Caringin" <?php echo set_select('kecamatan','Caringin', ($row->kecamatan == 'Caringin')); ?>>Caringin</option>

                          <option value="Cariu" <?php echo set_select('kecamatan','Cariu', ($row->kecamatan == 'Cariu')); ?>>Cariu</option>

                          <option value="Ciampea" <?php echo set_select('kecamatan','Ciampea', ($row->kecamatan == 'Ciampea')); ?>>Ciampea</option>

                          <option value="Ciawi" <?php echo set_select('kecamatan','Ciawi', ($row->kecamatan == 'Ciawi')); ?>>Ciawi</option>

                          <option value="Cibinong" <?php echo set_select('kecamatan','Cibinong', ($row->kecamatan == 'Cibinong')); ?>>Cibinong</option>

                          <option value="Cibungbulang" <?php echo set_select('kecamatan','Cibungbulang', ($row->kecamatan == 'Cibungbulang')); ?>>Cibungbulang</option>

                          <option value="Cigombong" <?php echo set_select('kecamatan','Cigombong', ($row->kecamatan == 'Cigombong')); ?>>Cigombong</option>

                          <option value="Cigudeg" <?php echo set_select('kecamatan','Cigudeg', ($row->kecamatan == 'Cigudeg')); ?>>Cigudeg</option>

                          <option value="Cijeruk" <?php echo set_select('kecamatan','Cijeruk', ($row->kecamatan == 'Cijeruk')); ?>>Cijeruk</option>

                          <option value="Cileungsi" <?php echo set_select('kecamatan','Cileungsi', ($row->kecamatan == 'Cileungsi')); ?>>Cileungsi</option>

                          <option value="Ciomas" <?php echo set_select('kecamatan','Ciomas', ($row->kecamatan == 'Ciomas')); ?>>Ciomas</option>

                          <option value="Cisarua" <?php echo set_select('kecamatan','Cisarua', ($row->kecamatan == 'Cisarua')); ?>>Cisarua</option>

                          <option value="Ciseeng" <?php echo set_select('kecamatan','Ciseeng', ($row->kecamatan == 'Ciseeng')); ?>>Ciseeng</option>

                          <option value="Citereup" <?php echo set_select('kecamatan','Citereup', ($row->kecamatan == 'Citereup')); ?>>Citereup</option>

                          <option value="Dramaga" <?php echo set_select('kecamatan','Dramaga', ($row->kecamatan == 'Dramaga')); ?>>Dramaga</option>

                          <option value="Gunung Putri" <?php echo set_select('kecamatan','Gunung Putri', ($row->kecamatan == 'Gunung Putri')); ?>>Gunung Putri</option>

                          <option value="Gunung Sindur" <?php echo set_select('kecamatan','Gunung Sindur', ($row->kecamatan == 'Gunung Sindur')); ?>>Gunung Sindur</option>

                          <option value="Jasinga" <?php echo set_select('kecamatan','Jasinga', ($row->kecamatan == 'Jasinga')); ?>>Jasinga</option>

                          <option value="Jonggol" <?php echo set_select('kecamatan','Jonggol', ($row->kecamatan == 'Jonggol')); ?>>Jonggol</option>

                          <option value="Kemang" <?php echo set_select('kecamatan','Kemang', ($row->kecamatan == 'Kemang')); ?>>Kemang</option>

                          <option value="Klapanunggal" <?php echo set_select('kecamatan','Klapanunggal', ($row->kecamatan == 'Klapanunggal')); ?>>Klapanunggal</option>

                          <option value="Leuwiliang" <?php echo set_select('kecamatan','Leuwiliang', ($row->kecamatan == 'Leuwiliang')); ?>>Leuwiliang</option>

                          <option value="Leuwisadeng" <?php echo set_select('kecamatan','Leuwisadeng', ($row->kecamatan == 'Leuwisadeng')); ?>>Leuwisadeng</option>

                          <option value="Megamendung" <?php echo set_select('kecamatan','Megamendung', ($row->kecamatan == 'Megamendung')); ?>>Megamendung</option>

                          <option value="Nanggung" <?php echo set_select('kecamatan','Nanggung', ($row->kecamatan == 'Nanggung')); ?>>Nanggung</option>

                          <option value="Pamijahan" <?php echo set_select('kecamatan','Pamijahan', ($row->kecamatan == 'Pamijahan')); ?>>Pamijahan</option>

                          <option value="Parung" <?php echo set_select('kecamatan','Parung', ($row->kecamatan == 'Parung')); ?>>Parung</option>

                          <option value="Parung Panjang" <?php echo set_select('kecamatan','Parung Panjang', ($row->kecamatan == 'Parung Panjang')); ?>>Parung Panjang</option>

                          <option value="Ranca Bungur" <?php echo set_select('kecamatan','Ranca Bungur', ($row->kecamatan == 'Ranca Bungur')); ?>>Ranca Bungur</option>

                          <option value="Rumpin" <?php echo set_select('kecamatan','Rumpin', ($row->kecamatan == 'Rumpin')); ?>>Rumpin</option>

                          <option value="Sukajaya" <?php echo set_select('kecamatan','Sukajaya', ($row->kecamatan == 'Sukajaya')); ?>>Sukajaya</option>

                          <option value="Sukamakmur" <?php echo set_select('kecamatan','Sukamakmur', ($row->kecamatan == 'Sukamakmur')); ?>>Sukamakmur</option>

                          <option value="Sukaraja" <?php echo set_select('kecamatan','Sukaraja', ($row->kecamatan == 'Sukaraja')); ?>>Sukaraja</option>

                          <option value="Tajur halang" <?php echo set_select('kecamatan','Tajur halang', ($row->kecamatan == 'Tajur halang')); ?>>Tajur halang</option>

                          <option value="Tamansari" <?php echo set_select('kecamatan','Tamansari', ($row->kecamatan == 'Tamansari')); ?>>Tamansari</option>

                          <option value="Tanjungsari" <?php echo set_select('kecamatan','Tanjungsari', ($row->kecamatan == 'Tanjungsari')); ?>>Tanjungsari</option>

                          <option value="Tenjo" <?php echo set_select('kecamatan','Tenjo', ($row->kecamatan == 'Tenjo')); ?>>Tenjo</option>

                          <option value="Tenjolaya" <?php echo set_select('kecamatan','Tenjolaya', ($row->kecamatan == 'Tenjolaya')); ?>>Tenjolaya</option>
                        </select>
                    </div>
                </div>
              </div><br>

              <div class="row">
                  <div class="form-group">
                      <div class="col-sm-4">
                         <labels>Desa/Kelurahan</labels>
                      </div>
                      <div class="col-md-8">
                        <select name="desa_kel" class="form-control" id="pilih_desa_kel" value="<?php echo set_value('desa_kel'); ?>">
                          <option value="<?php echo $row->desa_kel ?>"><?php echo $row->desa_kel ?></option>
                        </select>
                      </div>
                  </div>
                </div><br>
      

                 <div class="row">
                  <div class="form-group">
                      <div class="col-sm-4">
                        <labels>Fungsi Bangunan</labels>
                      </div>
                      <div class="col-md-8">
                         <select name="fungsi_bangunan" class="form-control">
                            <option value="Hunian" <?php echo set_select('fungsi_bangunan','Hunian', ($row->fungsi_bangunan == 'Hunian')); ?>>Hunian</option>
                            
                            <option value="Usaha" <?php echo set_select('fungsi_bangunan','Usaha', ($row->fungsi_bangunan == 'Usaha')); ?>>Usaha</option>
                            
                            <option value="Keagmaan" <?php echo set_select('fungsi_bangunan','Keagamaan', ($row->fungsi_bangunan == 'Keagamaan')); ?>>Keagamaan</option>
                            
                            <option value="Sosial Budaya" <?php echo set_select('fungsi_bangunan','Sosial Budaya', ($row->fungsi_bangunan == 'Sosial Budaya')); ?>>Sosial Budaya</option>
                            
                            <option value="Campuran" <?php echo set_select('fungsi_bangunan','Campuran', ($row->fungsi_bangunan == 'Campuran')); ?>>Campuran</option>
                        </select><br>

                      </div>
                  </div>
                </div><br>


                <div class="row">
                    <div class="form-group">
                      <div class="col-sm-4">
                        <labels>Jenis Kegiatan</labels>
                      </div>
                      <div class="col-md-8">
                          <input type="text" class="form-control" name="jenis_kegiatan" size="50" maxlength="30" value="<?php echo $row->jenis_kegiatan; ?>" />
                      </div>
                    </div>
                  </div><br>


                   <div class="row">
                      <div class="form-group">
                        <div class="col-sm-4">
                         <labels>Luas Tanah</labels>
                        </div>
                        <div class="col-md-8">
                          <div class="input-group">
                            <input type="text" class="form-control" name="luas_tanah" size="30" value="<?php echo $row->luas_tanah; ?>"/>
                            <span class="input-group-addon">m<sup>2</sup></span>
                          </div>
                        </div>
                      </div>
                    </div><br>

                    <div class="row">
                      <div class="form-group">
                        <div class="col-sm-4">
                         <labels>No Register</labels>
                        </div>
                        <div class="col-md-8">
                         <input type="text" class="form-control" name="no_register" size="30" value="<?php echo $row->no_register; ?>" />
                        </div>
                      </div>
                    </div><br>

                   <div class="row">
                    <div class="form-group">
                      <div class="col-sm-4">
                       <labels>Tanggal</labels>
                      </div>
                      <div class="col-md-8">
                        <input type="text" class="form-control" id="datetimepicker4" name="tanggal" size="30" value="<?php echo dateFormat('d/m/Y',$row->tanggal); ?>"/>
                      </div>
                    </div>
                  </div><br>

                  <div class="row">
                    <div class="form-group">
                      <div class="col-sm-4">
                       <labels>ILOK/PPT</labels>
                      </div>
                      <div class="col-md-8">
                        <input type="text" class="form-control" name="ilok_ppt" size="30" value="<?php echo $row->ilok_ppt; ?>"/>
                      </div>
                    </div>
                  </div><br>

                  <div class="row">
                    <div class="form-group">
                      <div class="col-sm-4">
                       <labels>Keterangan</labels>
                      </div>
                       <div class="col-md-8">
                        <textarea class="form-control" rows="5" name="keterangan"><?php echo $row->keterangan; ?></textarea>
                      </div>
                    </div>
                  </div><br>
                    <input type="submit" class="btn pull-right btn-save" name="btnsubmit" value="Ubah Data" />
                    <div class="clearfix"></div>
                </form>
               <?php } ?>
            </div>
          </div>
        </div>
</div>
</body>
<?php $this->load->view('core_view/footer'); ?>