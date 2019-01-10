<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Bahan Baku Keluar Add</h3>
            </div>
            <?php echo form_open('bahan_baku_keluar/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_bahan_baku" class="control-label">Id Bahan Baku</label>
						<div class="form-group">
							<input type="text" name="id_bahan_baku" value="<?php echo $this->input->post('id_bahan_baku'); ?>" class="form-control" id="id_bahan_baku" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_produk" class="control-label">Id Produk</label>
						<div class="form-group">
							<input type="text" name="id_produk" value="<?php echo $this->input->post('id_produk'); ?>" class="form-control" id="id_produk" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="qty" class="control-label">Qty</label>
						<div class="form-group">
							<input type="text" name="qty" value="<?php echo $this->input->post('qty'); ?>" class="form-control" id="qty" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="satuan" class="control-label">Satuan</label>
						<div class="form-group">
							<input type="text" name="satuan" value="<?php echo $this->input->post('satuan'); ?>" class="form-control" id="satuan" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="created" class="control-label">Created</label>
						<div class="form-group">
							<input type="text" name="created" value="<?php echo $this->input->post('created'); ?>" class="has-datetimepicker form-control" id="created" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="updated" class="control-label">Updated</label>
						<div class="form-group">
							<input type="text" name="updated" value="<?php echo $this->input->post('updated'); ?>" class="has-datetimepicker form-control" id="updated" />
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