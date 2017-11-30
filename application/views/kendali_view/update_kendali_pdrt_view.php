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
            <a class="navbar-brand" href="<?php echo base_url('kendalicrud');?>" style="color: white;">Web PDRT</a>
           </div>
           <div class="collapse navbar-collapse menu-text" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                  <li><a href="<?php echo base_url('kendalicrud');?>" style="color:white;">Home <span class="sr-only">(current)</span></a></li>
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
              <h4 class="title">Form Kendali PDRT</h4>
            </div>
            <div class="card-content">
            <?php foreach($rows as $row) { ?>
              <form action="<?php echo base_url('kendalicrud/update');?>" method="post">
                <div class="row">
                  <div class="form-group">
                      <div class="col-sm-4">
                         <labels>Nama Pemohon</labels>
                      </div>
                      <div class="col-md-8">
                        <input type="text" class="form-control" name="id" size="50" maxlength="30" readonly value="<?php echo $row->id; ?>" />
                        <input type="text" class="form-control" name="nama_pemohon" size="50" maxlength="30" readonly value="<?php echo $row->nama_pemohon; ?>" />
                      </div>
                  </div>
                </div><br>

               <div class="row">
                  <div class="form-group">
                    <div class="col-sm-4">
                      <labels>Kecamatan</labels>
                    </div>
                    <div class="col-md-8">
                        <select name="kecamatan" class="form-control" id="pilih_kecamatan" readonly value="<?php echo $row->kecamatan ?>">
                            <option value="<?php echo $row->kecamatan ?>"><?php echo $row->kecamatan ?></option>
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
                        <select name="desa_kel" class="form-control" id="pilih_desa_kel" readonly value="<?php echo $row->desa_kel ?>">
                          <option value="<?php echo $row->desa_kel ?>"><?php echo $row->desa_kel ?></option>
                        </select>
                      </div>
                  </div>
                </div><br>

                <div class="row">
                    <div class="form-group">
                      <div class="col-sm-4">
                        <labels>Jenis Kegiatan</labels>
                      </div>
                      <div class="col-md-8">
                          <input type="text" class="form-control" name="jenis_kegiatan" size="50" maxlength="30" readonly value="<?php echo $row->jenis_kegiatan; ?>" />
                      </div>
                    </div>
                  </div><br>

                <div class="row">
                    <div class="form-group">
                        <div class="col-sm-4">
                         <labels>No Register</labels>
                        </div>
                        <div class="col-md-4">
                         <input type="text" class="form-control" name="no_register" size="30" readonly value="<?php echo $row->no_register; ?>" />
                        </div>
                        <div class="col-md-4">
                          <textarea class="form-control" rows="5" name="keterangan_register" placeholder="keterangan register"><?php echo $row->keterangan_register; ?></textarea>
                        </div>
                      </div>
                </div><br>


                <div class="row">
                  <div class="form-group">
                    <div class="col-sm-4">
                     <labels>Peninjauan Lapangan</labels>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id='datetimepicker4' name="peninjauan_lapangan" size="30" value="<?php $row->peninjauan_lapangan; ?>"/>
                    </div>
                    <div class="col-md-4">
                      <textarea class="form-control" rows="5" name="keterangan_lapangan" placeholder="keterangan lapangan"><?php echo $row->keterangan_lapangan; ?></textarea>
                    </div>
                  </div>
                </div><br>


                <div class="row">
                  <div class="form-group">
                    <div class="col-sm-4">
                      <labels>Perhitungan</labels>
                    </div>
                    <div class="col-md-4">
                      <input type="text" class="form-control" id="datetimepicker5" name="perhitungan" value="<?php echo $row->perhitungan; ?>">
                    </div>
                    <div class="col-md-4">
                      <textarea class="form-control" rows="5" name="keterangan_perhitungan" placeholder="keterangan perhitungan"><?php echo $row->keterangan_perhitungan; ?></textarea>
                    </div>
                  </div>
                </div><br>


                <div class="row">
                  <div class="form-group">
                    <div class="col-sm-4">
                      <labels>Draft Ketik</labels>
                    </div>
                    <div class="col-md-4">
                      <input type="text" class="form-control" id="datetimepicker6" name="draft_ketik" value="<?php echo $row->draft_ketik; ?>">
                    </div>
                    <div class="col-md-4">
                      <textarea class="form-control" rows="5" name="keterangan_ketik_pdrt" placeholder="keterangan draft ketik"><?php echo $row->keterangan_ketik_pdrt; ?></textarea>
                    </div>
                  </div>
                </div><br>


                <div class="row">
                  <div class="form-group">
                    <div class="col-sm-4">
                      <labels>Draft Periksa</labels>
                    </div>
                    <div class="col-md-4">
                      <input type="text" class="form-control" id="datetimepicker7" name="draft_periksa" value="<?php echo $row->draft_periksa; ?>">
                    </div>
                    <div class="col-md-4">
                      <textarea class="form-control" rows="5" name="keterangan_periksa_pdrt" placeholder="keterangan periksa ketik"><?php echo $row->keterangan_periksa_pdrt; ?></textarea>
                    </div>
                  </div>
                </div><br>


                <div class="row">
                  <div class="form-group">
                    <div class="col-sm-4">
                      <labels>Denda Ketik</labels>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="datetimepicker8" name="denda_ketik" value="<?php echo $row->denda_ketik; ?>">
                    </div>
                     <div class="col-md-4">
                      <textarea class="form-control" rows="5" name="keterangan_ketik_denda" placeholder="keterangan denda ketik"><?php echo $row->keterangan_ketik_denda; ?></textarea>
                    </div>
                  </div>
                </div><br>


              <div class="row">
                <div class="form-group">
                  <div class="col-sm-4">
                    <labels>Denda Periksa</labels>
                  </div>
                  <div class="col-md-4">
                    <input type="text" class="form-control" id="datetimepicker9" name="denda_periksa" value="<?php echo $row->denda_periksa; ?>">
                  </div>
                  <div class="col-md-4">
                      <textarea class="form-control" rows="5" name="keterangan_periksa_denda" placeholder="keterangan denda periksa"><?php echo $row->keterangan_periksa_denda; ?></textarea>
                    </div>
                </div>
              </div><br>


              <div class="row">
                <div class="form-group">
                  <div class="col-sm-4">
                    <labels>Paraf</labels>
                  </div>
                  <div class="col-md-4">
                    <input type="text" class="form-control" id="datetimepicker10" name="paraf_kasie" value="<?php echo $row->paraf_kasie; ?>" placeholder="paraf kasie">
                  </div>
                  <div class="col-md-4">
                    <input type="text" class="form-control" id="datetimepicker11" name="paraf_kabid" value="<?php echo $row->paraf_kabid; ?>" placeholder="paraf kabid">
                  </div>
                </div>
              </div><br>


              <div class="row">
                <div class="form-group">
                  <div class="col-sm-4">
                    <labels>Keterangan Paraf Kabid/Kasie</labels>
                  </div>
                  <div class="col-md-8">
                     <textarea class="form-control" rows="5" name="keterangan_kabid_kasie"><?php echo $row->keterangan_kabid_kasie; ?></textarea>
                  </div>
                </div>
              </div><br>


              <div class="row">
                <div class="form-group">
                  <div class="col-sm-4">
                    <labels>Paraf Sekre</labels>
                  </div>
                  <div class="col-md-8">
                     <input type="text" class="form-control" id="datetimepicker12" name="paraf_sekre" value="<?php echo $row->paraf_sekre; ?>">
                  </div>
                </div>
              </div><br>


              <div class="row">
                <div class="form-group">
                  <div class="col-sm-4">
                    <labels>Paraf Dinas</labels>
                  </div>
                  <div class="col-md-8">
                     <input type="text" class="form-control" id="datetimepicker13" name="paraf_dinas" value="<?php echo $row->paraf_dinas; ?>">
                  </div>
                </div>
              </div><br>

              <div class="row">
                <div class="form-group">
                  <div class="col-sm-4">
                    <labels>No PDRT</labels>
                  </div>
                  <div class="col-md-8">
                     <input type="text" class="form-control" name="no_pdrt" value="<?php $row->no_pdrt; ?>">
                  </div>
                </div>
              </div><br>

              <div class="row">
                <div class="form-group">
                  <div class="col-sm-4">
                    <labels>Tanggal</labels>
                  </div>
                  <div class="col-md-8">
                    <input type="text" class="form-control" id='datetimepicker4' name="tanggal" size="30" readonly value="<?php echo dateFormat('d/m/Y',$row->tanggal); ?>"/>
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