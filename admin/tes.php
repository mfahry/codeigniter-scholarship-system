<?php
SELECT siswa.nis, siswa.nama, ambil.status, ranking.nilai
FROM siswa, ambil, ranking
WHERE siswa.nis = ambil.nis
AND ranking.nis = ambil.nis
AND siswa.nis = ranking.nis
AND ambil.status =  'Diterima'
?>