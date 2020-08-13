<!DOCTYPE html>
<html>
  <head>
    <title>Main Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <meta name="description" content="example">
    <meta name="author" content="Ananda Septian">
    <!-- Bootstrap -->
    <link href="<?php echo base_url().'assets/css/bootstrap.css'?>" rel="stylesheet">


  </head>
  <body>

    <div class="container">
      <!--?php $this->load->view('menu');?--> <!--Include menu-->
      <div class="col-md-12">
        <div class="row">


            <div id="container_pie_chart" ></div>


        </div>
      </div>
    </div> <!-- /container -->





    <script type="text/javascript">
Highcharts.chart('container_pie_chart', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        },
        height: (9 / 16 * 80) + '%' // 16:9 ratio	
        
    },
    title: {
        text: '<b>Total Summary Count of Alarm</b>'
    },
    credits: {
     enabled: false
    },  
    exporting: {
    enabled: false
    },  
    legend: {
    itemStyle: {
            color: '#000000',
            fontWeight: 'bold',
            fontSize: 9
    },      
    enabled: true,
    align: 'right',
        verticalAlign: 'top',
        layout: 'vertical',        
        itemWidth: 200,
    labelFormatter: function() {
      return this.name + ' ' + '<br>(click to hide)';
    }
  },    
    tooltip: {
      pointFormat: '{point.x}: <br>{point.percentage:.1f} %<br>value: {point.y}'
    },      
    plotOptions: {
        pie: {
            showInLegend: true,
      dataLabels: {
        enabled: true,
        style: {
                    textOverflow: 'ellipsis',
                    fontSize: 10
                },        
        formatter: function() {
          return this.key + '<br>percentage: ' + Number((this.percentage).toFixed(1)) + ' %  ( ' + this.y + ' )';       //  Number((NUMBER).toFixed(1))
        }
      },
            
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 45
        },

        series: {
            cursor: 'pointer',
            point: {
                events: {
                    click: function () {
                        location.href = '<?php echo base_url().'index.php/page/detail_alarm/'?>' +
                            this.options.name;
                    }
                }
            }
        }        
    },
    subtitle: {
        text: 'Data input from a remote CSV file'
    },

    data: {
        //csvURL: 'http://localhost/CODEIGINITER/ci_login/data/data.csv',
        csvURL: '<?php echo base_url().'index.php/page/source_csv/chart_pie.csv'?>',
        enablePolling: true,
        seriesMapping: [{
             x: 0, // X values are pulled from column 0 by default
             y: 1, // Y values are pulled from column 1 by default
            label: 0 // Labels are pulled from column 2 and picked up in the dataLabels.format below
        }],  
        dataRefreshRate: 3       
    }
});

</script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>

  </body>
</html>
