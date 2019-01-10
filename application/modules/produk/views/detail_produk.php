
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Detail Produk 
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"></i> Produk </a></li>
      <li class="active">Detail</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <!-- Default box -->
    <div class="box box-danger">
      <div class="box-header with-border">
        <h3 class="box-title">Form Data Produk | <a href="<?=base_url();?>produk/index" class="btn btn-danger"><i class="fa fa-angle-left"></i> Back Data Produk </a></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i></button>
          <!--<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>-->
        </div>
      </div>
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

        <style type="text/css">
          .table-bordered {
            border: 1px solid #a0a4aa;
          }
          .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
              border: 1px solid #a0a4aa;
          }
        </style>

        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
            <tr class="success">
              <th>No</th>
              <th>Id Produk</th>
              <th>Nama Produk</th>
              <th>Kategori Produk</th>
              <th>Harga</th>
              <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td width="4%"><?=$no=1;?></td>
              <td><?=$produk['id_produk'];?></td>
              <td><?=$produk['nama_produk'];?></td>
              <td><?=$produk['kategori'];?></td>
              <td><?=$produk['harga'];?></td>
              <td><?=$produk['status'];?></td>
            </tr>
            
            </tbody>
          </table>
        </div> 

        <h4>Detail Bahan Baku</h4>
        <hr style="border-top: 1.5px solid #dd4b39" />
        
        <div class="table-responsive">
          <table class="table table-bordered">
              <thead>
              <tr class="success">
                <th>No</th>
                <th>Bahan Baku</th>
                <th>Qty</th>
              </tr>
              </thead>
              <tbody>
              <?php 
                $no=1;
              ?>
              <tbody id="dataDetail">
              <?php
              foreach ($dproduk as $d) {
              ?>
              <tr>
                <td width="4%"><?=$no++;?></td>
                <td><?=$d['bahan_baku'];?></td>
                <td><?=$d['qty'];?> <?=$d['satuan'];?></td>
              </tr>
              <?php } ?>
              </tbody>
            </table>
        </div>

      </div>
      <!-- /.box-body -->
      
    </div>
    <!-- /.box -->


  </section>
  <!-- /.content -->