<?php

namespace App\Http\Controllers;

use App\Models\Tests;
use App\Models\Answer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends MainController
{
    private $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new Tests();
        $this->answerModel = new Answer();
        $this->userModel = new User();
    }

    public function getAnswers($id){
        header('Content-type: application/json');
        http_response_code(200);
        echo json_encode(["answers" => $this->answerModel->getAnswers($id)]);
    }

    public function testResult(Request $request){
        try {

            $this->model->storeResult($request);

        } catch(\Exception $ex) {
            Log::error($ex->getMessage());
            echo json_encode(["error" => $ex]);
        }
    }

    public function sendMessage(Request $request){
        try {

            $this->userModel->sendMessage($request);

            echo json_encode(["message" => "Your message has been sent to the admin, expect a reply to your email."]);

        } catch(\Exception $ex) {
            Log::error($ex->getMessage());
            echo json_encode(["error" => $ex]);
        }
    }

}
