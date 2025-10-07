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
                'name' => 'Martin Garrix',
                'genre' => 'Electronic',
                'debut_year' => 2012,
                'social_media_handle' => '@martingarrix',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'profile_picture' => 'martingarrix.jpeg'
            ],
            [
                'name' => 'John Sinnott',
                'genre' => 'Jazz',
                'debut_year' => 2020,
                'social_media_handle' => '@joh.nsinnott',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'profile_picture' => 'johnsinnott.jpeg.jpg'
            ],
            [
                'name' => 'Tupac Shakur',
                'genre' => 'West Coast Hip-Hop',
                'debut_year' => 1989,
                'social_media_handle' => '@2pac',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'profile_picture' => 'tupac.jpeg'
            ],
            [
                'name' => 'Michael Jackson',
                'genre' => 'Pop',
                'debut_year' => 1965,
                'social_media_handle' => '@MichaelJackson',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'profile_picture' => 'michaeljackson.jpeg'
            ],
        ]);
    }
}
