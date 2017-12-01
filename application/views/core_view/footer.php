	<!-- Core JS -->
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.2.1.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>

	<!-- Third Party JS -->
	<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-notify.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/angular.min.js');?>"></script>

   <!-- Datepicker -->
   <script type="text/javascript" src="<?php echo base_url('assets/js/moment.js');?>"></script>
   <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-datetimepicker.min.js');?>"></script>

   <!-- for desa js -->
   <script type="text/javascript" src="<?php echo base_url('assets/js/pilih_kec_des.js'); ?>"></script>
   <script type="text/javascript" src="<?php echo base_url('assets/js/select_des.js'); ?>"></script>

   <!-- form validation js/Jquery PLugin -->
   <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.validate.js');?>"></script>

   <!-- notification -->
   <script type="text/javascript" src="<?php echo base_url('assets/js/notify.js');?>"></script>
   <script type="text/javascript" src="<?php echo base_url('assets/js/notify.min.js');?>"></script>

    <?php if ($this->session->flashdata('insert_notifikasi') != ''){ ?>
        <script type="text/javascript">
        <!--
        $(document).ready(function() {	
            $.notify("<?php echo $this->session->flashdata('insert_notifikasi') ?>");	
        });
        //-->				
        </script>
    <?php } ?>

    <?php if ($this->session->flashdata('update_notifikasi') != ''){ ?>
        <script type="text/javascript">
        <!--
        $(document).ready(function() {	
            $.notify("<?php echo $this->session->flashdata('update_notifikasi') ?>");	
        });
        //-->				
        </script>
    <?php } ?>

    <?php if ($this->session->flashdata('delete_notifikasi') != ''){ ?>
        <script type="text/javascript">
        <!--
        $(document).ready(function() {	
            $.notify("<?php echo $this->session->flashdata('delete_notifikasi') ?>");	
        });
        //-->				
        </script>
    <?php } ?>

   <script type="text/javascript">
     $(document).ready(function(){
        $('#form_update_permo').validate({
          rules:{
            nama_pemohon:"required",
            jenis_kegiatan:"required",
            luas_tanah:"required",
            no_register:"required",
            tanggal:"required"
          },
          messages:{
            nama_pemohon:{required:'Anda harus mengisi nama pemohon'},
            jenis_kegiatan:{required:'Anda harus mengisi jenis kegiatan'},
            luas_tanah:{required:'Anda harus mengisi luas tanah'},
            tanggal:{required:'Anda harus mengisi tanggal'}
          }
        });
     });
   </script>

   <script type="text/javascript">
       $(document).ready(function(){
            $('#form_range_tanggal').validate({
                rules:{
                    tgl_awal:"required",
                    tgl_akhir:"required"
                },
                messages:{
                    tgl_awal:{required:'Tanggal awal harus diisi'},
                    tgl_akhir:{required:'Tanggal akhir harus diisi'}
                }
            });
       });
    </script>

    <script type="text/javascript">
       $(document).ready(function(){
            $('#form_range_tanggal2').validate({
                rules:{
                    tgl_awal:"required",
                    tgl_akhir:"required"
                },
                messages:{
                    tgl_awal:{required:'Tanggal awal harus diisi'},
                    tgl_akhir:{required:'Tanggal akhir harus diisi'}
                }
            });
       });
    </script>

   <script type="text/javascript">
       $(document).ready(function(){
            $('#form_searchbar').validate({
                rules:{
                    anything:"required"
                },
                messages:{
                    anything:{required:'keyword pencarian harus diisi'},
                }
            });
       });
    </script>

     <script type="text/javascript">
       $(document).ready(function(){
            $('#form_searchbar2').validate({
                rules:{
                    allkendali:"required"
                },
                messages:{
                    allkendali:{required:'keyword pencarian harus diisi'},
                }
            });
       });
    </script>

    <script type="text/javascript">
       $(document).ready(function(){
            $('#form_searchbar3').validate({
                rules:{
                    allpermo:"required"
                },
                messages:{
                    allpermo:{required:'keyword pencarian harus diisi'},
                }
            });
       });
    </script>

    <script type="text/javascript">
       $(document).ready(function(){
            $('#form_searchbar4').validate({
                rules:{
                    data_keyword:"required"
                },
                messages:{
                    data_keyword:{required:'keyword pencarian harus diisi'},
                }
            });
       });
    </script>

	<script>
		$(document).ready(function(){
    		$('[data-toggle="tooltip"]').tooltip();   
		});
	</script>

      <script type="text/javascript">
            $(function () {
                $('#datetimepicker4').datetimepicker({
                  format: 'DD/MM/YYYY'
                });
            });
        </script>


    <script type="text/javascript">
            $(function () {
                $('#datetimepicker5').datetimepicker({
                  format: 'DD/MM/YYYY'
                });
            });
        </script>


    <script type="text/javascript">
            $(function () {
                $('#datetimepicker6').datetimepicker({
                  format: 'DD/MM/YYYY'
                });
            });
        </script>

  <script type="text/javascript">
            $(function () {
                $('#datetimepicker7').datetimepicker({
                  format: 'DD/MM/YYYY'
                });
            });
        </script>

    <script type="text/javascript">
            $(function () {
                $('#datetimepicker8').datetimepicker({
                  format: 'DD/MM/YYYY'
                });
            });
        </script>

    <script type="text/javascript">
            $(function () {
                $('#datetimepicker9').datetimepicker({
                  format: 'DD/MM/YYYY'
                });
            });
        </script>

 <script type="text/javascript">
            $(function () {
                $('#datetimepicker10').datetimepicker({
                  format: 'DD/MM/YYYY'
                });
            });
        </script>

<script type="text/javascript">
            $(function () {
                $('#datetimepicker11').datetimepicker({
                  format: 'DD/MM/YYYY'
                });
            });
        </script>

    <script type="text/javascript">
            $(function () {
                $('#datetimepicker12').datetimepicker({
                  format: 'DD/MM/YYYY'
                });
            });
        </script>

 <script type="text/javascript">
            $(function () {
                $('#datetimepicker13').datetimepicker({
                  format: 'DD/MM/YYYY'
                });
            });
        </script>

<script type="text/javascript">
            $(function () {
                $('#datetimepicker14').datetimepicker({
                  format: 'DD/MM/YYYY'
                });
            });
        </script>

<script type="text/javascript">
            $(function () {
                $('#datetimepicker15').datetimepicker({
                  format: 'DD/MM/YYYY'
                });
            });
        </script>

<script type="text/javascript">
            $(function () {
                $('#datetimepicker16').datetimepicker({
                  format: 'DD/MM/YYYY'
                });
            });
        </script>

<script type="text/javascript">
            $(function () {
                $('#datetimepicker17').datetimepicker({
                  format: 'DD/MM/YYYY'
                });
            });
        </script>
