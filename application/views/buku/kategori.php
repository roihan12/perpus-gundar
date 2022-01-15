<!-- Begin Page Content -->
<div class="container-fluid">
<?php if($this->session->flashdata('pesan') == "Ditambah"): ?>
    <div class="alert alert-success" role="='alert">
        Kategori Telah Berhasil Ditambah!
    </div>
    <?php elseif($this->session->flashdata('pesan') == "Diubah"): ?>
    <div class="alert alert-success" role="='alert">
        Kategori Telah Berhasil Diubah!
    </div>
    
    <?php elseif($this->session->flashdata('pesan') == "Dihapus"): ?>
    <div class="alert alert-success" role="='alert">
        Kategori Telah Berhasil dihapus!
    </div>
    <?php endif ?>
    <div class="row">
        <div class="col-lg-3">
            <?php if(validation_errors()){?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors();?>
                </div>
            <?php } ?>
            <a href="" class="btn btn-success mb-3" data-toggle="modal" data-target="#bukuBaruModal">
            <i class="fas fa-plus-circle"></i> Tambah Kategori Buku 
            </a>
            <table class="table table-striped">
            <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Kategori</th>
            <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $a=1;
            foreach ($kategori as $k) { ?>
            <tr>
            <th scope="row"><?=$a++;?></th>
            <td><?=$k['nama_kategori'];?></td>
            <td>
            <a href="<?=base_url('buku/updateKategori/').$k['id_kategori'];?>" class="btn btn-lg badge badge-info"><i class="fas fa-edit"></i>Ubah</a>
            <a href="<?=base_url('buku/hapusKategori/').$k['id_kategori'];?>" onclick="return confirm('Kamu yakin akan menghapus <?=$judul.' '.$k['nama_kategori'];?>?');" class="badge badge-danger"><i class="fas fa-trash"></i>Hapus</a>
            </td>
            </tr>
            <?php
            }
            ?>
            </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->


<!-- Modal Tambah kategori baru-->
<div class="modal fade" id="bukuBaruModal" tabindex="-1" role="dialog" aria-labelledby="bukuBaruModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="kategoriBaruModalLabel">Tambah Kategori</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
 <span aria-hidden="true">&times;</span> 
 </button>
</div>
<form action="<?=base_url('buku/kategori');?>" method="post">
<div class="modal-body">
<div class="form-group">
<input type="text" class="form-control form-control-user" name="nama_kategori" placeholder="Masukkan Nama Kategori">
</div>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle"></i> Close</button>
    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
    </div>
    </form>
    </div>
    </div>
</div>

