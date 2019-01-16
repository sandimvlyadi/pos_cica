<div class="row content">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Bahan Baku Masuk Add</h3>
            </div>
            <?php echo form_open('bahan_baku_masuk_baru/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
          			<div class="col-md-12">
						<label for="tgl_produk" class="control-label">Tanggal Produk</label>
						<div class="form-group">
							<input type="text" name="tgl_produk" value="<?php echo date('Y-m-d'); ?>" class="form-control" id="tgl_produk" readonly />
						</div>
					</div>
					<div class="col-md-12">
						<label for="id_produk" class="control-label">Prodak</label>
						<div class="form-group">
							<select id="id_produk" name="id_produk" class="form-control" required="">
								<option>--- Pilih Prodak ---</option>
								<?php foreach ($bahan_baku as $b) { ?>
									<option value="<?=$b['id_produk'];?>"><?=$b['nama_produk'];?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="col-md-12" id="listBahanBaku">
						<label for="id_bahan_baku" class="control-label">List Bahan Baku</label>
					</div>
					<div class="col-md-12">
						<label for="stok_baru" class="control-label">Stok</label>
						<div class="form-group">
							<input type="number" name="stok_baru" class="form-control" id="stok_baru" required="" />
              <input type="hidden" name="sisa_stok" class="form-control" id="sisa_stok" />
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Save
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>
<script type="text/javascript">
  	$(document).ready(function() {
    	
  	});

  	$("#id_produk").change(function() {
  		$("#listBahanBaku p").remove();
  		loadBahanBaku();
  	});

  	function loadBahanBaku(){
  		url = "<?php echo site_url();?>bahan_baku_masuk_baru/loadBahanBaku/";
  		id_produk = $("#id_produk").val();
  		$.ajax({
          	type:'POST',
          	url: url,
          	data:"id_produk="+id_produk,
          	dataType: "JSON",
          	success: function(response){
            	var json = JSON.parse(JSON.stringify(response));
            	for (var i = 0; i < json.length; i++) {
            		$( "#listBahanBaku" ).append( "<p><button class='btn btn-default' disabled>"+ json[i].bahan_baku +"</button></p>");
            	}
          	},
          	error: function (jqXHR, textStatus, errorThrown)
          	{
            	console.log(jqXHR.responseText);
            	alert(jqXHR.responseText);
          	}
        });

      url = "<?php echo site_url();?>bahan_baku_masuk_baru/loadStok/";
      $.ajax({
            type:'POST',
            url: url,
            data:"id_produk="+id_produk,
            dataType: "JSON",
            success: function(response){
              var json = JSON.parse(JSON.stringify(response));
              $('#sisa_stok').val(json[0].sisa_stok);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
              console.log(jqXHR.responseText);
              alert(jqXHR.responseText);
            }
        });
  	}
</script>