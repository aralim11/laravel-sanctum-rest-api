<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            ['user_id' => '1', 'cat_name' => 'pHp', 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['user_id' => '2', 'cat_name' => 'WordPress', 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['user_id' => '3', 'cat_name' => 'Javascript', 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
        ]);
    }
}
