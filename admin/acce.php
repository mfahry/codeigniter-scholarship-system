<tr>
	<th align="center">No
    </th>
	<th align="center">nis
    </th>
	<th align="center">Nama siswa
    </th>
	<th align="center">Nilai Total
    </th>
	<th align="center">Status
    </th>
	
	<td><input type="submit" name="accept" value="accept"></td>

	
</tr>
<?
	$no = 1;
	$sql = "select * from siswa,ranking where siswa.nis = ranking.nis order by nilai desc ";

	$retval = mysql_query($sql);
	while($row = mysql_fetch_array($retval)){
		if ($no<=$jumlah){
			echo " <tr ";
			if(($no%2) >0) { echo "id='row-style1'"; } else{ echo "id='row-style2'";}
			echo ">
				<td align='center'>".$no."</td>
				<td>".$row['nis']."</td>
				<td>".$row['nama']."</td>
				<td>".$row['nilai']."</td>
				<td>Diterima</td>";
			echo "</tr>";
		}else{
			echo " <tr ";
			if(($no%2) >0) { echo "id='row-style1'"; } else{ echo "id='row-style2'";}
			echo ">
				<td align='center'>".$no."</td>
				<td>".$row['nis']."</td>
				<td>".$row['nama']."</td>
				<td>".$row['nilai']."</td>
				<td><font color='#FF0000'>Ditolak</td>";
			echo "</tr>";
		}
		
	}