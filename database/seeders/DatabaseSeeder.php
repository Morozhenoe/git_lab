<?php

namespace Database\Seeders;

use App\Models\HolidayHistory;
use App\Models\Role;
use App\Models\User;
use App\Models\Holiday;
use App\Models\Supervisor;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::factory(10)->create();
        User::factory(10)->create();
        Supervisor::factory(10)->create();
        Holiday::factory(10)->create();
        HolidayHistory::factory(10)->create();


//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
    }
}
