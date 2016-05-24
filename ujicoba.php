<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>uji</title>
	<link rel="stylesheet" href="">
	<link href="asset/css/bootstrapawal.min.css" rel="stylesheet">

<link href="asset/css/bootstrap-responsive.min.css"  rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
<link href="asset/css/font-awesome.css" rel="stylesheet">
<link href="asset/css/style.css" rel="stylesheet">
<link href="asset/css/pages/dashboard.css" rel="stylesheet">
<link href="asset/css/sweetalert.css" rel="stylesheet">
<link href="asset/dataTables/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="asset/css/jquery-ui/jquery-ui-1.10.4.css" rel="stylesheet">

</head>
<body>
	<input type="hidden" name="id_pelanggan" id="id_pelanggan">
	<div class="control-group">
		<label class="control-label" for="nama">Nama Pelanggan</label>
		<div class="controls">
			<input type="text" name="nama" id="nama" value="" placeholder="Nama Pelanggan">
		</div>
	</div>
<div class="navbar navbar-fixed-bottom">
  <div class="footer-inner">
    <div class="container">
      <div class="row">
        <div class="span12"> Copyright &copy; CRM <?= date('Y') ?> </div>
        <!-- /span12 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /footer-inner --> 
</div>
<!-- /footer --> 
<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="asset/js/jquery.min.js"></script>
<script src="asset/js/excanvas.min.js"></script> 
<script src="asset/js/Chart.js" type="text/javascript"></script> 
<script src="asset/js/bootstrap.js"></script>
<script src="asset/js/base.js"></script> 
<script src="asset/js/sweetalert.min.js"></script> 
<script src="asset/dataTables/js/jquery.dataTables.min.js"></script>

<script src="asset/js/jquery-ui-1.10.4.js"></script> 
<script type="text/javascript">
	$(document).ready(function() {
		$("#nama").autocomplete({
			source: 'autocomplete_mobil.php',
			minLength: 2,
			select: function( event, ui ) {
				$("#id_pelanggan").val(ui.item.id);
			}
		});
	});
</script>
</body>
</html>