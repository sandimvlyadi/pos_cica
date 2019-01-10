<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Edit Produk
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"></i> Produk</a></li>
      <li class="active">Edit</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <!-- Default box -->
    <div class="box box-danger">
      <div class="box-header with-border">
        <h3 class="box-title">Form Edit Produk</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i></button>
            <!--<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>-->
        </div>
      </div>
      <div class="box-body">
          <form method="post" accept-charset="utf-8" action="<?=base_url();?>produk/exeEdit/<?=$this->uri->segment(3);?>" enctype="multipart/form-data" role="form">
            
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
               <?php
              foreach ($editData as $e) {
              ?>
              <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" value="<?=$e->produk;?>" class="form-control" name="produk" id="produk" required="" />
              </div>

              <?php } ?>

             <!-- <div class="form-group">
                <label>Urutan</label>
                <input type="number"  class="form-control" name="txtUrutan" required="" />
              </div> -->

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Ubah</button>
              <a href="<?=base_url();?>produk/index" class="btn btn-danger">Cancel</a>
            </div>
          </form>
      </div>
      <!-- /.box-body -->
      
    </div>
    <!-- /.box -->


  </section>
  <!-- /.content -->