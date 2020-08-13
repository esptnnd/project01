
<nav class="navbar navbar-inverse">
<div class="container-fluid">
<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  <ul class="nav navbar-nav">
  <!--Akses Menu Untuk Admin-->
  <?php if($this->session->userdata('akses')=='1'):?>
		<li><img src="<?php echo base_url().'assets/images/eid_logo_1.png'?>" width="100px" height="20px" style="margin:15px 15px 0px 0px;"></li>
      <li class="active"><a href="<?php echo base_url().'index.php/page'?>">Dashboard</a></li>
      <li><a href="<?php echo base_url().'index.php/page/detail_alarm'?>">Detail Alarm</a></li>
      <li><a href="<?php echo base_url().'index.php/page/input_nilai'?>">Menu 1</a></li>
      <li><a href="<?php echo base_url().'index.php/page/krs'?>">Menu 2</a></li>
      <li><a href="<?php echo base_url().'index.php/page/lhs'?>">Menu 3</a></li>
  <!--Akses Menu Untuk Dosen-->
  <?php elseif($this->session->userdata('akses')=='2'):?>
    <li><img src="<?php echo base_url().'assets/images/eid_logo_1.png'?>" width="100px" height="20px" style="margin:15px 15px 0px 0px;"></li>
      <li class="active"><a href="<?php echo base_url().'index.php/page'?>">Dashboard</a></li>
      <li><a href="<?php echo base_url().'index.php/page/detail_alarm'?>">Detail Alarm</a></li>
      <li><a href="<?php echo base_url().'index.php/page/input_nilai'?>">Menu 1</a></li>
  <!--Akses Menu Untuk Mahasiswa-->
  <?php else:?>
      <li class="active"><a href="<?php echo base_url().'index.php/page'?>">Dashboard</a></li>
      <li><a href="<?php echo base_url().'index.php/page/krs'?>">Menu 1</a></li>
      <li><a href="<?php echo base_url().'index.php/page/lhs'?>">Menu 2</a></li>
  <?php endif;?>
  </ul>

  <ul class="nav navbar-nav navbar-right">
	
	<li><a href="<?php echo base_url().'index.php'?>">Hi <?php echo $this->session->userdata('ses_nama');?></a></li>
    <li><a href="<?php echo base_url().'index.php/login/logout'?>">Sign Out</a></li>
  </ul>
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>



