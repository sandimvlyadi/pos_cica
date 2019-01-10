<div class="row content">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Promo Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('promo/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Promo</th>
						<th>Nama Promo</th>
						<th>Tipe Promo</th>
						<th>Ket</th>
						<th>Status</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($promo as $p){ ?>
                    <tr>
						<td><?php echo $p['id_promo']; ?></td>
						<td><?php echo $p['nama_promo']; ?></td>
						<td><?php echo $p['tipe_promo']; ?></td>
                        <?php
                        if($p['tipe_promo'] == "Diskon"){
                            $promo = $p['diskon'].'%';
                        }else{
                            $promo = $p['potongan_harga'];
                        }
                        ?>
						<td><?php echo $promo; ?></td>
						<td><?php echo $p['status']; ?></td>
						<td>
                            <a href="<?php echo site_url('promo/edit/'.$p['id_promo']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a onclick="return confirm('Hapus data ini ?');" href="<?php echo site_url('promo/remove/'.$p['id_promo']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
