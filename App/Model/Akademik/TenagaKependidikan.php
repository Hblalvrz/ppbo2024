<?php

namespace App\Model\Akademik;

class TenagaKependidikan extends Pegawai {
    public int $gaji_pokok;

    public function __construct(int $nip, string $nama, string $alamat, int $no_hp, int $gaji_pokok) {
        parent::__construct($nip, $nama, $alamat, $no_hp);
        $this->gaji_pokok = $gaji_pokok;
    }

    public function cuti(): void {
        echo "{$this->nama} sedang cuti.\n";
    }
}