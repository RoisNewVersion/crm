<?php include 'template/navbar.php'  ?>
<?php include 'template/subnavbar.php'  ?>

<?php 
    include 'sistem/core.php';
    $root = new Utility();
    session_start();
    $root->checkLogin('admin');

    include 'sistem/db/MysqliDb.php';
    $db = new MysqliDb();
    $id = $_GET['id'];
    $db->where('id_kegiatan', $id);
    $kegiatan = $db->getOne('kegiatan');
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <!-- /span6 -->

        <div class="span5">

            <form class="form-horizontal" action="proses_edit_kegiatan.php" method="post" accept-charset="utf-8">
                <fieldset>
                <h2 class="control-group controls">Edit Kegiatan</h2>

                <input type="hidden" name="id_kegiatan" value="<?= $kegiatan['id_kegiatan'] ?>">
                <input type="hidden" name="id_pelanggan" id="id_pelanggan" value="<?= $kegiatan['id_pelanggan'] ?>">
                <input type="hidden" name="id_mobil" id="id_mobil" value="<?= $kegiatan['id_mobil'] ?>">

                <div class="control-group">
                    <label class="control-label" for="plat_nomor">Plat Nomor</label>
                    <div class="controls">
                        <input type="text" name="plat_nomor" id="plat_nomor" value="" placeholder="Plat Nomor">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="keluhan">Keluhan</label>
                    <div class="controls">
                        <input type="text" name="keluhan" id="keluhan" value="<?= $kegiatan['keluhan'] ?>" placeholder="Keluhan">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="kegiatan">Kegiatan</label>
                    <div class="controls">
                        <input type="text" id="kegiatan" name="kegiatan" id="tgl_lahir" value="<?= $kegiatan['kegiatan'] ?>" placeholder="Kegiatan">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="tanggal_masuk">Tgl. Masuk</label>
                    <div class="controls">
                        <input type="text" name="tanggal_masuk" id="tanggal_masuk" value="<?= $kegiatan['tanggal_masuk'] ?>" placeholder="Tgl. Masuk">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="perkiraan_kembali">Perkiraan Kembali</label>
                    <div class="controls">
                        <input type="text" name="perkiraan_kembali" id="perkiraan_kembali" value="<?= $kegiatan['perkiraan_kembali'] ?>" placeholder="Perkiraan Kembali">
                    </div>
                </div>
                <div class="controls">
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <a href="kegiatan.php" class="btn btn-default" title="">Batal</a>
                </div>

                </fieldset>
            </form>
        </div>

        <div id="keterangan" class="span4">
            <br><br>
            <p id="id_mob"></p>
            <p id="jn_mobil">q</p>
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

                $("#id_mob").html('ID Mobil: '+ui.item.id_mobil);
                $("#jn_mobil").html('Jenis Mobil: '+ui.item.jenis_mobil);
                $("#keterangan").show();
            }
        });
    });
</script>