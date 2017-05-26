
    <?php include "koneksi.php"; //include koneksi kedatabase 
   
      if (isset($_GET['kode_kriteria'])){
        $kode_kriteria = $_GET['kode_kriteria'];
        $queryDelete = "delete from kriteria where kode_kriteria='$kode_kriteria'";
        $hasil = mysql_query($queryDelete);
        if ($hasil){
          ?>
            <script>
              alert("Success Delete data");
              //document.location="view_kriteria.php";
            </script>
          <?php
        } else {
          ?>
            <script>
              alert("Failed Delete Data");
              document.location="view_kriteria.php";
            </script>
          <?php
        }
      }
    ?>
	<html>
	<head> 
	<?php include "slices/header.php";?>
	<script type="text/javascript" src="js/validasi.js"></script>
	</head>
		<body>
		<img src="../images/title.jpg" width="1366">
			<?php include "slices/topmenu.php";?>
			
    <!-- Pencarian Berdasarkan -->
    <div class='pencarian'>
    <form method="post" name="pencarian" action="view_kriteria.php">
	    <label>Search By :</label>
      <select name="kolom">
        <option value="nama_kriteria">Nama Kriteria</option>
		<option value="kode_kriteria">Kode Kriteria</option>
        
        
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
	<table align="center" border="1" class="tableviewadmin">
      <tr>
		<th>kode kriteria</th>
        <th>Nama kriteria</th>
		<th>Keterangan</th>
		<th>Maksimal</th>
		<th>Perbandingan</th>
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

        $query="select * from kriteria where 1 $dimana";
        $sql=mysql_query($query);
        while($hasil = mysql_fetch_array($sql)){
        	echo "
        	<tr>
				<td>$hasil[kode_kriteria]</a></td>
        		<td>$hasil[nama_kriteria]</a></td>
				<td>$hasil[keterangan]</a></td>
				<td>$hasil[maksimal]</a></td>
				<td>$hasil[perbandingan]</a></td>
        		
				
            <td>
              <a href='homeadmin.php?p=akhirp&kode_kriteria=$hasil[kode_kriteria]' onclick=\"return confirm('Are u sure want to delete this Entry ?') \">
                <img src='delete.gif' alt='Delete'>
              </a>
			  <a href='edit_kriteria.php&kode_beasiswa=$hasil[kode_kriteria]'>
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