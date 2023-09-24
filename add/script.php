<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>



<!-- /************************** */ -->
<!-- Bootstrap 4-->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS-->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline-->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap-->
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart-->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker-->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- date-range-picker -->
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4-->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote-->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars-->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App
<script src="../dist/js/adminlte.js"></script>-->

<!-- AdminLTE dashboard demo (This is only for demo purposes)-->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- /****************************** */ -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>


<!-- /**************CALENDARIO ***************************** */ -->

<!-- Tempusdominus Bootstrap 4 -->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- /************************************************ */ -->
<!-- Select2 -->
<script src="../plugins/select2/js/select2.full.min.js"></script>




<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,

      "lengthChange": true,
      "autoWidth": false,
      "buttons": ["csv", "excel", "pdf", "print", "colvis"],
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');


    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $('.select2').select2();

  });

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    //Date picker
    $('#reservationdateFin').datetimepicker({
        format: 'YYYY-MM-DD'
    });



</script>

<script>
  function enviarParametros(page) {

    var form = document.createElement('form');
    form.method = 'POST';
    form.action = 'home.php';

    var parametro1 = document.createElement('input');
    parametro1.type = 'hidden';
    parametro1.name = 'page';
    parametro1.value = page;
    form.appendChild(parametro1);

    document.body.appendChild(form);
    form.submit();
  }

  function enviarParametrosCRUD(page) {
    var form = document.createElement('form');
    form.method = 'POST';
    form.action = '../../vistas/home.php';

    var parametro1 = document.createElement('input');
    parametro1.type = 'hidden';
    parametro1.name = 'page';
    parametro1.value = page;
    form.appendChild(parametro1);

    document.body.appendChild(form);
    form.submit();
  }

  function enviarParametrosGetsionCreate(page,mod) {

    var form = document.createElement('form');
    form.method = 'POST';
    form.action = 'home.php';

    var parametro1 = document.createElement('input');
    parametro1.type = 'hidden';
    parametro1.name = 'page';
    parametro1.value = page;
    form.appendChild(parametro1);

    var parametro1 = document.createElement('input');
    parametro1.type = 'hidden';
    parametro1.name = 'mod';
    parametro1.value = mod;
    form.appendChild(parametro1);

    document.body.appendChild(form);
    form.submit();
  }


  function enviarParametrosGetsionUpdate(page,mod,id) {

    var form = document.createElement('form');
    form.method = 'POST';
    form.action = 'home.php';

    var parametro1 = document.createElement('input');
    parametro1.type = 'hidden';
    parametro1.name = 'page';
    parametro1.value = page;
    form.appendChild(parametro1);

    var parametro1 = document.createElement('input');
    parametro1.type = 'hidden';
    parametro1.name = 'mod';
    parametro1.value = mod;
    form.appendChild(parametro1);

    var parametro1 = document.createElement('input');
    parametro1.type = 'hidden';
    parametro1.name = 'id';
    parametro1.value = id;
    form.appendChild(parametro1);

    document.body.appendChild(form);
    form.submit();
  }


</script>
