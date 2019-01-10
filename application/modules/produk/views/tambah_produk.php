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
                <label>Tanggal</label>
                <input type="text" class="form-control" value="<?php echo date('Y-m-d'); ?>" name="tgl_produk" id="tgl_produk" readonly />
              </div>

              <div class="form-group">
                <label>Kode Produk</label>
                <input type="text" class="form-control" value="<?=$id_produk;?>" name="id_produk" id="id_produk" readonly />
              </div>

              <div class="form-group">
                <label>Nama Produk</label>
                <input type="text"  class="form-control" name="nama_produk" id="produk" required="" />
                <input type="hidden"  class="form-control" value="<?=$id_produk;?>" name="id_produk" id="id_produk" required="" />
              </div>

              <div class="form-group">
                <label>Gambar Produk</label>
                <input type="file"  class="form-control" name="gambar" id="gambar" required="" />
              </div>

              <div class="form-group">
                <label>Kategori</label>
                <select class="form-control" required="" name="id_kategori">
                  <option></option>
                  <?php foreach ($kategori as $k) {?>
                  <option value="<?=$k->id_kategori;?>"><?=$k->kategori;?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="form-group">
                <label>Harga Produk</label>
                <input type="number"  class="form-control" name="harga" id="harga" required="" />
              </div>
              <!--
              <div class="form-group">
                <label>Deskripsi Produk</label>
                <textarea class="form-control" name="deskripsi"></textarea>
              </div>
            -->

              <div class="form-group">
                <label>Status Produk</label>
                <select class="form-control" required="" name="status">
                  <option value="Aktif">Aktif</option>
                  <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
              </div>

              <hr style="border-top: 1.5px solid #dd4b39" />

              <div class="row">
                <div class="col-sm-12">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Pilih Bahan Baku</label>
                      <select class="form-control" name="pilihBahanBaku" id="pilihBahanBaku">
                        <option></option>
                        <?php foreach ($bahan_baku as $b) { ?>
                          <option value="<?=$b->id_bahan_baku;?>"><?=$b->bahan_baku;?> (<?=$b->satuan;?>)</option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                    <div class="col-md-1">
                    <div class="form-group">
                      <label>Qty</label>
                      <input type="number" name="qty" id="qty" class="form-control" />
                    </div>
                    </div>

                    <div class="col-md-1">
                      <div class="form-group">
                        <label>&nbsp;</label>
                        <button class="btn btn-success form-control" name="btnBahanBaku" id="btnBahanBaku">Add</button>
                      </div>
                    </div>

                    <div class="col-md-12" id="divError">
                    </div>

                    <div class="col-md-7">
                      <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="success">
                              <th>No</th>
                              <th>Bahan Baku</th>
                              <th>Qty</th>
                              <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                              $no=0;
                              for ($i=1; $i < 2; $i++) { 
                              $no++;
                            ?>
                            <tbody id="dataDetail">
                            <tr>
                              <td width="4%"><?=$no;?></td>
                              <td>Sosis</td>
                              <td>1 pcs</td>
                              <td width="6%" align="center">aksi</td>
                            </tr>
                            <?php } ?>
                            </tbody>
                          </table>
                        </div>
                    </div>
                  
                </div>
              </div>

              <hr style="border-top: 1.5px solid #dd4b39" />

              <div class="form-group">
                <label>Stok baru</label>
                <input type="number"  class="form-control" name="stok_baru" id="stok_baru" />
              </div>

              <div class="form-group">
                <label>Sisa Stok</label>
                <input type="number"  class="form-control" name="sisa_stok" id="sisa_stok" />
              </div>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Save</button>
              <a href="<?=base_url();?>produk/index" class="btn btn-danger">Cancel</a>
            </div>
          </form>
      </div>
      <!-- /.box-body -->
      
    </div>
    <!-- /.box -->


  </section>
  <!-- /.content -->

  <script type="text/javascript">
      $(document).ready(function() {
        dataDetail();
      });

      $('#btnBahanBaku').bind("click",function(e){
        addBahanBaku();
      });

  function addBahanBaku()
    {
      $('#btnBahanBaku').html("Proses simpan...");
      $("#btnBahanBaku").prop('disabled', true);
      url = "<?php echo site_url();?>produk/insertBahanBaku";
      id_bahan_baku = $("#pilihBahanBaku").val();
      id_produk = $("#id_produk").val();
      qty = $("#qty").val();
      if (id_bahan_baku === null || id_bahan_baku === '') {
        alert("Silakan pilih bahan baku.");
        $('#btnBahanBaku').html("Add");
        $("#btnBahanBaku").prop('disabled', false);
      } else if(qty === null || qty === 0 || qty === ''){
        alert("Silakan masukan quantitiy.");
        $('#btnBahanBaku').html("Add");
        $("#btnBahanBaku").prop('disabled', false);
      } else{
        $.ajax({
          type:'POST',
          url: url,
          data:"id_bahan_baku="+id_bahan_baku+"&qty="+qty+"&id_produk="+id_produk,
          dataType: "JSON",
          success: function(data){
            console.log(data);
            if(data.status == "success"){
              //alert('Berhasil ditambah');
              $("#txtIdPenanaman").val("");
              $("#txtBahanBaku").val("");
              $("#txtIdPetani").val("");
              $("#txtJumlahBahanBaku").val("");
              $("#txtHarga").val("");
              $("#txtSatuanBB").val("");
            }else if(data.status == "danger"){
                $("#divError").show();
                $("#divError").html("Gagal ditambah bahan baku");
            }

            dataDetail();
            
            $('#btnBahanBaku').html("Add");
            $("#btnBahanBaku").prop('disabled', false);
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            console.log(jqXHR.responseText);
            //console.log(data);
            $("#divError").show();
            $("#divError").html(jqXHR.responseText);
          }
        });
      }
    }

    function deleteData(kd_detail){
      if(confirm("Hapus data ini ?")){
        url = "<?php echo site_url();?>produk/deleteDetail";
        $.ajax({
          type: 'POST',
          url: url,
          data:"id_detail="+kd_detail,
          dataType: "JSON",
          success: function(data){
            //console.log(data);
            if(data.result == 'success'){
              dataDetail();
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

    function dataDetail(){
      id_produk = $("#id_produk").val();
      url = "<?php echo site_url();?>produk/getDetailProduk";
      total = 0;
      $.ajax({
          type:'GET',
          url: url,
          data:"id_produk="+id_produk,
          dataType: "JSON",
          success: function(data){
            //console.log(data);
            if(data.length > 0){
              $("#dataDetail").empty();
              no=0;
              $.each(data, function(key, value) {
                no++;
                id_detail = value['id_detail'];
                $("#dataDetail").append(
                '<tr>'+
                  '<td>'+no+'</td>'+
                  '<td>'+value['bahan_baku']+'</td>'+
                  '<td>'+value['qty']+' '+value['satuan']+'</td>'+
                  '<td align="center"><button type="button" id="hapus_'+id_detail+'" class="btn btn-danger btn-xs" title="Hapus Data"><i class="fa fa-remove"> </i></button></td>'+
                '</tr>'
                );

                $("#hapus_"+id_detail).click(function(){
                  deleteData(id_detail);
                });

              });
            }else{
              $('#dataDetail').html('<tr><td colspan="4" align="center">Data Belum Ada</td></tr>');
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