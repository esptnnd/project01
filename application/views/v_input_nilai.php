<!DOCTYPE html>
<html>
  <head>
    <title>Input Nilai</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <meta name="description" content="Produk By Mfikri.com">
    <meta name="author" content="M Fikri Setiadi">
    <!-- Bootstrap -->
    <link href="<?php echo base_url().'assets/css/bootstrap.css'?>" rel="stylesheet">
  </head>
  <body>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
    <?php

    $x['kategori']=$this->crud_model->get_kategori();
    $this->load->view('crud_view',$x);
  
   ?>


	<script type="text/javascript">
	$(function(){
		$('.nav a').filter(function(){return this.href==location.href}).parent().addClass('active').siblings().removeClass('active')
		$('.nav a').click(function(){
			$(this).parent().addClass('active').siblings().removeClass('active')	
		})
	})
	</script>

  </body>
</html>
