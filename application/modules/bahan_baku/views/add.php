<div class="row content container-fluid">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Bahan Baku Add</h3>
            </div>
            <?php echo form_open('bahan_baku/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="bahan_baku" class="control-label">Bahan Baku</label>
						<div class="form-group">
							<input type="text" name="bahan_baku" value="<?php echo $this->input->post('bahan_baku'); ?>" class="form-control" id="bahan_baku" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="satuan" class="control-label">Satuan</label>
						<div class="form-group">
							<select class="form-control" name="satuan" id="satuan">
								<option>Kg</option>
								<option>Pcs</option>
								<option>Ons</option>
								<option>Gram</option>
							</select>
							<!-- <input type="text" name="satuan" value="<?php echo $this->input->post('satuan'); ?>" class="form-control" id="satuan" /> -->
						</div>
					</div>
					<!-- <div class="col-md-6">
						<label for="created" class="control-label">Created</label>
						<div class="form-group">
							<input type="text" name="created" value="<?php echo $this->input->post('created'); ?>" class="has-datepicker form-control" id="created" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="updated" class="control-label">Updated</label>
						<div class="form-group">
							<input type="text" name="updated" value="<?php echo $this->input->post('updated'); ?>" class="has-datepicker form-control" id="updated" />
						</div>
					</div> -->
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