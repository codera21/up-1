<?php

return [
    'dashboard' => 'Dashboard',
    'profile' => 'Profile',
    'account' => 'Account Settings',
    'tree' => 'User Subscribers Tree',

    // Group
    'title' => 'Title',
    'material_type' => 'Material Type',
    'material_group' => 'Material Group',
    'material_level' => 'Material Level',

    // Buttons
    'details' => 'Details',
    'back' => 'Back',
    'action' => 'Action',
    'close' => 'Close',
    'save_changes' => 'Save Changes',
    'delete' => 'Delete',

    'id' => 'ID',

    'group' => 'Group',
    'level' => 'Level',
    'video_material' => 'Video / Course',
    'start_date' => 'Start Date',
    'end_date' => 'End Date',

    'amount' => 'Amount',

    'not_active' => 'Your Account is blocked due to non-payment of subscription fees! To reopen your account, please pay your subscription fees!',
    'click_here' => 'Click Here',

    'payment_message' => '<b class="text-danger">Important</b>: After paying your fees through PayPal, you must click the
            button "Return to Merchant" at the end of the page to go back to our site otherwise our site will not accept
            your fees. In case of problems, contact us at paymentproblems@gmail.com (Send us your name, PayPal receipt
            number and the amount paid).',
    'not_now_message' => '<b class="text-danger">Important:</b> You have the choice to skip the payment of the subscription fees
                now by clicking the button
                "Not Now". This serves as a trial period. But you have to pay by the 30th of this month, otherwise your
                account will be blocked.',
    'method' => 'method',
    //flash message for online-payment/add or addnew1 or activate
    'flash-message'=>  Session::get('flash-message-english'),
    'flash-message1' => 'You are in our trial period, you have to pay your fees before the 30th of this month to keep your account open! To pay your fees,',
    'click_here'=>'Click here',
    'combine_message'=> session::get('combine_eng'),
];
