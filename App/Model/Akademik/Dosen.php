<?php

namespace App\Model\Akademik;

class Dosen extends Pegawai {
    private string $nidn;

    public function __construct(int $nip, string $nama, string $alamat, int $no_hp, string $nidn) {
        parent::__construct($nip, $nama, $alamat, $no_hp);
        $this->nidn = $nidn;
    }  

    public function mengajar(): void {
        echo "{$this->nama} sedang mengajar perkuliahan.\n";
    }
}