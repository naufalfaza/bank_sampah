
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

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/dist/js/adminlte.js') ?>"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="<?= base_url('assets/plugins/jquery-mousewheel/jquery.mousewheel.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/raphael/raphael.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/jquery-mapael/jquery.mapael.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/jquery-mapael/maps/usa_states.min.js') ?>"></script>
    <!-- ChartJS -->
    <script src="<?= base_url('assets/plugins/chart.js/Chart.min.js') ?>"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url('assets/dist/js/demo.js') ?>"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?= base_url('assets/dist/js/pages/dashboard2.js') ?>"></script>
    <!-- Datatables -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-1.13.5/af-2.6.0/b-2.4.1/b-colvis-2.4.1/b-html5-2.4.1/b-print-2.4.1/cr-1.7.0/date-1.5.1/fc-4.3.0/fh-3.4.0/kt-2.10.0/r-2.5.0/rg-1.4.0/rr-1.4.1/sc-2.2.0/sb-1.5.0/sp-2.2.0/sl-1.7.0/sr-1.3.0/datatables.min.js"></script>
    <!-- Select2 -->
    <script src="<?= base_url('assets/plugins/select2/js/select2.full.min.js') ?>"></script>
    <!-- Masking -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <!-- Sweet Alert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <!-- Function DataTables -->
    <script type="text/javascript">
    new DataTable('#example', {
        responsive : true
    });
    </script>

    <!-- Function Select2 -->
    <script type="text/javascript">
    // $(document).ready(function() {
    //     // $('#kategori').select2({
    //     //   placeholder: 'Pilih Jenis Sampah'
    //     // });
        // $('#kategori').select2({
        //   placeholder: 'Pilih Jenis',
        //   language: "id",
        //   allowClear:true
        // });
    //     // $('#kategori').select2();
    // });
    </script>

    <script type="text/javascript">
    $('.masking1').mask('#.##0', {reverse: true});
    $("#simpan_jenis_sampah").click(function(){
        var kategori = $("#kategori").val();
        var harga = $("#harga").val();
        $.ajax({
            url : "<?= base_url('Admin/konfig_jenis_sampah?aksi=simpan') ?>",
            method : "POST",
            dataType : "json",
            data : {kategori:kategori,harga:harga},
            beforeSend: function() {
              Swal.fire({
                position: 'center',
                icon : 'info',
                iconHtml: '<i class="fas fa-spinner fa-pulse"></i>',
                title: 'Permintaan Diproses', 
                html: 'Tunggu Sesaat....',
                showConfirmButton: false,
                allowOutsideClick: false
              });
            },
            success: function(response){
              location.reload();
              Swal.fire({position: 'center',icon: 'success',title: 'Berhasil Menamah Data',showConfirmButton: false,timer: 1500});
            }
        });
    });
    $("#edit_jenis_sampah").click(function(){
        var kategori = $("#edit_kategori").val();
        var harga = $("#edit_harga").val();
        var id_sampah = $("#id_sampah").val();
        $.ajax({
            url : "<?= base_url('Admin/konfig_jenis_sampah?aksi=edit') ?>",
            method : "POST",
            dataType : "json",
            data : {kategori:kategori,harga:harga,id_sampah:id_sampah},
            beforeSend: function() {
              Swal.fire({
                position: 'center',
                icon : 'info',
                iconHtml: '<i class="fas fa-spinner fa-pulse"></i>',
                title: 'Permintaan Diproses', 
                html: 'Tunggu Sesaat....',
                showConfirmButton: false,
                allowOutsideClick: false
              });
            },
            success: function(response){
              location.reload();
              Swal.fire({position: 'center',icon: 'success',title: 'Berhasil Merubah Data',showConfirmButton: false,timer: 1500});
            }
        });
    });

    $("#id_user").change(function(){
        var id_user = $(this).val();
        $.ajax({
            url : "<?= base_url('Admin/konfig_penukaran_sampah?aksi=siswa') ?>",
            method : "POST",
            dataType : "json",
            data : {id_user:id_user},
            success: function(response){
                $("#nm_siswa").val(response.nama);
            }
        });
    });

    $("#kategori").change(function(){
        var id_sampah = $(this).val();
        $.ajax({
            url : "<?= base_url('Admin/konfig_penukaran_sampah?aksi=harga_jenis_sampah') ?>",
            method : "POST",
            dataType : "json",
            data : {id_sampah:id_sampah},
            success: function(response){
                $("#harga").val(response.harga);
            }
        });
    });

    $("#qty").keyup(function(){
        var qty = $(this).val();
        var harga = $("#harga").val();
        $.ajax({
            url : "<?= base_url('Admin/konfig_penukaran_sampah?aksi=hitung_satuan') ?>",
            method : "POST",
            dataType : "json",
            data : {qty:qty,harga:harga},
            success: function(response){
                $("#jumlah").val(response.jumlah);
            }
        });
    });
    function edit(id_sampah)
    {
        $("#edit").modal('show');
        $.ajax({
            url : "<?= base_url('Admin/konfig_jenis_sampah?aksi=detail') ?>",
            method : "POST",
            dataType : "json",
            data : {id_sampah:id_sampah},
            success: function(response){
                $("#edit_kategori").val(response.kategori);
                $("#edit_harga").val(response.harga);
                $("#id_sampah").val(id_sampah);
            }
        });


    }
    </script>

    <script type="text/javascript">
    // TAMBAH BPNU
    var count = 0;
    var tbl_transaksi = $("#form_item_bpnu").DataTable({
      responsive: true,
      autoFill : true,
      select : {style : "os",selector : "tr"},
    });

    tbl_transaksi.on("select",function(e,dt,type,indexes){

      // UBAH
      $(document).on('click','tr',function assets(){

        $("#id_hd").val(tbl_transaksi.rows('.selected').data().toArray()[0][0]);
        $("#nm_siswa").val(tbl_transaksi.rows('.selected').data().toArray()[0][1]);
        $("#kategori").val(tbl_transaksi.rows('.selected').data().toArray()[0][2]);
        $("#qty").val(tbl_transaksi.rows('.selected').data().toArray()[0][3]);
        $("#harga").val(tbl_transaksi.rows('.selected').data().toArray()[0][4]);
        $("#jumlah").val(tbl_transaksi.rows('.selected').data().toArray()[0][5]);
        $("#tambah_bpnu").html("<i class ='fas fa-edit'></i> Ubah");
        return false;
      });

      // HAPUS
      $(document).bind('keydown','del',function assets(){
        if(tbl_transaksi.count() >= 0){
          var jumlah = parseInt(tbl_transaksi.rows('.selected').data().toArray()[0][5].replace(/\./g,""));
          var total = parseInt($("#total").val().replace(/\./g,"")) - jumlah;
          count = total ;
        }

        // AJAX MERUBAH MENJADI RUPIAH
        $.ajax({
          url:"<?=base_url('Admin/konfig_penukaran_sampah?aksi=hitung_total')?>",
          dataType : "json",
          method : "POST",
          data : {count:count},
          success : function(response){
            $("#total").val(response.total);
          }
        });
        
        tbl_transaksi.rows('.selected').remove().draw(false);
        return false;
      });
    });

    // FUNGSI PADA SAAT MENGKLIK BUTTON TAMBAH
    var no = 1;
    $('#tambah_bpnu').click(function (e) {
      if ($("#nm_siswa").val() !== "" && $("#kategori").val() !== "" && $("#qty").val() !== "" && $("#harga").val() !== "" && $("#jumlah").val() !== "" ){
        var loop,found = 0,take;
        for(var i = 0;i < tbl_transaksi.rows().count();i++){
          loop = tbl_transaksi.rows().data().toArray()[i][0];
          if (loop.toString() == $("#id_hd").val()) {
            found = 1;
            take = i;
          }
        }
        if (take >= 0) {
          count = parseInt($("#total").val().replace(/\./g,""))-parseInt(tbl_transaksi.rows().data().toArray()[take][5].replace(/\./g,""));
          tbl_transaksi.row(take).data([
            tbl_transaksi.rows().data().toArray()[take][0],
            $("#id_user").val(),
            $("#nm_siswa").val(),
            $("#kategori").val(),
            $("#qty").val(),
            $("#harga").val(),
            $("#jumlah").val(),
          ]).draw(false);
            count = count + parseInt($("#jumlah").val().replace(/\./g,""));
            $("#id_user").val(null).trigger("change");
            $("#nm_siswa").val("");
            $("#kategori").val(null).trigger("change");
            $("#qty").val("");
            $("#harga").val("");
            $("#jumlah").val("");
            $("#tambah_bpnu").html("<i class ='fas fa-plus'></i> Tambah");
            $("#id_hd").val("0");
        }else{
          tbl_transaksi.row.add([
          no++,
            $("#id_user").val(),
            $("#nm_siswa").val(),
            $("#kategori").val(),
            $("#qty").val(),
            $("#harga").val(),
            $("#jumlah").val(),
          ]).draw(false);
          count = count + parseInt($("#jumlah").val().replace(/\./g,""));
            $("#id_user").val(null).trigger("change");
            $("#nm_siswa").val("");
            $("#kategori").val(null).trigger("change");
            $("#qty").val("");
            $("#harga").val("");
            $("#jumlah").val("");
        }

        // AJAX MERUBAH MENJADI RUPIAH
        $.ajax({
          url:"<?=base_url('Admin/konfig_penukaran_sampah?aksi=hitung_total')?>",
          dataType : "json",
          method : "POST",
          data : {count:count},
          success : function(response){
            $("#total").val(response.total);
          }
        });

      }else{
        Swal.fire({position: 'center',icon: 'warning',title: 'Lengkapi Data Item',showConfirmButton: true,timer: 1500});
      }
    });
    </script>
>>>>>>> f5fd7f49a887f399e01f480d34b7f33a66c30512
  </body>
</html>