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
        	<a href="tambah_broadcast.php" class="btn btn-primary" title="Tambah">Kirim Broadcast SMS</a>
        	<p></p>
        	<table id="tabelku" class="table table-bordered table-striped">
            	<thead>
                	<tr>
            			<th>No</th>
            			<th>Pelanggan</th>
            			<th>Isi Notifikasi</th>
            			<th>Jenis Notifikasi</th>
            			<th>Aksi</th>
            		</tr>
                </thead>
                <tbody>
        		<?php
                    $db->join('pelanggan p', 'p.id_pelanggan=n.id_pelanggan', 'LEFT');
                    // $db->where('m.id_pelanggan', 'p.id_pelanggan');
        			$notifikasi = $db->get('notifikasi n', null, 'p.nama, n.isi_notifikasi, n.jenis_notifikasi, n.id_notifikasi');
        			$no = 1;
                    // print_r($notifikasi);
        			foreach ($notifikasi as $notif) { ?>
        				<tr>
		        			<td><?= $no; ?></td>
		        			<td><?= $notif['nama']; ?></td>
		        			<td><?= $notif['isi_notifikasi']; ?></td>
		        			<td><?= $notif['jenis_notifikasi'] == 'K' ? 'Perkiraan Kembali' : 'Ucapan'; ?></td>
		        			<td>
		        				
		        				<a onclick="return confirm('apakah yakin ingin menghapus ?');" href="hapus_notifikasi.php?id=<?= $notif['id_notifikasi'] ?>" class="btn btn-danger btn-small" title="Hapus">Hapus</a>
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