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
            'parent_id' => 'required|numeric',
            'first_name' => 'required|name|max:50',
            'last_name' => 'required|name|max:50',
            'address1' => 'required|address|max:255',
            'address2' => 'address|max:255',
            'city' => 'required|city|max:255',
            'state' => 'required',
            'phone' => 'required|phone|max:10',
            'username' => 'required|max:100|unique:users',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|min:6|confirmed',
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

            //Send registration mail
            //$user->sendRegisterNotification();
            UserVerification::generate($user);
            DB::table('companies_profiles')->insert([
                'user_id' => $user->id
            ]);
            UserVerification::send($user, 'Welcome to DNAsbook Digital Marketing:: Confirm Your Email Address');

            Log::info("============ User Registration (END) ============");

            Session::flash('danger', trans('login.email_sent'));

            return $user;
        } else {
            Log::error("User has not been registered.");
            Log::info("============ User Registration (END) ============");
        }
    }


    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        //$this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

}
