<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
// Request & Response
use App\Repositories\FAQRepository;
use App\Repositories\NewsRepository;
// Models and Repo

use App\Repositories\PageRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Form Requests
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mail;

class PageController extends Controller
{

    protected $page;
    protected $faq;
    protected $news;

    public function __construct(PageRepository $page, FAQRepository $faq, NewsRepository $news)
    {
        $this->page = $page;
        $this->faq = $faq;
        $this->news = $news;
    }

    public function index($page = null)
    {
        $language = App::getLocale();
        if ($page == null) {
            $pageName = 'home';
        } else {
            $pageName = $page->slug;
        }
        $page = $this->page->findWhere(['slug' => $pageName, 'language' => $language])->first();

        return view('page.page-right-sidebar');
    }

    /**
     * Show faq
     *
     * @return Response
     */
    public function faq(Request $request)
    {
        $faqs = DB::table('faqs')
            ->where('lang', App::getLocale())
            ->orderBYRaw('question + 0', 'ASC', 'question')
            ->get();
        return view('page.faq', ['faqs' => $faqs]);
    }

    public function about()
    {
        $lang = App::getLocale();
        $data = array(
            'lang' => $lang,
        );
        $data1['about_us'] = DB::table('about')->where($data)->get();
        /*dd($data1);*/
        return view('page.about', $data1);
    }

    /**
     * Show news
     *
     * @return Response
     */
    public function news(Request $request)
    {

        //$news = $this->news->all();
        $lang = App::getLocale();
        // get material group
        $news = DB::table('news')
            ->where('lang', $lang)
            ->get();
        return view('page.news', ['news' => $news]);
    }

    /**
     * Show news details
     *
     * @return Response
     */
    public function newsDetails($id)
    {

        $news = $this->news->find($id);

        return view('page.news-detail', ['news' => $news]);
    }


    public function contact(Request $request)
    {

        return view('page.contact-us');
    }

    public function postContact(ContactFormRequest $request)
    {
        Mail::send('emails.contact',
            array(
                'name' => $request->name,
                'email' => $request->email,
                'user_message' => $request->message,
            ), function ($message) use ($request) {
                $message->from($request->email);
                $message->to('yahiadjipe@yahoo.com', 'Admin')->subject('Dnasbook contact us');
            });
        return \Redirect::route('contact')->with('success', trans('Thanks for contacting us!'));
    }

    public function active()
    {
        return view('not_active');
    }

    public function pages($slug)
    {
        $lang = App::getLocale();
        $array = array('slug' => $slug, 'language' => $lang);
        $data['data'] = DB::table('pages')->where($array)->get();
        return view('page.pages', $data);
    }

    public function cancel()
    {
        $userID = Auth::user()->id;

        DB::table('users')
            ->where('id', $userID)
            ->update(['is_active' => 'No']);
    }

    public function ban()
    {
        return view('page.ban');
    }
}
