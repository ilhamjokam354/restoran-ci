<div class="container-fluid">
    <h4>Keranjang Belanja</h4>
    <?php echo $this->session->flashdata('pesan') ?>
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>No</th>
            <th>Nama Menu</th>
            <th>Jumlah</th>
            <th class="text-center">Harga</th>
            <th class="text-center">Sub-Total</th>
            <th class="text-center">Aksi</th>
        </tr>
        <?php $no=1; foreach ($this->cart->contents() as $key ):?>
            <tr> 
                <td><?php echo $no++?></td>
                <td><?php echo $key['name']?></td>
                
                <td>
                <div class="input-append">
                    
                    <a class="btn btn-sm btn-secondary" href="javascript:void(0)" onclick="reducecart('<?= $key['rowid']?>',<?= $key['qty'] ?>)"><i class="fas fa-minus"></i></a>
                    <input class="text-center" style="max-width:50px" readonly="true" id="appendedInputButtons<?= $key['id'] ?>" size="16" type="text" value="<?= $key['qty'] ?>">
                    <a class="btn btn-sm btn-secondary"  href="javascript:void(0)" onclick="addtocart('<?= $key['rowid']?>',<?= $key['qty'] ?>)"><i class="fas fa-plus"></i></a>
                    
                </div>

                </td>
                <td align="right">Rp. <?php echo number_format($key['price'], 0,',','.')?></td>
                <td align="right">Rp. <?php echo number_format($key['subtotal'], 0,',','.')?></td>
                <td class="text-center"><a data-toggle="tooltip" data-placement="bottom" title="Hapus Item" href="<?php echo base_url('dashboard/hapus_item/'.$key['rowid']) ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
                
            </tr>
        <?php endforeach?>
        <tr>
            <td colspan="4"><h4>Total Seluruh Belanja</h4></td>
            <td align="right"><h4><b>Rp. <?php echo number_format($this->cart->total(), 0,',','.')?></b></h4></td>
        </tr>

        
    </table>
    <div align="right">
        <a href="<?php echo base_url('dashboard/hapusKeranjang')?>" class="btn btn-sm btn-danger mr-3" data-toggle="tooltip" data-placement="bottom" title="Hapus Semua Keranjang Belanja" ><i class="fas fa-eraser"></i></a>
        <a href="<?php echo base_url('welcome/index')?>" class="btn btn-sm btn-primary mr-3" data-toggle="tooltip" data-placement="bottom" title="Lanjutkan Pembelian"><i class="fas fa-cart-plus" ></i></a>
        <a href="<?php echo base_url('dashboard/pembayaran')?>" class="btn btn-sm btn-success mr-3" data-toggle="tooltip" data-placement="bottom" title="Lanjutkan Ke Pembayaran"><i class="fas fa-cash-register"></i></a>
    </div>
</div>
<script>
    function addtocart(row,qty){
        if(qty != ""){
        $.ajax({
        url:'<?php echo base_url(); ?>dashboard/addtocart',
        type:'POST',
        dataType:'json',
        data:{
        'row' : row,
        'qty' : qty,
        },
        success: function(data) {
        location.reload();
        }
        });
        } else {
        return false;
        }
        return false;
        }
    function reducecart(row,qty){
        if(qty != ""){
        $.ajax({
        url:'<?php echo base_url(); ?>dashboard/reducecart',
        type:'POST',
        dataType:'json',
        data:{
        'row' : row,
        'qty' : qty,
        },
        success: function(data) {
        location.reload();
        }
        });
        } else {
        return false;
        }
        return false;
        }
    
</script>