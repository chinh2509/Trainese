<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use File;
use Illuminate\Support\Facades\Storage;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Category::truncate();

  $json = File::get("/home/adminchinh2509/testbackpack-app/database/data/categories.json");
//        dd($json);
        $categories = json_decode($json);

        foreach ($categories as $key => $value) {
            Category::create([
                "id" => $value->id,
                "name" => $value->name
            ]);
            }

//        Category::factory()->count(10)->create();

//        $json = file::g("database/categoies.json");
//        $data = json_decode($json);
//        foreach ($data as $obj) {
//            Category::create(array(
//                'id' => $obj->id,
//                'name'=>$obj->name,
//            ));
//        }

    }
}
