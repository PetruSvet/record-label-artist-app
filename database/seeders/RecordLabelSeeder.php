<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RecordLabel;

class RecordLabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RecordLabel::insert([
            ['name' => 'Motown Records'],
            ['name' => 'CBS Records'],
            ['name' => 'Epic Records'],
        ]);
    }
}
