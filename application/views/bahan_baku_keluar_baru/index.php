<div class="row content container-fluid">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Bahan Baku Keluar Listing | <?php echo date('Y-m-d') ;?></h3>
            	<div class="box-tools">
                    <div class="dropdown">
                        <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Export
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo site_url('bahan_baku_keluar_baru/export_bulan'); ?>" target="_blank">Perbulan</a></li>
                            <li><a href="<?php echo site_url('bahan_baku_keluar_baru/export_triwulan'); ?>" target="_blank">Triwulan</a></li>
                            <li><a href="<?php echo site_url('bahan_baku_keluar_baru/export_tahun'); ?>" target="_blank">Tahun</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID Bahan Baku Keluar</th>
						<th>ID Bahan Baku</th>
						<th>ID Produk</th>
						<th>Qty</th>
                    </tr>
                    <?php foreach($bahan_baku_keluar as $b){ ?>
                    <tr>
						<td><?php echo $b['id_bahan_baku_keluar']; ?></td>
						<td><?php echo $b['id_bahan_baku']; ?></td>
						<td><?php echo $b['id_produk']; ?></td>
						<td><?php echo $b['qty']; ?></td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
