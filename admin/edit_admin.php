<?php 
  include "koneksi.php";

  if(isset($_POST['update'])){
    if($_POST['update']!=""){
      $username = $_POST['username'];
      $password = $_POST['password'];
      $nama = $_POST['nama'];

      
     $query="update admins set username='$username', password='$password', nama='$nama' WHERE username='$_GET[username]'";
      $hasil1=mysql_query($query);
      if($hasil1){
        ?>
          <script>
            alert("Success");
            document.location="homeadmin.php?p=awal";
          </script>
        <?php
        }else{
          ?>
            <script>
              alert("Gagal Dirubah");
              document.location="homeadmin.php?p=awal";
            </script>
          <?php
          }
      }
    }

  if (isset($_GET['username'])){
    $username=$_GET['username'];
    $query1="select * from admins where username='$username'";
    $hasil=mysql_query($query1);
    $tangkap=mysql_fetch_array($hasil);
  }
?>
<div class="adminform">
<form name="admin_edit" action="" method="post" autocomplete="on">
  <input type="hidden" name="id" value="<?php echo $tangkap['username'];?>" />
  <table>
    <tr>
      <td><label>Username</label></td>
      <td>:</td>
      <td><input type="text" name="username" id="username"  size="60" value="<?php echo $tangkap['username'];?>" required /></td>
    </tr>
    <tr>
      <td><label>Password</label></td>
      <td>:</td>
      <td><input type="password" name="password" id="pass" size="60" value="<?php echo $tangkap['password'];?>" required /></td>
    </tr>
    
    <tr>
      <td><label>Nama Lengkap</label></td>
      <td>:</td>
      <td> 
	  <input type="text" name="nama" id="nama"  size="60" value="<?php echo $tangkap['nama'];?>" required />
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
