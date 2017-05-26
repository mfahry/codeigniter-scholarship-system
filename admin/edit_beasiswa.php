<?php 
  include "koneksi.php";

  if(isset($_POST['update'])){
    if($_POST['update']!=""){
      $kode_beasiswa = $_POST['kode_beasiswa'];
      $nama_beasiswa = $_POST['nama_beasiswa'];
	  $keterangan = $_POST['keterangan'];
	  $terima = $_POST['terima'];
      $standar = $_POST['standar'];
	  

      
     $query="update beasiswa set kode_beasiswa='$kode_beasiswa', nama_beasiswa='$nama_beasiswa', keterangan='$keterangan', terima='$terima', standar='$standar' WHERE kode_beasiswa='$_GET[kode_beasiswa]'";
      $hasil1=mysql_query($query);
      if($hasil1){
        ?>
          <script>
            alert("Success");
            document.location="homeadmin.php?p=beasiswa";
          </script>
        <?php
        }else{
          ?>
            <script>
              alert("Gagal Dirubah");
              document.location="homeadmin.php?p=beasiswa";
            </script>
          <?php
          }
      }
    }

  if (isset($_GET['kode_beasiswa'])){
    $kode_beasiswa=$_GET['kode_beasiswa'];
    $query1="select * from beasiswa where kode_beasiswa='$kode_beasiswa'";
    $hasil=mysql_query($query1);
    $tangkap=mysql_fetch_array($hasil);
  }
?>
<div class="beasiswaform">
<form name="beasiswa_edit" action="" method="post" autocomplete="on">
  <input type="hidden" name="id" value="<?php echo $tangkap['kode_beasiswa'];?>" />
  <table>
    <tr>
      <td><label>Kode Beasiswa</label></td>
      <td>:</td>
      <td><input type="text" name="kode_beasiswa" id="username"  size="60" value="<?php echo $tangkap['kode_beasiswa'];?>" required /></td>
    </tr>
    <tr>
      <td><label>Nama Beasiswa</label></td>
      <td>:</td>
      <td><input type="text" name="nama_beasiswa" id="pass" size="60" value="<?php echo $tangkap['nama_beasiswa'];?>" required /></td>
    </tr>
    
    <tr>
      <td><label>Keterangan</label></td>
      <td>:</td>
      <td> 
	  <input type="text" name="keterangan" id="nama"  size="60" value="<?php echo $tangkap['keterangan'];?>" required />
	  </td>
    </tr>
	
	 <tr>
      <td><label>Terima</label></td>
      <td>:</td>
      <td> 
	  <input type="text" name="terima" id="nama"  size="60" value="<?php echo $tangkap['terima'];?>" required />
	  </td>
    </tr>

		 <tr>
      <td><label>Standar</label></td>
      <td>:</td>
      <td> 
	  <input type="text" name="standar" id="nama"  size="60" value="<?php echo $tangkap['standar'];?>" required />
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
