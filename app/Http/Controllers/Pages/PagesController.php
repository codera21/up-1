<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Pages\Pages;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PagesController extends Controller
{
    /*public function __call($method, $parameters)
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
    }*/
    public function dypage($slug)
    {
        $lang = App::getLocale();
        $databaseRecord = Page::where('slug', $slug)->where('language', $lang)->count();
        if (!$databaseRecord) {
            return "No data with slug name <h1>" . $slug . "</h1>";
        }
        $PageName = str_replace('_', '-', $slug);
        $pages = new Pages();
        $data = $pages->$slug();
        if (file_exists($data['fileName'])) {
            mkdir($data['fileName'], 0777, true);
            return view('regpage.' . $data['method'], $data['array']);
        } else {
            $created = File::put($data['fileName'], $data['content']);
        }
        return view('regpage.' . $data['method'], $data['array']);
    }
}


