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
        $notices = json_decode(file_get_contents(database_path('json/notices.json')), true);

        foreach ($notices as $notice) {
            Notice::create(
                [
                    'title' => $notice['title'],
                    'description' => $notice['description'],
                    'user_id' => $notice['user_id'],
                    'category_id' => $notice['category_id'],
                ]
            );
        }
    }
}
