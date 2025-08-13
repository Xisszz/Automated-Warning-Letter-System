<?php

namespace Database\Seeders;

use App\Models\Bahagian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BahagianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bahagian = ['Tahun 1', 'Tahun 2', 'Tahun 3', 'Tahun 4', 'Tahun 5', 'Tahun 6'];

        foreach ($bahagian as $item) {
            Bahagian::create([
                'nama_bahagian' => $item
            ]);
        }
    }
}
