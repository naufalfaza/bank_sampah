
      <!-- Main Footer -->
      <footer class="main-footer">
        <strong>Copyright &copy; <?= date('Y') ?> <a href="#">IT CLUB</a> SMK MERDEKA BANDUNG</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 1.0
        </div>
      </footer>
    </div>
    <!-- ./wrapper -->

    <!-- Bootstrap 4 -->
		<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
		<!-- AdminLTE App -->
		<script src="<?= base_url('assets/dist/js/adminlte.min.js') ?>"></script>
		<!-- SweetAlert2 -->
		<script src="<?= base_url('assets/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
    <!-- Datatables -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-1.13.5/af-2.6.0/b-2.4.1/b-colvis-2.4.1/b-html5-2.4.1/b-print-2.4.1/cr-1.7.0/date-1.5.1/fc-4.3.0/fh-3.4.0/kt-2.10.0/r-2.5.0/rg-1.4.0/rr-1.4.1/sc-2.2.0/sb-1.5.0/sp-2.2.0/sl-1.7.0/sr-1.3.0/datatables.min.js"></script>

      <!-- Function DataTables -->
    <script type="text/javascript">
      new DataTable('#tableTransaksi', {
        scrollX: true
      });
    </script>

  </body>
</html>