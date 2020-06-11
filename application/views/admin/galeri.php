  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Galeri</h3>
        </div>

        <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
              
            </div>
          </div>
        </div>
      </div>

      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Form Tambah Data</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <form action="<?php base_url(); ?>Galeri/ins_galeri" method="post" enctype="multipart/form-data" novalidate>
              <?php 
                  $data=$this->session->flashdata('success');
                  if($data!=""){ ?>
                  <div id="notifikasi" class="alert alert-success"><strong>Success!</strong> <?=$data;?></div>
              <?php } ?>
              
              <?php 
                  $data2=$this->session->flashdata('error');
                  if($data2!=""){ ?>
                  <div id="notifikasi" class="alert alert-danger"><strong> Error! </strong> <?=$data2;?></div>
              <?php } ?>
                
                <div class="field item form-group">
                  <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Acara<span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6">
                    <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="namaacara" required="required" />
                  </div>
                </div>
                <div class="field item form-group">
                  <label class="col-form-label col-md-3 col-sm-3  label-align">Komisi<span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6">
                    <select id="komisi" name="komisi" class="form-control" required>
                      <option value="1">Komisi 1</option>
                      <option value="2">Komisi 2</option>
                      <option value="3">Komisi 3</option>
                      <option value="4">Komisi 4</option>
                    </select>
                  </div>
                </div>
                <div class="field item form-group">
                  <label class="col-form-label col-md-3 col-sm-3  label-align">Konten<span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6">
                    <textarea name="kontenacara" class="resizable_textarea form-control" placeholder="" required></textarea>
                  </div>
                </div>
                <div class="field item form-group">
                  <label class="col-form-label col-md-3 col-sm-3  label-align">Upload Gambar<span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6">
                    <input type="file" name="gambar" data-role="magic-overlay" data-target="" data-edit="insertImage" required /> </div>
                </div>

                <div class="ln_solid">
                  <div class="form-group">
                    <div class="col-md-6 offset-md-3">
                      <button type='submit' class="btn btn-primary">Submit</button>
                      <button type='reset' class="btn btn-success">Reset</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>


      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Data Galeri</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="row">
                <div class="col-sm-12">
                  <div class="card-box table-responsive">
                    <p class="text-muted font-13 m-b-30">
                      Data Galeri
                    </p>
                    <table id="datatable-checkbox" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <!-- <th>Check</th> -->
                          <th>No</th>
                          <th>Komisi</th>
                          <th>Nama Gambar</th>
                          <th>Konten</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $n = 1;
                        foreach ($gal as $g) : ?>
                          <tr>
                            <!-- <td><input type="checkbox" id="check-all"> </td> -->
                            <td><?= $n; ?></td>
                            <td>Komisi <?= $g->KOMISI; ?></td>
                            <td><?= $g->GAL_NAMA; ?></td>
                            <td><?= $g->KONTEN; ?></td>
                            <td>
                              <a href="<?= base_url() ?>admin/galeri/del_galeri/<?= $g->GALERI_ID ?>">
                                <button type="button" class="btn btn-sm btn-warning">Hapus</button>
                              </a>
                              <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#editGaleri">
                                  Edit
                              </button>
                            </td>

                          </tr>
                        <?php $n++;
                        endforeach ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="editGaleri" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <!-- modaledit -->
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Galeri</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url(); ?>admin/Galeri/editGaleri" method="post" enctype="multipart/form-data" >
                <div class="modal-body">
                <input type="hidden" class="form-control" name="id" id="id" value="<?= $g->GALERI_ID; ?>" >
                    <div class="form-group">
                        <label for="namaacara">Nama Acara</label>
                        <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="namaacara" required="required" value="<?= $g->NAMA_ACARA; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="komisi">Komisi</label>
                        <select id="komisi" name="komisi" class="form-control" required>
                          <option value="1">Komisi 1</option>
                          <option value="2">Komisi 2</option>
                          <option value="3">Komisi 3</option>
                          <option value="4">Komisi 4</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kontenacara">Konten Acara</label>
                        <textarea name="kontenacara" class="resizable_textarea form-control" placeholder="" required ><?= $g->KONTEN;?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="namaacara">Upload Gambar</label>
                        <input type="file" name="gambar" data-role="magic-overlay" data-target="" data-edit="insertImage" required />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="edit" value="barangedit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>