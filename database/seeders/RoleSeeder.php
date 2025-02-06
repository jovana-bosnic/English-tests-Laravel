<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    private $roles = ['admin', 'user'];

    public function run()
    {
        for($i = 0; $i < count($this->roles); $i++) {
            \DB::table("roles")->insert([
                'name' => $this->roles[$i]
            ]);
        }
    }
}
