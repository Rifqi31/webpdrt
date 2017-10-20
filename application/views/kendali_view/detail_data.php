<?php $this->load->view('core_view/header'); ?>
<body>
  <div class="container" style="padding-right: 300px;">
          <div class="card">
            <div class="card-header" data-background-color="red">
              <h4 class="title">Detail Data Kendali PDRT</h4>
            </div>
            <div class="card-content">
            <?php foreach($rows as $row) { ?>
                <div class="row">
                  <div class="form-group">
                      <div class="col-sm-4">
                         <labels>No KTP</labels>
                      </div>
                      <div class="col-md-8">
                        <input type="number" class="form-control" name="no_ktp" size="16" readonly value="<?php echo $row->no_ktp;?>" />
                        <p></p>
                      </div>
                  </div>
                </div><br>

                <div class="row">
                  <div class="form-group">
                      <div class="col-sm-4">
                         <labels>Nama Pemohon</labels>
                      </div>
                      <div class="col-md-8">
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
                          <textarea class="form-control" rows="5" name="keterangan_register" readonly placeholder="keterangan register"><?php echo $row->keterangan_register; ?></textarea>
                        </div>
                      </div>
                </div><br>


                <div class="row">
                  <div class="form-group">
                    <div class="col-sm-4">
                     <labels>Peninjauan Lapangan</labels>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id='datetimepicker4' name="peninjauan_lapangan" size="30" readonly value="<?php echo $row->peninjauan_lapangan; ?>"/>
                    </div>
                    <div class="col-md-4">
                      <textarea class="form-control" rows="5" name="keterangan_lapangan" readonly placeholder="keterangan lapangan"><?php echo $row->keterangan_lapangan; ?></textarea>
                    </div>
                  </div>
                </div><br>


                <div class="row">
                  <div class="form-group">
                    <div class="col-sm-4">
                      <labels>Perhitungan</labels>
                    </div>
                    <div class="col-md-4">
                      <input type="text" class="form-control" id="datetimepicker5" name="perhitungan" readonly value="<?php echo $row->perhitungan; ?>">
                    </div>
                    <div class="col-md-4">
                      <textarea class="form-control" rows="5" name="keterangan_perhitungan" readonly placeholder="keterangan perhitungan"><?php echo $row->keterangan_perhitungan; ?></textarea>
                    </div>
                  </div>
                </div><br>


                <div class="row">
                  <div class="form-group">
                    <div class="col-sm-4">
                      <labels>Draft Ketik</labels>
                    </div>
                    <div class="col-md-4">
                      <input type="text" class="form-control" id="datetimepicker6" name="draft_ketik" readonly value="<?php echo $row->draft_ketik; ?>">
                    </div>
                    <div class="col-md-4">
                      <textarea class="form-control" rows="5" name="keterangan_ketik_pdrt" readonly placeholder="keterangan draft ketik"><?php echo $row->keterangan_ketik_pdrt; ?></textarea>
                    </div>
                  </div>
                </div><br>


                <div class="row">
                  <div class="form-group">
                    <div class="col-sm-4">
                      <labels>Draft Periksa</labels>
                    </div>
                    <div class="col-md-4">
                      <input type="text" class="form-control" id="datetimepicker7" name="draft_periksa" readonly value="<?php echo $row->draft_periksa; ?>">
                    </div>
                    <div class="col-md-4">
                      <textarea class="form-control" rows="5" name="keterangan_periksa_pdrt" readonly placeholder="keterangan periksa ketik"><?php echo $row->keterangan_periksa_pdrt; ?></textarea>
                    </div>
                  </div>
                </div><br>


                <div class="row">
                  <div class="form-group">
                    <div class="col-sm-4">
                      <labels>Denda Ketik</labels>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="datetimepicker8" name="denda_ketik" readonly value="<?php echo $row->denda_ketik; ?>">
                    </div>
                     <div class="col-md-4">
                      <textarea class="form-control" rows="5" name="keterangan_ketik_denda" readonly placeholder="keterangan denda ketik"><?php echo $row->keterangan_ketik_denda; ?></textarea>
                    </div>
                  </div>
                </div><br>


              <div class="row">
                <div class="form-group">
                  <div class="col-sm-4">
                    <labels>Denda Periksa</labels>
                  </div>
                  <div class="col-md-4">
                    <input type="text" class="form-control" id="datetimepicker9" name="denda_periksa" readonly value="<?php echo $row->denda_periksa; ?>">
                  </div>
                  <div class="col-md-4">
                      <textarea class="form-control" rows="5" name="keterangan_periksa_denda" readonly placeholder="keterangan denda periksa"><?php echo $row->keterangan_periksa_denda; ?></textarea>
                    </div>
                </div>
              </div><br>


              <div class="row">
                <div class="form-group">
                  <div class="col-sm-4">
                    <labels>Paraf Kasie & Kabid</labels>
                  </div>
                  <div class="col-md-4">
                    <input type="text" class="form-control" id="datetimepicker10" name="paraf_kasie" readonly value="<?php echo $row->paraf_kasie; ?>" placeholder="paraf kasie">
                  </div>
                  <div class="col-md-4">
                    <input type="text" class="form-control" id="datetimepicker11" name="paraf_kabid" readonly value="<?php echo $row->paraf_kabid; ?>" placeholder="paraf kabid">
                  </div>
                </div>
              </div><br>


              <div class="row">
                <div class="form-group">
                  <div class="col-sm-4">
                    <labels>Keterangan Paraf Kabid/Kasie</labels>
                  </div>
                  <div class="col-md-8">
                     <textarea class="form-control" rows="5" readonly name="keterangan_kabid_kasie"><?php echo $row->keterangan_kabid_kasie; ?></textarea>
                  </div>
                </div>
              </div><br>


              <div class="row">
                <div class="form-group">
                  <div class="col-sm-4">
                    <labels>Paraf Sekre</labels>
                  </div>
                  <div class="col-md-8">
                     <input type="text" class="form-control" id="datetimepicker12" name="paraf_sekre" readonly value="<?php echo $row->paraf_sekre; ?>">
                  </div>
                </div>
              </div><br>


              <div class="row">
                <div class="form-group">
                  <div class="col-sm-4">
                    <labels>Paraf Dinas</labels>
                  </div>
                  <div class="col-md-8">
                     <input type="text" class="form-control" id="datetimepicker13" name="paraf_dinas" readonly value="<?php echo $row->paraf_dinas; ?>">
                  </div>
                </div>
              </div><br>

               <div class="row">
                <div class="form-group">
                  <div class="col-sm-4">
                    <labels>No PDRT</labels>
                  </div>
                  <div class="col-md-8">
                     <input type="text" class="form-control" name="no_pdrt" readonly value="<?php echo $row->no_pdrt; ?>">
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
              <button type="button" class="btn pull-right btn-save" data-dismiss="modal">Close</button>
                  <div class="clearfix"></div>
            <?php } ?>
            </div>
          </div>
        </div>
<?php $this->load->view('core_view/footer'); ?>
</body>