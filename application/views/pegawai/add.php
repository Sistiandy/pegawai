<html>
    <h1>Tambah Pegawai</h1>   
    <div class="form-add">
        <div id="form">     
            <?php 
            $this->load->helper('form'); 
             echo form_open('pegawai/create'); 
             ?>
            <h5>Nama Lengkap</h5>
            <?php echo form_error('nama'); ?>
            <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap Anda">
            <h5>Alamat</h5>
            <textarea name="alamat" class="form-control" rows="3" placeholder="Alamat Anda"></textarea>
            <h5>Email</h5>
            <?php echo form_error('email'); ?>
            <input type="text" name="email" class="form-control" placeholder="Email Anda">
            <h5>No. Telepon</h5>
            <input type="text" name="no_telp" class="form-control" placeholder="No. Telepon Anda"><br>
            <input type="submit" value="Tambah" class="btn btn-primary btn-lg active">
            <a href='<?= site_url('pegawai'); ?>'><input type="button" value="Cancel" class="btn btn-default btn-lg active"></a>
            <?php 
            form_close(); 
            ?>
        </div>
    </div>
</html>