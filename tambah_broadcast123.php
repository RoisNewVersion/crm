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
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <!-- /span6 -->

        <div class="span5">

        	<form class="form-horizontal" action="proses_tambah_broadcast.php" method="post" accept-charset="utf-8">
        		<fieldset>
        		
        		<h2 class="control-group controls">Input Pesan Broadcast Baru</h2>

        		<input type="hidden" name="id_pelanggan" id="id_pelanggan">
        		<input type="hidden" name="no_telepon" id="no_telepon">
        		<div class="control-group">
					<label class="control-label" for="nama">Kepada</label>
					<div class="controls">
						<input type="text" name="nama" id="nama" value="" placeholder="Nama Pelanggan" required>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="isi_notifikasi">Isi Notifikasi</label>
					<div class="controls">
						<textarea name="isi_notifikasi" id="isi_notifikasi" placeholder="Isi Notofikasi "></textarea>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="jenis_notifikasi">Jenis Notifikasi</label>
					<div class="controls">
						<select name="jenis_notifikasi" id="jenis_notifikasi">
							<option value="U">Ucapan</option>
							<option value="K">Kegiatan</option>
						</select>
					</div>
				</div>
				<div class="controls">
				 	<button type="submit" class="btn btn-primary">Kirim</button>
				 	<a href="notifikasi.php" class="btn btn-default" title="">Batal</a>
				</div>

        		</fieldset>
        	</form>
        </div>

        <br><br><br><br>
        <div class="span4" id="keterangan_pel">
        	<p id="no_tlp"></p>
        	<p id="alamat"></p>
        	<p id="tanggal_lahir"></p>
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
		$("#keterangan_pel").hide();
		$("#nama").autocomplete({
			source: "autocomplete_broadcast.php",
			minLength: 2,
			select: function( event, ui ) {
				$("#id_pelanggan").val(ui.item.id_pelanggan);
				$("#no_telepon").val(ui.item.no_telepon);
				$("#no_tlp").html('Nomor : '+ui.item.no_telepon);
				$("#alamat").html('Alamat : '+ui.item.alamat);
				$("#tanggal_lahir").html('Tgl. Lahir : '+ui.item.tanggal_lahir);
				$("#keterangan_pel").show();
			}
		});
	});
</script>
</body>
</html>