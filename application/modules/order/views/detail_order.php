
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Order 
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"></i> Order </a></li>
      <li class="active">Data</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <!-- Default box -->
    <div class="box box-danger">
      <div class="box-header with-border">
        <h3 class="box-title">Form Data Order | <a href="<?=base_url();?>order/index" class="btn btn-danger"><i class="fa fa-angle-left"></i> &nbsp;Back Data Order </a></h3>

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
              <!-- `id_pemesanan`, `author`, `pelanggan`, `no_meja`, `total`, `total_order`, `catatan`, `created`, `updated` -->
              <tr class="success">
                <th>No</th>
                <th>No Order</th>
                <th>Pelanggan</th>
                <th>No Meja</th>
                <th>Total Order</th>
                <th>Total</th>
              </tr>
              </thead>
              <tbody>
              <?php 
                $no=0;
                foreach ($order as $v) { 
                $no++;
              ?>
              <tr>
                <td width="4%"><?=$no;?></td>
                <td><?=$v->id_pemesanan;?></td>
                <td><?=$v->pelanggan;?></td>
                <td><?=$v->no_meja;?></td>
                <td><?=$v->total_order;?></td>
                <td><?=number_format($v->total,0, ',', ".");?></td>        
              </tr>

              <?php } ?>
              
              </tbody>
            </table>
          </div> 

          <hr style="border:1.5px solid red" />

          <div class="table-responsive">
          <table class="table nameTable table-bordered">
              <thead>
              <!-- `id_detail_pemesanan`, `id_pemesanan`, `id_produk`, `qty_beli`, `sub_total`, `created`, `updated`, `promo`, `potongan_harga` -->
              <tr class="success">
                <th>No</th>
                <th>Produk</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Sub Total</th>
              </tr>
              </thead>
              <tbody>
              <?php 
                $no=0;
                $total = 0;
                foreach ($detail_order as $v) { 
                $no++;

                $tipe_promo = $v->tipe_promo;
                $potongan_harga = $v->potongan_harga;

                $total_item = $v->sub_total;

                if($tipe_promo == "Diskon"){
                  $diskon = ($potongan_harga / 100) * $total_item;
                  $total_item = $total_item - $diskon;
                }else if($tipe_promo == "Potongan Harga"){
                  $total_item = $total_item - $potongan_harga;
                  if($total_item < 0){
                    $total_item = $v->sub_total;
                  }
                }

                $total = $total + $total_item;
                $pajak = 0.1 * $total;
                $total_all = $pajak + $total;
              ?>
              <tr>
                <td width="4%"><?=$no;?></td>
                <td><?=$v->nama_produk;?><br/> <small><?=$v->tipe_promo;?>&nbsp;<?=$v->potongan_harga;?></small></td>
                <td><?=$v->qty_beli;?></td>
                <td><?=number_format($v->harga,0, ',', ".");?></td>
                <td><?=number_format($total_item,0, ',', ".");?></td>        
              </tr>

              <?php } ?>
              <tr>
                <td align="right" colspan="4"><b>Pajak 10%</b></td>
                <td><b><?=number_format($pajak,0, ',', ".");?></b></td>
              </tr>

              <tr>
                <td align="right" colspan="4"><b>Total</b></td>
                <td><b><?=number_format($total_all,0, ',', ".");?></b></td>
              </tr>
              
              </tbody>
            </table>
          </div> 
      </div>
      <!-- /.box-body -->
      
    </div>
    <!-- /.box -->
  </section>
  <!-- /.content -->