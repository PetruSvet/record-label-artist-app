<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recordlabel;

class RecordlabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Recordlabel::insert([
            ['name' => 'Motown Records'],
            ['name' => 'CBS Records'],
            ['name' => 'Epic Records'],
        ]);
    }
}
