<?php

namespace App\Admin;

class Dosen extends Pegawai {
    public string $nidn;

    public function __construct(int $nip, string $nama, string $alamat, int $no_hp, string $nidn) {
        parent::__construct($nip, $nama, $alamat, $no_hp);
        $this->nidn = $nidn;
    }

    public function mengajar(): void {
        echo "{$this->nama} sedang mengajar perkuliahan.\n";
    }
}