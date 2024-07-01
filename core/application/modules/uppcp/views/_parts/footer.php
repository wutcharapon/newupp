  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?=base_url('assets/backend')?>/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url('assets/backend')?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?=base_url('assets/backend')?>/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url('assets/backend')?>/bower_components/fastclick/lib/fastclick.js"></script>
<!-- InputMask -->
<script src="<?=base_url('assets/backend')?>/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?=base_url('assets/backend')?>/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?=base_url('assets/backend')?>/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="<?=base_url('assets/backend')?>/bower_components/moment/min/moment.min.js"></script>
<script src="<?=base_url('assets/backend')?>/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets/backend')?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url('assets/backend')?>/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?=base_url('assets/backend')?>/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url('assets/backend')?>/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>


<!--  Editor -->
<script src="<?=base_url('assets/backend')?>/bower_components/ckeditor/ckeditor.js"></script>
<script src="<?=base_url('assets/backend')?>/bower_components/ckeditor/build-config.js"></script>

<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
  <script>
  $(function () {

    var listdata = $('#listdata').DataTable({
      'language': { url: '<?=base_url('assets/backend/bower_components/datatables.net/thai.json')?>' },
      "sPaginationType": "full_numbers",
      "order": [[ 3, "asc" ]],
    })
    //Money Euro
    $('[data-mask]').inputmask()

	$('input[name="daterange"]').daterangepicker({ 
		timePicker: true, timePicker24Hour: true, timePickerSeconds: true, autoApply: true, locale: { format: 'YYYY-MM-DD HH:mm:ss' }
	  }, function(start, end, label) {
		console.log(start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
	});
    CKEDITOR.replace('editor', {
		extraPlugins : 'image2',
		filebrowserUploadMethod : "form",
		filebrowserUploadUrl : "upload"
	});
  })
</script>
<?php
//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";
?>
</body>
</html>
