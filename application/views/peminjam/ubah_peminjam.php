<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-6">
        <?php foreach ($peminjam as $p) { ?>
                <form action="<?= base_url('Peminjam/ubahPeminjam'); ?>" method="post" enctype="multipart/form-data"> 
                    <div class="form-group"> 
                    <input type="hidden" name="id_peminjam" id="id_peminjam" value="<?php echo $p['id_peminjam']; ?>">
                    <input type="text" class="form-control form-control-user" id="nama_peminjam" name="nama_peminjam" placeholder="Masukkan Nama Peminjam" value="<?= $p['nama_peminjam']; ?>"> 
                    </div> 
                    <div class="form-group"> 
                    <!-- <input type="text" class="form-control form-control-user" id="judul_buku" name="judul_buku" placeholder="Masukkan Judul Buku" value="<?= $p['judul_buku']; ?>"> -->
                    <select name="judul_buku" id="judul_buku" class="form-control form-control-user">
                            <?php
                            foreach ($buku as $b) { ?>
                            <option value="<?=$b['judul_buku'];?>" <?php if ($b['judul_buku'] == $b['judul_buku']) { echo "selected";}?>> <?= $b['judul_buku'];?></option>
                            <?php } ?>

                            
                        </select>
                    </div> 
                    <div class="form-group">
                    <label for="tanggal_pinjam">Tanggal Pinjam:</label>
                    <input type="date" class="form-control form-control-user" id="tanggal_pinjam" name="tanggal_pinjam" value="<?= $p['tanggal_pinjam']; ?>"> 
                    </div> 
                    <div class="form-group">
                    <label for="tanggal_kembali">Tanggal Kembali:</label>
                    <input type="date" class="form-control form-control-user" id="tanggal_kembali" name="tanggal_kembali" value="<?= $p['tanggal_kembali']; ?>"> 
                    </div> 
                    <div class="form-group">
                    <label for="tanggal_dikembalikan">Tanggal Dikembalikan:</label>
                    <input type="date" class="form-control form-control-user" id="tanggal_dikembalikan" name="tanggal_dikembalikan" value="<?= $p['tanggal_dikembalikan']; ?>"> 
                    </div> 
                    <div class="form-group"> 
                    <input type="text" class="form-control form-control-user" id="total_denda" name="total_denda" placeholder="Masukkan denda jika ada" value="<?= $p['total_denda']; ?>"> 
                    </div> 
                    <div class="form-group"> 
                    <label for="status">Pilih Status Buku:</label>
                    <select id="status" name="status" class="form-control form-control-user" value="<?= $p['status']; ?>">
                        <option>Dipinjam</option>
                        <option>Kembali</option>
                    </select>
                    </div> 
                    <div class="form-group">
                        <input type="button" class="form-control form-control-user btn btn-dark col-lg-3 mt-3" value="Kembali" onclick="window.history.go(-1)">
                        <input type="submit" class="form-control form-control-user btn btn-primary col-lg-3 mt-3" value="Update">
                    </div>
                </form>
                <?php } ?>
        </div>
    </div>
</div> 
</div>
