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
                            <th class="text-center" width="5%">No.</th>
                            <th class="text-center" width="50%">Nama</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">No.Handphone</th>
                            <th class="text-center" width="10%">#</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1; foreach ($this->M_admin->data_siswa("")->result() as $js) { ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= $js->nama ?></td>
                            <td class="text-center"><?= $js->kelas ?></td>
                            <td class="text-center"><?= $js->no_hp ?></td>
                            <td class="text-center"><button class="btn btn-outline-info btn-sm col-md-12" onclick="detail_siswa('<?= $js->id_user ?>')"><i class="fas fa-eye"></i> Detail</button></td>
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
<div class="modal fade" id="trx_penukaran_sampah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Penambahan Jenis Sampah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row"> 
          <div class="col-md-1"></div>
          <div class="col-md-2">
            <div class="form-group row text-center">
              <label class="col-form-label col-md-12">Pilih Kategori</label>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group row text-center">
              <label class="col-form-label col-md-12">Satuan</label>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group row text-center">
              <label class="col-form-label col-md-12">Harga</label>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group row text-center">
              <label class="col-form-label col-md-12">Jumlah</label>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group row text-center">
              <label class="col-form-label col-md-12">#</label>
            </div>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-1"></div>
          <div class="col-md-2">
              <div class="form-group row">
                  <div class="col-sm-12">
                      <input type="hidden" id="id_hd" value="0">
                      <input type="hidden" id="id_user">
                      <input type="hidden" id="kategori">
                      <select class="form-control" name="kategori" id="id_sampah_kat" style="height: 40px">
                          <option></option>
                          <?php foreach ($this->M_admin->data_jenis_sampah("")->result() as $k) { ?>
                              <option value="<?= $k->id_sampah ?>"><?= $k->kategori ?></option>
                          <?php } ?>
                      </select>
                  </div>
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group row">
                  <div class="col-md-12 text-center">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Kg</span>
                        </div>
                        <input type="text" name="harga" class="form-control text-right masking1" id="qty">
                    </div>
                  </div>
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group row">
                  <div class="col-md-12">
                      <div class="input-group">
                          <div class="input-group-prepend">
                              <span class="input-group-text">Rp.</span>
                          </div>
                          <input type="text" name="harga" class="form-control text-right masking1" readonly id="harga">
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group row">
                  <div class="col-md-12">
                      <div class="input-group">
                          <div class="input-group-prepend">
                              <span class="input-group-text">Rp.</span>
                          </div>
                          <input type="text" name="jumlah" class="form-control text-right" readonly id="jumlah">
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group row">
                  <div class="col-md-12 text-center"><button type="button" class="btn btn-outline-success col-md-12" id="tambah_bpnu"><i class="fas fa-plus"></i> Tambah</button></div>
              </div>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-12"><hr></div>
          <div class="col-md-12">
              <div class="form-group">
                  <div class="col-md-12">
                      <table id="form_item_bpnu" class="table table-bordered table-striped" width="100%">
                          <thead>
                              <tr>
                                  <th width="5%" class="text-center" >No.</th>
                                  <th width="10%" class="text-center">Jenis Sampah</th>
                                  <th width="5%" class="text-center">Satuan</th>
                                  <th width="15%" class="text-center">Harga</th>
                                  <th width="15%" class="text-center">Jumlah</th>
                              </tr>
                          </thead>
                      </table>
                  </div>
              </div>
          </div>
          <div class="col-md-12"><hr></div>
          <div class="col-md-12">
              <div class="form-group row text-left">
                  <div class="col-md-6">
                      <b><i>Catatan : </i></b>
                      <ul>
                          <!-- <li>Ubah Data   &nbsp;&nbsp;: Pilih item yang akan di ubah lalu tekan tombol ubah</li> -->
                          <li>Hapus Data  : Pilih item yang akan dihapus lalu klik delete pada keyboard</li>
                      </ul>
                  </div>
                  <div class="col-md-2 text-center"><label class="col-form-label">Total</label></div>
                  <div class="col-md-4">
                      <div class="input-group">
                          <div class="input-group-prepend">
                              <span class="input-group-text">Rp.</span>
                          </div>
                          <input type="text" class="form-control " id="total" name="total" readonly>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="simpan_penukaran_sampah"><i class="fas fa-download"></i> Simpan</button>
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