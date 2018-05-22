<?php include('decoration/header.php');?>
<?php
  # PHP file that will be used to download and upload binary data
  
  # Set Download Filesize
  $filesize = 1048576 * 100; // filesize measuredin Bits ( 20971520 bits = 20 Megabits ) or ( 1048576 * 20 bits = 20 Megabits )

  if(isset($_POST['d'])) {

    header('Cache-Control: no-cache');
    header('Content-Transfer-Encoding: binary');
    header('Content-Length: '. $filesize);

    for($i = 0 ; $i < $filesize ; $i++) {
      echo chr(255);
    }

  }

?>

<script src="<?php echo base_url(); ?>assets/js/speedtest.js"></script>
		
<!-- start: Content -->
	<div id="content" class="span10">
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="<?php echo base_url(); ?>home/index"">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Active Request</a></li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white eye-open"></i><span class="break"></span>Active Request</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
					<div style="overflow-x: auto;">
						<table class="table table-striped table-bordered">
						  <thead>
							  <tr>
								    <th style="text-align:center;">Host</th>
                          			<th style="text-align:center;">Download</th>
                          			<th style="text-align:center;">Min. Speed</th>
                          			<th style="text-align:center;">Max. Speed</th>
                          			<th style="text-align:center;">Upload</th>
                          			<th style="text-align:center;">Min. Speed</th>
                          			<th style="text-align:center;">Max. Speed</th>
                          			<th style="text-align:center;">Action</th>

							  </tr>
						  </thead>   
						  <tbody>
							<tr>
								<td>192.168.2.1</td>
								<td><span>-</span> KB/s</td>
								<td><span>-</span> KB/s</td>
								<td><span>-</span> KB/s</td>
								<td><span>-</span> KB/s</td>
								<td><span>-</span> KB/s</td>
								<td><span>-</span> KB/s</td>
								<td style="text-align: center;"><input id="testButton" type="button" value="start" class="btn btn-info btn-xs"></td>
							</tr>
						  </tbody>
					  </table>            
					</div>
					</div>
				</div><!--/span-->
			</div><!--/row-->
	</div><!--/.fluid-container-->
	
	<!-- end: Content -->

	</div><!--/#content.span10-->
	</div><!--/fluid-row-->

<script>
      
      (function() {

        var $ = function(a){ return document.querySelector(a) },
            $$ = function(a){ return document.querySelectorAll(a) };

        var settings = {
          
          download: {

            onprogress: function(speed, min, max) {
              $$('#download span')[0].innerHTML = speed;
              $$('#download span')[1].innerHTML = min;
              $$('#download span')[2].innerHTML = max;
            },

            onload: function(speed, min, max) {
              $$('#download strong')[0].innerHTML = 'Average speed';
              $$('#download span')[0].innerHTML = speed;
              $$('#download span')[1].innerHTML = min;
              $$('#download span')[2].innerHTML = max;
            }

          },

          upload: {

            onprogress: function(speed, min, max) {
              $$('#upload span')[0].innerHTML = speed;
              $$('#upload span')[1].innerHTML = min;
              $$('#upload span')[2].innerHTML = max;
            },

            onload: function(speed, min, max) {
              $$('#upload strong')[0].innerHTML = 'Average speed';
              $$('#upload span')[0].innerHTML = speed;
              $$('#upload span')[1].innerHTML = min;
              $$('#upload span')[2].innerHTML = max;

              $('#testButton').disabled = false;
              $('#complete').style.display = 'block';
            }

          }

        };


        var STInstance = new SpeedTest(settings);


        $('#testButton').onclick = function() {
          
          $('#download strong').innerHTML = 'Current speed';
          $('#upload strong').innerHTML = 'Current speed';
          $$('#upload span')[0].innerHTML = '-';
          $$('#upload span')[1].innerHTML = '-';
          $$('#upload span')[2].innerHTML = '-';

          $('#testButton').disabled = true;
          $('#complete').style.display = 'none';

          STInstance.startRequest(true, true);

        };

      })();

    </script>



<div class="clearfix"></div>	
<?php include('decoration/footer.php');?>