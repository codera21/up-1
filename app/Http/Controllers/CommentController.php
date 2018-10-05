<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

// Request & Response
use Illuminate\Http\Request;
use App\Http\Requests;

// Facades
use Date;
use Auth;

// Models and Repo
use App\Repositories\CommentRepository;
use App\Repositories\UserRepository;

// Form Requests
use App\Http\Requests\CommentSaveRequest;

class CommentController extends Controller
{

   /**
     * @var CommentRepository
     */
    protected $comment;

    /**
     * @var UserRepository
     */
    protected $user;

    public function __construct(CommentRepository $comment, UserRepository $user)
    {
        $this->comment = $comment;
        $this->user = $user;
    }

    
    /**
     * Save Comment
     * 
     * @param CommentSaveRequest $request
     * @return Redirect
     */
    public function save(CommentSaveRequest $request, $username)
    {
        $data = $request->except(['_token']);

        $data['commenting_user_id'] = Auth::user()->id;
        $user = $this->user->findByField('username', $username)->first();
        $data['user_id'] = $user->id;
        
        if ($comment = $this->comment->create($data)) {
            return redirect('user/'.$username)->with('success', trans('Comment has been saved successfully.'));
        } else {
            return redirect('user/'.$username)->withInput()->with('error', trans('Comment has not been saved.'));
        }
    }

    /**
     * Delete faq
     *
     * @param Request $request
     * @param integer $Id
     * @return Redirect
     */
    public function delete(Request $request, $Id)
    {
        abort(404);
        if ($this->user->delete($Id)) {
            return redirect()->route('admin.faq')->with('success', trans('FAQ has been deleted successfully.'));
        } else {
            return redirect()->route('admin.faq')->with('error', trans('FAQ has not been deleted successfully.'));
        }
    }
}
