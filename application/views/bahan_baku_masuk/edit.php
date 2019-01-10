<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Bahan Baku Masuk Edit</h3>
            </div>
			<?php echo form_open('bahan_baku_masuk/edit/'.$bahan_baku_masuk['id_bahan_baku_masuk']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_bahan_baku" class="control-label">Id Bahan Baku</label>
						<div class="form-group">
							<input type="text" name="id_bahan_baku" value="<?php echo ($this->input->post('id_bahan_baku') ? $this->input->post('id_bahan_baku') : $bahan_baku_masuk['id_bahan_baku']); ?>" class="form-control" id="id_bahan_baku" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="supplier" class="control-label">Supplier</label>
						<div class="form-group">
							<input type="text" name="supplier" value="<?php echo ($this->input->post('supplier') ? $this->input->post('supplier') : $bahan_baku_masuk['supplier']); ?>" class="form-control" id="supplier" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="lokasi" class="control-label">Lokasi</label>
						<div class="form-group">
							<input type="text" name="lokasi" value="<?php echo ($this->input->post('lokasi') ? $this->input->post('lokasi') : $bahan_baku_masuk['lokasi']); ?>" class="form-control" id="lokasi" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="harga_satuan" class="control-label">Harga Satuan</label>
						<div class="form-group">
							<input type="text" name="harga_satuan" value="<?php echo ($this->input->post('harga_satuan') ? $this->input->post('harga_satuan') : $bahan_baku_masuk['harga_satuan']); ?>" class="form-control" id="harga_satuan" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="qty" class="control-label">Qty</label>
						<div class="form-group">
							<input type="text" name="qty" value="<?php echo ($this->input->post('qty') ? $this->input->post('qty') : $bahan_baku_masuk['qty']); ?>" class="form-control" id="qty" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="tgl_beli" class="control-label">Tgl Beli</label>
						<div class="form-group">
							<input type="text" name="tgl_beli" value="<?php echo ($this->input->post('tgl_beli') ? $this->input->post('tgl_beli') : $bahan_baku_masuk['tgl_beli']); ?>" class="has-datepicker form-control" id="tgl_beli" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="created" class="control-label">Created</label>
						<div class="form-group">
							<input type="text" name="created" value="<?php echo ($this->input->post('created') ? $this->input->post('created') : $bahan_baku_masuk['created']); ?>" class="has-datepicker form-control" id="created" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="updated" class="control-label">Updated</label>
						<div class="form-group">
							<input type="text" name="updated" value="<?php echo ($this->input->post('updated') ? $this->input->post('updated') : $bahan_baku_masuk['updated']); ?>" class="has-datepicker form-control" id="updated" />
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