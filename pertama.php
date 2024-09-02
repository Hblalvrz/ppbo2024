<?php
date_default_timezone_set("Asia/Jakarta");
$nama = readline('Masukkan nama Anda: ');
$waktu = date('H:i'); // untuk menampilkan jam dan menit maka yang sebelumnya hanya 'H' diganti menjadi 'H:i'
echo "Halo {$nama} sekarang pukul {$waktu}\n";