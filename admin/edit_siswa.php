<?php 
  include "koneksi.php";

  if(isset($_POST['update'])){
    if($_POST['update']!=""){
      $nis = $_POST['nis'];
      $password = $_POST['password'];
	  $nama = $_POST['nama'];
	  $rataraport = $_POST['rataraport'];
      $penghasilan = $_POST['penghasilan'];
	  $tanggungan = $_POST['tanggungan'];
	  $prestasi = $_POST['prestasi'];
	  $aktif = $_POST['aktif'];

      
     $query="update siswa set nis='$nis', password='$password', nama='$nama', rataraport='$rataraport', penghasilan='$penghasilan', tanggungan='$tanggungan', prestasi='$prestasi', aktif='$aktif' WHERE nis='$_GET[nis]'";
      $hasil1=mysql_query($query);
      if($hasil1){
        ?>
          <script>
            alert("Success");
            document.location="homeadmin.php?p=siswa";
          </script>
        <?php
        }else{
          ?>
            <script>
              alert("Gagal Dirubah");
              document.location="homeadmin.php?p=siswa";
            </script>
          <?php
          }
      }
    }

  if (isset($_GET['nis'])){
    $nis=$_GET['nis'];
    $query1="select * from siswa where nis='$nis'";
    $hasil=mysql_query($query1);
    $tangkap=mysql_fetch_array($hasil);
  }
?>
<div class="siswaform">
<form name="siswa_edit" action="" method="post" autocomplete="on">
  <input type="hidden" name="id" value="<?php echo $tangkap['nis'];?>" />
  <table>
    <tr>
      <td><label>Nis</label></td>
      <td>:</td>
      <td><input type="text" name="nis" id="nis"  size="60" value="<?php echo $tangkap['nis'];?>" required /></td>
    </tr>
    <tr>
      <td><label>Password</label></td>
      <td>:</td>
      <td><input type="password" name="password" id="pass" size="60" value="<?php echo $tangkap['password'];?>" required /></td>
    </tr>
    
    <tr>
      <td><label>Nama</label></td>
      <td>:</td>
      <td> 
	  <input type="text" name="nama" id="nama"  size="60" value="<?php echo $tangkap['nama'];?>" required />
	  </td>
    </tr>
	
	 <tr>
      <td><label>Rata Raport</label></td>
      <td>:</td>
      <td> 
	  <input type="text" name="rataraport" id="raport"  size="60" value="<?php echo $tangkap['rataraport'];?>" required />
	  </td>
    </tr>

		 <tr>
      <td><label>Penghasilan</label></td>
      <td>:</td>
      <td> 
	  <input type="text" name="penghasilan" id="nama"  size="60" value="<?php echo $tangkap['penghasilan'];?>" required />
	  </td>
    </tr>
	
	<tr>
      <td><label>Tanggungan</label></td>
      <td>:</td>
      <td> 
	  <input type="text" name="tanggungan" id="nama"  size="60" value="<?php echo $tangkap['tanggungan'];?>" required />
	  </td>
    </tr>
	
	<tr>
      <td><label>Prestasi</label></td>
      <td>:</td>
      <td> 
	  <input type="text" name="prestasi" id="nama"  size="60" value="<?php echo $tangkap['prestasi'];?>" required />
	  </td>
    </tr>
  
  <tr>
      <td><label>Aktif</label></td>
      <td>:</td>
      <td> 
	  <input type="text" name="aktif" id="nama"  size="60" value="<?php echo $tangkap['aktif'];?>" required />
	  </td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td>
        <input type="submit" value="Update" name="update"/>
        <input type="reset" value="Reset"/>
      </td>
    </tr>
  </table>
</form>
</div>
