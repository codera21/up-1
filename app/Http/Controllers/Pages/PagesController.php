<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Pages\Pages;
use App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Mail;
//use Illuminate\Support\Facades\Request;

class PagesController extends Controller
{

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
            return view('regpage.' . $data['method'], $data['array']);
        } else {
            $created = File::put($data['fileName'], $data['content']);
            if ($created) {
                return view('regpage.' . $data['method'], $data['array']);
            }
        }
    }
    
	/* this is the function for email  */
	public function sendmail($slug,Request $request){
        
		$lang = App::getLocale();
        $databaseRecord = Page::where('slug', $slug)->where('language', $lang)->count();
        if (!$databaseRecord) {
            return "No data with slug name <h1>" . $slug . "</h1>";
        }
        $PageName = str_replace('_', '-', $slug);
        $pages = new Pages();
        $data = $pages->$slug();
		
		try{	
		$sent=  Mail::send('emails.certificate',
				array(
					'name' => $request->name,
					'email' => $request->email,
					'country' => $request->country,
				), function ($message) use ($request) {
					$message->from($request->email);
					$message->to('paymentproblems@gmail.com', 'Admin')->subject('Dnasbook contact us');
				});
		  		
		}catch(\Exception $e){
			
			dd($e->getMessage());
		}
		
		$data['array']['name']=$request->name;
	
		//
	  if (file_exists($data['fileName'])) {
            return view('regpage.' . $data['method'], $data['array']);
        } else {
            $created = File::put($data['fileName'], $data['content']);
            if ($created) {
                return view('regpage.' . $data['method'], $data['array']);
            }
        }
	}
	
    public function token(Request $request)
    {
        if (env('SITE') == 'ENG') {
            $id = 2;
        } else {
            $id = 345;
        }
        $array = [
            'token' => $_POST['token'],
            'is_expired' => 'NO'
        ];
        $data = DB::table('training_video_payment')->where($array)->get()->count();
        if ($data) {
            session()->put("canWatch", true);
            return redirect('pages/videos?id=' . $id);
        } else {
            session()->put('canWatch', false);
            return redirect('pages/videos?id=' . $id);
        }
    }

    public function expiry()
    {
        $data = DB::table('training_video_payment')->get();
        foreach ($data as $item) {
            $timeOfExpiry = $item->expiry_time;
            if (time() >= $timeOfExpiry) {
                $updateData = DB::table('training_video_payment')->where('id', $item->id)->update([
                    'is_expired' => 'YES'
                ]);
                if ($updateData) {
                    session()->put('canWatch', false);
                    return response(200);
                } else {
                    return "NO changes";
                }
            }
        }
    }
}


