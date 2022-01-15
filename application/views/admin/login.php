<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-7">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
            <img src="assets\background.jpg" class="card-img" alt="">
            
            <div class="card-img-overlay">  
              <div class="col-lg">
                <div class="p-3">
                  <div class="text-center">
                    <h1 class="h1 text-gray-900 font-weight-bold mb-2">Perpus Gundar</h1>
                    <h3 class="h2 text-gray-900 font-weight-bold mb-5">Login</h3>
                  </div>
                  <?php if($this->session->flashdata('pesan') == "Logout"): ?>
                  <div class="alert alert-success" role="='alert">
                   Anda Telah Logout
                  </div>
                  <?php endif ?>
                  <form class="user" method="post" action="<?= base_url('autentifikasi'); ?>">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" value="<?= set_value('email'); ?>" id="email" placeholder="Masukkan Alamat Email" name="email">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?> 
                        </div>
                    <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-success btn-user btn-block"> Masuk </button>
                  </form>
                  <hr>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
</div>
</div>