<?php

namespace App\Http\Controllers;

use App\Models\Menu;

class MainController extends Controller
{
    public $data;

    public function __construct()
    {
        $this->data["menu"] = Menu::all();
    }

}
