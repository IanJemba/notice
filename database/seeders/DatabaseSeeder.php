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

        Category::factory()->create([
            'title' => 'Lost and Found',
            'description' => 'Notices related to lost and found items',
        ]);

        Category::factory()->create([
            'title' => 'School Events',
            'description' => 'Notices about upcoming school events',
        ]);

        Category::factory()->create([
            'title' => 'Important Announcements',
            'description' => 'Notices about important school announcements',
        ]);

        Notice::factory()->create([
            'title' => 'Lost and Found: Blue Backpack',
            'description' => 'A blue backpack has been found near the cafeteria. Please come to the lost and found office to claim it.',
            'category_id' => 1, // Lost and Found
        ]);

        Notice::factory()->create([
            'title' => 'Upcoming School Trip',
            'description' => 'The annual school trip to the science museum will take place on October 25th. Permission slips must be signed and returned by October 20th.',
            'category_id' => 2, // School Events
        ]);

        Notice::factory()->create([
            'title' => 'School Event: Talent Show',
            'description' => 'The school talent show will be held in the auditorium on November 10th. Sign-up sheets are available at the front office.',
            'category_id' => 2, // School Events
        ]);

        Notice::factory()->create([
            'title' => 'Graduation Ceremony',
            'description' => 'The graduation ceremony for seniors will be held on June 5th. Caps and gowns can be picked up in the student office starting May 15th.',
            'category_id' => 2, // School Events
        ]);

        Notice::factory()->create([
            'title' => 'Parent-Teacher Conference',
            'description' => 'Parent-teacher conferences will be held on November 20th. Please schedule your meeting time with your child\'s teacher.',
            'category_id' => 3, // Important Announcements
        ]);

        Notice::factory()->create([
            'title' => 'Lost Item: Water Bottle',
            'description' => 'A black water bottle was left in the gym. If this belongs to you, please visit the lost and found desk.',
            'category_id' => 1, // Lost and Found
        ]);

        Notice::factory()->create([
            'title' => 'Field Day Event',
            'description' => 'Field Day will take place on April 12th. All students are encouraged to participate in outdoor activities and competitions.',
            'category_id' => 2, // School Events
        ]);

        Notice::factory()->create([
            'title' => 'School Dance',
            'description' => 'The annual spring dance will be held on March 23rd in the school gym. Tickets are available for purchase at the main office.',
            'category_id' => 2, // School Events
        ]);

        Notice::factory()->create([
            'title' => 'Senior Yearbook Photos',
            'description' => 'Senior yearbook photos will be taken on December 3rd. Be sure to sign up for your time slot online.',
            'category_id' => 3, // Important Announcements
        ]);

        Notice::factory()->create([
            'title' => 'Lost Glasses Found',
            'description' => 'A pair of prescription glasses was found in the library. Please check with the librarian if these belong to you.',
            'category_id' => 1, // Lost and Found
        ]);
        Comment::factory(20)->create();
    }
}
