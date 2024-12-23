<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            Post::create([
                'title' => [
                    'en' => 'Sample Title ' . $i,
                    'ru' => 'Пример заголовка ' . $i,
                ],
                'slug' => [
                    'en' => 'sample-title-' . $i,
                    'ru' => 'пример-заголовка-' . $i,
                ],
                'content' => [
                    'en' => 'Sample content for post ' . $i,
                    'ru' => 'Содержимое примера для поста ' . $i,
                ],
                'image' => 'path/to/your/image.webp', // Rasm manzilini o'zgartiring
                'category_id' => rand(1, 2), // 1 yoki 2 ni tasodifiy tanlang
                'status' => 1, // Ixtiyoriy: statusni belgilash
            ]);
        }
    }

}
