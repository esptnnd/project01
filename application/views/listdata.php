<html lang="id">
<head>

<style type="text/css">
.pull-left{float:left!important;}
.pull-right{float:right!important;}
</style>

	<meta charset="utf-8">
	<title>ENIQ Data Availbility Monitoring</title>
	<link href="<?php echo base_url().'assets/css/bootstrap.css'?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url().'assets/css/mycss.css'?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url().'assets/css/jquery.datatables.min.css'?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url().'assets/css/dataTables.bootstrap.css'?>" rel="stylesheet" type="text/css"/>
</head>
<body>
    <div class="container" style="width:90%;">
   


	<div class="row">
	<div class="col-md-2">

    <table class="table table-striped" id="mytable">
      <thead>
        <tr>
          <th>NAME</th>  		  
        </tr>
      </thead>
    </table>
	
	</div>
	<div class="col-md-9">
	<div class="container">
	<div class="row">

	

		<div class="col-xs-3">
		<div id="chart1"></div>	
		</div>
		<div class="col-xs-3">
		<div id="chart2"></div>	
		</div>
		<div class="col-xs-3">
		<div id="chart3"></div>	
		</div>
		<div class="col-xs-3">
		<div id="chart4"></div>	
		</div>	
	
				<pre>
			Tester Monitoring DATA
			Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
				</pre>	
	
	
	</div>
	
	</div>
	
	
	
	 <!-- Modal Update Produk-->
 	  <!-- form id="add-row-form" action="<?php echo base_url().'index.php/page/update'?>" method="post">
 	     <div id="ModalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 	        <div class="modal-dialog">
 	           <div class="modal-content">
 	               <div class="modal-header">
 	                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 	                   <h4 class="modal-title" id="myModalLabel">Chart data</h4>
 	               </div>
 	               <div class="modal-body">
 	                   <div class="form-group">
 	                       <input type="text" name="kode_barang" class="form-control" placeholder="Kode Barang" required>
 	                   </div>
 										 <div class="form-group">
 	                       <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" required>
 	                   </div>
 										 <div class="form-group">
 	                       <select name="kategori" class="form-control" placeholder="Kode Barang" required>
 													  <?php foreach ($kategori->result() as $row) :?>
 													 		<option value="<?php echo $row->kategori_id;?>"><?php echo $row->kategori_nama;?></option>
 													 	<?php endforeach;?>
 												 </select>
 	                   </div>
 										 <div class="form-group">
 	                       <input type="text" name="harga" class="form-control" placeholder="Harga" required>
 	                   </div>

 	               </div>
 	               <div class="modal-footer">
 	                   	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
 	                  	<button type="submit" id="add-row" class="btn btn-success">Update</button>
 	               </div>
 	      			</div>
 	        </div>
 	     </div>
 	 </form-->	
	
	</div>
	</div>
  </div>




<script src="<?php echo base_url().'assets/js/highchart/highcharts.js'?>"></script>
<script src="<?php echo base_url().'assets/js/highchart/data.js'?>"></script>
<script src="<?php echo base_url().'assets/js/highchart/exporting.js'?>"></script>



<script src="<?php echo base_url().'assets/js/jquery-2.1.4.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script src="<?php echo base_url().'assets/js/jquery.datatables.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/dataTables.bootstrap.js'?>"></script>

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
		    "pageLength": 30,
			"bInfo" : false,
			"bLengthChange": false,
			"dom": '<"pull-left"f><"pull-right"l>tip',
			//"pagingType": "scrolling",

          initComplete: function() {
              var api = this.api();
              $('#mytable_filter input')
                  .off('.DT')
                  .on('input.DT', function() {
                      api.search(this.value).draw();
              });
          },
              oLanguage: {
              sProcessing: "Fetching..."
          },
              processing: true,
              serverSide: true,
              ajax: {"url": "<?php echo base_url().'index.php/page/get_list_json'?>", "type": "POST"},
                	columns: [
					//{"data": "nodename", "id": "nodename"}
    { "data": "nodename", "name": "nodename",
        fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
            $(nTd).html('<a href="javascript:void(0);" class="none" data-node="'+oData.nodename+'">'+oData.nodename+'</a>');
        }
	}
					//{"data": "listnodes"}
			
                  ],

          rowCallback: function(row, data, iDisplayIndex) {
              var info = this.fnPagingInfo();
              var page = info.iPage;
              var length = info.iLength;
              $('td:eq(0)', row).html();
          },
		  
		/////// hide paging button
   initComplete: function () {
              $("#mytable_paginate").css("display", "none");
           }


      });
	  



			// end setup datatables
			// get Edit Records
			$('#mytable').on('click','.none',function(){
            var node=$(this).data('node');
		
						
			makeChart('chart1',node,'DC_E_BSS_CELL_CS_RAW','<?php echo base_url().'data/'?>'+node+'_DC_E_BSS_CELL_CS_RAW.csv');		
			makeChart('chart2',node,'DC_E_RAN_UCELL_RAW','<?php echo base_url().'data/'?>'+node+'_DC_E_RAN_UCELL_RAW.csv');	
			makeChart('chart3',node,'DC_E_RBS_HSDSCHRES_RAW','<?php echo base_url().'data/'?>'+node+'_DC_E_RBS_HSDSCHRES_RAW.csv');	
			makeChart('chart4',node,'DC_E_ERBS_EUTRANCELLFDD_RAW','<?php echo base_url().'data/'?>'+node+'_DC_E_ERBS_EUTRANCELLFDD_RAW.csv');				
						
            //$('#ModalUpdate').modal('show');
            //$('[name="kode_barang"]').val(node);
      });
			// End Edit Records







function makeChart(data,title,tabels,sourcedata) {
Highcharts.setOptions({
    time: {
        timezoneOffset: 7 * 60
    }
});
	
Highcharts.chart(data, {
    chart: {
        type: 'bar',
        height: 900
    },
    title: {
        text: title+' '+tabels,

            style: {
                fontSize: '11px',
				 fontWeight: 'bold'
            }
        
    },
    legend: {
        enabled: false
    },
    subtitle: {
        text: 'Availability %'
    },
    data: {
        csvURL: sourcedata,
        enablePolling: true,
        dataRefreshRate: 1,
        parsed: function (columns) {
            // We want to keep the values since 1950 only
            $.each(columns, function () {
                // Keep the first item which is the series name, then remove the following 39
                this.splice(1, this.length-24);
            });
        }		
    },
    plotOptions: {
        bar: {
            colorByPoint: true
        },
        series: {
            zones: [{
                color: '#4CAF50',
                value: 0
            }, {
                color: '#F44336',
                value: 10
            }, {
                color: '#F44336',
                value: 20
            }, {
                color: '#FF5722',
                value: 30
            }, {
                color: '#FF9800',
                value: 40
            }, {
                color: '#FFEB3B',
                value: 50
            }, {
                color: '#FFC107',
                value: 60
            }, {
                color: '#FF9800',
                value: 70
            }, {
                color: '#FFEB3B',
                value: 80
            }, {
                color: '#CDDC39',
                value: 90
            }, {
                color: '#8BC34A',
                value: Number.MAX_VALUE
            }],
            dataLabels: {
                enabled: true,
                format: '{point.y:.0f}%'
            }
        }
    },
    tooltip: {
        valueDecimals: 1,
        valueSuffix: '%'
    },
    xAxis: {
        type: 'datetime ',
        labels: {
            style: {
                fontSize: '10px'
            }
        }
    },
    yAxis: {
        max: 100,
        title: false,
        plotBands: [{
            from: 0,
            to: 30,
            color: '#FFEBEE'
        }, {
            from: 30,
            to: 70,
            color: '#FFFDE7'
        }, {
            from: 70,
            to: 100,
            color: "#E8F5E9"
        }]
    }	
});




		$('.nav a').filter(function(){return this.href==location.href}).parent().addClass('active').siblings().removeClass('active')
		$('.nav a').click(function(){
			$(this).parent().addClass('active').siblings().removeClass('active')	
		})


};

makeChart('chart1','GUT1','DC_E_BSS_CELL_CS_RAW','<?php echo base_url().'data/'?>'+'GUT1_DC_E_BSS_CELL_CS_RAW.csv');
makeChart('chart2','GUT1','DC_E_RAN_UCELL_RAW','<?php echo base_url().'data/'?>'+'GUT1_DC_E_RAN_UCELL_RAW.csv');
makeChart('chart3','GUT1','DC_E_RBS_HSDSCHRES_RAW','<?php echo base_url().'data/'?>'+'GUT1_DC_E_RBS_HSDSCHRES_RAW.csv');
makeChart('chart4','GUT1','DC_E_ERBS_EUTRANCELLFDD_RAW','<?php echo base_url().'data/'?>'+'GUT1_DC_E_ERBS_EUTRANCELLFDD_RAW.csv');
//makeChart('chart2','DEFAULT','https://demo-live-data.highcharts.com/vs-load.csv');





	});
</script>
</body>
</html>
