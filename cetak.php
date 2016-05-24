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
        	<form class="form-horizontal" action="proses_cetak.php" method="post" accept-charset="utf-8">
        		<fieldset>
        		
        		<h2 class="control-group controls">Cetak Kegiatan</h2>

        		<div class="control-group">
					<label class="control-label" for="tgl_awal">Tanggal awal</label>
					<div class="controls">
						<input type="text" name="tgl_awal" id="tgl_awal" value="" placeholder="Tanggal awal" required>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="tgl_akhir">Tanggal akhir</label>
					<div class="controls">
						<input type="text" name="tgl_akhir" id="tgl_akhir" value="" placeholder="Tanggal akhir" required>
					</div>
				</div>
				<div class="controls">
				 	<button type="submit" class="btn btn-primary">Cetak</button>
				</div>

        		</fieldset>
        	</form>
        </div>

        <div class="span6">
        	<form class="form-horizontal" action="proses_cetak_kategori.php" method="post" accept-charset="utf-8">
        		<fieldset>
        		
        		<h2 class="control-group controls">Cetak Kegiatan Berdasarkan Keluhan</h2>

        		<div class="control-group">
					<label class="control-label" for="keluhan">Keluhan</label>
					<div class="controls">
						<input type="text" name="keluhan" id="keluhan" value="" placeholder="Keluhan" required>
					</div>
				</div>
				<div class="controls">
				 	<button type="submit" class="btn btn-primary">Cetak</button>
				</div>

        		</fieldset>
        	</form>
        </div>

      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<?php include('template/footer.php')  ?>

<script type="text/javascript">
	$(document).ready(function() {
		$("#tgl_awal").datepicker({
			dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true
		});
		$("#tgl_akhir").datepicker({
			dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true
		});
	});
</script>