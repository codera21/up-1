<?php
return [
    /*
    |--------------------------------------------------------------------------
    | General
    |--------------------------------------------------------------------------
    */
    'release' => 'release-1.0',
    'sitename' => 'DNAsbook Digital Marketing',
    'address' => '',
    'email' => 'yahiadjipe@yahoo.com',
    'phone' => '123-1234-1234',
    'phone1' => '123456464',
    'website' => '',
    
    'support_email' => '',
    'support_phone' => '',
    
    'noreply_email' => '',
    /*
    |--------------------------------------------------------------------------
    | Date and Time Format
    |--------------------------------------------------------------------------
    */
    'site_date_format' => 'm/d/Y',
    'site_datetime_format' => 'm/d/Y H:i',
    'database_date_format' => 'Y-m-d',
    'database_datetime_format' => 'Y-m-d H:i:s',
    'file_datetime_format' => 'Y-M-d_H-i',
    
    /*
    |--------------------------------------------------------------------------
    | Import and Export Limit
    |--------------------------------------------------------------------------
    */
    'export_max_limit' => 1000,
    
    
    
    
    /*
    |--------------------------------------------------------------------------
    | Logs
    |--------------------------------------------------------------------------
    */
    'log' => [
            'test'   =>  storage_path('logs/test/test.log'),
            'login'   =>  storage_path('logs/login/login.log'),
            'registration' => storage_path('logs/registration/registration.log'),
            'payment' => storage_path('logs/payment/payment.log'),
            'offlinepayment' => storage_path('logs/offline-payment/offlinepayment.log'),
            'onlinepayment' => storage_path('logs/online-payment/onlinepayment.log'),
            
            ],
            
    
    /*
    |--------------------------------------------------------------------------
    | Pagination
    |--------------------------------------------------------------------------
    */
    'pagination_limit' => '25',
    
    /*
    |--------------------------------------------------------------------------
    | TCPDF
    |--------------------------------------------------------------------------
    */
    'tcpdf' => [
        'lang'   =>  [
            // Meta
            'a_meta_charset' => 'UTF-8',
            'a_meta_charset' => 'ltr',
            'a_meta_language' => 'en',

            //Translation
            'w_page' => 'page'
        ],
    ],
];