<?php
date_default_timezone_set("Asia/Jakarta");
$nama = readline('Masukkan nama Anda: ');
$waktu = date('H');
echo "Halo {$nama} sekarang pukul {$waktu}\n";