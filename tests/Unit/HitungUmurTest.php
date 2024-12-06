<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class HitungUmurTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function menghitung_umur_mahasiswa(): void
    {
        $mahasiswa = new Mahasiswa(attributes : [
            'tanggal_lahir' => '2000-01-01'
        ]);
        $this->assertEquals(expected: 24,actual: $mahasiswa->hitungUmur());
    }
}
