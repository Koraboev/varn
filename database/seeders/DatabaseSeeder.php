<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Language;
use Illuminate\Database\Seeder;

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
        $this->createLanguages();

        $this->call([PostsTableSeeder::class,]);
        $this->call([UserSeeder::class]);

    }

    protected function createLanguages()
    {
        // Agar 'en' tili mavjud bo'lmasa, uni yaratamiz
        if (!Language::where('name', 'en')->exists()) {
            Language::create(['name' => 'en']);
        }

        // Agar 'ru' tili mavjud bo'lmasa, uni yaratamiz
        if (!Language::where('name', 'ru')->exists()) {
            Language::create(['name' => 'ru']);
        }
    }
}
