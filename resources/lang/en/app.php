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
    //for this is how to pay
    'this_is_how'=>Session::get('this_is_how_eng'),
    'this_is_link'=>Session::get('this_is_link_eng'),
    //one
    'p_one'=> "How does this project work?<br>
    This project trains you in entrepreneurship and finances you for free. How?<br>
    Entrepreneurship courses are given online in the form of videos and texts. 
    Where to find these videos and training texts? Under the heading 'My Academy'. 
    You must take the time to visualize and understand these videos and 
    read the corresponding texts. It is a distance online training. 
    Once you have subscribed to these courses, you become a lifetime subscriber, 
    which courses will gradually increase for life. All innovations, 
    new methods and entrepreneurial knowledge will be gradually added to these online courses ...",
    //two
    'p_two'=>"How are subscribers financed? As we want to cover as many people as possible with this opportunity never seen elsewhere, all subscribers to our courses are encouraged to bring other subscribers into the training, giving them this great opportunity. Subscribers, we reward them by paying them a monthly commission on the monthly fees paid by the subscribers they have invited to the training. How much? 40% of the total fees paid in the system by the subscribers they invited in the training. And to explode their commissions, we do not only pay the subscribers on the fees of the subscribers whom they invite in the training, we also pay them on the fees of the subscribers that their subscribers invite into the training until the 4th level. To know what we're talking about here, watch the videos under 'my academy'. Our goal is to train our subscribers in entrepreneurs while financing them. Our ambition is to give to our subscribers the means to pursue their dreams as they train as entrepreneurs, thus fighting against unemployment and thereby developing the private sector.",
    'p_three'=>"How it works? How to take part in this project? You must register on our official website, so you have access to all our information and online training for life! When you invent people into the training who sign up and pay their monthly fees, we pay you monthly commissions, 40% of the fees of the people in your group, this for life.",
    'p_four'=> "Conditions? We want to help everyone, so anyone who wants to seize this opportunity is welcome!",
    'p_five'=>"You can not even pay a fee in this program when you apply our famous Rule 20/20!",
    'p_six'=> 'You cannot earn commissions in this program without inviting other people into the training and encourage them to invite other people into the training up to the 4th level!',
    'p_seven'=> 'We have rewards in the program if you reach a certain level of performance!',
];
