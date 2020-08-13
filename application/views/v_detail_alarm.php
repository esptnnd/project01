<html lang="id">
<head>
	<meta charset="utf-8">
	<title>Alarm Detail</title>
  <link href="<?php echo base_url().'assets/css/bootstrap.css'?>" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url().'assets/css/jquery.datatables.min.css'?>" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url().'assets/css/dataTables.bootstrap.css'?>" rel="stylesheet" type="text/css"/>
  

<script src="<?php echo base_url().'assets/js/jquery-2.1.4.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script src="<?php echo base_url().'assets/js/jquery.datatables.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/dataTables.bootstrap.js'?>"></script>

<style>
th { font-size: 14px; }
td { font-size: 10px; }
</style>  
</head>
<body>

  <div class="container">

	<h3>Alarm <?php 
	$x=$this->uri->segment(3);
	if($x != ''){
	echo ''.str_replace("%20"," ",$x);
	}else{
	echo 'List';
	}
	?></h3> <br>
		<!--button class="btn btn-success" data-toggle="modal" data-target="#myModalAdd">Add New</button-->
    <table class="table table-striped table-hover table-bordered" id="mytable" class="tablecss">
      <thead>
        <tr>
          <th>event Time</th>
          <th>Node Name</th>
		  <th>Alarm MO</th>
		  <th>Specific Problem</th>
          <th>Category Alarm</th>
		  <th>Details</th>
        </tr>
      </thead>
    </table>
  </div>



	 <!-- Modal POP UP-->
 	  
 	     <div class="modal fade" id="ModalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 	        <div class="modal-dialog">
 	           <div class="modal-content">
 	               <div class="modal-header">
 	                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 	                   <h4 class="modal-title" id="myModalLabel">Alarm Details</h4>
 	               </div>
 	               <div class="modal-body">
 	                   <div class="form-group">
						<b>Event Time</b>
						<pre id="event_time" style="word-wrap: break-word;font-weight:bolder;"  role="alert"> </pre>
 	                   </div>
 						<div class="form-group">
						 <b>Network Element</b>
						 <pre id="namanode" style="word-wrap: break-word;font-weight:bolder;"  role="alert"> </pre>
 	                   </div>
						<div class="form-group">
						<b>Object of Reference</b>
						 <!--input type="text" name="objectofref" class="form-control"  required disabled-->
						 <pre id="objectofref" style="word-wrap: break-word;font-weight:bolder;"  role="alert"> </pre>
						</div>
						<div class="form-group">
						<b>Probable Cause</b>
						 <!--input type="text" name="objectofref" class="form-control"  required disabled-->
						 <pre id="pcause" style="word-wrap: break-word;font-weight:bolder;"  role="alert"> </pre>
 	                   </div>						
 					   <div class="form-group">
						<b>specific problem</b>
							<!--input type="text" name="specific_problem" class="form-control"  required disabled-->
							<pre id="specific_problem" style="word-wrap: break-word;font-weight:bolder;"  role="alert"> </pre>
 	                   </div>
 					   <div class="form-group">
						<b>Alarm Category</b>						
							<pre id="category" style="word-wrap: break-word;font-weight:bolder;"  role="alert"> </pre>
						</div>
 					   <div class="form-group">
						<b>Proposed Action</b> <br>
						<pre>
						<b><div id="slideContainer"></div></b>
						</pre>
 	                   </div>						
 	               </div>
 	               <div class="modal-footer">
 	                   	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
 	                  	
 	               </div>
 	      			</div>
 	        </div>
 	     </div>
 	 




<script>
	$(document).ready(function(){
		// Setup datatables
		$.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
      {
          return {
              "iStart": oSettings._iDisplayStart,
              "iEnd": oSettings.fnDisplayEnd(),
              "iLength": oSettings._iDisplayLength,
              "iTotal": oSettings.fnRecordsTotal(),
              "iFilteredTotal": oSettings.fnRecordsDisplay(),
              "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
              "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
          };
      };

      var table = $("#mytable").dataTable({
		  
          initComplete: function() {
              var api = this.api();
              $('#mytable_filter input')
                  .off('.DT')
                  .on('input.DT', function() {
                      api.search(this.value).draw();
              });
          },
              oLanguage: {
              sProcessing: "loading..."
          },
              processing: true,
              serverSide: true,
              ajax: {"url": "<?php echo base_url().'index.php/page/coba_data/'.$this->uri->segment(3)?>", "type": "POST"},
                	columns: [
												{"data": "eventTime"},
												{"data": "NodeName"},
												//render harga dengan format angka
												{"data": "alarmingObject"},
                        {"data": "specificProblem"},
						{"data": "category_alarm"},
                        {"data": "view"}
                  ],
          		order: [[1, 'asc']],
          rowCallback: function(row, data, iDisplayIndex) {
              var info = this.fnPagingInfo();
              var page = info.iPage;
              var length = info.iLength;
              $('td:eq(0)', row).html();
          }

      });
			// end setup datatables
			// get Edit Records
			$('#mytable').on('click','.check_action',function(){

					var slides = ["slide 1", "slide 2", "slide 3", "slide 4", "slide 5"]
					var action_taken=$(this).data('action_taken');
					var action_taken_arr = action_taken.split(";");
					var str = '<ol>'
					action_taken_arr.forEach(function(action_taken_point) {
					str += '<li>'+ action_taken_point + '</li>';
					}); 
					str += '</ol>';
					document.getElementById("slideContainer").innerHTML = str;

            			var event_time=$(this).data('event_time');
						var namanode=$(this).data('namanode');
						var pcause=$(this).data('pcause');
						var category=$(this).data('category');
						var specific_problem=$(this).data('specific_problem');
						var alarm_obj=$(this).data('alarm_obj');
						var objectofref=$(this).data('objectofref');
            $('#ModalUpdate').modal('show');
						document.getElementById('event_time').innerHTML=event_time;
						document.getElementById('namanode').innerHTML=namanode;
						document.getElementById('pcause').innerHTML=pcause;
						document.getElementById('category').innerHTML=category;
						document.getElementById('specific_problem').innerHTML=specific_problem;
						document.getElementById('objectofref').innerHTML=objectofref;
						
      });
			// End Edit Records


	});
</script>
</body>
</html>
