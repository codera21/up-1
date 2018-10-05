// JavaScript Document
(function($) {
    /*
    |======================================================
    | Ajax Link and Form Plugin
    |======================================================
    */
    $.fn.ajaxLink = function( options ) {
        // Default options
        var settings = $.extend({
            url: window.location,
            method: "GET", //GET, POST, PUT, DELETE
            dataType: "json",
        }, options );

        $(this).click(function() {

            var url = $(this).attr('href') || settings.url ;
            var method = $(this).data('method') || settings.method ;
            var data = {};
            var dataType = settings.dataType;
            var confirm = $(this).data('confirm');

            if(typeof(confirm) != 'undefined') {
                swal({
                    title: 'Warning!',
                    text: confirm,
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, process it!',
                    cancelButtonText: 'No, cancel!',
                    confirmButtonClass: 'confirm-class',
                    cancelButtonClass: 'cancel-class',
                    closeOnConfirm: true,
                    closeOnCancel: true
                }, function(isConfirm) {
                    if (isConfirm) {
                        $.fn.ajaxRequest(url, method, data, dataType);
                    }

                });
            } else {
                 $.fn.ajaxRequest(url, method, data, dataType);
            }


            return false;
        })

    }

    $.fn.ajaxForm = function( options ) {

        // Default options
        var settings = $.extend({
            url: window.location,
            method: "GET", //GET, POST, PUT, DELETE
            dataType: "json",
        }, options );

        var url = $(this).attr('action') || settings.url ;
        var method = $(this).attr('method') || settings.method ;
        var data = $(this).serialize();
        var dataType = settings.dataType;

        $.fn.ajaxRequest(url, method, data, dataType);

        return false;

    };

    $.fn.ajaxRequest = function (url, method, data, dataType) {
        $.ajax({
            url: url,
            method: method,
            data: data,
            dataType: dataType,
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
            success: function(response) {
                if (response.status == 'success') {

                    swal("Success!", response.message, "success");

                    if (response.redirect_url) {
                        setTimeout(function(){ window.location = response.redirect_url; }, 1000); 
                    }

                } else {
                    swal("Error!", response.message, "error");
                }

            },
            complete: function() {
                $.unblockUI();
            }
        });
    };


})(jQuery);