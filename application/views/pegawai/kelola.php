<body>
    <h1>Daftar Pegawai</h1>
    <div>
        <div id="table">
            <table class="table table-bordered" align="center">
                <tr class="info">
                    <td class="controls" id="no" align="center">No</td>
                    <td class="controls" id="nama" align="center">Nama Lengkap</td>
                    <td class="controls" id="alamat" align="center">Alamat</td>
                    <td class="controls" id="email" align="center">Email</td>
                    <td class="controls" id="no_telp" align="center">No. Telepon</td>
                    <td class="controls" id="aksi" align="center">Aksi</td>
                </tr>
                <?php
                if (!empty($view_pegawai)) {
                    $no = 1;
                    foreach ($view_pegawai as $row) {
                        ?>
                        <tr class="isi">
                            <td id="no"><?php echo $no; ?></td>
                            <td id="nama"><?php echo $row->nama; ?></td>
                            <td id="alamat"><?php echo $row->alamat; ?></td>
                            <td id="email"><?php echo $row->email; ?></td>
                            <td id="no_telp"><?php echo $row->no_telp; ?></td>
                            <td id="action"> <a href="<?php echo site_url('pegawai/update/'. $row->id); ?>"><img src="<?php echo base_url(); ?>media/images/edit.png" /></a> | <a href="<?php echo site_url('pegawai/delete/' . $row->id); ?>" onclick="return confirm('Apakah Anda Yakin?');"><img src="<?php echo base_url(); ?>media/images/delete.png" /></a></td>
                        </tr>
                        <?php
                        $no++;
                    }
                } else {
                            ?>
                        <tr id="row">
                            <td colspan="6" align="center">Data Kosong</td>
                        </tr>
                        <?
                        }
                        ?>   
            </table>
        </div>
    </div>
</body>