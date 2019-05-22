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

    public function AuthRegister()
    {
        $first_name = isset($_POST["first_name"]) ? $_POST["first_name"] : "ApiTest";
        $last_name = isset($_POST["last_name"]) ? $_POST["last_name"] : "TestApi";
        $address = isset($_POST["address1"]) ? $_POST["address1"] : "AddressApi";
        $country = isset($_POST["country"]) ? $_POST["country"] : "NepalApi";
        $sex = isset($_POST["sex"]) ? $_POST["sex"] : "Female";
        $phone = isset($_POST["phone"]) ? $_POST["phone"] : "111222111";
        $username = isset($_POST["username"]) ? $_POST["username"] : "apiusername";
        $email = isset($_POST["email"]) ? $_POST["email"] : "api@gmail.com";
        $password = isset($_POST["password"]) ? $_POST["password"] : "11111111";
        $password = bcrypt($password);

        $array = array();
        $array["register"] = array();

        $query = DB::table("users")->insert([
            "first_name" => $first_name,
            "last_name" => $last_name,
            "address1" => $address,
            "country" => $country,
            "sex" => $sex,
            "phone" => $phone,
            "username" => $username,
            "email" => $email,
            "password" => $password,
            'verified' => 1,
            'not_now' => 1,
            'is_active' => 'YES',
            'parent_id' => '2'
        ]);
        if ($query) {
            DB::table('companies_profiles')->insert([
                'user_id' => $query->id
            ]);
            $array["success"] = "1";
        }
        echo json_encode($array);
    }
}
