<?php
include "koneksi.php";
?>
<html>
</html>
$s = "update ambil set status=status+1 where nis = '".$row['nis']."' and kode_beasiswa='$beasiswa' ";
			$q = mysql_query($s);