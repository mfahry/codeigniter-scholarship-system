<?
session_start();
include "koneksi.php";
?>

<?
$beasiswa = $_GET['beasiswa'];
$jumlah = $_GET['jumlah'];
$min_bound_value = $_GET['min-bound-value'];

include "saw.php";

tabelnilai($beasiswa);
echo "<p align='center'></p>";
konversi($beasiswa);
echo "<p align='center'></p>";
normalisasi($beasiswa);
echo "<p align='center'></p>";
bobot($beasiswa);
echo "<p align='center'></p>";
saw($beasiswa);
echo "<p align='center'></p>";
inputranking($beasiswa);
rankingdetail($beasiswa,$jumlah, $min_bound_value);

?>
