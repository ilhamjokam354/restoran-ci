<div class="container-fluid">
    <div class="card">
    <div class="card-header">
        <h3>Detail Produk</h3>
    </div>
    <div class="card-body">
    <?php foreach ($menu as $key):?>
        <div class="row">
            <div class="col-md-4">
                <img src="<?php echo base_url().'uploads/'.$key->gambar?>" alt="" class="card-img-top"> 
            </div>

            <div class="col-md-8">
                <table class="table">
                    <tr>
                        <td><strong>Nama Menu</strong> </td>
                        <td>: <?php echo $key->nama_menu?></td>
                    </tr>

                    <tr>
                        <td><strong>Keterangan</strong> </td>
                        <td>: <?php echo $key->keterangan?></td>
                    </tr>

                    <tr>
                        <td><strong>Kategori</strong> </td>
                        <td>: <?php echo $key->kategori?></td>
                    </tr>

                    <tr>
                        <td><strong>Harga</strong> </td>
                        <td>: <?php echo number_format($key->harga, 0,',','.') ?></td>
                    </tr>

                    <tr>
                        <td><strong>Stok</strong> </td>
                        <td>: <?php echo $key->stok?></td>
                    </tr>
                </table>
                 
            </div>
        </div>
    <?php endforeach?>
    
    
    </div>
    </div>
    <div class="mt-4"><?php echo anchor('admin/data_menu', '<div class="btn btn-sm btn-danger">Kembali</div>') ?></div>
    
</div>