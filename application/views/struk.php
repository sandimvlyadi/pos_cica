<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Point Of Sale</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url();?>assets/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url();?>assets/Ionicons/css/ionicons.min.css">

  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  <link rel="stylesheet" href="<?=base_url();?>assets/datatables-bs/css/dataTables.bootstrap.min.css">

  <link rel="stylesheet" href="<?=base_url();?>assets/image-picker/image-picker.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url();?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="<?=base_url();?>assets/dist/css/skins/skin-green.min.css">

   <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/upload_ajax/css/fileinput.css" />

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <section class="content container-fluid">
    	<div class="box-body">
    		<div class="col-md-6">
          <div class="box box-info">
            <div class="box-body">
              <form>
                <!-- text input -->
                <!-- `id_pemesanan`, `author`, `pelanggan`, `id_no_meja`, `total`, `total_order`, `catatan`, `created`, `updated` -->
                <div class="col-sm-12 col-md-12 col-lg-12">
                  <div class="form-group">
                    <input name="id_pemesanan" value="<?php echo $pemesanan[0]['id_pemesanan']; ?>" type="text" class="form-control" placeholder="ID Pemesanan">
                  </div>
                </div>

                <div class="col-xs-6 col-sm-6 
                  col-md-6 col-lg-6">
                  <div class="form-group">
                    <input name="no_meja" value="<?php echo $pemesanan[0]['no_meja']; ?>" type="text" class="form-control" placeholder="No Meja">
                  </div>
                </div>

                <div class="col-xs-6 col-sm-6 
                  col-md-6 col-lg-6">
                  <div class="form-group">
                    <input value="<?php echo $pemesanan[0]['pelanggan']; ?>" type="text" class="form-control" placeholder="Nama" name="pelanggan" id="pelanggan">
                  </div>
                </div>

                <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Name Product</th>
                  <th>Qty</th>
                  <th>Subtotal</th>
                </tr>
                </thead>
                <tbody id="dataOrder">
                <?php for ($i=0; $i < count($order); $i++) { ?>
                <tr>
                  <th><?php echo $i+1; ?></th>
                  <th><?php echo $order[$i]['nama_produk']; ?></th>
                  <th><?php echo $order[$i]['qty_beli']; ?></th>
                  <th><?php echo $order[$i]['sub_total']; ?></th>
                </tr>
                <?php } ?>
                </tbody>
              </table>

              <!-- textarea -->
              <br/>
                <div class="form-group">
                  <textarea class="form-control" rows="3" placeholder="Notes" name="catatan" id="catatan"><?php echo $pemesanan[0]['catatan']; ?></textarea>
                </div>

                <div class="col-sm-12" style="border-bottom: 1px; padding-bottom: 10px; padding-top: 10px;">
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                  <p>
                    <font class="pull-left"><b>Sub total</b></font>
                  </p>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <p>
                      <font class="pull-right" id="sub_total"><b><?php echo $origin[0]['sub_total']; ?></b></font>
                    </p>
                  </div>
                </div>

                <div class="col-sm-12" style="border-bottom: 1px; padding-bottom: 10px; padding-top: 10px;">
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                  <p>
                    <font class="pull-left"><b>Pajak 10%</b></font>
                  </p>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <p>
                      <font class="pull-right" id="pajak"><b><?php echo $pemesanan[0]['pajak']; ?></b></font>
                    </p>
                  </div>
                </div>

                <div class="col-sm-12" style="border-bottom: 1px;">
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                  <p>
                    <font class="pull-left" style="font-size:20px;" ><b>TOTAL</b></font>
                  </p>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <p>
                      <input type="hidden" name="txtTotal" id="txtTotal" />
                      <font class="pull-right" style="font-size:20px;" id="total"><b><?php echo $pemesanan[0]['total']; ?></b></font>
                    </p>
                  </div>
                </div>

                <div class="col-sm-12" style="border-bottom: 1px; padding-bottom: 10px; padding-top: 10px;">
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                  <p>
                    <font class="pull-left" style="font-size:20px;"><b>Bayar</b></font>
                  </p>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <font class="pull-right" style="font-size:20px;" id="total"><b><?php echo $pemesanan[0]['bayar']; ?></b></font>
                  </div>
                </div>

                <div class="col-sm-12" style="border-bottom: 1px; padding-bottom: 10px; padding-top: 10px;">
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                  <p>
                    <font class="pull-left"><b>Kembali</b></font>
                  </p>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <p>
                      <font class="pull-right"><b id="kembali"><?php echo $pemesanan[0]['kembali']; ?></b></font>
                    </p>
                  </div>
                </div>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
    	</div>
    </section>
    
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

	<script type="text/javascript">
    window.onload = function(){ 
        window.print();
    }
	</script>

</body>
</html>