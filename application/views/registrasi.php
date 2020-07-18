
<body class="bg-gradient-primary">

<div class="container">

  <div class="card o-hidden border-0 col-lg-6 mx-auto shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        
        <div class="col-lg">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Daftar Akun!</h1>
            </div>
            <form class="user" method="post" action="<?php echo base_url('registrasi/index')?>">
            <div class="form-group">
                <input type="text" name="nama" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukan Nama Lengkap Anda">
                <?php echo form_error('nama', '<div class="text-danger small ml-2 mb-2">', '</div>')?>
              </div>

              <div class="form-group">
                
                <input type="text" name="username" class="form-control form-control-user" id="exampleInputEmail" placeholder="Username">
                <?php echo form_error('username', '<div class="text-danger small ml-2 mb-2">', '</div>')?>
                <?php echo $this->session->flashdata('pesan') ?>
              </div>

              <div class="form-group">
                <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email">
                <?php echo form_error('email', '<div class="text-danger small ml-2 mb-2">', '</div>')?>

              </div>

              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                  <?php echo form_error('password', '<div class="text-danger small ml-2 mb-2">', '</div>')?>
                </div>
                <div class="col-sm-6">
                  <input type="password" name="password2" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Konfirmasi Password">
                  
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-user btn-block">Daftar</button>
              <hr>
              
            </form>
            
            <div class="text-center">
              <a class="small" href="<?php echo base_url('auth/login') ?>">Sudah Punya Akun? Silahkan Login!</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

