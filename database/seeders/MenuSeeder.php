<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    private $names = ['Home', 'All tests', 'Quick reminders'];
    private $routes = ['home', 'tests.index', 'reminders'];

    public function run()
    {
        for($i = 0; $i < count($this->names); $i++) {
            Menu::create([
                'name' => $this->names[$i],
                'route' => $this->routes[$i],
            ]);
        }
    }
}
