<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Sport;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        collect(['Football', 'Basketball', 'Ice Hockey', 'Motorsports', 'Bandy', 'Rugby', 'Skiing', 'Shooting'])
            ->each(fn ($name) => Sport::create(['name' => $name]));
    }
}
