<div class="container-fluid">
    <h4>Detail Pemesanan <button type="button" class="btn btn-primary">
  Id Invoice <span class="badge badge-light"><?php echo $invoice->id?></span>
  <span class="sr-only">unread messages</span>
</button></h4>

    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>Id Menu</th>
            <th>Nama Produk</th>
            <th>Jumlah Pesanan</th>
            <th>Harga Satuan</th>
            <th>Sub-Total</th>
        </tr>

        <?php $total = 0; foreach ($pesanan as $key): $subtotal= $key->jumlah * $key->harga; $total += $subtotal; ?>
            <tr>
                <td><?php echo $key->id_menu?></td>
                <td><?php echo $key->nama_menu?></td>
                <td><?php echo $key->jumlah?></td>
                <td >Rp. <?php echo number_format($key->harga,0,',','.' ) ?></td>
                <td align="right">Rp. <?php echo number_format($subtotal,0,',','.' ) ?></td>
            </tr>
        <?php endforeach?>

        <tr>
            <td colspan="4" align="right"><b>Grand Total : </b></td>
            <td align="right">Rp. <?php echo number_format($total, 0,',','.')?></td>
        </tr>
        
    </table>
    <a href="<?php echo base_url('admin/invoice')?>" class="btn btn-primary">Kembali</a>
</div>