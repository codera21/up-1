<?php

namespace App\Http\Controllers;

// Request & Response
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Facades
use Auth;
use Grid;

// Models and Repo
use App\Repositories\UserRepository;
use App\Repositories\MessageRepository;

// Form Requests
use App\Http\Requests\MessageSaveRequest;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    protected $user;
    protected $message;

    public function __construct(UserRepository $user, MessageRepository $message)
    {
        $this->user = $user;
        $this->message = $message;
    }

    public function index(Request $request, $username = '')
    {
        $this->message->pushCriteria(new \App\Criteria\MessageCriteria('inbox'));
        $messages = $this->message;

        $grid = new Grid();
        $grid->setGridName('message-grid')->setBaseUrl(route('message'))
            ->setPaginator($messages, 'created_at', 'desc', 25)
            ->setMainActions(
                array(
                    array(
                        'name' => 'inbox',
                        'title' => trans('message.inbox'),
                        'url' => route('message')
                    ),
                    array(
                        'name' => 'sent',
                        'title' => trans('message.sent'),
                        'url' => route('message.sent')
                    ),
                    array(
                        'name' => 'trash',
                        'title' => trans('message.trash'),
                        'url' => route('message.trash')
                    ),
                )
            )
            ->setColumns(
                array(
                    array(
                        'name' => 'from_username',
                        'label' => trans('message.from'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->from_username;
                        }
                    ),
                    array(
                        'name' => 'subject',
                        'label' => trans('message.subject'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->subject;
                        }
                    ),
                    array(
                        'name' => 'subject',
                        'label' => trans('Messages'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => '50%',
                        'value' => function ($row) {
                            return $row->message;
                        }
                    ),
                    array(
                        'name' => 'created_at',
                        'label' => trans('message.date'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                            'attr' => array('class' => 'daterange'),
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->created_at;
                        }
                    ),
                    array(
                        'name' => 'action',
                        'label' => trans('app.action'),
                        'sortable' => false,
                        'searchable' => false,
                        'searchfield' => null,
                        'width' => 'auto',
                        'value' => function ($row) {
                            return '<a href="' . route('message.delete', ['id' => $row->id]) . '" class="btn btn-danger btn-xs delete text-white">' . trans('app.delete') . '</a>';
                        }
                    ),
                )
            );

        return view('message.index', ['grid' => $grid, 'toUsername' => $username]);
    }

    public function index2(Request $request, $username = '')
    {
        $this->message->pushCriteria(new \App\Criteria\MessageCriteria('inbox'));
        $messages = $this->message;

        $grid = new Grid();
        $grid->setGridName('message-grid')->setBaseUrl(route('message'))
            ->setPaginator($messages, 'created_at', 'desc', 25)
            ->setMainActions(
                array(
                    array(
                        'name' => 'inbox',
                        'title' => trans('message.inbox'),
                        'url' => route('message')
                    ),
                    array(
                        'name' => 'sent',
                        'title' => trans('message.sent'),
                        'url' => route('message.sent')
                    ),
                    array(
                        'name' => 'trash',
                        'title' => trans('message.trash'),
                        'url' => route('message.trash')
                    ),
                )
            )
            ->setColumns(
                array(
                    array(
                        'name' => 'from_username',
                        'label' => trans('message.from'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->from_username;
                        }
                    ),
                    array(
                        'name' => 'subject',
                        'label' => trans('message.subject'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->subject;
                        }
                    ),
                    array(
                        'name' => 'subject',
                        'label' => trans('Messages'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => '50%',
                        'value' => function ($row) {
                            return $row->message;
                        }
                    ),
                    array(
                        'name' => 'created_at',
                        'label' => trans('message.date'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                            'attr' => array('class' => 'daterange'),
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->created_at;
                        }
                    ),
                    array(
                        'name' => 'action',
                        'label' => trans('app.action'),
                        'sortable' => false,
                        'searchable' => false,
                        'searchfield' => null,
                        'width' => 'auto',
                        'value' => function ($row) {
                            return '<a href="' . route('message.delete', ['id' => $row->id]) . '" class="btn btn-danger btn-xs delete text-white">' . trans('app.delete') . '</a>';
                        }
                    ),
                )
            );
        return view('message.index2', ['grid' => $grid, 'toUsername' => $username]);
    }
    //group message
    public function groupindex(Request $request, $username = '')
    {
        $this->message->pushCriteria(new \App\Criteria\MessageCriteria('inbox'));
        $messages = $this->message;

        $grid = new Grid();
        $grid->setGridName('message-grid')->setBaseUrl(route('message'))
            ->setPaginator($messages, 'created_at', 'desc', 25)
            ->setMainActions(
                array(
                    array(
                        'name' => 'inbox',
                        'title' => trans('message.inbox'),
                        'url' => route('group.group')
                    ),
                    array(
                        'name' => 'sent',
                        'title' => trans('message.sent'),
                        'url' => route('group.viewsent')
                    ),
                    array(
                        'name' => 'trash',
                        'title' => trans('message.trash'),
                        'url' => route('group.trash')
                    ),
                )
            )
            ->setColumns(
                array(
                    array(
                        'name' => 'from_username',
                        'label' => trans('message.from'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->from_username;
                        }
                    ),
                    array(
                        'name' => 'subject',
                        'label' => trans('message.subject'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->subject;
                        }
                    ),
                    array(
                        'name' => 'subject',
                        'label' => trans('Messages'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => '50%',
                        'value' => function ($row) {
                            return $row->message;
                        }
                    ),
                    array(
                        'name' => 'created_at',
                        'label' => trans('message.date'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                            'attr' => array('class' => 'daterange'),
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->created_at;
                        }
                    ),
                    array(
                        'name' => 'action',
                        'label' => trans('app.action'),
                        'sortable' => false,
                        'searchable' => false,
                        'searchfield' => null,
                        'width' => 'auto',
                        'value' => function ($row) {
                            return '<a href="' . route('group.delete', ['id' => $row->id]) . '" class="btn btn-danger btn-xs delete text-white">' . trans('app.delete') . '</a>';
                        }
                    ),
                )
            );
        return view('message.groupindex', ['grid' => $grid, 'toUsername' => $username]);
    }

    public function groupunread(Request $request)
    {

        //Get model
        $this->message->pushCriteria(new \App\Criteria\MessageCriteria('unread'));
        $messages = $this->message;

        //Setup grid
        $grid = new Grid();
        $grid->setGridName('message-grid')->setBaseUrl(route('message'))
            ->setPaginator($messages, 'created_at', 'desc', 25)
            ->setMainActions(//Optional
                array(
                    array(
                        'name' => 'inbox',
                        'title' => trans('message.inbox'),
                        'url' => route('message')
                    ),
                    array(
                        'name' => 'unread',
                        'title' => trans('message.unread'),
                        'url' => route('message.unread')
                    ),
                    array(
                        'name' => 'sent',
                        'title' => trans('message.sent'),
                        'url' => route('message.sent')
                    ),
                    array(
                        'name' => 'trash',
                        'title' => trans('message.trash'),
                        'url' => route('message.trash')
                    ),
                )
            )
            ->setColumns(
                array(
                    array(
                        'name' => 'from_username',
                        'label' => trans('message.from'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->from_username;
                        }
                    ),
                    array(
                        'name' => 'subject',
                        'label' => trans('message.subject'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->subject;
                        }
                    ),
                    array(
                        'name' => 'created_at',
                        'label' => trans('message.date'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                            'attr' => array('class' => 'daterange'),
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->created_at;
                        }
                    ),
                    array(
                        'name' => 'action',
                        'label' => trans('app.action'),
                        'sortable' => false,
                        'searchable' => false,
                        'searchfield' => null,
                        'width' => 'auto',
                        'value' => function ($row) {
                            return '<a href="' . route('message.delete', ['id' => $row->id]) . '" class="btn btn-danger btn-xs delete text-white">' . trans('app.delete') . '</a>';
                        }
                    ),
                )
            );

        return view('message.groupunread', ['grid' => $grid]);
    }
    public function groupsent(Request $request)
    {

        //Get model
        $this->message->pushCriteria(new \App\Criteria\MessageCriteria('sent'));
        $messages = $this->message;

        //Setup grid
        $grid = new Grid();
        $grid->setGridName('message-grid')->setBaseUrl(route('message'))
            ->setPaginator($messages, 'created_at', 'desc', 25)
            ->setMainActions(//Optional
                array(
                    array(
                        'name' => 'inbox',
                        'title' => trans('message.inbox'),
                        'url' => route('group.group')
                    ),
                    array(
                        'name' => 'sent',
                        'title' => trans('message.sent'),
                        'url' => route('group.viewsent')
                    ),
                    array(
                        'name' => 'trash',
                        'title' => trans('message.trash'),
                        'url' => route('message.trash')
                    ),
                )
            )
            ->setColumns(
                array(
                    array(
                        'name' => 'to_username',
                        'label' => trans('message.recepient'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {

                            return $row->to_username;
                        }
                    ),
                    array(
                        'name' => 'subject',
                        'label' => trans('message.subject'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->subject;
                        }
                    ),
                    array(
                        'name' => 'created_at',
                        'label' => trans('message.date'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                            'attr' => array('class' => 'daterange'),
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->created_at;
                        }
                    ),
                )
            );

        return view('message.groupsent', ['grid' => $grid]);
    }
    public function grouptrash(Request $request)
    {

        //Get model
        $this->message->pushCriteria(new \App\Criteria\MessageCriteria('trash'));
        $messages = $this->message;

        //Setup grid
        $grid = new Grid();
        $grid->setGridName('message-grid')->setBaseUrl(route('message'))
            ->setPaginator($messages, 'created_at', 'desc', 25)
            ->setMainActions(//Optional
                array(
                    array(
                        'name' => 'inbox',
                        'title' => trans('message.inbox'),
                        'url' => route('group.group')
                    ),
                    array(
                        'name' => 'sent',
                        'title' => trans('message.sent'),
                        'url' => route('group.viewsent')
                    ),
                    array(
                        'name' => 'trash',
                        'title' => trans('message.trash'),
                        'url' => route('group.trash')
                    ),
                )
            )
            ->setColumns(
                array(
                    array(
                        'name' => 'from_username',
                        'label' => trans('message.from'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->from_username;
                        }
                    ),
                    array(
                        'name' => 'subject',
                        'label' => trans('message.subject'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->subject;
                        }
                    ),
                    array(
                        'name' => 'created_at',
                        'label' => trans('message.date'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                            'attr' => array('class' => 'daterange'),
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->created_at;
                        }
                    ),
                )
            );

        return view('message.grouptrash', ['grid' => $grid]);
    }
    public function groupmessagesent(Request $request)
    {
        $user = Auth::user();
        $users = $this->user->findByField('parent_id', $user->id);
        $array = [];
        $array2 = [];
        $users = DB::table('users')->where('parent_id', $user->id)->get()->toArray();
        $array = array();
        foreach ($users as $list) {
            //second level query
            $second_level = DB::table('users')->where('parent_id', $list->id)->get()->toArray();
            //loop to fetch second level query
            foreach ($second_level as $second) {
                //third level query
                $third_level = DB::table('users')->where('parent_id', $second->id)->get()->toArray();
                //loop to fetch third level query
                foreach ($third_level as $third) {
                    //forth level query
                    $forth_level = DB::table('users')->where('parent_id', $third->id)->get()->toArray();
                    //loop to fetech third level query
                    foreach ($forth_level as $forth) {
                        $forth_level_array = [
                            'id' => $forth->id,
                            'first_name' => $forth->first_name,
                            'last_name' => $forth->last_name,
                            'photo' => $forth->photo,
                            'username' => $forth->username,
                            'email' => $forth->email,
                            'phone' => $forth->phone,
                            'address1' => $forth->address1,
                            'address2' => $forth->address2,
                            'city' => $forth->city,
                            'state' => $forth->state,
                            'zip' => $forth->zip,
                            'country' => $forth->country,
                            'timezone' => $forth->timezone,
                            'facebook_url' => $forth->facebook_url,
                            'twitter_url' => $forth->twitter_url,
                            'instagram_url' => $forth->instagram_url,
                            'snapchat_url' => $forth->snapchat_url,
                            'skype_id' => $forth->skype_id,
                            'google_hangout_id' => $forth->google_hangout_id,
                            'bio' => $forth->bio,
                            'is_admin' => $forth->is_admin,
                            'is_active' => $forth->is_active,
                            'prevent_users_to_see_email' => $forth->prevent_users_to_see_email,
                            'prevent_users_to_see_phone' => $forth->prevent_users_to_see_phone,
                            'prevent_users_to_comments_messages' => $forth->prevent_users_to_comments_messages,
                            'remember_token' => $forth->remember_token,
                            'created_at' => $forth->created_at,
                            'updated_at' => $forth->updated_at,
                            'verified' => $forth->verified,
                            'verification_token' => $forth->verification_token,
                            'not_now' => $forth->not_now,

                        ];
                        array_push($array, $forth_level_array);
                    }
                    $third_level_array = [
                        'id' => $third->id,
                        'first_name' => $third->first_name,
                        'last_name' => $third->last_name,
                        'photo' => $third->photo,
                        'username' => $third->username,
                        'email' => $third->email,
                        'phone' => $third->phone,
                        'address1' => $third->address1,
                        'address2' => $third->address2,
                        'city' => $third->city,
                        'state' => $third->state,
                        'zip' => $third->zip,
                        'country' => $third->country,
                        'timezone' => $third->timezone,
                        'facebook_url' => $third->facebook_url,
                        'twitter_url' => $third->twitter_url,
                        'instagram_url' => $third->instagram_url,
                        'snapchat_url' => $third->snapchat_url,
                        'skype_id' => $third->skype_id,
                        'google_hangout_id' => $third->google_hangout_id,
                        'bio' => $third->bio,
                        'is_admin' => $third->is_admin,
                        'is_active' => $third->is_active,
                        'prevent_users_to_see_email' => $third->prevent_users_to_see_email,
                        'prevent_users_to_see_phone' => $third->prevent_users_to_see_phone,
                        'prevent_users_to_comments_messages' => $third->prevent_users_to_comments_messages,
                        'remember_token' => $third->remember_token,
                        'created_at' => $third->created_at,
                        'updated_at' => $third->updated_at,
                        'verified' => $third->verified,
                        'verification_token' => $third->verification_token,
                        'not_now' => $third->not_now,
                    ];
                    array_push($array, $third_level_array);
                }
                $second_level_array = array(
                    'id' => $second->id,
                    'first_name' => $second->first_name,
                    'last_name' => $second->last_name,
                    'photo' => $second->photo,
                    'username' => $second->username,
                    'email' => $second->email,
                    'phone' => $second->phone,
                    'address1' => $second->address1,
                    'address2' => $second->address2,
                    'city' => $second->city,
                    'state' => $second->state,
                    'zip' => $second->zip,
                    'country' => $second->country,
                    'timezone' => $second->timezone,
                    'facebook_url' => $second->facebook_url,
                    'twitter_url' => $second->twitter_url,
                    'instagram_url' => $second->instagram_url,
                    'snapchat_url' => $second->snapchat_url,
                    'skype_id' => $second->skype_id,
                    'google_hangout_id' => $second->google_hangout_id,
                    'bio' => $second->bio,
                    'is_admin' => $second->is_admin,
                    'is_active' => $second->is_active,
                    'prevent_users_to_see_email' => $second->prevent_users_to_see_email,
                    'prevent_users_to_see_phone' => $second->prevent_users_to_see_phone,
                    'prevent_users_to_comments_messages' => $second->prevent_users_to_comments_messages,
                    'remember_token' => $second->remember_token,
                    'created_at' => $second->created_at,
                    'updated_at' => $second->updated_at,
                    'verified' => $second->verified,
                    'verification_token' => $second->verification_token,
                    'not_now' => $second->not_now,
                );
                array_push($array, $second_level_array);
            }
            $array2 = [
                'id' => $list->id,
                'first_name' => $list->first_name,
                'last_name' => $list->last_name,
                'photo' => $list->photo,
                'username' => $list->username,
                'email' => $list->email,
                'phone' => $list->phone,
                'address1' => $list->address1,
                'address2' => $list->address2,
                'city' => $list->city,
                'state' => $list->state,
                'zip' => $list->zip,
                'country' => $list->country,
                'timezone' => $list->timezone,
                'facebook_url' => $list->facebook_url,
                'twitter_url' => $list->twitter_url,
                'instagram_url' => $list->instagram_url,
                'snapchat_url' => $list->snapchat_url,
                'skype_id' => $list->skype_id,
                'google_hangout_id' => $list->google_hangout_id,
                'bio' => $list->bio,
                'is_admin' => $list->is_admin,
                'is_active' => $list->is_active,
                'prevent_users_to_see_email' => $list->prevent_users_to_see_email,
                'prevent_users_to_see_phone' => $list->prevent_users_to_see_phone,
                'prevent_users_to_comments_messages' => $list->prevent_users_to_comments_messages,
                'remember_token' => $list->remember_token,
                'created_at' => $list->created_at,
                'updated_at' => $list->updated_at,
                'verified' => $list->verified,
                'verification_token' => $list->verification_token,
                'not_now' => $list->not_now,
            ];
            array_push($array, $array2);
        }
        $user = Auth::user();
        foreach ($array as $list)
        {
            $data = DB::table('messages')->insert([
                'from_user_id'=>$user->id,
                'from_username'=>$user->username,
                'to_user_id'=>$list['id'],
                'to_username'=>$list['username'],
                'subject'=>$request->input('subject'),
                'message'=>$request->input('message')
            ]);
        }
        if ($data)
        {
            return redirect()->route('group.group')
                ->with('success', 'Messages sent successfully');
        }
    }
    public function groupupdate_delete($id)
    {
        $user = DB::table('messages')->where('id', $id)->update([
            'deleted' => 'YES'
        ]);
        if ($user) {
            return redirect()->route('group.group')->with('success', trans('message.message_deleted'));
        } else {
            return redirect()->route('group.group')->with('error', trans('message.message_not_deleted'));
        }
    }
    //end of group message methods
    public function unread(Request $request)
    {

        //Get model
        $this->message->pushCriteria(new \App\Criteria\MessageCriteria('unread'));
        $messages = $this->message;

        //Setup grid
        $grid = new Grid();
        $grid->setGridName('message-grid')->setBaseUrl(route('message'))
            ->setPaginator($messages, 'created_at', 'desc', 25)
            ->setMainActions(//Optional
                array(
                    array(
                        'name' => 'inbox',
                        'title' => trans('message.inbox'),
                        'url' => route('message')
                    ),
                    array(
                        'name' => 'unread',
                        'title' => trans('message.unread'),
                        'url' => route('message.unread')
                    ),
                    array(
                        'name' => 'sent',
                        'title' => trans('message.sent'),
                        'url' => route('message.sent')
                    ),
                    array(
                        'name' => 'trash',
                        'title' => trans('message.trash'),
                        'url' => route('message.trash')
                    ),
                )
            )
            ->setColumns(
                array(
                    array(
                        'name' => 'from_username',
                        'label' => trans('message.from'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->from_username;
                        }
                    ),
                    array(
                        'name' => 'subject',
                        'label' => trans('message.subject'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->subject;
                        }
                    ),
                    array(
                        'name' => 'created_at',
                        'label' => trans('message.date'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                            'attr' => array('class' => 'daterange'),
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->created_at;
                        }
                    ),
                    array(
                        'name' => 'action',
                        'label' => trans('app.action'),
                        'sortable' => false,
                        'searchable' => false,
                        'searchfield' => null,
                        'width' => 'auto',
                        'value' => function ($row) {
                            return '<a href="' . route('message.delete', ['id' => $row->id]) . '" class="btn btn-danger btn-xs delete text-white">' . trans('app.delete') . '</a>';
                        }
                    ),
                )
            );

        return view('message.unread', ['grid' => $grid]);
    }

    /**
     * Show sent
     *
     * @return Response
     */
    public function sent(Request $request)
    {

        //Get model
        $this->message->pushCriteria(new \App\Criteria\MessageCriteria('sent'));
        $messages = $this->message;

        //Setup grid
        $grid = new Grid();
        $grid->setGridName('message-grid')->setBaseUrl(route('message'))
            ->setPaginator($messages, 'created_at', 'desc', 25)
            ->setMainActions(//Optional
                array(
                    array(
                        'name' => 'inbox',
                        'title' => trans('message.inbox'),
                        'url' => route('message')
                    ),
                    array(
                        'name' => 'sent',
                        'title' => trans('message.sent'),
                        'url' => route('message.sent')
                    ),
                    array(
                        'name' => 'trash',
                        'title' => trans('message.trash'),
                        'url' => route('message.trash')
                    ),
                )
            )
            ->setColumns(
                array(
                    array(
                        'name' => 'to_username',
                        'label' => trans('message.recepient'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {

                            return $row->to_username;
                        }
                    ),
                    array(
                        'name' => 'subject',
                        'label' => trans('message.subject'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->subject;
                        }
                    ),
                    array(
                        'name' => 'created_at',
                        'label' => trans('message.date'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                            'attr' => array('class' => 'daterange'),
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->created_at;
                        }
                    ),
                )
            );

        return view('message.sent', ['grid' => $grid]);
    }

    /**
     * Show trash
     *
     * @return Response
     */
    public function trash(Request $request)
    {

        //Get model
        $this->message->pushCriteria(new \App\Criteria\MessageCriteria('trash'));
        $messages = $this->message;

        //Setup grid
        $grid = new Grid();
        $grid->setGridName('message-grid')->setBaseUrl(route('message'))
            ->setPaginator($messages, 'created_at', 'desc', 25)
            ->setMainActions(//Optional
                array(
                    array(
                        'name' => 'inbox',
                        'title' => trans('message.inbox'),
                        'url' => route('message')
                    ),
                    array(
                        'name' => 'sent',
                        'title' => trans('message.sent'),
                        'url' => route('message.sent')
                    ),
                    array(
                        'name' => 'trash',
                        'title' => trans('message.trash'),
                        'url' => route('message.trash')
                    ),
                )
            )
            ->setColumns(
                array(
                    array(
                        'name' => 'from_username',
                        'label' => trans('message.from'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->from_username;
                        }
                    ),
                    array(
                        'name' => 'subject',
                        'label' => trans('message.subject'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->subject;
                        }
                    ),
                    array(
                        'name' => 'created_at',
                        'label' => trans('message.date'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                            'attr' => array('class' => 'daterange'),
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->created_at;
                        }
                    ),
                )
            );

        return view('message.trash', ['grid' => $grid]);
    }

    /**
     * Save Message
     *
     * @param MessageSaveRequest $request
     * @return Redirect
     */
    public function send(MessageSaveRequest $request)
    {
        $data = $request->except(['_token']);
        $user = Auth::user();
        $data['from_user_id'] = $user->id;
        $data['from_username'] = $user->username;
        $toUser = $this->user->findByField('username', $data['to_username'])->first();
        $data['to_user_id'] = $toUser->id;

        if ($message = $this->message->create($data)) {
            $response = array(
                'status' => 'success',
                'message' => trans('message.message_sent'),
                'redirect_url' => route('message')
            );
        } else {
            $response = array(
                'status' => 'error',
                'message' => trans('message.message_not_sent'),
                'redirect_url' => route('message')
            );
        }

        return $response;
    }

    /**
     * Delete Message
     *
     * @param Request $request
     * @param integer $messageId
     * @return Redirect
     */
    public function delete(Request $request, $messageId)
    {
        if ($this->message->delete($messageId)) {
            return redirect()->route('message')->with('success', trans('message.message_deleted'));
        } else {
            return redirect()->route('message')->with('error', trans('message.message_not_deleted'));
        }
    }

    public function update_delete($id)
    {
        $user = DB::table('messages')->where('id', $id)->update([
            'deleted' => 'YES'
        ]);
        if ($user) {
            return redirect()->route('message')->with('success', trans('message.message_deleted'));
        } else {
            return redirect()->route('message')->with('error', trans('message.message_not_deleted'));
        }
    }
}
