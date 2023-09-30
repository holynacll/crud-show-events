<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShowEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $showEvents = [
            [
                'title' => Str::random(10),
                'attractions' => Str::random(10),
                'description' => Str::random(10),
                'start_datetime' => now()->format('Y-m-d H:i'),
                'img_path' => 'default.png',
                'price' => rand(1, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => Str::random(10),
                'attractions' => Str::random(10),
                'description' => Str::random(10),
                'start_datetime' => now()->format('Y-m-d H:i'),
                'img_path' => 'default.png',
                'price' => rand(1, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => Str::random(10),
                'attractions' => Str::random(10),
                'description' => Str::random(10),
                'start_datetime' => now()->format('Y-m-d H:i'),
                'img_path' => 'default.png',
                'price' => rand(1, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => Str::random(10),
                'attractions' => Str::random(10),
                'description' => Str::random(10),
                'start_datetime' => now()->format('Y-m-d H:i'),
                'img_path' => 'default.png',
                'price' => rand(1, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => Str::random(10),
                'attractions' => Str::random(10),
                'description' => Str::random(10),
                'start_datetime' => now()->format('Y-m-d H:i'),
                'img_path' => 'default.png',
                'price' => rand(1, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => Str::random(10),
                'attractions' => Str::random(10),
                'description' => Str::random(10),
                'start_datetime' => now()->format('Y-m-d H:i'),
                'img_path' => 'default.png',
                'price' => rand(1, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => Str::random(10),
                'attractions' => Str::random(10),
                'description' => Str::random(10),
                'start_datetime' => now()->format('Y-m-d H:i'),
                'img_path' => 'default.png',
                'price' => rand(1, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => Str::random(10),
                'attractions' => Str::random(10),
                'description' => Str::random(10),
                'start_datetime' => now()->format('Y-m-d H:i'),
                'img_path' => 'default.png',
                'price' => rand(1, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],        
        ];
        DB::table('show_events')->insert($showEvents);
    }
}
