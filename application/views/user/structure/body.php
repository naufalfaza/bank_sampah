  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><b>Selamat Datang</b> <?= $this->session->userdata('name') ?></h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-md-12">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-wallet"></i></span>

              <div class="info-box-content">
                <span class="info-box-text text-right">Saldo</span>
                <span class="info-box-number text-right">
                  <h3><b>Rp. 1.000.000</b></h3>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="card-title">Data Transaksi</div>
              </div>
              <div class="card-body">
                <div class="col-md-12">
                  <table id="tableTransaksi" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center" width="5%">No</th>
                            <th class="text-center" width="15%">Tanggal</th>
                            <th class="text-center" width="30%">Jenis Sampah</th>
                            <th class="text-center" width="10%">Berat</th>
                            <th class="text-center" width="15%">Harga</th>
                            <th class="text-center" width="25%">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      $getData = $this->M_user->getTransaksi('tbl_transaksi', array('id_user' => $this->session->userdata('id_user')));
                      $no = 1;
                      foreach($getData->result() as $dt) {
                        ?>
                        <tr>
                          <td class="text-center"><?= $no++ ?></td>
                          <td class="text-center"><?= date('d-m-Y', strtotime($dt->tgl_record)) ?></td>
                          <td class="text-center"><?= $dt->jenis_sampah ?></td>
                          <td class="text-center"><?= $dt->qty." ".$dt->satuan ?></td>
                          <td class="text-center"><?= $dt->jenis_sampah ?></td>
                          <td class="text-center"></td>
                        </tr>
                        <?php
                      }
                      ?>
                    </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
    
  </div>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->