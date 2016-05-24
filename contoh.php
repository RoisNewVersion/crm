<?php include 'template/navbar.php'  ?>
<?php include 'template/subnavbar.php'  ?>

<?php 
	include 'sistem/core.php';
	$root = new Utility();
	session_start();
	$root->checkLogin('admin');
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <!-- /span6 -->

        <!-- <div class="widget">
			<div class="widget-header">
				<i class="icon-bar-chart"></i>
				<h3>Icon</h3>
			</div>

			<div class="widget-content">
				<h2>isine neng kene</h2>
			</div>
		</div>  -->
		<div class="span6">
        	
        </div>

      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<?php include('template/footer.php')  ?>