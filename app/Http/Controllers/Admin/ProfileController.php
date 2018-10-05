<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// Request & Response
use Illuminate\Http\Request;
use Illuminate\Http\Response;
// Facades
use Auth;
use Hash;
// Models and Repo
use App\Repositories\UserRepository;
// Form Requests
use App\Http\Requests\Admin\ProfileRequest;
use App\Http\Requests\Admin\PasswordRequest;

class ProfileController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    /**
     * Show Profile form
     *
     * @return Response
     */
    public function index()
    {
        //Get user fields
        $user = array();
        $user = $this->user->find(Auth::user()->id);

        return view('admin.profile.index', ['user' => $user]);
    }

    /**
     * Update Profile
     *
     * @return Redirect
     */
    public function update(ProfileRequest $request)
    {

        $data = $request->except(['_token', '_method']);

        if ($user = $this->user->update($data, Auth::user()->id)) {
            return redirect()->route('admin.manage-profile')->with('success',
                    trans('Profile has been updated successfully.'));
        } else {
            return redirect()->route('admin.manage-profile')->withInput()->with('error',
                    trans('Profile has not been updated successfully.'));
        }
    }

    /**
     * Update Password
     *
     * @return Redirect
     */
    public function updatePassword(PasswordRequest $request)
    {
        $data = $request->except(['_token', '_method']);
        $user = $this->user->find(Auth::user()->id);

        if (Hash::check($data['old_password'], $user->password)) {

            $data['password'] = bcrypt($data['password']);

            if ($user = $this->user->update($data, Auth::user()->id)) {
                return redirect()->route('admin.manage-profile')->with('success',
                        trans('Password has been changed successfully.'));
            } else {
                return redirect()->route('admin.manage-profile')->withInput()->with('error',
                        trans('Password has not been changed successfully.'));
            }
        } else {
            return redirect()->route('admin.manage-profile')->withInput()->with('error',
                    trans('Old Password does not match with our record.'));
        }
    }
}