<?php

Route::pattern('id', '\d+');
Route::pattern('id', '[A-Za-z0-9-]+');
Route::pattern('hash', '[a-z0-9]+');
Route::pattern('hex', '[a-f0-9]+');
Route::pattern('uuid', '[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}');
Route::pattern('base', '[a-zA-Z0-9]+');
Route::pattern('slug', '[a-z0-9-]+');
Route::pattern('username', '(.*)');
Route::pattern('any', '(.*)');

Route::get('locale/{locale}', function ($locale) {
    \Session::put('locale', $locale);
    return redirect()->back();
});

Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    return redirect()->back();
});

Route::get('/clear-config', function () {
    $exitCode = Artisan::call('config:clear');
    return redirect()->back();
});
Route::group(['middleware' => ['fe.navigation', 'fe.breadcrumbs']], function () {
    Route::get('/', ['as' => 'home', 'uses' => 'PageController@index']);
    Route::get('/active', ['as' => '.active', 'uses' => 'PageController@active']);
    Route::group(['as' => 'view_user', 'prefix' => 'view_user'], function () {
        Route::get('/{id}', ['as' => '.{username}', 'uses' => 'UserController@public_profile']);
    });

    // Authentication Routes...
    Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('login', 'Auth\LoginController@login');
    Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
    Route::get('hcl/{id_id_id}', ['as' => 'hcl', 'uses' => 'ipnController@smp']);
    Route::get('/hcl_hcl/{id_id_id}', ['as' => '.hcl_hcl', 'uses' => 'ipnController@smp1']);


    // Registration Routes...
    Route::get('register/{id}', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
    Route::post('register/{id}', ['as' => 'register', 'uses' => 'Auth\RegisterController@register']);

    // Password Reset Routes...
    Route::get('password/reset', ['as' => 'password.forgot', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset/{token}', ['as' => 'password.reset', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
    Route::post('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ResetPasswordController@reset']);

    // All below pages will be in Page Controller
    // FAQs
    Route::get('/faq', ['as' => 'faq', 'uses' => 'PageController@faq']);
    Route::get('/about', ['as' => 'about', 'uses' => 'PageController@about']);
    // News
    Route::group(['as' => 'news', 'prefix' => 'news'], function () {
        Route::get('/', ['as' => '', 'uses' => 'PageController@news']);
        Route::get('/details/{id}', ['as' => '.details', 'uses' => 'PageController@newsDetails']);
    });

    // Contact Us
    Route::get('contact', ['as' => 'contact', 'uses' => 'PageController@contact']);
    Route::post('contact', ['as' => 'contact', 'uses' => 'PageController@postContact']);
    Route::get('pages/{slug}', ['as' => 'pages', 'uses' => 'PageController@pages']);

    // IPN Listener
    Route::post('ipn', ['as' => 'ipn', 'uses' => 'IpnController@ipn']);
//for frontend company_profile
    Route::get('companylist/{id}', ['as' => 'frontend_company', 'uses' => 'CompanyProfileController@for_frontend']);
});

/*
 *   payments
 */
Route::group(['middleware' => ['auth', 'fe.navigation', 'fe.breadcrumbs']], function () {
    // Offline Payments
    Route::group(['as' => 'offline-payment', 'prefix' => 'offline-payment'], function () {
        Route::get('/', ['as' => '', 'uses' => 'OfflinePaymentController@index']);
        Route::get('/add', ['as' => '.add', 'uses' => 'OfflinePaymentController@add']);
        Route::post('/add', ['as' => '.add', 'uses' => 'OfflinePaymentController@save']);
        Route::get('/edit/{id}', ['as' => '.edit', 'uses' => 'OfflinePaymentController@edit']);
        Route::put('/edit/{id}', ['as' => '.edit', 'uses' => 'OfflinePaymentController@update'])->middleware('ajax');
        Route::delete('/delete/{id}', ['as' => '.delete', 'uses' => 'OfflinePaymentController@delete'])->middleware('ajax');

        // Show Material's Box loaded from Sub Group
        Route::post('/show-material', ['as' => '.show-material', 'uses' => 'OfflinePaymentController@showMaterial']);
    });
    // Online Payments
    Route::group(['as' => 'online-payment', 'prefix' => 'online-payment'], function () {
        Route::get('/', ['as' => '', 'uses' => 'OnlinePaymentController@index']);
        Route::get('/add', ['as' => '.add', 'uses' => 'OnlinePaymentController@add']);
        Route::post('/add', ['as' => '.add', 'uses' => 'OnlinePaymentController@saveRecurringPayment']);
        Route::get('/success', ['as' => '.success', 'uses' => 'OnlinePaymentController@successRecurringPayment']);
        Route::get('/cancel', ['as' => '.cancel', 'uses' => 'OnlinePaymentController@cancelRecurringPayment']);
        Route::get('/not_now', ['as' => '.notNow', 'uses' => 'OnlinePaymentController@notNow']);
        Route::get('/success', ['as' => '.success', 'uses' => 'OnlinePaymentController@success']);
        Route::get('/fail', ['as' => '.fail', 'uses' => 'OnlinePaymentController@fail']);

        // One Time Payment
        Route::post('/create-onetime-payment', ['as' => '.create-onetime-payment', 'uses' => 'OnlinePaymentController@createOneTimePayment']);
        Route::post('/execute-onetime-payment', ['as' => '.execute-onetime-payment', 'uses' => 'OnlinePaymentController@executeOneTimePayment']);
        Route::get('/cancel-onetime-payment', ['as' => '.cancel-onetime-payment', 'uses' => 'OnlinePaymentController@cancelOneTimePayment']);
        // Show Material's Box loaded from Sub Group
        Route::post('/show-material', ['as' => '.show-material', 'uses' => 'OnlinePaymentController@showMaterial']);
        Route::get('/activate', ['as' => '.activate', 'uses' => 'OnlinePaymentController@activate']);
    });
});


/*
|--------------------------------------------------------------------------
| Private
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth', 'fe.navigation', 'fe.breadcrumbs', 'isVerified', 'isActive']], function () {
    Route::group(['as' => 'user', 'prefix' => 'user'], function () {
        Route::get('/dashboard', ['as' => '.dashboard', 'uses' => 'UserController@dashboard']);
        Route::get('/account', ['as' => '.account', 'uses' => 'UserController@edit']);
        Route::post('/account', ['as' => '.account', 'uses' => 'UserController@update']);
        Route::get('/tree', ['as' => '.tree', 'uses' => 'UserController@tree_list']);
        Route::get('/pagination', ['as' => '.pagination', 'uses' => 'UserController@pagination']);
        Route::post('/{username}/comment', ['as' => '.{username}.comment', 'uses' => 'CommentController@save']);
        Route::get('/{username}', ['as' => '.{username}', 'uses' => 'UserController@profile']);
        Route::post('/{username}/goal', ['as' => '.{username}.goal', 'uses' => 'UserGoalController@save']);

    });
    Route::group(['as' => 'company_dashboard', 'prefix' => 'company'], function () {
        Route::get('/', ['as' => '.dashboard', 'uses' => 'CompanyProfileController@fetch_data']);
        Route::get('/edit/{id}', ['as' => '.edit', 'uses' => 'CompanyProfileController@edit']);
        Route::post('/update/{id}', ['as' => '.update', 'uses' => 'CompanyProfileController@update']);
    });
    //offline payment
    Route::group(['as' => 'offline_pay', 'prefix' => 'offline_pay'], function () {
        Route::get('/', ['as' => '.offline_pay', 'uses' => 'OfflinePaymentController@offline']);
        Route::post('/add', ['as' => '.add', 'uses' => 'OfflinePaymentController@offline_add']);
        Route::get('/verify', ['as' => '.verify', 'uses' => 'OfflinePaymentController@verify']);
        Route::get('/search', ['as' => '.search', 'uses' => 'OfflinePaymentController@search']);
        /*Route::get('/edit/{id}', ['as' => '.edit', 'uses' => 'CompanyProfileController@edit']);
        Route::post('/update/{id}', ['as' => '.update', 'uses' => 'CompanyProfileController@update']);*/
    });

    Route::group(['as' => 'testo', 'prefix' => 'testo'], function () {
        Route::get('/', ['as' => '.dashboard', 'uses' => 'TestoController@index']);
        Route::get('/add', ['as' => '.add', 'uses' => 'TestoController@add']);
        Route::get('/store', ['as' => '.store', 'uses' => 'TestoController@store']);
        Route::get('/delete/{id}', ['as' => '.delete', 'uses' => 'TestoController@destroy']);
        Route::get('/edit/{id}', ['as' => '.edit', 'uses' => 'TestoController@edit']);
        Route::get('/update/{id}', ['as' => '.update', 'uses' => 'TestoController@update']);
    });
    Route::group(['as' => 'photo', 'prefix' => 'photo'], function () {
        Route::get('/', ['as' => '.dashboard', 'uses' => 'CompanyPhotoController@index']);
        Route::get('/add', ['as' => '.add', 'uses' => 'CompanyPhotoController@add']);
        Route::get('/edit/{id}', ['as' => '.edit', 'uses' => 'CompanyPhotoController@edit']);
        Route::post('/store', ['as' => '.store', 'uses' => 'CompanyPhotoController@store']);
        Route::get('/delete/{id}', ['as' => '.delete', 'uses' => 'CompanyPhotoController@destroy']);
    });

    Route::group(['as' => 'company-profile', 'prefix' => 'companyprofile'], function () {
        Route::get('/', ['as' => '.index', 'uses' => 'CompanyProfileController@index']);
    });
    // Payment
    Route::group(['as' => 'payment-profile', 'prefix' => 'payment-profile'], function () {
        Route::get('/', ['as' => '', 'uses' => 'PaymentProfileController@index']);
        Route::get('/add-profile', ['as' => '.add-profile', 'uses' => 'PaymentProfileController@addProfile']);
        Route::post('/add-profile', ['as' => '.add-profile', 'uses' => 'PaymentProfileController@saveProfile']);
        Route::get('/set-default/{id}', ['as' => '.set-default', 'uses' => 'PaymentProfileController@setDefault']);
        Route::delete('/delete/{id}', ['as' => '.delete', 'uses' => 'PaymentProfileController@delete']);
    });

    // Payments history
    Route::group(['as' => 'payment-history', 'prefix' => 'payment-history'], function () {
        Route::get('/', ['as' => '', 'uses' => 'UserPaymentHistoryController@index']);
        Route::get('/detail/{id}', ['as' => '.detail', 'uses' => 'UserPaymentHistoryController@detail']);
    });
    // Commission history
    Route::group(['as' => 'commission', 'prefix' => 'commission'], function () {
        Route::get('/', ['as' => '', 'uses' => 'UserCommissionController@index']);
    });
    // My Academy
    Route::group(['as' => 'user-academy', 'prefix' => 'user-academy'], function () {
        Route::get('/video', ['as' => '.video', 'uses' => 'UserAcademyController@view_video']);
        Route::get('/course', ['as' => '.course', 'uses' => 'UserAcademyController@view_course']);
        Route::get('/viewpdf/{id}', ['as' => '.viewpdf', 'uses' => 'UserAcademyController@viewPdf']);
        Route::get('/view/{id}', ['as' => '.view', 'uses' => 'UserAcademyController@viewMaterial'])->middleware('checkMaterialPayment');
        Route::get('/viewGroup/{id}', ['as' => '.viewGroup', 'uses' => 'UserAcademyController@viewGroup'])->middleware('checkGroupPayment');
        Route::get('/courseGroup/{id}', ['as' => '.courseGroup', 'uses' => 'UserAcademyController@courseGroup'])->middleware('checkGroupPayment');
        Route::get('/group-material-payment/{id}', ['as' => '.groupMaterialPayment', 'uses' => 'UserAcademyController@groupMaterialPayment']);
        Route::get('/material-payment/{id}', ['as' => '.materialPayment', 'uses' => 'UserAcademyController@materialPayment']);
        Route::get('/payment-success/{any}/{id}', ['as' => '.paymentSuccess', 'uses' => 'UserAcademyController@paymentSuccess']);
    });
    // Messaging
    Route::group(['as' => 'message', 'prefix' => 'message'], function () {
        Route::get('/unread', ['as' => '.unread', 'uses' => 'MessageController@unread']);
        Route::get('/sent', ['as' => '.sent', 'uses' => 'MessageController@sent']);
        Route::get('/inbox', ['as' => '.inbox', 'uses' => 'MessageController@inbox']);
        Route::get('/trash', ['as' => '.trash', 'uses' => 'MessageController@trash']);
        Route::delete('/update_delete/{id}', ['as' => '.delete', 'uses' => 'MessageController@update_delete']);
        Route::post('/send', ['as' => '.send', 'uses' => 'MessageController@send'])->middleware('ajax');
        Route::get('/{username?}', ['as' => '', 'uses' => 'MessageController@index']);
    });
});

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth', 'be.navigation', 'be.breadcrumbs', 'checkadmin'], 'prefix' => 'admin'], function () {
    // Dashboard
    Route::any('/', ['as' => 'admin.dashboard', 'uses' => 'Admin\IndexController@index', 'can' => 'access.admin.dashboard']);
    // Users
    Route::group(['as' => 'admin.user', 'prefix' => 'user'], function () {
        Route::get('/', ['as' => '', 'uses' => 'Admin\UserController@index']);
        Route::get('/detail/{id}', ['as' => '.detail', 'uses' => 'Admin\UserController@detail']);
        /*Route::get('/user_commission', ['as' => '.user_commission', 'uses' => 'Admin\UserController@test']);*/
        Route::get('/user_commission', ['as' => '.user_commission', 'uses' => 'Admin\UserController@test2']);
        Route::get('/details/{id}', ['as' => '.details', 'uses' => 'Admin\UserController@details']);
        Route::get('/test', ['as' => '.test', 'uses' => 'Admin\UserController@test']);
        Route::get('/edit/{id}', ['as' => '.edit', 'uses' => 'Admin\UserController@edit']);
        Route::put('/edit/{id}', ['as' => '.edit', 'uses' => 'Admin\UserController@update']);
        Route::get('/tree', ['as' => '.tree', 'uses' => 'Admin\UserController@treeView']);
        Route::delete('/delete/{id}', ['as' => '.delete', 'uses' => 'Admin\UserController@delete']);
        Route::get('/goals/{id}', ['as' => '.goals', 'uses' => 'Admin\UserController@userGoals']);
    });

    /*for password check*/
    // Goals
    Route::group(['as' => 'admin.goal', 'prefix' => 'goal'], function () {
        Route::get('/', ['as' => '', 'uses' => 'Admin\GoalController@index']);
        Route::get('/add', ['as' => '.add', 'uses' => 'Admin\GoalController@add']);
        Route::post('/add', ['as' => '.add', 'uses' => 'Admin\GoalController@save']);
        Route::get('/edit/{id}', ['as' => '.edit', 'uses' => 'Admin\GoalController@edit']);
        Route::put('/edit/{id}', ['as' => '.edit', 'uses' => 'Admin\GoalController@update']);
        Route::delete('/delete/{id}', ['as' => '.delete', 'uses' => 'Admin\GoalController@delete']);

    });
    //offline payment
    Route::group(['as' => 'admin.offline_pay', 'prefix' => 'offline_pay'], function () {
        Route::get('/', ['as' => '', 'uses' => 'Admin\BankController@offline_pay']);
        Route::get('/details/{id}', ['as' => '.details', 'uses' => 'Admin\BankController@details']);
    });

    // News
    Route::group(['as' => 'admin.news', 'prefix' => 'news'], function () {
        Route::get('/', ['as' => '', 'uses' => 'Admin\NewsController@index']);
        Route::get('/add', ['as' => '.add', 'uses' => 'Admin\NewsController@add']);
        Route::post('/add', ['as' => '.add', 'uses' => 'Admin\NewsController@save']);
        Route::get('/edit/{id}', ['as' => '.edit', 'uses' => 'Admin\NewsController@edit']);
        Route::put('/edit/{id}', ['as' => '.edit', 'uses' => 'Admin\NewsController@update']);
        Route::delete('/delete/{id}', ['as' => '.delete', 'uses' => 'Admin\NewsController@delete']);

    });

    // Levels
    Route::group(['as' => 'admin.level', 'prefix' => 'level'], function () {
        Route::get('/', ['as' => '', 'uses' => 'Admin\LevelController@index']);
        Route::get('/add', ['as' => '.add', 'uses' => 'Admin\LevelController@add']);
        Route::post('/add', ['as' => '.add', 'uses' => 'Admin\LevelController@save']);
        Route::get('/edit/{id}', ['as' => '.edit', 'uses' => 'Admin\LevelController@edit']);
        Route::put('/edit/{id}', ['as' => '.edit', 'uses' => 'Admin\LevelController@update']);
        Route::delete('/delete/{id}', ['as' => '.delete', 'uses' => 'Admin\LevelController@delete']);

    });

    // FAQs
    Route::group(['as' => 'admin.faq', 'prefix' => 'faq'], function () {
        Route::get('/', ['as' => '', 'uses' => 'Admin\FAQController@index']);
        Route::get('/add', ['as' => '.add', 'uses' => 'Admin\FAQController@add']);
        Route::post('/add', ['as' => '.add', 'uses' => 'Admin\FAQController@save']);
        Route::get('/edit/{id}', ['as' => '.edit', 'uses' => 'Admin\FAQController@edit']);
        Route::put('/edit/{id}', ['as' => '.edit', 'uses' => 'Admin\FAQController@update']);
        Route::delete('/delete/{id}', ['as' => '.delete', 'uses' => 'Admin\FAQController@delete']);

    });
    //About us
    Route::group(['as' => 'admin.about', 'prefix' => 'about'], function () {
        Route::get('/', ['as' => '', 'uses' => 'Admin\PageController@aboutindex']);
        Route::get('/add', ['as' => '.add', 'uses' => 'Admin\PageController@aboutadd']);
        Route::post('/add', ['as' => '.add', 'uses' => 'Admin\PageController@aboutsave']);
        Route::get('/edit/{id}', ['as' => '.edit', 'uses' => 'Admin\PageController@aboutedit']);
        Route::put('/edit/{id}', ['as' => '.edit', 'uses' => 'Admin\PageController@aboutupdate']);
        Route::get('/delete/{id}', ['as' => '.delete', 'uses' => 'Admin\PageController@aboutdelete']);
    });

    // Material Group
    Route::group(['as' => 'admin.material-group', 'prefix' => 'material-group'], function () {
        Route::get('/', ['as' => '', 'uses' => 'Admin\MaterialGroupController@index']);
        Route::get('/add', ['as' => '.add', 'uses' => 'Admin\MaterialGroupController@add']);
        Route::post('/add', ['as' => '.add', 'uses' => 'Admin\MaterialGroupController@save']);
        Route::get('/edit/{id}', ['as' => '.edit', 'uses' => 'Admin\MaterialGroupController@edit']);
        Route::put('/edit/{id}', ['as' => '.edit', 'uses' => 'Admin\MaterialGroupController@update']);
        Route::delete('/delete/{id}', ['as' => '.delete', 'uses' => 'Admin\MaterialGroupController@delete']);

    });

    // Material Sub Group
    Route::group(['as' => 'admin.material-sub-group', 'prefix' => 'material-sub-group'], function () {
        Route::get('/', ['as' => '', 'uses' => 'Admin\MaterialSubGroupController@index']);
        Route::get('/add', ['as' => '.add', 'uses' => 'Admin\MaterialSubGroupController@add']);
        Route::post('/add', ['as' => '.add', 'uses' => 'Admin\MaterialSubGroupController@save']);
        Route::get('/edit/{id}', ['as' => '.edit', 'uses' => 'Admin\MaterialSubGroupController@edit']);
        Route::put('/edit/{id}', ['as' => '.edit', 'uses' => 'Admin\MaterialSubGroupController@update']);
        Route::delete('/delete/{id}', ['as' => '.delete', 'uses' => 'Admin\MaterialSubGroupController@delete']);

    });

    // Material
    Route::group(['as' => 'admin.material', 'prefix' => 'material'], function () {
        Route::get('/', ['as' => '', 'uses' => 'Admin\MaterialController@index']);
        Route::get('/add', ['as' => '.add', 'uses' => 'Admin\MaterialController@add']);
        Route::post('/add', ['as' => '.add', 'uses' => 'Admin\MaterialController@save']);
        Route::get('/edit/{id}', ['as' => '.edit', 'uses' => 'Admin\MaterialController@edit']);
        Route::put('/edit/{id}', ['as' => '.edit', 'uses' => 'Admin\MaterialController@update']);
        Route::delete('/delete/{id}', ['as' => '.delete', 'uses' => 'Admin\MaterialController@delete']);

    });

    // Subscription
    Route::group(['as' => 'admin.subscription', 'prefix' => 'subscription'], function () {
        Route::get('/edit/{id}', ['as' => '.edit', 'uses' => 'Admin\MaterialController@editSubscription']);
        Route::put('/edit/{id}', ['as' => '.edit', 'uses' => 'Admin\MaterialController@updateSubscription']);
    });

    // Commission
    Route::group(['as' => 'admin.user-commission', 'prefix' => 'user-commission'], function () {
        Route::get('/', ['as' => '', 'uses' => 'Admin\UserCommissionController@index']);
        Route::get('/add', ['as' => '.add', 'uses' => 'Admin\UserCommissionController@add']);
        Route::post('/add', ['as' => '.add', 'uses' => 'Admin\UserCommissionController@save']);
        Route::get('/edit/{id}', ['as' => '.edit', 'uses' => 'Admin\UserCommissionController@edit']);
        Route::put('/edit/{id}', ['as' => '.edit', 'uses' => 'Admin\UserCommissionController@update']);
        Route::delete('/delete/{id}', ['as' => '.delete', 'uses' => 'Admin\UserCommissionController@delete']);
        Route::get('/updateCommission', ['as' => '.update-commission', 'uses' => 'Admin\UserCommissionController@update_commission']);
    });

    // Manage Blocks
    Route::group(['as' => 'admin.block', 'prefix' => 'block'], function () {
        Route::get('/', ['as' => '', 'uses' => 'Admin\BlockController@index']);
        Route::get('/add', ['as' => '.add', 'uses' => 'Admin\BlockController@add']);
        Route::post('/add', ['as' => '.add', 'uses' => 'Admin\BlockController@save']);
        Route::get('/edit/{id}', ['as' => '.edit', 'uses' => 'Admin\BlockController@edit']);
        Route::put('/edit/{id}', ['as' => '.edit', 'uses' => 'Admin\BlockController@update']);
        Route::delete('/delete/{id}', ['as' => '.delete', 'uses' => 'Admin\BlockController@delete']);
    });

    // Manage Pages
    Route::group(['as' => 'admin.page', 'prefix' => 'page'], function () {
        Route::get('/', ['as' => '', 'uses' => 'Admin\PageController@index']);
        Route::get('/add', ['as' => '.add', 'uses' => 'Admin\PageController@add']);
        Route::post('/add', ['as' => '.add', 'uses' => 'Admin\PageController@save']);
        Route::get('/edit/{id}', ['as' => '.edit', 'uses' => 'Admin\PageController@edit']);
        Route::put('/edit/{id}', ['as' => '.edit', 'uses' => 'Admin\PageController@update']);
        Route::delete('/delete/{id}', ['as' => '.delete', 'uses' => 'Admin\PageController@delete']);
    });

    // Manage Profile
    Route::group(['as' => 'admin.manage-profile', 'prefix' => 'manage-profile'], function () {
        Route::get('/', ['as' => '', 'uses' => 'Admin\ProfileController@index']);
        Route::put('/', ['as' => '', 'uses' => 'Admin\ProfileController@update']);
        Route::put('/update-password', ['as' => '.update-password', 'uses' => 'Admin\ProfileController@updatePassword']);
    });

    // Manage Banks
    Route::group(['as' => 'admin.bank', 'prefix' => 'bank'], function () {
        Route::get('/', ['as' => '', 'uses' => 'Admin\BankController@index']);
        Route::get('/add', ['as' => '.add', 'uses' => 'Admin\BankController@add']);
        Route::post('/add', ['as' => '.add', 'uses' => 'Admin\BankController@save']);
        Route::get('/edit/{id}', ['as' => '.edit', 'uses' => 'Admin\BankController@edit']);
        Route::put('/edit/{id}', ['as' => '.edit', 'uses' => 'Admin\BankController@update']);
        Route::delete('/delete/{id}', ['as' => '.delete', 'uses' => 'Admin\BankController@delete']);
    });

    // Payment
    Route::group(['as' => 'admin.payment-profile', 'prefix' => 'payment-profile'], function () {
        Route::get('/', ['as' => '', 'uses' => 'Admin\PaymentProfileController@index']);
    });

    // Payments history
    Route::group(['as' => 'admin.payment-history', 'prefix' => 'payment-history'], function () {
        Route::get('/', ['as' => '', 'uses' => 'Admin\UserPaymentHistoryController@index']);
        Route::get('/detail/{id}', ['as' => '.detail', 'uses' => 'Admin\UserPaymentHistoryController@detail']);
    });

    // Manage Banners
    Route::group(['as' => 'admin.banner', 'prefix' => 'banner'], function () {
        Route::get('/', ['as' => '', 'uses' => 'Admin\BannerController@index']);
        Route::get('/add', ['as' => '.add', 'uses' => 'Admin\BannerController@add']);
        Route::post('/add', ['as' => '.add', 'uses' => 'Admin\BannerController@save']);
        Route::get('/edit/{id}', ['as' => '.edit', 'uses' => 'Admin\BannerController@edit']);
        Route::put('/edit/{id}', ['as' => '.edit', 'uses' => 'Admin\BannerController@update']);
        Route::delete('/delete/{id}', ['as' => '.delete', 'uses' => 'Admin\BannerController@delete']);
    });

});

// Remove conflict of Barryvdh Debugbar with slug / pages routes
//Route::get( '/_debugbar/assets/stylesheets', '\Barryvdh\Debugbar\Controllers\AssetController@css' );
//Route::get( '/_debugbar/assets/javascript', '\Barryvdh\Debugbar\Controllers\AssetController@js' );

// Please don't move this line other wise not route will work
Route::group(['middleware' => ['fe.navigation', 'fe.breadcrumbs']], function () {
    Route::model('page', '\App\Models\Page');
    /*Route::bind('page', function($value) {
         if(\Session::get('locale')){
             $language = \Session::get('locale');
         }else{
             $language = 'en';
         }
      return \App\Models\Page::where('slug', $value)->where('language', $language)->first();
  });*/
    Route::get('{page}', ['as' => 'page', 'uses' => 'PageController@index']);
});
