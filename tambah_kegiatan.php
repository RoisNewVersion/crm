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

        <div class="span5">

        	<form class="form-horizontal" action="proses_tambah_kegiatan.php" method="post" accept-charset="utf-8">
        		<fieldset>
        		<h2 class="control-group controls">Input Kegiatan Baru</h2>

        		<input type="hidden" name="id_pelanggan" id="id_pelanggan" value="">
        		<input type="hidden" name="id_mobil" id="id_mobil" value="">
        		<input type="hidden" name="no_telepon" id="no_telepon" value="">

        		<div class="control-group">
					<label class="control-label" for="plat_nomor">Plat Nomor</label>
					<div class="controls">
						<input type="text" name="plat_nomor" id="plat_nomor" value="" placeholder="Plat Nomor" required>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="keluhan">Keluhan</label>
					<div class="controls">
						<input type="text"  name="keluhan" id="keluhan" value="" placeholder="Keluhan" > <i id="plus" class="icon-plus"></i>
						<div id="keluhan2" style="display: none">
							<input type="text"  name="keluhan2" id="keluh"  value="" placeholder="Keluhan Manual" >
						</div>
						<input type="hidden" name="pesan_keluhan" id="pesan_keluhan" value="">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="kegiatan">Kegiatan</label>
					<div class="controls">
						<input type="text" id="kegiatan" name="kegiatan" id="tgl_lahir" value="" placeholder="Kegiatan" required>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="tanggal_masuk">Tgl. Masuk</label>
					<div class="controls">
						<input type="text" name="tanggal_masuk" id="tanggal_masuk" value="" placeholder="Tgl. Masuk">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="perkiraan_kembali">Perkiraan Kembali</label>
					<div class="controls">
						<input type="text" name="perkiraan_kembali" id="perkiraan_kembali" value="" placeholder="Perkiraan Kembali">
					</div>
				</div>
				<div class="controls">
				 	<button type="submit" class="btn btn-primary">Simpan</button>
				 	<a href="kegiatan.php" class="btn btn-default" title="">Batal</a>
				</div>

        		</fieldset>
        	</form>
        </div>

        <div id="keterangan" class="span4">
        	<br><br>
        	<p id="id_mob"></p>
        	<p id="jn_mobil"></p>
        	<p id="no_telp"></p>
			<p id="nm"></p>
        	<div id="detail_keluhan" >
        		
	        </div>
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

		$("#keterangan").hide();
		$('#detail_keluhan').hide();

		$("#tanggal_masuk").datepicker({
			dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true
		});
		$("#perkiraan_kembali").datepicker({
			dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true
		});

		$("#plat_nomor").autocomplete({
			source: "autocomplete_plat.php",
			minLength: 2,
			select: function( event, ui ) {
				$("#id_pelanggan").val(ui.item.id_pelanggan);
				$("#id_mobil").val(ui.item.id_mobil);
				$("#no_telepon").val(ui.item.no_telepon);

				$("#id_mob").html('ID Mobil: '+ui.item.id_mobil);
				$("#jn_mobil").html('Jenis Mobil: '+ui.item.jenis_mobil);
				$("#no_telp").html('No. Telp: '+ui.item.no_telepon);
				$("#nm").html('Nama : '+ui.item.nama);
				$("#keterangan").show();
			}
		});

		$("#keluhan").autocomplete({
			source: "autocomplete_keluhan.php",
			minLength: 2,
			select: function( event, ui ) {
				// $("#id_pelanggan").val(ui.item.id_pelanggan);
				$("#pesan_keluhan").val(ui.item.detail_pesan);

				// $("#id_mob").html('ID Mobil: '+ui.item.id_mobil);
				$("#detail_keluhan").html('Isi Pesan : '+ui.item.detail_pesan);
				$("#detail_keluhan").show();
			}
		});

		$('#keluhan').change(function(event) {
			/* Act on the event */
			var k = $('#keluhan').val();
			$('#kegiatan').val(k);
		});

		$('#keluh').change(function(event) {
			/* Act on the event */
			var k = $('#keluh').val();
			$('#kegiatan').val(k);
		});

		$('#plus').click(function(event) {
			/* Act on the event */
			$('#keluhan2').show();
		});
	});
</script>