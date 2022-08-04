   </div>
</section>
<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline"></div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2022 <a href="https://tecnofit.com.br" target="_blank">TecnoFit - Software Inteligente</a>.</strong>
    Todos os direitos reservados.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/dist/js/adminlte.min.js') ?>"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url('assets/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
<!-- jquery-validation -->
<script src="<?= base_url('assets/plugins/jquery-validation/jquery.validate.min.js')?>"></script>
<script src="<?= base_url('assets/plugins/jquery-validation/additional-methods.min.js')?>"></script>
<!-- Summernote -->
<script src="<?= base_url('assets/plugins/summernote/summernote-bs4.min.js') ?>"></script>
<!-- Bootstrap 4 custom file input -->
<script src="<?= base_url('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') ?>"></script>
<!-- Bootstrap Switch -->
<script src="<?= base_url('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js') ?>"></script>
<!-- jQueryInput Mask -->
<script src="<?= base_url('assets/plugins/inputmask/jquery.inputmask.min.js') ?>"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/jszip/jszip.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/pdfmake/pdfmake.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/pdfmake/vfs_fonts.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>
<!-- Toastr -->
<script src="<?= base_url('assets/plugins/toastr/toastr.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/dist/js/adminlte.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/moment/moment.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
<!--Autofill Address -->
<script src="<?= base_url('assets/cep.js') ?>"></script>
<!--addDependents -->
<script src="<?= base_url('assets/plugins/addDependentes/addDependents.js') ?>"></script>
<!-- Select2 -->
<script src="<?= base_url('assets/plugins/select2/js/select2.full.min.js') ?>"></script>
<!-- custom.js -->
<script src="<?= base_url('assets/custom.js') ?>"></script>

<script>
  <?php if (session('success')) { ?>
    toastr.success("<?= session('success') ?>");
  <?php } elseif(session('error')) { ?>
    toastr.error("<?= session('error') ?>");
  <?php } ?>
</script>

</body>
</html>