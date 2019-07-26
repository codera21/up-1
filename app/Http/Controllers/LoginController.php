<?php
/**
 * Created by PhpStorm.
 * User: ashis
 * Date: 5/21/2019
 * Time: 6:55 PM
 */

namespace App\Http\Controllers;


class LoginController
{
    function bcrypt($value, $options = [])

    {

        return app(‘hash’)->make($value, $options);

    }

    public function AuthCheck()
    {
        $email = isset($_POST["email"]) ? $_POST["email"] : '';
        $password = isset($_POST["password"]) ? $_POST["password"] : '123';

        var_dump($password);
    }
}
