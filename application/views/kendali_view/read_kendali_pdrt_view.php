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
                  <li class="active"><a href="<?php echo base_url('kendalicrud');?>" style="color:black;">Home <span class="sr-only">(current)</span></a></li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:white;">Tables <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url();?>kendalicrud/read_datapermo">Tabel Permohonan</a></li>
                    <li><a href="<?php echo base_url();?>kendalicrud/read_datakendali">Tabel Kendali</a></li>
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
            <form action="<?php echo base_url(); ?>kendalicrud/searchanything" method="post" id="form_searchbar">
                <div class="col-md-6" style="padding-left:30px;">
                    <input type="text" class="form-control form-inline" name="anything" placeholder="Search Anything...">
                </div>
                <div class="col-md-1">
                    <button class="btn btn-default btn-round"><i class="fa fa-search"></i></button>
                </div>
            </form>
            <form action="<?php echo base_url(); ?>kendalicrud/rangetanggal" method="post" id="form_range_tanggal">
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

        <?php $this->load->view('core_view/filter_kendali.php'); ?>

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
                      <th class="column-with-ordering text-left" data-order-by="kecamatan">Kecamatan</th>
                      <th class="column-with-ordering text-left" data-order-by="desa_kel">DESA/KEL</th>
                      <th class="column-with-ordering text-left" data-order-by="jenis_kegiatan">Jenis Kegiatan</th>
                      <th class="column-with-ordering text-left" data-order-by="no_register">No Register</th>
                      <th class="column-with-ordering text-left" data-order-by="peninjauan_lapangan">Peninjauan Lapangan</th>
                      <th class="column-with-ordering text-left" data-order-by="perhitungan">Perhitungan</th>
                      <th class="column-with-ordering text-left" data-order-by="tanggal">Tanggal</th>
                  </tr>
                  </thead>
                  <tbody>
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
                      <td><?php echo $row->jenis_kegiatan; ?></td>
                      <td><?php echo $row->no_register; ?></td>
                      <td><?php echo $row->peninjauan_lapangan; ?></td>
                      <td><?php echo $row->perhitungan; ?></td>
                      <td><?php echo dateFormat('d/m/Y',$row->tanggal); ?></td>
                      <td>
                        <a class="btn btn-primary" href="<?php echo base_url();?>kendalicrud/edit_data/<?php echo $row->no_ktp; ?>" data-toggle="tooltip" data-placement="top" title="Ubah Data"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                        <a class="btn btn-danger" href="<?php echo base_url();?>kendalicrud/delete/<?php echo $row->no_ktp; ?>" data-toggle="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                        <button class="btn btn-success" href="<?php echo base_url();?>kendalicrud/detail_data/<?php echo $row->no_ktp; ?>" data-toggle="modal" target="#myModal" data-target="#myModal" data-placement="top" title="Detail Data"><i class="fa fa-info" aria-hidden="true"></i></button>

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

<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
      </div>
    </div>
  </div>

    <?php $this->load->view('core_view/filter_export_kendali.php'); ?>
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