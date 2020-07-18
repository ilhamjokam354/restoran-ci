<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="alert alert-warning" role="alert">
            <?php $grandtotal = 0;
            if ($keranjang = $this->cart->contents()) {
                foreach ($keranjang as $key) {
                    $grandtotal = $grandtotal + $key['subtotal'];
                }?>
            Total Belanja Anda : Rp. <?php echo number_format($grandtotal, 0,',','.')?>
            </div><br>

            <h3>Input Alamat Pengiriman dan Pembayaran Anda</h3>
            <form method="post" action="<?php echo base_url('dashboard/prosesPesanan')?>">
                <div class="form-group"> 
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" autofocus placeholder="Masukan Nama Lengkap Anda" required class="form-control">
                </div>

                <div class="form-group"> 
                    <label for="alamat">Alamat Lengkap</label>
                    <input type="text" name="alamat" id="alamat" placeholder="Masukan Alamat Lengkap Anda" required  class="form-control">
                </div>

                <div class="form-group"> 
                    <label for="telp">No Telepon</label>
                    <input type="text" name="telp" id="telp" placeholder="Masukan No Telepon Anda" required class="form-control">
                </div>    

                <div class="form-group"> 
                    <label >Jasa Pengiriman</label>
                    <select name="kirim" class="form-control">
                        <option value="">JNE</option>
                        <option value="">J&T</option>
                        <option value="">SI CEPAT</option>
                        <option value="">POS INDONESIA</option>
                        <option value="">GOJEK</option>
                        <option value="">GRAB</option>
                    </select>
                </div>

                <div class="form-group"> 
                    <label >Pilih Bank</label>
                    <select name="bank" class="form-control">
                        <option value="">BRI - XXXXXXX</option>
                        <option value="">BCA - XXXXXXX</option>
                        <option value="">BNI - XXXXXXX</option>
                        <option value="">MANDIRI - XXXXXXX</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
    <?php   }else {
            echo '<strong>Maaf!</strong> Keranjang Belanja Anda Masih Kosong';
        }?>
        </div>
        <div class="col-md-2">
        </div>
    </div>
</div>
<br><br><br><br><br><br><br><br>