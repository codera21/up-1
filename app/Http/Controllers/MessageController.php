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
    public function json_data()
    {
        $data = DB::table('users')->get();
        echo json_encode($data);
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
