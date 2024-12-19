<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'sys-admin',
            'email' => 'sys-admin@example.com',
            'avatar' => "",
            'gender' => "1",
            'status' => "1",
         ]);

         User::factory()->create([
            'name' => 'team-admin',
            'email' => 'team-admin@example.com',
            'avatar' => "",
            'gender' => "1",
            'status' => "1",
         ]);
         User::factory()->create([
            'name' => 'team-manager',
            'email' => 'team-manager@example.com',
            'avatar' => "",
            'gender' => "1",
            'status' => "1",
         ]);

         User::factory()->create([
            'name' => 'team-ßuser',
            'email' => 'team-user@example.com',
            'avatar' => "",
            'gender' => "1",
            'status' => "1",
         ]);

        // Laratrust seeder
        $this->call(LaratrustSeeder::class);
    }
}
