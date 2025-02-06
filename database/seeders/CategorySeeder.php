<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    private $categories = ['Tenses', 'Business'];

    public function run()
    {
        for($i = 0; $i < count($this->categories); $i++) {
            \DB::table("categories")->insert([
                'name' => $this->categories[$i]
            ]);
        }
    }
}
