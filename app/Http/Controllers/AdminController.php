<?php

namespace App\Http\Controllers;

use App\Models\Reminders;
use App\Models\Tests;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminController extends MainController
{
    private $testModel;

    public function __construct()
    {
        parent::__construct();
        $this->testModel = new Tests();
        $this->userModel = new User();
    }

    public function adminPanel(){

        $request = new Request();
        $this->data['categories'] = $this->testModel->getAllTestCategory($request);
        $this->data['messages'] = $this->userModel->getAllMessages();
        $this->data['statistics'] = $this->userModel->getStatistics();
        $query = DB::table('reminders');
        $this->data["reminders"] = $query->paginate(2)->withQueryString();

        return view('pages.main.admin',  $this->data);
    }


   public function createCategory(Request $request){

       try {
           $model = new Tests();
           $cat =  \DB::table("categories")->where("name", $request->name)->first();

           if($cat != null){
               return redirect()->route('admin')->with("error", "There is already a category with the same name.");
           }

           $model->storeCategory($request);
           return redirect()->route('admin')->with("success", "Category insert is successful.");
       }
       catch (Exception $ex){

           Log::error($ex->getMessage());
           return redirect()->back()->with("error", "There was an error processing your request.");
       }
   }

    public function createReminder(Request $request){

        try {
            $model = new Reminders();

            if($request->alt == null || $request->picture == null){
                return redirect()->route('admin')->with("error", "Text and image are required.");
            }
            $model->storeReminder($request);
            return redirect()->route('admin')->with("success", "Successful reminder insert and upload.");
        }
        catch (Exception $ex){
            Log::error($ex->getMessage());
            return redirect()->back()->with("error", "There was an error processing your request.");
        }
    }

    public function deleteReminder($reminder){

        try {
            $model = new Reminders();
            $model->deleteReminder($reminder);
            return redirect()->route('admin')->with("success", "Reminder is deleted successfully.");
        }
        catch (Exception $ex){

            Log::error($ex->getMessage());
            return redirect()->back()->with("error", "There was an error processing your request.");
        }
    }
}
