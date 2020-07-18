<div class="container-fluid">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img class="d-block w-100" src="<?php echo base_url()?>assets/img/carousel1.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
        <img class="d-block w-100" src="<?php echo base_url()?>assets/img/carousel2.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
        <img class="d-block w-100" src="<?php echo base_url()?>assets/img/carousel3.jpg" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>

    <div class="row text-center mt-4">

    <?php foreach ($drinks as $key):?>
    <div class="card mr-3 mb-3" style="width: 16rem;">
        <img width="300" height="200" class="card-img-top" src="<?php echo base_url().'uploads/'.$key->gambar?>" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title mb-1"><?php echo $key->nama_menu?></h5>
            <small ><?php echo $key->keterangan?></small><br>
            <span class="badge badge-pill badge-success mb-3">Rp. <?php echo number_format($key->harga, 0,',','.' )?></span>
            
            <?php echo anchor('dashboard/tambahKeKeranjang/'.$key->id_menu, '<div class="btn btn-sm btn-primary">Tambah Ke Keranjang</div>') ?>
            <?php echo anchor('dashboard/detail/'.$key->id_menu, '<div class="btn btn-sm btn-info">Detail</div>') ?>
        </div>
    </div>
    <?php endforeach;?>
    </div>
</div>