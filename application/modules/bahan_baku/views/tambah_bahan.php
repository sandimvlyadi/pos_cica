<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tambah Produk
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"></i> Produk</a></li>
      <li class="active">Tambah</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <!-- Default box -->
    <div class="box box-danger">
      <div class="box-header with-border">
        <h3 class="box-title">Form Tambah Produk</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i></button>
            <!--<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>-->
        </div>
      </div>
      <div class="box-body">
          <form method="post" accept-charset="utf-8" action="<?=base_url();?>produk/exeAdd" enctype="multipart/form-data" role="form">
            
            <div class="box-body">
              <?php if ($this->session->flashdata('danger')) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <?= $this->session->flashdata('danger') ?>
                </div>
              <?php } ?>

              <?php if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <?= $this->session->flashdata('success') ?>
                </div>
              <?php } ?>

              <?php if ($this->session->flashdata('warning')) { ?>
                <div class="alert alert-warning alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <?= $this->session->flashdata('warning') ?>
                </div>
              <?php } ?>

              <?php if ($this->session->flashdata('info')) { ?>
                <div class="alert alert-info alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <?= $this->session->flashdata('info') ?>
                </div>
              <?php } ?>

              <div class="form-group">
                <label>Nama Produk</label>
                <input type="text"  class="form-control" name="nama_produk" id="produk" required="" />
              </div>

              <div class="form-group">
                <label>Gambar Produk</label>
                <input type="file"  class="form-control" name="gambar" id="gambar" required="" />
              </div>

              <div class="form-group">
                <label>Kategori</label>
                <select class="form-control" required="" name="id_kategori">
                  <option>Ice Cream</option>
                </select>
              </div>

              <div class="form-group">
                <label>Harga Produk</label>
                <input type="text"  class="form-control" name="harga" id="harga" required="" />
              </div>

              <div class="form-group">
                <label>Deskripsi Produk</label>
                <textarea class="form-control" name="deskripsi"></textarea>
              </div>

              <div class="form-group">
                <label>Status Produk</label>
                <select class="form-control" required="" name="status">
                  <option value="Aktif">Aktif</option>
                  <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
              </div>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Tambah</button>
              <a href="<?=base_url();?>produk/index" class="btn btn-danger">Cancel</a>
            </div>
          </form>
      </div>
      <!-- /.box-body -->
      
    </div>
    <!-- /.box -->


  </section>
  <!-- /.content -->