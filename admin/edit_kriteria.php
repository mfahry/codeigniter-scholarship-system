<?php 
  include "koneksi.php";

  if(isset($_POST['update'])){
    if($_POST['update']!=""){
      $kode_kriteria = $_POST['kode_kriteria'];
      $nama_kriteria = $_POST['nama_kriteria'];
	  $keterangan = $_POST['keterangan'];
	  $maksimal = $_POST['maksimal'];
      $perbandingan = $_POST['perbandingan'];
	  

      
     $query="update kriteria set kode_kriteria='$kode_kriteria', nama_kriteria='$nama_kriteria', keterangan='$keterangan', maksimal='$maksimal', perbandingan='$perbandingan' WHERE kode_kriteria='$_GET[kode_kriteria]'";
      $hasil1=mysql_query($query);
      if($hasil1){
        ?>
          <script>
            alert("Success");
            document.location="homeadmin.php?p=akhir";
          </script>
        <?php
        }else{
          ?>
            <script>
              alert("Gagal Dirubah");
              document.location="homeadmin.php?p=akhir";
            </script>
          <?php
          }
      }
    }

  if (isset($_GET['kode_kriteria'])){
    $kode_kriteria=$_GET['kode_kriteria'];
    $query1="select * from kriteria where kode_kriteria='$kode_kriteria'";
    $hasil=mysql_query($query1);
    $tangkap=mysql_fetch_array($hasil);
  }
?>
<div class="kriteriaform">
<form name="kriteria_edit" action="" method="post" autocomplete="on">
  <input type="hidden" name="id" value="<?php echo $tangkap['kode_kriteria'];?>" />
  <table>
    <tr>
      <td><label>Kode Kriteria</label></td>
      <td>:</td>
      <td><input type="text" name="kode_kriteria" id="username"  size="60" value="<?php echo $tangkap['kode_kriteria'];?>" required /></td>
    </tr>
    <tr>
      <td><label>Nama Kriteria</label></td>
      <td>:</td>
      <td><input type="text" name="nama_kriteria" id="pass" size="60" value="<?php echo $tangkap['nama_kriteria'];?>" required /></td>
    </tr>
    
    <tr>
      <td><label>Keterangan</label></td>
      <td>:</td>
      <td> 
	  <input type="text" name="keterangan" id="nama"  size="60" value="<?php echo $tangkap['keterangan'];?>" required />
	  </td>
    </tr>
	
	 <tr>
      <td><label>Maksimal</label></td>
      <td>:</td>
      <td> 
	  <input type="text" name="maksimal" id="nama"  size="60" value="<?php echo $tangkap['maksimal'];?>" required />
	  </td>
    </tr>

		 <tr>
      <td><label>Perbandingan</label></td>
      <td>:</td>
      <td> 
	  <input type="text" name="perbandingan" id="nama"  size="60" value="<?php echo $tangkap['perbandingan'];?>" required />
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
