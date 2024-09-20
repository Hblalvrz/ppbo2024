<?php

namespace App\Admin;

class Pegawai {
    public int $nip;
    public string $nama;
    protected int $no_hp;
    public string $alamat;

    public function __construct(int $nip, string $nama, string $alamat, int $no_hp) {
        $this->nip = $nip;
        $this->nama = $nama;
        $this->alamat = $alamat;
        $this->no_hp = $no_hp;
    }

    public function cekIn(): bool {
        return true;
    }

    public function cekOut(): bool {
        return true;
    }

    public function getNoHp(): int {
        return $this->no_hp;
    }

    public function setNoHp(int $no_hp): void {
        $this->no_hp = $no_hp;
    }
}