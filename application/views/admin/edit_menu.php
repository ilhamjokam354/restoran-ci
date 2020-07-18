<div class="container-fluid">
    <h3><i class="fas fa-search-plus"></i> Edit Menu</h3>
    <?php foreach ($menu as $key):?>
    <form action="<?php echo base_url().'admin/data_menu/update'?>" method="post" enctype="multipart/form-data">
    
        <div class="form-group">
            <label for="nama">Nama Barang</label>
            <input type="hidden" name="id" value="<?php echo $key->id_menu?>" >
            <input type="text" name="nama" value="<?php echo $key->nama_menu?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="ket">Keterangan</label>
            <input type="text" name="ket" value="<?php echo $key->keterangan?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="kategori">Kategori</label>
            <select name="kategori" id="" class="form-control">
                <option value="<?php echo $key->kategori?>"><?php echo $key->kategori?></option>
                <option value="Main Course">Main Course</option>
                <option value="Drinks">Drinks</option>
                <option value="Snacks">Snacks</option>
                <option value="Desserts">Desserts</option>

            </select>
        </div>

        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="text" name="harga" value="<?php echo $key->harga?>" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="ket">Stok</label>
            <input type="text" name="stok" value="<?php echo $key->stok?>" class="form-control">
        </div>

        <div class="form-group">
                <label for="gambar">Gambar Menu</label><br>
                <input type="file" name="gambar" id="gambar" value="<?= $key->gambar?>" autofocus required > 
        </div>

        <button type="submit" class="btn btn-sm btn-primary mt-3">Simpan</button>
    </form>
    <?php endforeach?>
</div>