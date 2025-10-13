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
                'profile_picture' => 'martingarrix.jpeg',
                'description' => 'Martijn Gerard Garritsen, known professionally by his trimmed name as Martin Garrix, is a Dutch DJ and record producer. He was ranked number one on DJ Mags Top 100 DJs list for three consecutive years. He is best known for his singles Animals, In the Name of Love, and Scared to Be Lonely'
            ],
            [
                'name' => 'John Sinnott',
                'genre' => 'Jazz',
                'debut_year' => 2020,
                'social_media_handle' => '@joh.nsinnott',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'profile_picture' => 'johnsinnott.jpeg.jpg',
                'description' => 'The Goat'
            ],
            [
                'name' => 'Tupac Shakur',
                'genre' => 'West Coast Hip-Hop',
                'debut_year' => 1989,
                'social_media_handle' => '@2pac',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'profile_picture' => 'tupac.jpeg',
                'description' => 'Tupac Amaru Shakur, also known by his stage names 2Pac and Makaveli, was an American rapper and actor. He is regarded as one of the greatest rappers of all time, one of the most influential musical artists of the 20th century, and a prominent political activist for Black America'
            ],
            [
                'name' => 'Michael Jackson',
                'genre' => 'Pop',
                'debut_year' => 1965,
                'social_media_handle' => '@MichaelJackson',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'profile_picture' => 'michaeljackson.jpeg',
                'description' => 'Michael Joseph Jackson was an American singer, songwriter, dancer, and philanthropist. Dubbed the "King of Pop", he is widely regarded as one of the most culturally significant figures of the 20th century'
            ],
        ]);
    }
}
