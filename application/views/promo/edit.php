<div class="row content">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Promo Add</h3>
            </div>
            <?php echo form_open('promo/edit/'.$promo['id_promo']); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="nama_promo" class="control-label">Nama Promo</label>
						<div class="form-group">
							<input type="text" name="nama_promo" value="<?php echo $promo['nama_promo']; ?>" class="form-control" id="nama_promo" />
						</div>
					</div>
					<div class="col-md-12"></div>
					<div class="col-md-6">
						<label for="tipe_promo" class="control-label">Tipe Promo</label>
						<div class="form-group">
							<select class="form-control" name="tipe_promo" id="tipe_promo">
								<option value="<?=$promo['tipe_promo'];?>"><?=$promo['tipe_promo'];?></option>
								<option value=""></option>
								<option value="Diskon">Diskon</option>
								<option value="Potongan Harga">Potongan Harga</option>
							</select>
						</div>
					</div>
					<div class="col-md-12"></div>
					<div class="col-md-6" id="div_potongan_harga" style="display: none;">
						<label for="potongan_harga" class="control-label">Potongan Harga</label>
						<div class="form-group">
							<input type="text" name="potongan_harga" value="<?php echo $promo['potongan_harga']; ?>" class="form-control" id="potongan_harga" />
						</div>
					</div>
					<div class="col-md-6" id="div_diskon" style="display: none;">
						<label for="diskon" class="control-label">Diskon</label>
						<div class="input-group">
			            	<input type="text" name="diskon" value="<?php echo $promo['diskon']; ?>" class="form-control" id="diskon" />
			                <span class="input-group-addon"><b>%</b></span>
			            </div>
					</div>
					<div class="col-md-12">
						<hr style="border-bottom: 1.5px solid red;">
					</div>
					<!-- <div class="col-md-6">
						<label for="start_date" class="control-label">Start Date</label>
						<div class="form-group">
							<input type="date" name="start_date" value="<?php echo $promo['start_date']; ?>" class="has-datepicker form-control" id="start_date" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="end_date" class="control-label">End Date</label>
						<div class="form-group">
							<input type="date" name="end_date" value="<?php echo $promo['end_date']; ?>" class="has-datepicker form-control" id="end_date" />
						</div>
					</div> -->
					<div class="col-md-6">
						<label for="status" class="control-label">Status</label>
						<div class="form-group">
							<select name="status" id="status" class="form-control">
								<option><?=$promo['status'];?></option>
								<option></option>
								<option>Aktif</option>
								<option>Tidak Aktif</option>
							</select>
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Save
            	</button>
            	<a href="<?=site_url('promo/index');?>" class="btn btn-danger">
            		<i class="fa fa-delete"></i> Cancel
            	</a>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		if($('#tipe_promo').val() == "Diskon"){
    		$('#div_diskon').fadeIn();
    		$('#div_potongan_harga').fadeOut();
    		
    	}else if($('#tipe_promo').val() == "Potongan Harga"){
    		$('#div_diskon').fadeOut();
    		$('#div_potongan_harga').fadeIn();
    	}

		$('#tipe_promo').on('change', function (e) {
	    	if($('#tipe_promo').val() == "Diskon"){
	    		$('#div_diskon').fadeIn();
	    		$('#div_potongan_harga').fadeOut();
	    	}else if($('#tipe_promo').val() == "Potongan Harga"){
	    		$('#div_diskon').fadeOut();
	    		$('#div_potongan_harga').fadeIn();
	    	}
	    });
	});
</script>