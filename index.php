<?php include 'template/navbar.php'  ?>
<?php include 'template/subnavbar.php'  ?>

<?php 
  include 'sistem/db/MysqliDb.php';
	include 'sistem/core.php';
	$root = new Utility();
	session_start();
	$root->checkLogin('admin');
	
	$root->checkUlangtahun();
	$root->kirimOtomatis();
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <!-- /span6 -->
        <div class="span6">
          <img src="asset/img/foto-bengkel.png" width="400" height="400" alt="">
          <h2>foto bengkel</h2>
        </div>

        <div class="span6">
          <img src="asset/img/visi.jpg" width="400" height="400"  alt="">
        </div>

      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<?php include('template/footer.php')  ?>