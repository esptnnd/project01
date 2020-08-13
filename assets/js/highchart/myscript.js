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
		    "pageLength": 4,
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
            $(nTd).html('<a href="javascript:void(0);" class="edit_record label11" data-node="'+oData.nodename+'">'+oData.nodename+'</a>');
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
			$('#mytable').on('click','.edit_record',function(){
            var node=$(this).data('node');
		
						
			makeChart('chart1',node,'<?php echo base_url().'data/'?>'+node+'_day.csv');						
						
            //$('#ModalUpdate').modal('show');
            $('[name="kode_barang"]').val(node);
      });
			// End Edit Records







function makeChart(data,title,sourcedata) {
Highcharts.chart(data, {
    chart: {
        type: 'column',
        height: 600
    },
    title: {
        text: 'Server Monitoring Demo '+title
    },
    legend: {
        enabled: false
    },
    subtitle: {
        text: 'Instance Load'
    },
    data: {
        csvURL: sourcedata,
        enablePolling: true,
        dataRefreshRate: 1
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
        type: 'category',
        labels: {
            style: {
                fontSize: '10px'
            }
        }
    }
});




		$('.nav a').filter(function(){return this.href==location.href}).parent().addClass('active').siblings().removeClass('active')
		$('.nav a').click(function(){
			$(this).parent().addClass('active').siblings().removeClass('active')	
		})


};

makeChart('chart1','DEFAULT','https://demo-live-data.highcharts.com/vs-load.csv');
makeChart('chart2','DEFAULT','https://demo-live-data.highcharts.com/vs-load.csv');





	});