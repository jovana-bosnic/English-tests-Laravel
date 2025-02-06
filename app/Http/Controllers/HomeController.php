<?php


namespace App\Http\Controllers;

use App\Models\Reminders;
use App\Models\Tests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends MainController
{
    public function __construct()
    {
        parent::__construct();

        $query = DB::table('reminders');
        $this->data["reminders"] = $query->paginate(8)->withQueryString();
    }
    public function index()
    {
        $testModel = new Tests();
        $this->data["business"] = $testModel->getBusinessCategories();
        return view('pages.main.home', $this->data);
    }

    public function remindersAll(){
        return view('pages.main.reminders', $this->data);
    }
}
