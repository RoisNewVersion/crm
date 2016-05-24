<?php include 'template/navbar.php'  ?>
<?php include 'template/subnavbar.php'  ?>

<style>
	.ui-autocomplete {
		max-height: 100px;
		overflow-y: auto;
		/* prevent horizontal scrollbar */
		overflow-x: hidden;
	}
	/* IE 6 doesn't support max-height
	 * we use height instead, but this forces the menu to always be this tall
	 */
	* html .ui-autocomplete {
		height: 100px;
	}
</style>

<?php 
	include 'sistem/core.php';
	$root = new Utility();
	session_start();
	$root->checkLogin('admin');

	include 'sistem/db/MysqliDb.php';
	$id_mobil = $_GET['id'];
	$db = new MysqliDb();
	$db->join('pelanggan p', 'p.id_pelanggan=m.id_pelanggan', 'LEFT');
    $db->where('m.id_mobil', $id_mobil);
	$mobil = $db->get('mobil m', null, 'p.nama, m.jenis_mobil, m.plat_nomor, m.id_mobil, m.id_pelanggan');
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <!-- /span6 -->
        <div class="span6">
        	<?php //print_r($mobil) ?>
        	<form class="form-horizontal" action="proses_edit_mobil.php" method="post" accept-charset="utf-8">
        		<fieldset>
        		<div id="a">
        			hahaha
        		</div>
        		<h2 class="control-group controls">Edit Data Mobil</h2>
        		<input type="hidden" name="id_mobil" value="<?= $mobil[0]['id_mobil'] ?>">
        		<input type="hidden" name="id_pelanggan" id="id_pelanggan" value="<?= $mobil[0]['id_pelanggan'] ?>">
        		<div class="control-group">
					<label class="control-label" for="nama">Nama Pelanggan</label>
					<div class="controls">
						<input type="text" name="nama" id="nama" value="<?= $mobil[0]['nama'] ?>" placeholder="Nama Pelanggan">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="jenis_mobil">Jenis Mobil</label>
					<div class="controls">
						<input type="text" name="jenis_mobil" id="jenis_mobil" value="<?= $mobil[0]['jenis_mobil'] ?>" placeholder="Jenis Mobil">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="plat_nomor">Plat Nomor</label>
					<div class="controls">
						<input type="text" id="plat_nomor" name="plat_nomor" value="<?= $mobil[0]['plat_nomor'] ?>" placeholder="Plat Nomor">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="tahun">Tahun Mobil</label>
					<div class="controls">
						<input type="text" id="tahun" name="tahun" value="" placeholder="Tahun Mobil" required>
					</div>
				</div>
				<div class="controls">
				 	<button type="submit" class="btn btn-primary">Edit</button>
				 	<a href="mobil.php" class="btn btn-default" title="">Batal</a>
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
<script>
	$(document).ready(function() {
		$("#a").hide();
		$("#nama").autocomplete({
			source: "autocomplete_mobil.php",
			minLength: 2,
			select: function( event, ui ) {
				$("#id_pelanggan").val(ui.item.id);
				//$("#a").show();
			}
		});
	});
</script>
</body>
</html>