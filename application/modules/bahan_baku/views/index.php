<div class="row content container-fluid">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Bahan Baku Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('bahan_baku/add'); ?>" class="btn btn-success btn-sm">Add</a>
                    <a href="<?php echo site_url('bahan_baku/export'); ?>" class="btn btn-info btn-sm" target="_blank">Export</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
                        <th>No</th>
						<th>Id Bahan Baku</th>
						<th>Bahan Baku</th>
						<th>Satuan</th>
						<th>Created</th>
						<th>Updated</th>
						<th>Actions</th>
                    </tr>
                    <?php $no=1;foreach($bahan_baku as $b){ ?>
                    <tr>
                        <td><?=$no++;?></td>
						<td><?php echo $b['id_bahan_baku']; ?></td>
						<td><?php echo $b['bahan_baku']; ?></td>
						<td><?php echo $b['stok']; ?> <?php echo $b['satuan']; ?></td>
						<td><?php echo date("d/M/Y", strtotime($b['created'])); ?></td>
						<td><?php echo date("d/M/Y", strtotime($b['updated'])); ?></td>
						<td>
                            <a href="<?php echo site_url('bahan_baku/edit/'.$b['id_bahan_baku']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a onclick="return confirm('Hapus data ini ?')" href="<?php echo site_url('bahan_baku/remove/'.$b['id_bahan_baku']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
