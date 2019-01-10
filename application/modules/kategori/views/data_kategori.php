
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Kategori 
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"></i> Kategori </a></li>
      <li class="active">Data</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <!-- Default box -->
    <div class="box box-danger">
      <div class="box-header with-border">
        <h3 class="box-title">Form Data Kategori | <a href="<?=base_url();?>kategori/add" class="btn btn-danger"><i class="fa fa-plus"></i> Tambah Data Kategori </a></h3>

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
          <table class="table nameTable table-bordered">
              <thead>
              <tr class="success">
                <th>No</th>
                <th>Id Kategori</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
              <?php 
                $no=0;
                foreach ($getData as $v) { 
                $no++;
              ?>
              <tr>
                <td width="4%"><?=$no;?></td>
                <td><?=$v->id_kategori;?></td>
                <td><?=$v->kategori;?></td>
                <td width="6%" align="center"><a class="btn btn-primary btn-xs" href="<?=base_url();?>kategori/edit/<?=$v->id_kategori;?>" title="Edit Data"><i class="fa fa-pencil"></i></a> <a class="btn btn-danger btn-xs" onclick="return confirm('Hapus data ini ?')" href="<?=base_url();?>kategori/exeDelete/<?=$v->id_kategori;?>" title="Hapus Data"><i class="fa fa-remove"></i></a></td>
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