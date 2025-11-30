<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Artist;
use App\Models\Recordlabel;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $artistsData = [
            [
                'name' => 'Martin Garrix',
                'genre' => 'Electronic',
                'debut_year' => 2012,
                'social_media_handle' => '@martingarrix',
                'profile_picture' => '1762266969_channels4_profile.jpg',
                'description' => 'Martin Garrix is a multi-platinum-selling Dutch DJ and record producer who is one of the most successful artists in electronic music. He is best known for his 2013 breakout hit "Animals" and has been ranked number one on DJ Mags Top 100 DJs list multiple times, most recently in 2024 for his fifth win.',
                'embed' => 'https://www.youtube.com/embed?v=psLS-yenL68&list=RDpsLS-yenL68',
            ],
            [
                'name' => 'John Sinnott',
                'genre' => 'Jazz',
                'debut_year' => 2020,
                'social_media_handle' => '@joh.nsinnott',
                'profile_picture' => '1761172637_image.png',
                'description' => 'The Goat',
                'embed' => 'https://www.youtube.com/embed?v=v8JbaHScYzU&list=RDEM6Me8HYCE7XcZcgjqrn4-7A&start_radio=1&rv=K4DyBUG242c',
            ],
            [
                'name' => 'Tupac Shakur',
                'genre' => 'West Coast Hip-Hop',
                'debut_year' => 1989,
                'social_media_handle' => '@2pac',
                'profile_picture' => '1762267560_2pac_edit_cropped_further.jpg',
                'description' => 'Tupac Amaru Shakur, also known by his stage names 2Pac and Makaveli, was an American rapper and actor. He is widely regarded as one of the greatest rappers of all time, one of the most influential musical artists of the 20th century, and a prominent political activist for Black America.',
                'embed' => 'https://www.youtube.com/embed?v=PLpqF2gLw2g&list=RDPLpqF2gLw2g',
            ],
            [
                'name' => 'Michael Jackson',
                'genre' => 'Pop',
                'debut_year' => 1965,
                'social_media_handle' => '@MichaelJackson',
                'profile_picture' => '1764083326_Michael_Jackson_1983_(3x4_cropped)_(contrast).jpg',
                'description' => 'Michael Joseph Jackson was an American singer, songwriter, dancer, and philanthropist. Dubbed the "King of Pop", he is widely regarded as one of the most culturally significant figures of the 20th century.',
                'embed' => 'https://www.youtube.com/embed?v=OZGuNfglpq0&list=RDOZGuNfglpq0',
            ],
            [
                'name' => 'Inna',
                'genre' => 'Popcorn',
                'debut_year' => 2008,
                'social_media_handle' => '@inna',
                'profile_picture' => '1761216924.jpg',
                'description' => 'Elena Alexandra Apostoleanu, known professionally as Inna, is a Romanian singer. Born in Mangalia and raised in Neptun, she studied political science at Ovidius University before meeting the Romanian trio Play & Win and pursuing a music career.',
                'embed' => 'https://www.youtube.com/embed?v=04fcgFs-mjA&list=RD04fcgFs-mjA',
            ],
            [
                'name' => 'Skepta',
                'genre' => 'Grime',
                'debut_year' => 2005,
                'social_media_handle' => '@skepta',
                'profile_picture' => '1761054463.jpg',
                'description' => 'Joseph Olaitan Adenuga Jr., known professionally as Skepta, is a British grime MC, rapper, record producer, fashion designer, film director and DJ. Alongside his younger brother Jme, he briefly joined Roll Deep before they became founding members of Boy Better Know in 2005',
                'embed' => 'https://www.youtube.com/embed?v=jkzLvTWj2bg&list=RDjkzLvTWj2bg',
            ],
        ];

        foreach ($artistsData as $artistData) {                          // each artist will automatically have record labels assigned, and the artist details page can show them with each one
            $artist = Artist::create(array_merge($artistData, [
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]));

            // Assign 1-2 random record labels
            $labels = Recordlabel::inRandomOrder()->take(rand(1, 2))->pluck('id');
            $artist->recordlabels()->attach($labels);
        }
    }
}
