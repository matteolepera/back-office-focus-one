<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Team::create([
            'name' => 'Ferrari',
            'full_name' => 'Scuderia Ferrari',
            'logo_image' => 'ferrari.png',
            'base_city' => 'Maranello',
            'team_chief' => 'Vasseur',
            'technical_chief' => 'Cardile',
            'first_team_entry' => 1950,
            'reserve_driver' => 'Giovinazzi',
            'total_world_championships' => 16,
        ]);

        Team::create([
            'name' => 'Red Bull',
            'full_name' => 'Red Bull Racing',
            'logo_image' => 'redbull.png',
            'base_city' => 'Milton Keynes',
            'team_chief' => 'Horner',
            'technical_chief' => 'Newey',
            'first_team_entry' => 2005,
            'reserve_driver' => 'Lawson',
            'total_world_championships' => 6,
        ]);

        Team::create([
            'name' => 'Mercedes',
            'full_name' => 'Mercedes AMG F1',
            'logo_image' => 'mercedes.png',
            'base_city' => 'Brackley',
            'team_chief' => 'Wolff',
            'technical_chief' => 'Allison',
            'first_team_entry' => 2010,
            'reserve_driver' => 'Schumacher',
            'total_world_championships' => 8,
        ]);
    }
}
