
    <?php include "koneksi.php"; //include koneksi kedatabase 
   
      if (isset($_GET['kode_beasiswa'])){
        $kode_beasiswa = $_GET['kode_beasiswa'];
        $queryDelete = "delete from beasiswa where kode_beasiswa='$kode_beasiswa'";
        $hasil = mysql_query($queryDelete);
        if ($hasil){
          ?>
            <script>
              alert("Success Delete data");
              //document.location="homeadmin.php?p=beasiswa";
            </script>
          <?php
        } else {
          ?>
            <script>
              alert("Failed Delete Data");
              document.location="homeadmin.php?p=beasiswa";
            </script>
          <?php
        }
      }
    ?>
	
    <!-- Pencarian Berdasarkan -->
    <div class='pencarian'>
    <form method="post" name="pencarian" action="">
	    <label>Search By :</label>
      <select name="kolom">
        <option value="nama_beasiswa">Nama Beasiswa</option>
		<option value="kode_beasiswa">Kode Beasiswa</option>
        
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
	<a href="?p=addbe" class="btn btn-primary"><i class="icon-plus icon-white"></i> tambah </a>
<p></p>
	<table align="center" border="1" class="table table-hover table-bordered">
	
		<th>kode beasiswa</th>
        <th>Nama Beasiswa</th>
		<th>Keterangan</th>
		<th>Terima</th>
		<th>Standar</th>
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

        $query="select * from beasiswa where 1 $dimana";
        $sql=mysql_query($query);
        while($hasil = mysql_fetch_array($sql)){
        	echo "
        	<tr>
				<td>$hasil[kode_beasiswa]</a></td>
        		<td>$hasil[nama_beasiswa]</a></td>
				<td>$hasil[keterangan]</a></td>
				<td>$hasil[terima]</a></td>
				<td>$hasil[standar]</a></td>
        		
				
            <td>
              <a href='homeadmin.php?p=beasiswa&kode_beasiswa=$hasil[kode_beasiswa]' onclick=\"return confirm('Are u sure want to delete this entry ?') \">
                <img src='delete.gif' alt='Delete'>
              </a>
			  <a href='homeadmin.php?p=editb&kode_beasiswa=$hasil[kode_beasiswa]'>
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
