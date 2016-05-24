<?php include 'template/navbar.php'  ?>
<?php include 'template/subnavbar.php'  ?>

<?php 
	include 'sistem/core.php';
	$root = new Utility();
	session_start();
	$root->checkLogin('admin');

	include 'sistem/db/MysqliDb.php';
	$db = new MysqliDb();

    // $root->kirimOtomatis();
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <!-- /span6 -->
		<div class="span12">
        	<a href="tambah_kegiatan.php" class="btn btn-primary" title="Tambah">Tambah Kegiatan</a>
        	<p></p>
        	<table id="tabelku" class="table table-bordered table-striped">
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Mobil</th>
					<th>Plat</th>
					<th>Tahun</th>
                    <th>Keluhan</th>
                    <th>Kegiatan</th>
                    <th>Tgl. Masuk</th>
                    <th>Perkiraan Kembali</th>
                    <th>Status SMS</th>
                    <th>Aksi</th>
                    </tr>
                </thead>
        		
                <tbody>
        		<?php 
        			$db->join('pelanggan p', 'p.id_pelanggan=k.id_pelanggan', 'LEFT');
        			$db->join('mobil m', 'm.id_mobil=k.id_mobil', 'LEFT');
                    // $db->where('m.id_pelanggan', 'p.id_pelanggan');
        			$kegiatan = $db->get('kegiatan k', null, 'p.nama, m.jenis_mobil, m.plat_nomor, m.tahun, k.keluhan, k.kegiatan, k.tanggal_masuk, k.perkiraan_kembali, k.id_kegiatan, k.status_kirim');

        			// print_r($kegiatan);
        			$no = 1;
        			foreach ($kegiatan as $keg) { ?>
        				<tr>
		        			<td><?= $no; ?></td>
		        			<td><?= $keg['nama']; ?></td>
		        			<td><?= $keg['jenis_mobil']; ?></td>
							<td><?= $keg['plat_nomor']; ?></td>
							<td><?= $keg['tahun']; ?></td>
		        			<td><?= $keg['keluhan']; ?></td>
		        			<td><?= $keg['kegiatan']; ?></td>
		        			<td><?= $keg['tanggal_masuk']; ?></td>
		        			<td><?= $keg['perkiraan_kembali']; ?></td>
                            <td><?= $keg['status_kirim'] == 'K' ? 'Terkirim' : 'Pending'; ?></td>
		        			<td>
		        				<a href="edit_kegiatan.php?id=<?= $keg['id_kegiatan'] ?>" class="btn btn-info btn-small" title="Edit">Edit</a>
		        				<a onclick="return confirm('apakah yakin ingin menghapus ?');" href="hapus_kegiatan.php?id=<?= $keg['id_kegiatan'] ?>" class="btn btn-danger btn-small" title="Hapus">Hapus</a>
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
<?php include('template/footer.php')  ?>

<script type="text/javascript">
    $(document).ready(function() {
            $('#tabelku').dataTable({});
        });    
</script>