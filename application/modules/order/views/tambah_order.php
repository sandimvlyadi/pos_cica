<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pemesanan
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"></i> Order</a></li>
      <li class="active">Tambah</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <!-- Default box -->
    <div class="box box-danger">
      <div class="box-header with-border">
        <h3 class="box-title">Form New Order</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i></button>
            <!--<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>-->
        </div>
      </div>
      <div class="box-body">

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

        <div class="row">
          <div class="col-md-6">
            <div class="box box-info">
              <?php foreach($produk as $p) { ?>
              <div class="col-md-4" style="padding: 4px;">
                <div style="margin: 4px; border: 1px solid #eaeaea; padding: 4px;">
                  <center><img alt="Staff Member" class="img-responsive" src="<?=site_url();?>uploads/images/<?=$p->gambar;?>"  style="max-width: 100%; object-fit: cover; height: 120px;"></center>
                  <center>
                    <b><?=$p->nama_produk;?></b>
                    <br/>
                    Rp. <?=$p->harga;?>
                    <br/>
                    <button onclick="dataDetail('<?=$p->id_produk;?>')" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Order</button>
                  </center>
                </div>
              </div>
              <?php } ?>
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        <div class="col-md-6">
          <div class="box box-info">
            <div class="box-body">
              <form method="post" accept-charset="utf-8" action="<?=base_url();?>order/exeAdd" enctype="multipart/form-data" role="form">
                <!-- text input -->
                <!-- `id_pemesanan`, `author`, `pelanggan`, `id_no_meja`, `total`, `total_order`, `catatan`, `created`, `updated` -->
                <div class="col-sm-12 col-md-12 col-lg-12">
                  <div class="form-group">
                    <input type="hidden" name="id_pemesanan" id="id_pemesanan" value="<?=$id_pemesanan;?>">
                    <input readonly="" name="no_order" value="<?=$id_pemesanan;?>" type="text" class="form-control" placeholder="No Order">
                  </div>
                </div>

                <div class="col-xs-6 col-sm-6 
                  col-md-6 col-lg-6">
                  <div class="form-group">
                    <select class="form-control" required="" name="no_meja" id="no_meja">
                      <option value="">No Meja</option>
                      <?php
                      for ($i=1; $i <= 10 ; $i++) {
                      ?>
                      <option><?=$i;?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="col-xs-6 col-sm-6 
                  col-md-6 col-lg-6">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Name" name="pelanggan" id="pelanggan">
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
                  <th>Action</th>
                </tr>
                </thead>
                <tbody id="dataOrder">
                </tbody>
                <!-- <tfoot>
                <tr>
                  <th>No</th>
                  <th>Name Product</th>
                  <th>Qty</th>
                  <th>Subtotal</th>
                </tr>
                </tfoot> -->
              </table>

              <!-- textarea -->
              <br/>
                <div class="form-group">
                  <textarea class="form-control" rows="3" placeholder="Notes" name="catatan" id="catatan"></textarea>
                  <input type="hidden" name="total_order" id="total_order">
                </div>

                <div class="col-sm-12" style="border-bottom: 1px solid #6d7177; padding-bottom: 10px; padding-top: 10px;">
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                  <p>
                    <font class="pull-left"><b>Sub total</b></font>
                  </p>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <p>
                      <font class="pull-right" id="sub_total"><b>0</b></font>
                    </p>
                  </div>
                </div>

                <div class="col-sm-12" style="border-bottom: 1px solid #6d7177; padding-bottom: 10px; padding-top: 10px;">
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                  <p>
                    <font class="pull-left"><b>Pajak 10%</b></font>
                  </p>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <p>
                      <font class="pull-right" id="pajak"><b>0</b></font>
                    </p>
                  </div>
                </div>

                <div class="col-sm-12" style="border-bottom: 1px solid #6d7177;">
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                  <p>
                    <font class="pull-left" style="font-size:20px;" ><b>TOTAL</b></font>
                  </p>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <p>
                      <input type="hidden" name="txtTotal" id="txtTotal" />
                      <font class="pull-right" style="font-size:20px;" id="total"><b>0</b></font>
                    </p>
                  </div>
                </div>

                <div class="col-sm-12" style="border-bottom: 1px solid #6d7177;padding-bottom: 10px; padding-top: 10px;">
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                  <p>
                    <font class="pull-left" style="font-size:20px;"><b>Bayar</b></font>
                  </p>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <input type="text" style="text-align: right; font-size:20px; " class="form-control" id="bayar" autocomplete="off" name="bayar" placeholder="Masukkan" required="" />
                  </div>
                </div>

                <div class="col-sm-12" style="border-bottom: 1px solid #6d7177; padding-bottom: 10px; padding-top: 10px;">
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                  <p>
                    <font class="pull-left"><b>Kembali</b></font>
                  </p>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <p>
                      <font class="pull-right"><b id="kembali">0</b></font>
                    </p>
                  </div>
                </div>
                <!-- <div class="  col-sm-12 
                  col-md-12 col-lg-12"> -->
                  <button type="submit" class="btn btn-block btn-primary btn-lg">Bayar & Cetak</button>
                <!-- </div> -->
                  
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              &nbsp;
            </div>
          </form>
      </div>
      <!-- /.box-body -->
      
    </div>
    <!-- /.box -->


  </section>
  <!-- /.content -->

  <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="max-width: 350px; margin: 0 auto;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detail Order</h4>
      </div>
      <div class="modal-body" id="dataDetail">
        <div id="divError">
        </div>
      </div>
      <div class="modal-footer">
        <button id="addDetailPemesanan" type="button" class="btn btn-success" data-dismiss="modal">Add</button>
        <button id="btnCloseModal" type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
      $(document).ready(function() {
        id_pemesanan = $("#id_pemesanan").val();
        dataOrder(id_pemesanan);
      });

      $('#addDetailPemesanan').bind("click",function(e){
        addDetailPemesanan();
      });

      $('#bayar').on('keyup keypress blur change', function(e) {
        bayar = $("#bayar").val();
        total = $("#txtTotal").val();
        kembali = bayar - total;

        $("#kembali").html(accounting.formatNumber(kembali, 0, ".", ","));
      });

  function addDetailPemesanan()
    {
      $('#addDetailPemesanan').html("Proses simpan...");
      $("#addDetailPemesanan").prop('disabled', true);
      url = "<?php echo site_url();?>order/insertDetailPemesanan";
      id_produk = $("#id_produk_modal").val();
      harga = $("#harga_modal").val();
      qty = $("#qty").val();
      promo = $('#promo').val();
      urlCek = "<?php echo site_url();?>order/cekProduk";
      $.ajax({
        type:'POST',
        url:urlCek,
        data:"id_produk="+id_produk+"&qty="+qty,
        dataType:"JSON",
        success: function(response){
          if (response.result) {
            $.ajax({
            type:'POST',
            url: url,
            data:"id_produk="+id_produk+"&qty_beli="+qty+"&harga="+harga+"&promo="+promo,
            dataType: "JSON",
            success: function(data){
              //console.log(data);
              if(data.result == "success"){
                //alert('Berhasil ditambah');
                $('#myModal').modal('hide');
                id_pemesanan = $("#id_pemesanan").val();
                dataOrder(id_pemesanan);
              }else if(data.result == "danger"){
                  $("#divError").show();
                  $("#divError").html(data.alert);
              }
              
              $('#addDetailPemesanan').html("Add");
              $("#addDetailPemesanan").prop('disabled', false);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
              console.log(jqXHR.responseText);
              //console.log(data);
              $("#divError").show();
              $("#divError").html(jqXHR.responseText);
            }
          });
          } else{
            alert('Maaf, stok telah habis untuk produk ini.');
            $('#addDetailPemesanan').html("Add");
            $("#addDetailPemesanan").prop('disabled', false);
            $("#btnCloseModal").click();
          }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert(jqXHR.responseText);
        }
      });
    }

    function deleteData(kd_detail){
      if(confirm("Hapus data ini ?")){
        url = "<?php echo site_url();?>order/deleteDetailOrder";
        $.ajax({
          type: 'POST',
          url: url,
          data:"id_detail_pemesanan="+kd_detail,
          dataType: "JSON",
          success: function(data){
            //console.log(data);
            if(data.result == 'success'){
              id_pemesanan = $("#id_pemesanan").val();
              dataOrder(id_pemesanan);
            }else if(data.result == 'danger'){
              alert('Gagal dihapus');
            }
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            $("#divError").show();
            $("#divError").html(jqXHR.responseText);
          }
        });
      }
    }

    function dataDetail(id_produk){
      //id_produk = $("#id_produk").val();
      url = "<?php echo site_url();?>order/getDetailProduk";
      $.ajax({
          type:'GET',
          url: url,
          data:"id_produk="+id_produk,
          dataType: "JSON",
          success: function(data){
            //console.log(data);
            if(data.id_produk != ""){
              $("#dataDetail").empty();
              no=0;
              //console.log(data);

                $("#dataDetail").append(
                '<h4>'+data.nama_produk+' - Rp '+data.harga+'</h4>'
                +'<div class="row">'
                  +'<div class="col-md-4">'
                    +'<div class="form-group">'
                      +'<label>Qty</label>'
                      +'<input type="hidden" value="'+data.id_produk+'" id="id_produk_modal" name="id_produk_modal" class="form-control" />'
                       +'<input type="hidden" value="'+data.harga+'" id="harga_modal" name="harga_modal" class="form-control" />'
                      +'<input type="number" value="1" name="qty" id="qty" class="form-control" />'
                    +'</div>'
                  +'</div>'
                  +'<div class="col-md-6">'
                    +'<div class="form-group">'
                      +'<label>Promo</label>'
                      +'<select name="promo" id="promo" class="form-control">'
                        +'<option></option>'
                      +'</select>'
                    +'</div>'
                  +'</div>'
                +'</div>'
                );

              $.each(data.promo, function(key, value) {
                $("#promo").append(
                  '<option value="'+value['id_promo']+'">'+value['nama_promo']+'</option>'
                );
              });


            }else{
              $('#dataDetail').html('Data is empty');
            }
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            $("#divError").show();
            $("#divError").html(jqXHR.responseText);
          }
      });
    }

    function dataOrder(id_pemesanan){
      url = "<?php echo site_url();?>order/getDataOrder";
      $.ajax({
          type:'GET',
          url: url,
          data:"id_pemesanan="+id_pemesanan,
          dataType: "JSON",
          success: function(data){
            //console.log(data);
            if(data.length > 0){
              $("#dataOrder").empty();
              no=0;
              total = 0;
              pajak = 0;
              sub_total = 0;
              //`id_pemesanan`, `author`, `pelanggan`, `id_no_meja`, `total`, `total_order`, `catatan`, `created`, `updated`
              //console.log(data);
              $.each(data, function(key, value) {
                no++;
                tipe_promo = value['tipe_promo'];
                potongan_harga = value['potongan_harga'];

                total_item = value['sub_total'];

                if(tipe_promo == "Diskon"){
                  diskon = (potongan_harga / 100) * total_item;
                  total_item = total_item - diskon;
                }else if(tipe_promo == "Potongan Harga"){
                  total_item = total_item - potongan_harga;
                  if(total_item < 0){
                    total_item = value['sub_total'];
                  }
                }else{
                  total_item = value['sub_total'];
                }
                
                sub_total = parseInt(sub_total) + parseInt(total_item);
                pajak = (10/100) * parseInt(sub_total);
                total = parseInt(sub_total) + parseInt(pajak);
                id_detail_pemesanan = value['id_detail_pemesanan'];

                $("#dataOrder").append(
                '<tr>'                  
                  +'<td>'+no+'</td>'
                  +'<td>'+value['nama_produk']+' <br/> <small>'+value['tipe_promo']+' '+value['potongan_harga']+'</small></td>'
                  +'<td>'+value['qty_beli']+'</td>'
                  +'<td><font class="pull-left">'+total_item+'</font></td>'
                  +'<td align="center"><button type="button" id="hapus_'+id_detail_pemesanan+'" class="btn btn-danger btn-xs" title="Hapus Data"><i class="fa fa-remove"> </i></button></td>'+
                +'</tr>'
              );

                $("#sub_total").empty();
                $("#sub_total").html("<b>"+accounting.formatNumber(sub_total, 0, ".", ",")+"</b>");

                $("#pajak").empty();
                $("#pajak").html("<b>"+accounting.formatNumber(pajak, 0, ".", ",")+"</b>");

                $("#total").empty();
                $("#total").html("<b>"+accounting.formatNumber(total, 0, ".", ",")+"</b>");

                $("#hapus_"+id_detail_pemesanan).click(function(){
                  deleteData(id_detail_pemesanan);
                });

                $("#txtTotal").val(total);

                $("#total_order").val(no);

              });
            }else{
              $('#dataOrder').html('<tr><td colspan="5" align="center">Data Belum Ada</td></tr>');
            }
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            $("#divError").show();
            $("#divError").html(jqXHR.responseText);
          }
      });
    }
    </script>

