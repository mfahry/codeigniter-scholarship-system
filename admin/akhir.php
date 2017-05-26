
    <?php include "koneksi.php"; //include koneksi kedatabase 
   
      if (isset($_GET['kode_kriteria'])){
        $kode_kriteria = $_GET['kode_kriteria'];
        $queryDelete = "delete from kriteria where kode_kriteria='$kode_kriteria'";
        $hasil = mysql_query($queryDelete);
        if ($hasil){
          ?>
            <script>
              alert("Success Delete data");
				document.location="homeadmin.php?p=akhir";
            </script>
          <?php
        } else {
          ?>
            <script>
              alert("Failed Delete Data");
              document.location="homeadmin.php?p=akhir";
            </script>
          <?php
        }
      }
    ?>
	
    <!-- Pencarian Berdasarkan -->
	<?php include "slices/header.php";?>
    <div class='pencarian'>
    <form method="post" name="pencarian" action="">
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
		<a href="?p=addk" class="btn btn-primary"><i class="icon-plus icon-white"></i> tambah </a>
<p></p>
	<table align="center" border="1" class="table table-hover table-bordered">
	<thead>
      <tr>
		<th>kode kriteria</th>
        <th>Nama kriteria</th>
		<th>Keterangan</th>
		<th>Maksimal</th>
		<th>Perbandingan</th>
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
              <a href='homeadmin.php?p=akhir&kode_kriteria=$hasil[kode_kriteria]' onclick=\"return confirm('Are u sure want to delete this Entry ?') \">
                <img src='delete.gif' alt='Delete'>
              </a>
			  <a href='homeadmin.php?p=editk&kode_kriteria=$hasil[kode_kriteria]'>
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
