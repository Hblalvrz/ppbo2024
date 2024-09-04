<?php

class Lingkaran
{
    const PHI = 3.14;
    public $jari_jari;

    public function luas() : float {
        return self::PHI * pow($this->jari_jari, 2);
    }

    public function keliling() : float {
        return 2 * self::PHI * $this->jari_jari;
    }
}

class Bola
{
    const PHI = 3.14;
    public $jari_jari;

    public function volume() : float {
        return (4/3) * self::PHI * pow($this->jari_jari, 3);
    }
}

class Tabung
{
    const PHI = 3.14;
    public $jari_jari;
    public $tinggi;

    public function volume() : float {
        return self::PHI * pow($this->jari_jari, 2) * $this->tinggi;
    }
}

class Kerucut
{
    const PHI = 3.14;
    public $jari_jari;
    public $tinggi;

    public function volume() : float {
        return (1/3) * self::PHI * pow($this->jari_jari, 2) * $this->tinggi;
    }
}

$nasi_tumpeng = new Kerucut();
$nasi_tumpeng -> jari_jari = 4;
$nasi_tumpeng -> tinggi = 10;
$hasil = $nasi_tumpeng -> volume();
echo "Volume nasi tumpeng adalah: {$hasil} cm^3\n";

$lingkaran = new Lingkaran();
$lingkaran -> jari_jari = 4;
$hasil_luas = $lingkaran -> luas();
$hasil_keliling = $lingkaran -> keliling();
echo "Luas lingkaran adalah: {$hasil_luas} cm^2\n";
echo "Keliling lingkaran adalah: {$hasil_keliling} cm\n";

$bola = new Bola();
$bola -> jari_jari = 4;
$hasil = $bola -> volume();
echo "Volume bola adalah: {$hasil} cm^3\n";

$tabung = new Tabung();
$tabung -> jari_jari = 4;
$tabung -> tinggi = 10;
$hasil = $tabung -> volume();
echo "Volume tabung adalah: {$hasil} cm^3\n";

?>