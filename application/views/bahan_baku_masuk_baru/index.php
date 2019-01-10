<div class="row content container-fluid">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Bahan Baku Masuk Listing | <?php echo date('Y-m-d'); ?></h3>
                <div class="box-tools">
                    <div class="dropdown">
                        <a href="<?php echo site_url('bahan_baku_masuk_baru/add'); ?>" class="btn btn-success btn-sm">Add</a>
                        <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Export
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo site_url('bahan_baku_masuk_baru/export_bulan'); ?>" target="_blank">Perbulan</a></li>
                            <li><a href="<?php echo site_url('bahan_baku_masuk_baru/export_triwulan'); ?>" target="_blank">Triwulan</a></li>
                            <li><a href="<?php echo site_url('bahan_baku_masuk_baru/export_tahun'); ?>" target="_blank">Tahun</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Stok Baru</th>
                        <th>Stok Sisa</th>
                        <th>Tgl Update</th>
                        <th>Actions</th>
                    </tr>
                    <?php $no=1; foreach($bahan_baku_masuk as $b){ ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $b['nama_produk']; ?></td>
                        <td><?php echo $b['stok_baru']; ?></td>
                        <td><?php echo $b['sisa_stok']; ?></td>
                        <td><?php echo $b['tgl_produk']; ?></td>
                        <td>
                            <a onclick="return confirm('Hapus data ini ?');" href="<?php echo site_url('bahan_baku_masuk_baru/remove/'.$b['id_produk_update']); ?>/" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
