<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Bahan Baku Keluar Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('bahan_baku_keluar/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Bahan Baku Keluar</th>
						<th>Id Bahan Baku</th>
						<th>Id Produk</th>
						<th>Qty</th>
						<th>Satuan</th>
						<th>Created</th>
						<th>Updated</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($bahan_baku_keluar as $b){ ?>
                    <tr>
						<td><?php echo $b['id_bahan_baku_keluar']; ?></td>
						<td><?php echo $b['id_bahan_baku']; ?></td>
						<td><?php echo $b['id_produk']; ?></td>
						<td><?php echo $b['qty']; ?></td>
						<td><?php echo $b['satuan']; ?></td>
						<td><?php echo $b['created']; ?></td>
						<td><?php echo $b['updated']; ?></td>
						<td>
                            <a href="<?php echo site_url('bahan_baku_keluar/edit/'.$b['id_bahan_baku_keluar']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('bahan_baku_keluar/remove/'.$b['id_bahan_baku_keluar']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
