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
	$db = new MysqliDb();
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <!-- /span6 -->

        <div class="span12">
        	<div class="span12">
        		<label class="control-label" for="isipesan">Isi pesan</label>
        		<textarea id="isipesan"></textarea>

        		<hr>

        	<table id="tabelku" class="table table-bordered table-striped">
            	<thead>
                	<tr>
            			<th>No</th>
            			<th>Nama</th>
            			<th>Alamat</th>
            			<th>No. Telp</th>
            			
                        <th><input type="checkbox" name="checkAll" id="checkAll" value="">Check all || <button id="kirimkan" >Kirim</button></th>
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
		        			<td><?= $pel['no_telepon']; ?></td>
		        			
                            <td class="no-sort"><input class="checkdong" type="checkbox" name="checkin"  value="<?= $pel['id_pelanggan'] ?>"></td>
		        		</tr>
        			<?php $no++; }
        		?>
        		</tbody>
        	</table>
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
</body>
</html>
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
            var isi = $('#isipesan').val();
            if (isi == '') {
            	alert('isi pesan kosong');
            	return false;
            }
            // console.log('kirim ya', value_kirim);

            $.ajax({
                url: 'kirim_checkall.php',
                type: 'post',
                data: {param1: value_kirim, isine: isi},
            }).success(function(aha){
                console.log(aha);
                alert(aha);
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