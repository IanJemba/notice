<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Notice;

class NoticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // You can use a factory here for bulk data creation
        \App\Models\Notice::factory()->count(10)->create();

        // Or manually seed notices
        Notice::create([
            'title' => 'Important Notice 1',
            'description' => 'This is an important notice for all users.',
            'user_id' => 1,
            'category_id' => 1
        ]);

        Notice::create([
            'title' => 'General Notice 2',
            'description' => 'A general notice for everyone.',
            'user_id' => 2,
            'category_id' => 2
        ]);
    }
}
