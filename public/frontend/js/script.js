(function( $ ) {
	'use strict';
        
        
         
        $( document ).ready(function() {



            $("form#payment-add-profile input[name='payment_type']").change(function() {

                var payment_type = $(this).val();
                if (payment_type == 'OFFLINE BANK') {
                    $("form#payment-add-profile .card-info").addClass('hidden');
                    $("form#payment-add-profile .bank-info").removeClass('hidden');
                } else if (payment_type == 'CARD') {
                    $("form#payment-add-profile .card-info").removeClass('hidden');
                    $("form#payment-add-profile .bank-info").addClass('hidden');
                }
            });

            if ($("form#payment-add-profile").length) {
                $('#card_no').payment('formatCardNumber');
                $('#card_exp_date').payment('formatCardExpiry');
            }
            
            $(document.body).on('keypress', ".validate-apha", function(e) {

                var code = e.keyCode || e.which;
                var char = String.fromCharCode(code);

                var regex = new RegExp("^[a-zA-Z]+$");

                if (jQuery.fn.isDefaultBehavior(e) == true) {
                    return true;
                } else if (regex.test(char)) {
                    return true;
                }

                e.preventDefault();
                return false;
            });

            $(document.body).on('keypress', ".validate-aphanum", function(e) {

                var code = e.keyCode || e.which;
                var char = String.fromCharCode(code);

                var regex = new RegExp("^[a-zA-Z0-9]+$");

                if (jQuery.fn.isDefaultBehavior(e) == true) {
                    return true;
                } else if (regex.test(char)) {
                    return true;
                }

                e.preventDefault();
                return false;
            });


            $(document.body).on('keypress', ".validate-numbers", function(e) {

                var code = e.keyCode || e.which;
                var char = String.fromCharCode(code);

                var regex = new RegExp("^[0-9]+$");

                if (jQuery.fn.isDefaultBehavior(e) == true) {
                    return true;
                } else if (regex.test(char)) {
                    return true;
                }

                e.preventDefault();
                return false;
            });

            $(document.body).on('keypress', ".validate-special-chars", function(e) {

                var code = e.keyCode || e.which;
                var char = String.fromCharCode(code);
                //console.log(code+" "+char);
                var regex = new RegExp("^[a-zA-Z0-9 .-]+$");


                if (jQuery.fn.isDefaultBehavior(e) == true) {
                    return true;
                } else if (regex.test(char)) {
                    return true;
                }

                e.preventDefault();
                return false;
            });
            $(document.body).on('keypress', ".validate-address", function(e) {

                var code = e.keyCode || e.which;
                var char = String.fromCharCode(code);

                var regex = new RegExp("^[a-zA-Z 0-9.,-]+$");

                if (jQuery.fn.isDefaultBehavior(e) == true) {
                    return true;
                } else if (regex.test(char)) {
                    return true;
                }

                e.preventDefault();
                return false;
            });

            $(document.body).on('keypress', ".validate-phone", function(e) {

                var code = e.keyCode || e.which;
                var char = String.fromCharCode(code);

                var regex = new RegExp("^[0-9]+$");

                if (jQuery.fn.isDefaultBehavior(e) == true) {
                    return true;
                } else if (regex.test(char)) {
                    return true;
                }

                e.preventDefault();
                return false;
            });

             // Breadcrumb
            if($("ol.breadcrumb li").length == 1){
                 $("ol.breadcrumb").hide();
            }
            
            // Autofocus form first input
            $('.main form:first *:input[type!=hidden]:first').focus();
        
            // Form Error Container
            $("form").prepend( '<ul class="form-validate-errors"></ul>' ); 
            
            // Restrict Form Inputs (Using Alphanum plugin)
            $(".validate-name, .validate-company").alphanum({
                allowSpace: true, // Allow the space character
                allow : '.-', // Specify characters to allow
                
            });
            
            $(".validate-address").alphanum({
                allowSpace: true, // Allow the space character
                allow : '.,-', // Specify characters to allow
                
            });
            
            $(".validate-city").alphanum({
                allowSpace: true, // Allow the space character
                allow : '.-', // Specify characters to allow
                
            });
            
            $(".validate-zip").numeric('positiveInteger');
            
            $(".validate-phone").numeric('positiveInteger');
            

            // Addition Validation Rules
            $.validator.addMethod("regex", function(value, element, regexpr) {
                return regexpr.test(value);
            }, "Please enter a valid input.");

            $.validator.addMethod("alpha", function(value, element) {
                return this.optional(element) || /^[a-z\s]+$/i.test(value);
            }, "Input must contain only letters.");

            $.validator.addMethod("numeric", function(value, element) {
                return this.optional(element) || /^[0-9]+$/i.test(value);
            }, "Input must contain only numbers.");

            $.validator.addMethod("alphanumeric", function(value, element) {
                return this.optional(element) || /^[a-z0-9\s]+$/i.test(value);
            }, "Input must contain only letters or numbers.");
            
            //Bootstrap DatePicker and DateRange
            $('.datepicker').datepicker({});
            $('.daterange').daterangepicker({});
            
            // Main Navigation
            $('ul#mainNav li a').click(function(){
                var url = $(this).attr('href');
                if(typeof(url) != 'undefined' && url != '#'){
                    window.location = url;
                    return false;
                }
                
            });
            
        
            
            // Send CSRF Token with all Ajax Requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $("form#login").validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        //minlength: 6
                    },
                },
                messages: {
                    email: "Please enter a valid email address",
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 6 characters long"
                    },
                },
                //errorLabelContainer: $("form#register ul.form-validate-errors"),
                //wrapper: 'li',
            });

            /*
            |======================================================
            | Registration
            |======================================================
            */
            $("form#register").validate({
                rules: {
                    first_name: "required",
                    last_name: "required",
                    address1: {
                        required: true,
                        //address: true
                    },
                    zip: {
                        required: false,
                        digits: true,
                    },
                    phone: {
                        required: true,
                        digits: true
                    },
                    username: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 6
                    },
                    password_confirmation: {
                        required: true,
                        minlength: 6,
                        equalTo: "#password"
                    },
                    agree: "required"
                },
                messages: {
                    first_name: "Please enter your first name",
                    last_name: "Please enter your last name",
                    address1: {
                        required: "Please enter your valid address",
                        
                    },
                    city: "Please enter your city",
                    state: "Please enter your state",
                    zip: {
                        required: "Please enter your zip",
                        digits: "Please enter only digits in zip"
                    },
                    phone: {
                        required: "Please enter your phone",
                        digits: "Please enter only digits in phone"
                    },
                    username: {
                        required: "Please enter your username"
                    },
                    email: "Please enter a valid email address",
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 6 characters long"
                    },
                    password_confirmation: {
                        required: "Please provide a confirm password",
                        minlength: "Your confirm password must be at least 6 characters long",
                        equalTo: "Please enter the same password as above"
                    },
                    agree: "Please accept our policy"
                },
                errorPlacement: function(error, element) {
                        element.parent().append( error );
                },
                //errorLabelContainer: $("form#register ul.form-validate-errors"),
                //wrapper: 'li',
            });
            
            /*
            |======================================================
            | Forgot Password
            |======================================================
            */
            $("form#forgot-password").validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                },
                messages: {
                    email: "Please enter a valid email address",
                },    
            });

            /*
            |======================================================
            | Reset Password
            |======================================================
            */
            $("form#reset-password").validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 6
                    },
                    password_confirmation: {
                        required: true,
                        minlength: 6,
                        equalTo: "#password"
                    },
                },
                messages: {
                    email: "Please enter a valid email address",
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 6 characters long"
                    },
                    password_confirmation: {
                        required: "Please provide a confirm password",
                        minlength: "Your confirm password must be at least 6 characters long",
                        equalTo: "Please enter the same password as above"
                    },
                },
                
            });
            
            /*
            |======================================================
            | Users - Edit User
            |======================================================
            */
            $("form#user-edit").validate({
                rules: {
                    first_name: "required",
                    last_name: "required",
                    address1: {
                        required: true,
                    },
                    city: "required",
                    state: "required",
                    zip: {
                        required: true,
                        digits: true,
                        minlength: 5
                    },
                    
                    phone: {
                        required: true,
                        digits: true
                    },
                    password: {
                    //required: true,
                    minlength: 6
                    },
                    password_confirmation: {
                        //required: true,
                        minlength: 6,
                        equalTo: "#password"
                    },
                },
                messages: {
                    first_name: "Please enter your first name",
                    last_name: "Please enter your last name",
                    address1: {
                        required: "Please enter your valid address",
                    },
                    city: "Please enter your city",
                    state: "Please select your state",
                    zip: {
                        required: "Please enter your zip",
                        digits: "Please enter only digits in zip"
                    },
                    phone: {
                        required: "Please enter your phone",
                        digits: "Please enter only digits in phone"
                    },
                    password: {
                    minlength: "Your Password must be at least 6 characters long"
                    },
                    password_confirmation: {
                        minlength: "Your Password must be at least 6 characters long",
                        equalTo: "Please enter the same Password as above"
                    },
                },
                submitHandler: function(form) {
                    $(form).ajaxForm(); 
                    return false;
                }
            });

            /*
            |======================================================
            | User Comment Add
            |======================================================
            */
            
            $("form#comment-add").validate({
                
                rules: {
                    comments: "required",
                    
                },
                messages: {                    
                    comments: "Please enter comments",                    
                },
                
                submitHandler: function(form){
                    $(form).ajaxForm(); 
                    return false;
                },
            });   


            /*----------------------------------------*/

            /* Initialization of treeviews */
            $('#tree1').treed($('#tree1'));   


            /*
            |======================================================
            | Offline Payment
            |======================================================
            */

            $("form#offline-payment-add input[name='payment_for']").change(function() {

                var payment_for = $(this).val();
                if (payment_for == 'MATERIAL') {
                    $("form#offline-payment-add .material_info").removeClass('hidden');
                    $("form#offline-payment-add input[name='paid_for']").val(['GROUP']);
                } else if (payment_for == 'SUBSCRIPTION') {
                    $("form#offline-payment-add .material_info").addClass('hidden');
                    $("form#offline-payment-add input[name='paid_for']").val(['SUBSCRIPTION']);
                }
            })

            if ($("form#offline-payment-add").length) {
                $("#sub_group_id").chained("#group_id");
            }     

            $("form#offline-payment-add input:radio[name='paid_for']").change(function() {
                $.fn.showMaterial();
            });

            $("form#offline-payment-add select#group_id, form#offline-payment-add select#sub_group_id").change(function() {
                
                $.fn.showMaterial();
            });

            /*==================================*/
            $.fn.showMaterial = function() {

                console.log("Show Material");
                $.ajax({
                    method: 'POST',
                    data: $('form#offline-payment-add').serialize(),
                    //url: document.location.protocol + '//' + document.location.host + '/offline-payment/show-material',
                    url: document.location.protocol + '//' + document.location.host + '/dnasbook_dm/public/index.php/offline-payment/show-material',
                    dataType: "html",
                    beforeSend: function() {
                        $.blockUI();
                    },
                    error: function (data) {
                   
                        var response = jQuery.parseJSON( data.responseText );

                        var text = '';
                        if(response.message)
                        {
                             text = response.message;
                        } else {
                            $.each(response, function( index, value ) {
                                text += value + '<br/>';
                            }); 
                        }

                        swal({
                            title: 'Error!',
                            text: text,
                            type: 'error',
                            html: true
                        })

                    },
                    success: function(content) {
                        $('#material-box').html(content);
                    },
                    complete: function() {
                        $.unblockUI();
                    }
                });
            }

            $("form#offline-payment-add input:radio[name='paid_for']").trigger('change');
            
            $("form#offline-payment-add").validate({
                rules: {

                    bank_id: "required",
                    bank_slip_no: "required",                    
                    amount_paid: {
                        required: true,
                        number:true
                    },
                    'material[]':{
                        required: function(element) {
                            return $("input[name='paid_for']:checked").val() == 'MATERIAL';
                        }
                        //required: true,
                    },

                },
                messages: {
                    
                    bank_id: {
                        required: "Please select bank account",
                    },
                    bank_slip_no: {
                        required: "Please enter payment slip number",
                    },
                    amount_paid: {
                        required: "Please enter amount paid",
                        number: "Please enter only digits for amount paid"
                    },
                    'material[]':{
                        required: "Please select one or more Videos or Courses"
                    }
                    

                },
                submitHandler: function(form) {
                    $(form).ajaxForm(); 
                    return false;
                }
            });

            /*
            |======================================================
            | Online Payment
            |======================================================
            */

            $("form#online-payment-add input[name='payment_for']").change(function() {
                var payment_for = $(this).val();
            
                if (payment_for == 'MATERIAL') {
                    $("form#online-payment-add .material_info").removeClass('hidden');
                    $("form#online-payment-add input[name='paid_for']").val(['GROUP']);
                    $.fn.showMaterial();
                    
                    $('#subscription-button').html('');
                    $("form#online-payment-add #subscription-fee").addClass('hidden');
                } else if (payment_for == 'SUBSCRIPTION') {
                    $("form#online-payment-add .material_info").addClass('hidden');
                    $("form#online-payment-add input[name='paid_for']").val(['SUBSCRIPTION']);

                    // add pay button for subscription
                    $('form#online-payment-add #subscription-button').html('<input type="submit" value="Purchase Subscription" class="btn btn-primary pull-right" />');
                    $("form#online-payment-add #subscription-fee").removeClass('hidden');
                }
            });


            $("form#online-payment-add input[name='payment_for']").filter('[value="SUBSCRIPTION"]').attr('checked', true).trigger('change');

            if ($("form#online-payment-add").length) {
                $("#sub_group_id").chained("#group_id");
            }     

            $("form#online-payment-add input:radio[name='paid_for']").change(function() {
                $.fn.showMaterial();
            });

            $("form#online-payment-add select#group_id, form#online-payment-add select#sub_group_id").change(function() {
                
                $.fn.showMaterial();
            });

            /*==================================*/
            $.fn.showMaterial = function() {

                console.log("Show Material");
                $.ajax({
                    method: 'POST',
                    data: $('form#online-payment-add').serialize(),
                    //url: document.location.protocol + '//' + document.location.host + '/offline-payment/show-material',
                    url: document.location.protocol + '//' + document.location.host + '/dnasbook_dm/public/index.php/online-payment/show-material',
                    dataType: "html",
                    beforeSend: function() {
                        $.blockUI();
                    },
                    error: function (data) {
                   
                        var response = jQuery.parseJSON( data.responseText );

                        var text = '';
                        if(response.message)
                        {
                             text = response.message;
                        } else {
                            $.each(response, function( index, value ) {
                                text += value + '<br/>';
                            }); 
                        }

                        swal({
                            title: 'Error!',
                            text: text,
                            type: 'error',
                            html: true
                        })

                    },
                    success: function(content) {
                        $('#material-box').html(content);
                    },
                    complete: function() {
                        $.unblockUI();
                    }
                });
            }

            $("form#online-payment-add input:radio[name='paid_for']").trigger('change');
            
            /*$("form#online-payment-add").validate({
                rules: {
                    'material[]':{
                        required: function(element) {
                            return $("input[name='paid_for']:checked").val() == 'MATERIAL';
                        }
                        //required: true,
                    },

                },
                messages: {
                    'material[]':{
                        required: "Please select one or more Videos or Courses"
                    }
                    

                },
                submitHandler: function(form) {
                    $(form).ajaxForm(); 
                    return false;
                }
            });*/

            
            /*
            |======================================================
            | Payment Profile
            |======================================================
            */
            
            $("form#payment-add-profile").validate({
                rules: {
                    
                    card_no: {
                        required: function(element) {
                            return $("input[name='payment_type']:checked").val() == 'CARD';
                        },
                        //digits: true
                    },
                    card_exp_date: {
                        required: function(element) {
                            return $("input[name='payment_type']:checked").val() == 'CARD';
                        },
                        //digits: true
                    },
                   
                    bank_name: {
                        required: function(element) {
                            return $("input[name='payment_type']:checked").val() == 'BANK';
                        }
                    },
                    bank_routing_no: {
                        required: function(element) {
                            return $("input[name='payment_type']:checked").val() == 'BANK';
                        }
                    },
                    bank_account_no: {
                        required: function(element) {
                                return $("input[name='payment_type']:checked").val() == 'BANK';
                        },
                        digits: true
                    },

                    name: "required",
                    address: {
                        required: true,
                        //address: true
                    },
                    city: "required",
                    state: "required",
                    zip: {
                        //required: true,
                        digits: true,
                        minlength: 5
                    },
                    phone: {
                        required: true,
                        digits: true,
                        minlength: 10
                    },

                },
                messages: {
                    
                    card_no: {
                        required: "Please enter your card number",
                        //digits: "Please enter only card number"
                    },
                    card_exp_date: {
                        required: "Please enter your card expiry date",
                        //digits: "Please enter only card expiry date"
                    },
                    
                    bank_name: "Please enter your bank name",
                    bank_routing_no: "Please enter your bank transit",
                    bank_account_no: {
                        required: "Please enter your bank account no",
                        digits: "Please enter only digits in bank account no"
                    },

                    
                    name: "Please enter your full name",
                    address: {
                        required: "Please enter your valid address",
                        //address: "Delivery addresss must contain only letters, numbers, dot or dashes."
                    },
                    city: "Please enter your city",
                    state: "Please enter your state",
                    zip: {
                        required: "Please enter your zip",
                        digits: "Please enter only digits in zip"
                    },
                    phone: {
                        required: "Please enter your phone",
                        digits: "Please enter only digits in phone",
                        minlength: "Please enter at least 10 digits in phone"

                    },

                },
                submitHandler: function(form) {
                    $(form).ajaxForm(); 
                    return false;
                }
            });

            //=============
            $("div#user-academy-grid .show-material").click(function() {
                
                console.log('Show Material');
                var url = $(this).data('url');
                
                $.ajax({
                    method: 'GET',
                    url: url,
                    dataType: "html",
                    beforeSend: function() {
                        $.blockUI();
                    },
                    error: function (data) {
                   
                        var response = jQuery.parseJSON( data.responseText );

                        var text = '';
                        if(response.message)
                        {
                             text = response.message;
                        } else {
                            $.each(response, function( index, value ) {
                                text += value + '<br/>';
                            }); 
                        }

                        swal({
                            title: 'Error!',
                            text: text,
                            type: 'error',
                            html: true
                        })

                    },
                    success: function(content) {

                        $('#material-modal .modal-body').html(content);
                        $('#material-modal .modal-title').html($('#material-heading').html());
                        $('#material-modal').modal('show');
                        
                        // disable browser context menu on video
                        $('#material-video').on('contextmenu', function(e) {
                            e.preventDefault();
                        });
                    
                    },
                    complete: function() {
                        $.unblockUI();
                    }
                });
            });

            $('#material-modal').on('hidden.bs.modal', function () {
                console.log('this is modal close');
                // $('#material-video').get(0).stopVideo();
                $('#material-video').attr('src', '');
                $('#material-modal .modal-body').html('');
            });


            //=============


            /*
            |======================================================
            | Message Compose
            |======================================================
            */
            
            $("form#compose-message").validate({
                
                rules: {
                    to_username: "required",
                    subject: "required",
                    message: "required",
                    
                },
                messages: {                    
                    to_username: "Please enter username",
                    subject: "Please enter subject",
                    message: "Please enter message",
                },
                
                submitHandler: function(form){
                    $(form).ajaxForm(); 
                    return false;
                },
            });

            /*
            |======================================================
            | Contact Us
            |======================================================
            */
            $("form#contact-us").validate({
                rules: {
                    name: "required",
                    email: {
                        required: true,
                        email: true,
                    },
                    message: {
                        required: true,
                    },
                    
                },
                messages: {
                    name: "Please enter your name",
                    email:{
                      required: "Please enter valid email address",
                        
                    },
                    message: {
                        required: "Please enter message",
                        
                    },
                    
                },
            });
             
        });// End Document Ready
    
})( jQuery );




/**
 * Check Is It Default Behavior
 * 
 * @param event e
 * @returns boolean
 */
jQuery.fn.isDefaultBehavior = function(e) {
    /*
     Enter	13
     Up arrow	38
     Down arrow	40
     Left arrow	37
     Right arrow	39
     Escape	27
     Spacebar	32 (Not Allowed)
     Ctrl	17
     Alt         18
     Tab         9
     Shift	16
     Caps-lock	20
     Windows key	91
     Windows option key	93
     Backspace	8
     Home	36 (Not Allowed)
     End         35 (Not Allowed)
     Insert	45
     Delete	46
     Page Up	33 (Not Allowed)
     Page Down	34 (Not Allowed)
     Numlock	144
     F1-F12	112-123
     Print-screen ??
     Scroll-lock	145
     Pause-break	19
     */

    var code = e.keyCode || e.which;
    var char = String.fromCharCode(code);
    var shift = e.shiftKey;
    var ctrl = e.ctrlKey;
    var meta = e.metaKey;
    
    if (
        // Allow: Enter
        code == 13 ||
        // Allow: Esc
        code == 27 ||
        // Allow: Tab
        code == 9 ||
        // Allow: Backspace
        code == 8) {
        return true;
    } else if (shift == false && code >= 37 && code <= 40 && char != "'") //Left arrow, Right arrow, Up arrow, Down arrow
    {

        return true;
    } else if ( // Allow: Ctrl+A
        (ctrl == true && code == 65) || (ctrl == true && code == 97) ||
        // Allow: Ctrl+C
        (ctrl == true && code == 67) || (ctrl == true && code == 99) ||
        // Allow: Ctrl+V
        (ctrl == true && code == 86) || (ctrl == true && code == 118)
    ) {
        return true;
    }
}