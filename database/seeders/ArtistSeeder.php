<?php
 
namespace Database\Seeders;
 
use App\Models\User;
use Illuminate\Database\Seeder;
 
class DatabaseSeeder extends seeder{
    public function run(): void{
        $this->call(GameSeeder::Class);
    }
}
////////////////////////////////////////////////////////////////////////////////////////////////////
// When Columns is fixed with images and decimals use (php artisan migrate) and (php artisan db:seed)
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use App\Models\Game;
 
class GameSeeder extends Seeder{
    public function run(): void{
        $currentTimestamp = Carbon::now();
        DB::table('artists')->insert([
            [
                'name' => 'Martin Garrix',
                'genre' => 'Electronic',
                'debut_year' => 2012,
                'social_media_handle' => '@martingarrix',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'John Sinnott',
                'genre' => 'Jazz',
                'debut_year' => 2020,
                'social_media_handle' => '@joh.nsinnott',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Tupac Shakur',
                'genre' => 'West Coast Hip-Hop',
                'debut_year' => 1989,
                'social_media_handle' => '@2pac',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Michael Jackson',
                'genre' => 'Pop',
                'debut_year' => 1965,
                'social_media_handle' => '@MichaelJackson',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
