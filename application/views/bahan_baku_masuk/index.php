<div class="row content container-fluid">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Bahan Baku Masuk Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('bahan_baku_masuk/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
                        <th>No</th>
						<th>Bahan Baku</th>
						<th>Supplier</th>
						<th>Lokasi</th>
						<th>Harga</th>
						<th>Qty</th>
						<th>Tgl Beli</th>
						<th>Actions</th>
                    </tr>
                    <?php $no=1; foreach($bahan_baku_masuk as $b){ ?>
                    <tr>
						<td><?php echo $no++; ?></td>
                        <td><?php echo $b['bahan_baku']; ?></td>
						<td><?php echo $b['supplier']; ?></td>
						<td><?php echo $b['lokasi']; ?></td>
						<td><?php echo $b['harga_satuan']; ?></td>
						<td><?php echo $b['qty']; ?></td>
						<td><?php echo date("d/M/Y", strtotime($b['tgl_beli'])); ?></td>
						<td>
                            <!-- <a href="<?php echo site_url('bahan_baku_masuk/edit/'.$b['id_bahan_baku_masuk']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> --> 
                            <a onclick="return confirm('Hapus data ini ?');" href="<?php echo site_url('bahan_baku_masuk/remove/'.$b['id_bahan_baku_masuk']); ?>/<?=$b['id_bahan_baku'];?>/<?=$b['qty'];?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
