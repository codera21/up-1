<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class APiAuthController extends Controller
{
    public function AuthLogin()
    {
        $email = isset($_POST["email"]) ? $_POST["email"] : '';
        $password = isset($_POST["password"]) ? $_POST["password"] : '';
        $array = ["email" => $email, "password" => $password];
        $query = DB::table("users")->where("email", $email)->first();

        $result = array();
        $result["login"] = array();

        if (Auth::attempt($array)) {
            $index["email"] = $query->email;
            $index["password"] = $query->username;
            array_push($result["login"], $index);
            $result["success"] = "1";
            $result["message"] = "success";
            echo json_encode($result);
        } else {
            $result["success"] = "0";
            $result["message"] = "error";
            echo json_encode($result);
        }
    }
    public function csrf()
    {
        return view("apiLogin");
    }
}
