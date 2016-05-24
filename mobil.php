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
        	<a href="tambah_mobil.php" class="btn btn-primary" title="Tambah">Tambah Data Mobil</a>
        	<p></p>
        	<table id="tabelku" class="table table-bordered table-striped">
            	<thead>
                	<tr>
            			<th>No</th>
            			<th>Pelanggan</th>
            			<th>Jenis Mobil</th>
            			<th>Plat Nomor</th>
						<th>Tahun</th>
            			<th>Aksi</th>
            		</tr>
                </thead>
                <tbody>
        		<?php
                    $db->join('pelanggan p', 'p.id_pelanggan=m.id_pelanggan', 'LEFT');
                    // $db->where('m.id_pelanggan', 'p.id_pelanggan');
        			$mobil = $db->get('mobil m', null, 'p.nama, m.jenis_mobil, m.plat_nomor, m.id_mobil, m.tahun');
        			$no = 1;
                    // print_r($mobil);
        			foreach ($mobil as $mob) { ?>
        				<tr>
		        			<td><?= $no; ?></td>
		        			<td><?= $mob['nama']; ?></td>
		        			<td><?= $mob['jenis_mobil']; ?></td>
		        			<td><?= $mob['plat_nomor']; ?></td>
							<td><?= $mob['tahun']; ?></td>
		        			<td>
		        				<a href="edit_mobil.php?id=<?= $mob['id_mobil'] ?>" class="btn btn-info btn-small" title="Edit">Edit</a>
		        				<a onclick="return confirm('apakah yakin ingin menghapus ?');" href="hapus_mobil.php?id=<?= $mob['id_mobil'] ?>" class="btn btn-danger btn-small" title="Hapus">Hapus</a>
		        			</td>
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
		$("#tabelku").dataTable();
	});
</script>