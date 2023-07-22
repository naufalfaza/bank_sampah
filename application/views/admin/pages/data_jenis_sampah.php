  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Konfigurasi Jenis Sampah</h1><br>
          </div><!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="card-title">Data Jenis Sampah</div>
                <div class="card-tools"><button class="btn btn-outline-success btn-sm" type="button" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah</button></div>
              </div>
              <div class="card-body">
                <div class="col-md-12">
                  <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Jenis Sampah</th>
                            <th class="text-center">Harga Perkilo</th>
                            <th class="text-center">#</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1; foreach ($this->M_admin->data_jenis_sampah("")->result() as $js) { ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= $js->kategori ?></td>
                            <td class="text-center"><?= rupiah($js->harga) ?></td>
                            <td class="text-center"><button class="btn btn-outline-info btn-sm col-md-12" onclick="edit('<?= $js->id_sampah ?>')"><i class="fas fa-pen"></i> Edit</button></td>
                        </tr>
                      <?php } ?>
                    </tbody>
                </table>
                </div>
              </div>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  </div>

 <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Penambahan Jenis Sampah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label class="col-form-label col-md-4">Jenis Sampah</label>
          <div class="col-md-8">
            <input type="text" class="form-control" id="kategori">
          </div>
          <div class="col-md-12"><br></div>
          <label class="col-form-label col-md-4">Harga Perkilo</label>
          <div class="col-md-8">
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text">Rp.</div>
              </div>
              <input type="text" class="form-control masking1" id="harga">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="simpan_jenis_sampah"><i class="fas fa-download"></i> Simpan</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Edit Jenis Sampah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label class="col-form-label col-md-4">Jenis Sampah</label>
          <div class="col-md-8">
            <input type="hidden" class="form-control masking1" id="id_sampah">
            <input type="text" class="form-control" id="edit_kategori">
          </div>
          <div class="col-md-12"><br></div>
          <label class="col-form-label col-md-4">Harga Perkilo</label>
          <div class="col-md-8">
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text">Rp.</div>
              </div>
              <input type="text" class="form-control masking1" id="edit_harga">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="edit_jenis_sampah"><i class="fas fa-download"></i> Ubah</button>
      </div>
    </div>
  </div>
</div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->