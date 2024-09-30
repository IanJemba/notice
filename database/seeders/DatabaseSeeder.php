<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Marking;
use App\Models\Notice;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Default admin user
        // admin@admin.nl
        // qwertyuiop
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.nl',
            'email_verified_at' => now(),
            'password' => Hash::make('qwertyuiop'),
            'remember_token' => Str::random(10),
            'role' => 'admin',
        ]);
        User::factory(10)->create();
        Category::factory(10)->create();
        Notice::factory(10)->create();
        Comment::factory(15)->create();
        Marking::factory(15)->create();
    }
}
