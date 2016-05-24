<?php include 'template/navbar.php'  ?>
<?php include 'template/subnavbar.php'  ?>

<?php 
	include 'sistem/core.php';
	include 'sistem/db/MysqliDb.php';

	$root = new Utility();
	session_start();
	$root->checkLogin('admin');

	$db = new MysqliDb();
	$id_pelanggan = $_GET['id'];
	$db->where('id_pelanggan', $id_pelanggan);
	$pelanggan = $db->getOne('pelanggan');
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <!-- /span6 -->

        <div class="span6">

        	<form class="form-horizontal" action="proses_edit_pelanggan.php" method="post" accept-charset="utf-8">
        		<fieldset>
        		<h2 class="control-group controls">Edit Pelanggan</h2>
        		<input type="hidden" name="id_pelanggan" value="<?= $pelanggan['id_pelanggan']; ?>">
        		<div class="control-group">
					<label class="control-label" for="nama">Nama</label>
					<div class="controls">
						<input type="text" name="nama" id="nama" value="<?= $pelanggan['nama']; ?>" placeholder="Nama">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="alamat">Alamat</label>
					<div class="controls">
						<input type="text" name="alamat" id="alamat" value="<?= $pelanggan['alamat']; ?>" placeholder="Alamat">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="tgl_lahir">Tgl. Lahir</label>
					<div class="controls">
						<input type="text" id="tgl_lahir" name="tgl_lahir" id="tgl_lahir" value="<?= $pelanggan['tanggal_lahir']; ?>" placeholder="Tgl. Lahir">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="no_telepon">No. Telp</label>
					<div class="controls">
						<input type="text" name="no_telepon" id="no_telepon" value="<?= $pelanggan['no_telepon']; ?>" placeholder="No. Telp">
					</div>
				</div>
				<div class="controls">
				 	<button type="submit" class="btn btn-primary">Edit</button>
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