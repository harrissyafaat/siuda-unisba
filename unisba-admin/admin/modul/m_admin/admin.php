<?php
    echo "<h2 class=judul>Ganti Password</h2>
          <form method=POST action=modul/m_admin/aksi_admin.php>
          <table>
          <tr><td>Masukkan Password Lama</td><td> : 
          <input type='text' name='pass_lama'>
			<input type='text' value='$_SESSION[id_prodi]' name='id_prod'>
          </td></tr>
          <tr><td>Masukkan Password Baru</td><td> : 
          <input type='text' name='pass_baru'></td></tr>
          <tr><td>Masukkan Lagi Password Baru</td><td> : <input type='text' name='pass_ulangi'></td></tr>
          <tr><td colspan=2><input type=submit class='tombol' value='Proses'>
                            <input type=button class='tombol' value=Batalkan onclick=self.history.back()></td></tr>
          </table></form>";
?>
