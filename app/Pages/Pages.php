<?php


namespace App\Pages;


use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;

class Pages extends Controller
{
    public function __call($method, $parameters)
    {
        $lang = App::getLocale();
        $fileName = base_path('resources/views/regpage') . "/" . $method . ".blade.php";
        $content = file_get_contents(base_path('index.blade.php'));
        $pagesData = Page::where('language', $lang)->where('slug', $method)->first();
        $array = array(
            'pagesData' => $pagesData,
        );
        return ["array" => $array, "method" => $method, "fileName" => $fileName, "content" => $content];
    }
}
