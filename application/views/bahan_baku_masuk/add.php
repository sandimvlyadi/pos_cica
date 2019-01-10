<div class="row content">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Bahan Baku Masuk Add</h3>
            </div>
            <?php echo form_open('bahan_baku_masuk/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_bahan_baku" class="control-label">Bahan Baku</label>
						<div class="form-group">
							<select id="id_bahan_baku" name="id_bahan_baku" class="form-control" required="">
								<option></option>
								<?php foreach ($bahan_baku as $b) { ?>
									<option value="<?=$b['id_bahan_baku'];?>"><?=$b['bahan_baku'];?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="supplier" class="control-label">Supplier</label>
						<div class="form-group">
							<input type="text" name="supplier" value="<?php echo $this->input->post('supplier'); ?>" class="form-control" id="supplier" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="lokasi" class="control-label">Lokasi</label>
						<div class="form-group">
							<input type="text" name="lokasi" value="<?php echo $this->input->post('lokasi'); ?>" class="form-control" id="lokasi" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="harga_satuan" class="control-label">Harga</label>
						<div class="form-group">
							<input type="text" name="harga_satuan" value="<?php echo $this->input->post('harga_satuan'); ?>" class="form-control" id="harga_satuan" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="qty" class="control-label">Qty</label>
						<div class="form-group">
							<input type="text" name="qty" value="<?php echo $this->input->post('qty'); ?>" class="form-control" id="qty" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="tgl_beli" class="control-label">Tgl Beli</label>
						<div class="form-group">
							<input type="date" name="tgl_beli" value="<?php echo $this->input->post('tgl_beli'); ?>" class="has-datepicker form-control" id="tgl_beli" />
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