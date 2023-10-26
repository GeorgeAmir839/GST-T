<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::Create([
            'name' => "cst test",
            'first_name' => "cst",
            'last_name' => "test",
            'email' => 'admin@admin.co',
            'phone_number' => '11111',
            'birth_date' => '2012-09-02',
            'password' => Hash::make('admin@admin.co'),
        ]);
    }
}
