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
                'profile_picture' => '1762266969_channels4_profile.jpeg',
                'description' => 'Martijn Gerard Garritsen, known professionally by his trimmed name as Martin Garrix, is a Dutch DJ and record producer. He was ranked number one on DJ Mags Top 100 DJs list for three consecutive years.'
            ],
            [
                'name' => 'John Sinnott',
                'genre' => 'Jazz',
                'debut_year' => 2020,
                'social_media_handle' => '@joh.nsinnott',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'profile_picture' => '1761172637_image.png',
                'description' => 'The Goat'
            ],
            [
                'name' => 'Tupac Shakur',
                'genre' => 'West Coast Hip-Hop',
                'debut_year' => 1989,
                'social_media_handle' => '@2pac',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'profile_picture' => '1762267560_2pac_edit_cropped_further.jpeg',
                'description' => 'Tupac Amaru Shakur, also known by his stage names 2Pac and Makaveli, was an American rapper and actor. He is regarded as one of the greatest rappers of all time'
            ],
            [
                'name' => 'Michael Jackson',
                'genre' => 'Pop',
                'debut_year' => 1965,
                'social_media_handle' => '@MichaelJackson',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'profile_picture' => '1762267662_Michael_Jackson_1983_(3x4_cropped)_(contrast).jpeg',
                'description' => 'Michael Joseph Jackson was an American singer, songwriter, dancer, and philanthropist. Dubbed the "King of Pop", he is widely regarded as one of the most culturally significant figures of the 20th century'
            ],
            [

                'name' => 'Taylor Swift',
                'genre' => 'Pop',
                'debut_year' => 2003,
                'social_media_handle' => '@taylorswift',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'profile_picture' => '1764084401.jpg',
                'description' => 'Taylor Alison Swift is an American singer-songwriter. An influential figure in popular culture, she is known for her autobiographical songwriting and artistic reinventions. Swift is the highest-grossing live music artist, the wealthiest female musician, and one of the best-selling music artists of all time.'     
            ],
        ]);
    }
}