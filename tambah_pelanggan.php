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

        <div class="span6">

        	<form class="form-horizontal" action="proses_tambah_pelanggan.php" method="post" accept-charset="utf-8">
        		<fieldset>
        		<h2 class="control-group controls">Input Pelanggan Baru</h2>
        		<div class="control-group">
					<label class="control-label" for="nama">Nama</label>
					<div class="controls">
						<input type="text" name="nama" id="nama" value="" placeholder="Nama" required>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="alamat">Alamat</label>
					<div class="controls">
						<input type="text" name="alamat" id="alamat" value="" placeholder="Alamat" required>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="tgl_lahir">Tgl. Lahir</label>
					<div class="controls">
						<input type="text" id="tgl_lahir" name="tgl_lahir" id="tgl_lahir" value="" placeholder="Tgl. Lahir">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="no_telepon">No. Telp</label>
					<div class="controls">
						<input type="text" name="no_telepon" id="no_telepon" value="" placeholder="No. Telp" required>
					</div>
				</div>
				<div class="controls">
				 	<button type="submit" class="btn btn-primary">Simpan</button>
				 	<a href="pelanggan.php" class="btn btn-default" title="">Batal</a>
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
		$("#tgl_lahir").datepicker({
			dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true
		});
	});
</script>