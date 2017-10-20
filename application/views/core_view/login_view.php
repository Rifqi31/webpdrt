<?php $this->load->view('core_view/header'); ?>
<body style="background-color:#ecf0f1;">
<div class="container" style="padding-top: 90px;">
        
       <div class="form">
            <div class="thumbnail"><img src="<?php echo base_url('assets/img/logo-kab.png');?>"></div>             
            <form class="login-form" action="<?php echo base_url('login/cek_login'); ?>" method="post">
            	<?php validation_errors(); ?>
				<?php form_open(base_url('login/cek_login')); ?>
                <input type="text" name="username" placeholder="username"/>
                <?php echo form_error('username'); ?>
                <input type="password" name="password" placeholder="password"/>
                <?php echo form_error('password'); ?>
                    <input type="submit" class="btn btn-submit btn-login" name="btnsubmit" value="login">
            </form>
       </div>
       
    </div>
</body>
<?php $this->load->view('core_view/footer'); ?>