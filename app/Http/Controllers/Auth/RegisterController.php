<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Jrean\UserVerification\Traits\VerifiesUsers;
use Jrean\UserVerification\Facades\UserVerification;
use Illuminate\Auth\Events\Registered;

// Request & Response
use Illuminate\Http\Request;
use App\Http\Requests;

// Facades
use Log;
use Validator;
use Session;
use Auth;
// Models and Repo
use App\Models\User;
use App\Repositories\UserRepository;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    use VerifiesUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Where to reditect if the authenticated user is already verified.
     *
     * @var string
     */
    protected $redirectIfVerified = '/';

    /**
     * Where to redirect after a successful verification token verification.
     *
     * @var string
     */

    protected $redirectAfterVerification = '/login';

    /**
     * Where to redirect after a failling token verification.
     *
     * @var string
     */
    protected $redirectIfVerificationFails = '/email-verification/error';

    /**
     * @var UserRepository
     */
    protected $user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $user)
    {
        $this->middleware('guest');
        $this->user = $user;

        Log::getMonolog()->popHandler();//Remove Old Handlers
        Log::useDailyFiles(config('settings.log.registration'));//Set New Handler
    }

    public function showRegistrationForm($id = null)
    {

        return view('auth.register', ['parentid' => $id]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [

        ]);
    }

    protected function create(array $data)
    {
        $data['password'] = bcrypt($data['password']);
        $data['admin'] = 'NO';
        Log::info("============ User Registration (START) ============");

        Log::info("====== Registration Form Submitted Data ======");
        Log::info($data);
        Log::info("====== Registration Form Submitted Data ======");

        if ($user = $this->user->create($data)) {

            Log::info("User (User ID: " . $user->id . " - Email: " . $user->email . ") has been registered successfully.");


            DB::table('companies_profiles')->insert([
                'user_id' => $user->id
            ]);


            DB::table('users')->where('id', $user->id)->update(
                [
                    'verified' => 1,
                    'not_now' => 1,
                    'is_active' => 'YES'
                ]
            );


            Log::info("============ User Registration (END) ============");

            /* Session::flash('danger', trans('login.email_sent')); */

            return $user;
        } else {
            Log::error("User has not been registered.");
            Log::info("============ User Registration (END) ============");
        }
    }


    public function register(Request $request)
    {
//        dd($request->all());
        if (isset($_POST['g-recaptcha-response'])) {
            $capta = $request->input("g-recaptcha-response");
        }
        if (!$capta) {
            return redirect()->route('register', ['post' => $request->input("parent_id")])
                ->with('danger', 'Complete captcha');
        }
        $secrect_key = "6Ld0aaoUAAAAAJe3yNib7ahWdBjx8U8NO7armg3d";
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secrect_key) . '&response=' . urlencode($capta);
        $response = file_get_contents($url);
        $responseKeys = json_decode($response, true);
        if ($responseKeys["success"]) {
            $this->validator($request->all())->validate();
            $users = event(new Registered($user = $this->create($request->all())));
            DB::table('users')->where('first_name', $request->first_name)->update([
                'sex' => $request->sex,
            ]);
            Auth::login($user);
            return redirect()->guest("pages/distributor");
        } else {
            return redirect()->route('register', ['post' => $request->input("parent_id")])
                ->with('danger', 'Could Not Register');
            /*return $this->registered($request, $user)
                ?: redirect($this->redirectPath());*/
        }

        //$this->guard()->login($user);


    }

}
