
    <?php include "koneksi.php"; //include koneksi kedatabase 
   
      if (isset($_GET['username'])){
        $username = $_GET['username'];
        $queryDelete = "delete from admins where username='$username'";
        $hasil = mysql_query($queryDelete);
        if ($hasil){
          ?>
            <script>
              alert("Success Delete data");
              //document.location="homeadmin.php?p=awal";
            </script>
          <?php
        } else {
          ?>
            <script>
              alert("Failed Delete Data");
              document.location="homeadmin.php?p=awal";
            </script>
          <?php
        }
      }
    ?>
	
			
    <!-- Pencarian Berdasarkan -->
	<?php include "slices/header.php";?>
    <!-- Pencarian Berdasarkan -->
    <div class='pencarian'>
    <form method="post" name="pencarian" action="">
	    <label>Search By : </label>
      <select name="kolom">
        <option value="username">username</option>
		<option value="nama">nama</option>
        
        
      </select>
      <input type="text" name="keyword" />
      <input type="submit" value="Cari" name="cari" />
    </form>
	</br>
	</br>
	
    </div>
    <!-- Menampilkan Data User dan Buat baru-->
    
    <div class="clear"></div>
    <div class="itable">
	<!--<a href="?p=tambah_admin"> Tambah Admin </a> -->
	<a href="homeadmin.php?p=tambah_admin" class="btn btn-primary"><i class="icon-plus icon-white"></i> tambah </a> 
	<p></p>
	<table align="center" border="1" class="table table-hover table-bordered">
	<thead>
	  <tr>
		<th>Username</th>
        <th>Nama</th>
		<th>Aksi</th>
      </tr>
	</thead>
    <tbody>
      <?php
        if (isset($_POST["cari"])){
          $cari = $_POST['cari'];
          if($cari!=""){
            $kolom = mysql_real_escape_string($_POST['kolom']);
            $keyword = mysql_real_escape_string($_POST['keyword']);
            $dimana = " and $kolom like '%$keyword%' ";
          }
        } else{
          $dimana = "";
        }

        $query="select * from admins where 1 $dimana";
        $sql=mysql_query($query);
        while($hasil = mysql_fetch_array($sql)){
        	echo "
        	<tr>
				<td>$hasil[username]</a></td>
        		<td>$hasil[nama]</a></td>
        		
				
            <td>
				
              <a href='view_admin.php?username=$hasil[username]' onclick=\"return confirm('Are u sure want to delete this User ?') \">
                <img src='delete.gif' alt='Delete'>
              </a>
			  <a href='?p=edit&username=$hasil[username]'>
                <img src='edit.gif' src='Edit'>
              </a>
          		
            </td>
        	</tr>
        	";
        	}
      ?>
	  </tbody>
      </table>
	</div>


<?php ?>
