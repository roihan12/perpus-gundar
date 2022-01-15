<!-- Begin Page Content --> 
<div class="container-fluid"> 
<?php if($this->session->flashdata('pesan') == "Ditambah"): ?>
    <div class="alert alert-success" role="='alert">
        Data Peminjam Telah Berhasil Ditambah!
    </div>
    <?php elseif($this->session->flashdata('pesan') == "Diubah"): ?>
    <div class="alert alert-success" role="='alert">
        Data Peminjam Telah Berhasil Diubah!
    </div>
    
    <?php elseif($this->session->flashdata('pesan') == "Dihapus"): ?>
    <div class="alert alert-success" role="='alert">
        Data Peminjam Telah Berhasil dihapus!
    </div>
    <?php endif ?>
<div class="row"> <div class="col-lg-12"> 
<?php if(validation_errors()){?> 
<div class="alert alert-danger" role="alert"> 
<?= validation_errors();?> 
</div> 
<?php }?> 
<a href="" class="btn btn-success mb-3" data-toggle="modal" data-target="#peminjamBaruModal">
<i class="fas fa-plus-circle"></i> Tambah Peminjam
</a> 
<table class="table table-hover">
<thead> 
<tr> 
<th scope="col">#</th> 
<th scope="col">Nama Peminjam</th> 
<th scope="col">Judul Buku</th> 
<th scope="col">Tanggal Pinjam </th> 
<th scope="col">Tanggal Kembali</th> 
<th scope="col">Tanggal Dikembalikan </th> 
<th scope="col">Total Denda</th> 
<th scope="col">Status</th> 
<th scope="col">Pilihan</th> 
</tr> 
</thead> 
<tbody> 
<?php 
$a = 1; 
foreach ($peminjam as $p) 
{ 
?> 
<tr> 
<th scope="row"><?= $a++; ?></th> 
<td><?= $p['nama_peminjam']; ?></td> 
<td><?= $p['judul_buku']; ?></td> 
<td><?= $p['tanggal_pinjam']; ?></td> 
<td><?= $p['tanggal_kembali']; ?></td> 
<td><?= $p['tanggal_dikembalikan']; ?></td> 
<td><?= $p['total_denda']; ?></td> 
<td><?= $p['status']; ?></td> 
<td>
<a href="<?= base_url('Peminjam/ubahPeminjam/').$p['id_peminjam'];?>" class="btn btn-lg badge badge-info"><i class="fas fa-edit"></i> Ubah</a> 
<a href="<?= base_url('Peminjam/hapusPeminjam/').$p['id_peminjam'];?>"  onclick="return confirm('Kamu yakin akan menghapus <?= $p['nama_peminjam'];?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a> 
</td> 
</tr> 
<?php } ?> 
</tbody> 
</table>
 </div> 
 </div>
 </div> 
 </div> 

 <!-- Modal Tambah buku baru--> 
 <div class="modal fade" id="peminjamBaruModal" tabindex="-1" role="dialog" aria-labelledby="peminjamBaruModalLabel" aria-hidden="true"> 
 <div class="modal-dialog" role="document"> 
 <div class="modal-content"> 
 <div class="modal-header"> 
 <h5 class="modal-title" id="peminjamBaruModalLabel">Tambah Peminjam Buku</h5> 
 <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
 <span aria-hidden="true">&times;</span> 
 </button> 
 </div> 
 <form action="<?= base_url('Peminjam/peminjam/index'); ?>" method="post" enctype="multipart/form-data"> 
 <div class="modal-body"> 
 <div class="form-group"> 
 <input type="text" class="form-control form-control-user" id="nama_peminjam" name="nama_peminjam" placeholder="Masukkan Nama Peminjam"> 
 </div> 
 <div class="form-group"> 
 <!--<input type="text" class="form-control form-control-user" id="judul_buku" name="judul_buku" placeholder="Masukkan Judul Buku"> -->
 <select name="judul_buku" id="judul_buku" class="form-control form-control-user">
  <?php
  foreach ($buku as $b) { ?>
  <option value="<?=$b['judul_buku'];?>"><?= $b['judul_buku'];?></option>
  <?php } ?>
  </select>
 </div> 
 <div class="form-group">
 <label for="tanggal_pinjam">Tanggal Pinjam:</label>
 <input type="date" class="form-control form-control-user" id="tanggal_pinjam" name="tanggal_pinjam"> 
 </div> 
 <div class="form-group">
 <label for="tanggal_kembali">Tanggal Kembali:</label>
 <input type="date" class="form-control form-control-user" id="tanggal_kembali" name="tanggal_kembali"> 
 </div> 
 <div class="form-group">
 <label for="tanggal_dikembalikan">Tanggal Dikembalikan:</label>
 <input type="date" class="form-control form-control-user" id="tanggal_dikembalikan" name="tanggal_dikembalikan"> 
 </div> 
 <div class="form-group"> 
 <input type="text" class="form-control form-control-user" id="total_denda" name="total_denda" placeholder="Masukkan denda jika ada"> 
 </div> 
 <div class="form-group"> 
 <label for="status">Pilih Status Buku:</label>
  <select id="status" name="status" class="form-control form-control-user">
    <option value="dipinjam">Dipinjam</option>
    <option value="kembali">Kembali</option>
  </select>
 </div> 
 </div> <div class="modal-footer"> 
 <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fas fa-times-circle"></i> Close</button> 
 <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button> 
 </div> 
 </form>
 </div> 
 </div> 
 </div> 
 <!-- End of Modal Tambah Menu -->