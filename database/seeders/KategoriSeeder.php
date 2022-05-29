<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::create([
            'kode' => '01',
            'nama' => 'Geologika'
        ]);

        Kategori::create([
            'kode' => '02',
            'nama' => 'Biologika'
        ]);

        Kategori::create([
            'kode' => '03',
            'nama' => 'Etnografika'
        ]);

        Kategori::create([
            'kode' => '04',
            'nama' => 'Arkeologika'
        ]);

        Kategori::create([
            'kode' => '05',
            'nama' => 'Historika'
        ]);

        Kategori::create([
            'kode' => '06',
            'nama' => 'Numismatika'
        ]);

        Kategori::create([
            'kode' => '07',
            'nama' => 'Filologika'
        ]);

        Kategori::create([
            'kode' => '08',
            'nama' => 'Keramologika'
        ]);

        Kategori::create([
            'kode' => '09',
            'nama' => 'Seni Rupa'
        ]);

        Kategori::create([
            'kode' => '10',
            'nama' => 'Teknologika'
        ]);
    }
}
