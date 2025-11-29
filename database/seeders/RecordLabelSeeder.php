<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recordlabel;
use Carbon\Carbon;

class RecordlabelSeeder extends Seeder
{
    public function run(): void
    {
        Recordlabel::insert([
            [
                'name' => 'Motown Records',
                'founded' => '1952',     
                'headquarters' => 'Los Angeles, California',
                'phone_number' => '085-115-2877',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'CBS Records',
                'founded' => '1981',     
                'headquarters' => 'Chicago',
                'phone_number' => '085-157-2847',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Epic Records',
                'founded' => '1978',
                'headquarters' => 'New York City',
                'phone_number' => '085-882-1188',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Def Jam Recordings',
                'founded' => '1983',
                'headquarters' => 'New York City',
                'phone_number' => '085-998-4411',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Atlantic Records',
                'founded' => '1947',
                'headquarters' => 'New York City',
                'phone_number' => '085-224-7711',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
