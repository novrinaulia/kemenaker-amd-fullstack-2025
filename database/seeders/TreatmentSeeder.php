<?php

namespace Database\Seeders;

use App\Models\Treatment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TreatmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            'VAKSIN',
            'GROOMING',
            'PEMERIKSAAN',
        ];

        foreach ($data as $d) {
            Treatment::firstOrCreate(['name' => $d]);
        }
    }
}
