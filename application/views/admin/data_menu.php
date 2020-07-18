<div class="container-fluid">
  <!-- Topbar Search -->
  <div class="container"> 
    <div class="row">
      <div class="col-md-8">

      </div>
      <div class="col-md-4">
          <?php echo form_open('admin/dashboard/search') ?>
                <div class="input-group">
                  <input type="text" name="keyword" class="form-control bg-light border-0 small" placeholder="Cari..." aria-label="Search" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                      <i class="fas fa-search fa-sm"></i> 
                    </button>
                  </div>
                </div>
          <?php echo form_close() ?>
      </div>
    </div>  
  </div>
    
    <button class="btn btn-sm btn-success mb-3" data-toggle="modal" data-target="#tdatabarang"><i class="fas fa-plus fa-sm"></i> Tambah Menu</button>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama Menu</th>
            <th>Keterangan</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th colspan="3" class="text-center">Aksi</th>
        </tr>
        <?php $no=1; foreach ($menu as $key):?>
        <tr>
            <td><?php echo $no++?></td>
            <td><?php echo $key->nama_menu?></td>
            <td><?php echo $key->keterangan?></td>
            <td><?php echo $key->kategori?></td>
            <td><?php echo $key->harga?></td>
            <td><?php echo $key->stok?></td>
            <td><?php echo anchor('admin/data_menu/detail/'.$key->id_menu, '<div class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="bottom" title="Detail Barang"><i class="fas fa-search-plus" ></i> </div>')?></td>
            <td onclick="return confirm('Apakah Anda Yakin Ingin Mengubah!')"><?php echo anchor('admin/data_menu/edit/'.$key->id_menu, '<div class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="bottom" title="Update"> <i class="fa fa-edit" ></i></div>')?></td>
            <td onclick="return confirm('Apakah Anda Yakin Ingin Menghapus!')"><?php echo anchor('admin/data_menu/hapus/'.$key->id_menu, '<div class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash"></i> </div>')?></td>
        </tr>
        <?php endforeach?>
    </table>

</div>

<!-- Modal -->
<div class="modal fade" id="tdatabarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="pilih" action="<?php echo base_url().'admin/data_menu/tambahData'?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Nama Menu</label>
                <input type="text" name="nama" id="nama" autofocus required class="form-control"> 
            </div>

            <div class="form-group">
                <label for="ket">Keterangan</label>
                <input type="text" name="ket" id="ket" autofocus required class="form-control"> 
            </div>

            <div class="form-group">
                <label>Kategori Menu</label>
                <select name="kategori" form="pilih"  class="form-control">
                  <option value="Main Course">Main Course</option>
                  <option value="Drinks">Drinks</option>
                  <option value="Snacks"> Snacks</option>
                  <option value="Dessert">Dessert</option>
                  
                </select>
            </div>

            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" name="harga" id="harga" autofocus required class="form-control"> 
            </div>

            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="text" name="stok" id="stok" autofocus required class="form-control"> 
            </div>

            <div class="form-group">
                <label for="gambar">Gambar Menu</label><br>
                <input type="file" name="gambar" id="gambar" autofocus required > 
            </div>

            <div class="modal-footer">
        
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>