<?php

function luasLingkaran($jari) : float {
    $luas = 3.14 * $jari * $jari;
    return $luas;
}


function kelilingLingkaran($jari) : float {
    $keliling = 2 * 3.14 * $jari;
    return $keliling;
}

function volumeBola($jari) : float {
    $volume = (4/3) * 3.14 * $jari * $jari * $jari;
    return $volume;
}

function volumeTabung($jari, $tinggi) : float {
    $volume = 3.14 * $jari * $jari * $tinggi;
    return $volume;
}

function volumeKerucut($jari, $tinggi) : float {
    $volume = (1/3) * 3.14 * $jari * $jari * $tinggi;
    return $volume;
}

$jari_jari = 45;
$tinggi_tabung = 100;
$tinggi_kerucut = 100;

$luas_tanah = luasLingkaran($jari_jari);
$keliling_tanah = kelilingLingkaran($jari_jari);
$volume_bola = volumeBola($jari_jari);
$volume_tabung = volumeTabung($jari_jari, $tinggi_tabung);
$volume_kerucut = volumeKerucut($jari_jari, $tinggi_kerucut);

echo "Luas tanah Budi adalah {$luas_tanah}\n";
echo "Keliling tanah Budi adalah {$keliling_tanah}\n";
echo "Volume bola dengan jari-jari {$jari_jari} adalah {$volume_bola}\n";
echo "Volume tabung dengan jari-jari {$jari_jari} dan tinggi {$tinggi_tabung} adalah {$volume_tabung}\n";
echo "Volume kerucut dengan jari-jari {$jari_jari} dan tinggi {$tinggi_kerucut} adalah {$volume_kerucut}\n";

?>