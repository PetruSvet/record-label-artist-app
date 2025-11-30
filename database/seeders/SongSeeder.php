<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Song;
use App\Models\Artist;
use Carbon\Carbon;

class SongSeeder extends Seeder
{
    public function run(): void
    {
        $songsByArtist = [
            'Martin Garrix' => [
                ['title' => 'Animals', 'genre' => 'Electronic', 'duration' => '5:03', 'release_date' => '2013-06-17'],
                ['title' => 'Scared to be Lonely', 'genre' => 'Electronic', 'duration' => '3:40', 'release_date' => '2017-01-27'],
                ['title' => 'High on Life', 'genre' => 'Electronic', 'duration' => '3:50', 'release_date' => '2018-07-06'],
            ],
            'John Sinnott' => [
                ['title' => 'Jazz Nights', 'genre' => 'Jazz', 'duration' => '4:10', 'release_date' => '2020-03-12'],
                ['title' => 'Blue Notes', 'genre' => 'Jazz', 'duration' => '5:20', 'release_date' => '2021-08-18'],
                ['title' => 'Smooth Morning', 'genre' => 'Jazz', 'duration' => '3:45', 'release_date' => '2022-02-09'],
            ],
            'Tupac Shakur' => [
                ['title' => 'California Love', 'genre' => 'Hip-Hop', 'duration' => '4:34', 'release_date' => '1995-12-03'],
                ['title' => 'Changes', 'genre' => 'Hip-Hop', 'duration' => '4:31', 'release_date' => '1998-04-14'],
                ['title' => 'Hail Mary', 'genre' => 'Hip-Hop', 'duration' => '5:12', 'release_date' => '1996-02-14'],
            ],
            'Michael Jackson' => [
                ['title' => 'Thriller', 'genre' => 'Pop', 'duration' => '5:57', 'release_date' => '1982-11-30'],
                ['title' => 'Billie Jean', 'genre' => 'Pop', 'duration' => '4:54', 'release_date' => '1983-01-02'],
                ['title' => 'Beat It', 'genre' => 'Pop', 'duration' => '4:18', 'release_date' => '1983-02-14'],
            ],
            'Inna' => [
                ['title' => 'Hot', 'genre' => 'Pop', 'duration' => '3:36', 'release_date' => '2008-08-24'],
                ['title' => 'Amazing', 'genre' => 'Pop', 'duration' => '3:55', 'release_date' => '2009-10-22'],
                ['title' => 'Sun Is Up', 'genre' => 'Pop', 'duration' => '3:31', 'release_date' => '2010-05-17'],
            ],
            'Skepta' => [
                ['title' => 'Shutdown', 'genre' => 'Grime', 'duration' => '3:04', 'release_date' => '2015-05-26'],
                ['title' => 'Praise the Lord', 'genre' => 'Grime', 'duration' => '3:28', 'release_date' => '2016-04-08'],
                ['title' => 'Man', 'genre' => 'Grime', 'duration' => '3:50', 'release_date' => '2017-11-10'],
            ],
        ];

        foreach ($songsByArtist as $artistName => $songs) {
            $artist = Artist::where('name', $artistName)->first();

            if ($artist) {
                foreach ($songs as $songData) {
                    Song::create(array_merge($songData, [
                        'artist_id' => $artist->id,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]));
                }
            }
        }
    }
}
