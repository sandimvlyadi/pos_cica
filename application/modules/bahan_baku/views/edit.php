<div class="row content container-fluid">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Bahan Baku Edit</h3>
            </div>
			<?php echo form_open('bahan_baku/edit/'.$bahan_baku['id_bahan_baku']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="bahan_baku" class="control-label">Bahan Baku</label>
						<div class="form-group">
							<input type="text" name="bahan_baku" value="<?php echo ($this->input->post('bahan_baku') ? $this->input->post('bahan_baku') : $bahan_baku['bahan_baku']); ?>" class="form-control" id="bahan_baku" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="satuan" class="control-label">Satuan</label>
						<div class="form-group">
							<select required="" class="form-control" name="satuan" id="satuan">
								<option><?=$bahan_baku['satuan'];?></option>
								<option></option>
								<option>Kg</option>
								<option>Pcs</option>
								<option>Ons</option>
								<option>Gram</option>
							</select>
						</div>
					</div>
					<!-- <div class="col-md-6">
						<label for="created" class="control-label">Created</label>
						<div class="form-group">
							<input type="text" name="created" value="<?php echo ($this->input->post('created') ? $this->input->post('created') : $bahan_baku['created']); ?>" class="has-datepicker form-control" id="created" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="updated" class="control-label">Updated</label>
						<div class="form-group">
							<input type="text" name="updated" value="<?php echo ($this->input->post('updated') ? $this->input->post('updated') : $bahan_baku['updated']); ?>" class="has-datepicker form-control" id="updated" />
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