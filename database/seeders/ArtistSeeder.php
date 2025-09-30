<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('artists')->insert([
            [
                'name' => 'Alice Harmony',
                'genre' => 'Pop',
                'debut_year' => 2015,
                'social_media_handle' => '@aliceharmony',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'The Rockers',
                'genre' => 'Rock',
                'debut_year' => 2010,
                'social_media_handle' => '@therockersband',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'DJ Nova',
                'genre' => 'Electronic',
                'debut_year' => 2018,
                'social_media_handle' => '@djnova',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Luna Waves',
                'genre' => 'Indie',
                'debut_year' => 2020,
                'social_media_handle' => '@lunawaves',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
