<?php

namespace Database\Seeders;

use App\Models\Show;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Show::factory()->count(30)->create();
    }
}
