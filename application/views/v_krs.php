<!DOCTYPE html>
<html>
  <head>
    <title>KRS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Produk By Mfikri.com">
    <meta name="author" content="M Fikri Setiadi">
    <!-- Bootstrap -->
    <link href="<?php echo base_url().'assets/css/bootstrap.css'?>" rel="stylesheet">


  </head>
  <body>

    <div class="container">

      <div class="col-md-12">
        <div class="row">
          <h2>Kartu Rencana Studi</h2>
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Kode</th>
                <th>Mata Kuliah</th>
                <th>Sks</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>MK0001</td>
                <td>Bahasa Pemrograman I</td>
                <td>2</td>
              </tr>
              <tr>
                <td>MK0002</td>
                <td>Web I</td>
                <td>2</td>
              </tr>
              <tr>
                <td>MK0003</td>
                <td>Algoritma II</td>
                <td>2</td>
              </tr>
              <tr>
                <td>MK0004</td>
                <td>Bahasa Inggris I</td>
                <td>2</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div> <!-- /container -->

	<script type="text/javascript">
	$(function(){
		$('.nav a').filter(function(){return this.href==location.href}).parent().addClass('active').siblings().removeClass('active')
		$('.nav a').click(function(){
			$(this).parent().addClass('active').siblings().removeClass('active')	
		})
	})
	</script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>

  </body>
</html>
