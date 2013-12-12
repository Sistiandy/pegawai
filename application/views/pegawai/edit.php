<html>
    <h1>Edit Pegawai</h1>   
    <div class="form-add">
        <div id="form">
            <?php 
            $this->load->helper('form'); 
             echo form_open('pegawai/update_process'); 
             ?>
            <h5>Nama Lengkap</h5>
            <input type="hidden" name="id" value="<?php echo $pegawai['id'];?>">
            
            <input type="text" name="nama" class="form-control" value="<?php echo set_value('nama', isset($pegawai['nama']) ? $pegawai['nama'] : ''); ?>" />
            <h5>Alamat</h5>
            <textarea name="alamat" class="form-control" rows="3"><?php echo set_value('alamat', isset($pegawai['alamat']) ? $pegawai['alamat'] : ''); ?></textarea>
            <h5>Email</h5>
            <input type="text" name="email" class="form-control" value="<?php echo set_value('email', isset($pegawai['email']) ? $pegawai['email'] : ''); ?>" />
            <h5>No. Telepon</h5>
            <input type="text" name="no_telp" class="form-control" value="<?php echo set_value('no_telp', isset($pegawai['nama']) ? $pegawai['no_telp'] : ''); ?>" /><br>
            <input type="submit" name="submit" value="Simpan" class="btn btn-primary btn-lg active">
            <a href='<?= site_url('pegawai'); ?>'><input type="button" value="Cancel" class="btn btn-default btn-lg active"></a>
            <?php 
            form_close(); 
            ?>
        </div>
    </div>
</html>