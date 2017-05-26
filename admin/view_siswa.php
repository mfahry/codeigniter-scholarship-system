
    <?php include "koneksi.php"; //include koneksi kedatabase 
   
      if (isset($_GET['nis'])){
        $nis = $_GET['nis'];
        $queryDelete = "delete from siswa where nis='$nis'";
        $hasil = mysql_query($queryDelete);
        if ($hasil){
          ?>
            <script>
              alert("Success Delete data");
              //document.location="homeadmin.php?p=siswa";
            </script>
          <?php
        } else {
          ?>
            <script>
              alert("Failed Delete Data");
              document.location="homeadmin.php?p=siswa";
            </script>
          <?php
        }
      }
    ?>
	
			
    <!-- Pencarian Berdasarkan -->

    <?php include "slices/header.php";?>
    <div class='pencarian'>
    <form method="post" name="search" action="">
	    <label>Search By :</label>
      <select name="kolom">
        <option value="nis">NIS</option>
		<option value="nama">Nama</option>
        
        
      </select>
      <input type="text" name="keyword" />
      <input type="submit" value="Cari" name="cari" />
    </form>
	</br>
	</br>
	
    </div>
    <!-- Menampilkan Data User dan Buat baru-->
	
	
    
    
    <div class="itable"><a href="homeadmin.php?p=adds" class="btn btn-primary"><i class="icon-plus icon-white"></i> tambah </a>
<p></p>
	<table  align="center" border="1" class="table table-hover table-bordered">

      <tr>
		<th>Nis</th>
        <th>Nama</th>
		<th>Password</th>
        <th>Rata Rata Rapor</th>
		<th>Tanggungan </th>
       <th> Penghasilan  </th>
        <th>Prestasi Akademik</th>
		<th>Prestasi Non Akademik</th>
		<th>Aksi</th>
		
       
      </tr>
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
        $query="select * from siswa where 1 $dimana";
        $sql=mysql_query($query);
        while($hasil = mysql_fetch_array($sql)){
        	echo "
        	<tr>
				<td>$hasil[nis]</a></td>
        		<td>$hasil[nama]</a></td>
				<td>$hasil[password]</a></td>
        		<td>$hasil[rataraport]</td>
				<td><p align='center'>$hasil[tanggungan]</p></td>
				<td><p align='center'>Rp " . number_format($hasil[penghasilan],2,',','.');
				echo "</p></td>
				<td>$hasil[prestasi]</td>
				<td>$hasil[aktif]</td>";
				echo "</td>
            <td>
              <a href='?p=siswa&nis=$hasil[nis]' onclick=\"return confirm('Are u sure want to delete this User ?') \">
                <img src='delete.gif' alt='Delete'>
              </a>
			  <a href='?p=editsis&nis=$hasil[nis]'>
                <img src='edit.gif' src='Edit'>
              </a>
          		
            </td>
        	</tr>
        	";
        	}
      ?>
      </table>
	</div>


<?php ?>
