<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;

class PagesController extends Controller
{
    public function __call($method, $parameters)
    {
        $lang = App::getLocale();
        $pageName = str_replace('_', '-', $method);
        $file_path = base_path('resources\views\regpage');
        $fileName = $file_path . "\\" . $method . ".blade.php";
        $content = file_get_contents(base_path('index.blade.php'));
        $pagesData = Page::where('language', $lang)->where('slug', $pageName)->first();
        if ($pagesData == null) {
            return 0;
        }
        $array = array(
            'pagesData' => $pagesData,
        );
        if (file_exists($fileName)) {
            return view('regpage.' . $method, $array);
        } else {
            $created = File::put($fileName, $content);
        }
        return view('regpage.' . $method, $array);
    }
}


