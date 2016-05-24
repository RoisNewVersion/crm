<?php include 'template/navbar.php'  ?>
<?php include 'template/subnavbar.php'  ?>

<?php 
	include 'sistem/core.php';
	include 'sistem/db/MysqliDb.php';

	$root = new Utility();
	session_start();
	$root->checkLogin('admin');

	$db = new MysqliDb();

?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <!-- /span6 -->
        
        <div class="span12">
        	<a href="tambah_pelanggan.php" class="btn btn-primary" title="Tambah">Tambah Pelanggan</a>
        	<p></p>
        	<table id="tabelku" class="table table-bordered table-striped">
            	<thead>
                	<tr>
            			<th>No</th>
            			<th>Nama</th>
            			<th>Alamat</th>
            			<th>Tgl. Lahir</th>
            			<th>No. Telp</th>
            			<th>Aksi</th>
                        <!-- <th><input type="checkbox" name="checkAll" id="checkAll" value="">Check all || <button id="kirimkan" >Kirim</button></th> -->
            		</tr>
                </thead>
                <tbody>
        		<?php 
        			$pelanggan = $db->get('pelanggan');
        			$no = 1;
        			foreach ($pelanggan as $pel) { ?>
        				<tr>
		        			<td><?= $no; ?></td>
		        			<td><?= $pel['nama']; ?></td>
		        			<td><?= $pel['alamat']; ?></td>
		        			<td><?= $pel['tanggal_lahir']; ?></td>
		        			<td><?= $pel['no_telepon']; ?></td>
		        			<td>
		        				<a href="edit_pelanggan.php?id=<?= $pel['id_pelanggan'] ?>" class="btn btn-info btn-small" title="Edit">Edit</a>
		        				<a onclick="return confirm('apakah yakin ingin menghapus ?');" href="hapus_pelanggan.php?id=<?= $pel['id_pelanggan'] ?>" class="btn btn-danger btn-small" title="Hapus">Hapus</a>
		        			</td>
                            <!-- <td class="no-sort"><input class="checkdong" type="checkbox" name="checkin"  value="<?= $pel['id_pelanggan'] ?>"></td> -->
		        		</tr>
        			<?php $no++; }
        		?>
        		</tbody>
        	</table>
        </div>

      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<?php include('template/footer.php');  ?>
<script>
	$(document).ready(function() {
		$("#tabelku").dataTable({
            'aoColumnDefs': [{
                // "targets": 'no-sort',
                // "orderable": false
                'bSortable': false,
                'aTargets': [-1]
            }]
        });

        
        // get checked input
        var arr = $.map($('input[name="checkin"]:checked'),function(c) {
            return c.value;
        });

        // fungsi kirim
        $('#kirimkan').click(function() {

            var arr2 = $.map($('input[name="checkin"]:checked'),function(c) {
            return c.value;
            });
            var value_kirim = arr2;
            // console.log('kirim ya', value_kirim);

            $.ajax({
                url: 'kirim_checkall.php',
                type: 'post',
                data: {param1: value_kirim},
            }).success(function(aha){
                console.log(aha);
                // alert(aha);
            })
            .error(function(err) {
                console.log(err);
                alert('Tidak memilih checklist');
                
            });
            
        });
        
        // checkall
        $('#checkAll').change(function() {
            $('input:checkbox').prop('checked', $(this).prop('checked'));
        });

	});
</script>