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

        Marking::factory()->create([
            'name' => 'Open',
            'description' => 'This notice is open for discussion',
            'color' => '#00ff00',
            'disable_comments' => false,
            'hide_notice' => false,
        ]);

        Marking::factory()->create([
            'name' => 'Closed',
            'description' => 'This notice is closed',
            'color' => '#FF5733',
            'disable_comments' => true,
            'hide_notice' => false,
        ]);

        Marking::factory()->create([
            'name' => 'Archived',
            'description' => 'This notice is archived',
            'color' => '#FFFF00',
            'disable_comments' => true,
            'hide_notice' => true,
        ]);

        Marking::factory()->create([
            'name' => 'Important',
            'description' => 'This notice is important',
            'color' => '#FFD700',
            'disable_comments' => false,
            'hide_notice' => false,
        ]);
    }
}
