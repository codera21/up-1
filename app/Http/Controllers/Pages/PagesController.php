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
/*
		session()->forget('canWatch');
		session()->forget('codeid');
		session()->forget('videoExpireTime');
*/
		self::check_video_expiry();
		
		$lang = App::getLocale();
        $databaseRecord = Page::where('slug', $slug)->where('language', $lang)->count();
        if (!$databaseRecord) {
            return "No data with slug name <h1>" . $slug . "</h1>";
        }
        $PageName = str_replace('_', '-', $slug);
        $pages = new Pages();
        $data = $pages->$slug();

        $data['array']['date'] = date('d-m-Y');


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
    public function sendmail($slug, Request $request)
    {

        $lang = App::getLocale();
        $databaseRecord = Page::where('slug', $slug)->where('language', $lang)->count();
        if (!$databaseRecord) {
            return "No data with slug name <h1>" . $slug . "</h1>";
        }
        $PageName = str_replace('_', '-', $slug);
        $pages = new Pages();
        $data = $pages->$slug();


        $sent = Mail::send('emails.certificate',
            array(
                'name' => $request->name,
                'email' => $request->email,
                'country' => $request->country,
            ), function ($message) use ($request) {
                $message->from($request->email);
                $message->to('paymentproblems@gmail.com', 'Admin')->subject('Dnasbook contact us');
            });


        $data['array']['name'] = $request->name;
        $data['array']['date'] = date('d-m-Y');

        //
        if (file_exists($data['fileName'])) {


            try {
                $sent = Mail::send('emails.certificate',
                    array(
                        'name' => $request->name,
                        'email' => $request->email,
                        'country' => $request->country,
                    ), function ($message) use ($request) {
                        $message->from($request->email);
                        $message->to('paymentproblems@gmail.com', 'Admin')->subject('Dnasbook contact us');
                    });

            } catch (\Exception $e) {

                dd($e->getMessage());
            }

            $data['array']['name'] = $request->name;

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
    }

    public function token(Request $request)
    {
		
		dd($request);
        if (env('SITE') == 'ENG') {
            $id = 2;
        } else {
            $id = 345;
        }
        $array = [
            'token' => $_POST['token'],
            'is_expired' => 'NO'
        ];
        if (env('SITE') == 'ENG') {
            $data = DB::table('training_video_payment')->where($array)->get()->count();
        } else {
            $data = DB::table('offline_pay')->where('bank_slip_no', $_POST['token'])->get()->count();
        }
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
                    return "No changes";
                }
            }
        }
    }
	
	
	/*===========================================
	| New Functions for video codes
	============================================*/
	public function videocode(Request $request)
    {
		if (env('SITE') == 'ENG') {
            $id = 2;
        } else {
            $id = 345;
        }
        
		$array = [
            'code' => $request->input("videocode"),
            'expired' => 0
        ];
		
       
        $code = DB::table('codes')->where($array)->first();

		if ($code) {
           	//--- Expires in 72 hours
		    $expiretime = time() + ( 60 * 60 * 72 );
			
			session()->put("canWatch", true);
			session()->put("videoExpireTime", $expiretime);
			session()->put("codeid", $code->id);
			return redirect("pages/videos?id=$id");
        } else {
            session()->forget("canWatch");
			return redirect("pages/videos?id=$id")->with('error', ' Sorry! Please, check your code');
        }

		//return redirect("pages/videos?id=$id");
    }
	
	public function check_video_expiry()
    {
		if(session()->has("videoExpireTime")){
			$expireTime = session()->get("videoExpireTime");
			
			if(time() >= $expireTime){
				$where = ["id" => session()->get("codeid")];
				$updateData = DB::table('codes')->where($where)->update([
					'expired' => 1
				]);
			
				if ($updateData) {
					session()->forget('canWatch');
					session()->forget('codeid');
					session()->forget('videoExpireTime');
					
					return response(200);
				}
			}
		}
    }
}


