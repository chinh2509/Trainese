<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use phpDocumentor\Reflection\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([CategorySeeder::class]);
        $this->call([PostSeeder::class]);

//        $this->call([UsersTableSeeder::class]);
//
//         \App\Models\User::factory(10)->create();
    }
}
