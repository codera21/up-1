// JavaScript Document
(function($) {

    jQuery.fn.grid = function(options) {
        var defaults = {
            url: ""
        }

        parent = $(this);

        $(this).addClass("grid");
        var options = jQuery.extend(defaults, options);


        //$.fn.sendAjaxReqByUrl(options.url);

        return this.each(function() {

            var NumberRegEx = /^[0-9]+$/;

            //Main Actions
            $("div#gridHeader div#gridMainActions a", parent).on("click", function() {
                var method = $(this).data('method');
                if (method == 'refresh') {
                    $.fn.redirect($(this).attr("href"));

                } else if (method == 'add' || method == 'import' || method == 'export' || method == 'inbox' || method == 'unread' || method == 'sent' || method == 'trash' ) {
                    window.location = $(this).attr("href");
                } else if (method == 'edit') {
                    if ($("div#gridBody table.gridTable tbody tr td input.selector:checked", parent).length == 1) {
                        window.location = $(this).attr("href") + "/" + $("div#gridBody table.gridTable tbody tr td input.selector:checked", parent).val();
                    } else {
                        swal("Error!", "Please check one or more check box", "error");
                    }
                } else if (method == 'delete') {
                    if ($("div#gridBody table.gridTable tbody tr td input.selector:checked", parent).length >= 1) {
                        
                        var url = $(this).attr('href')
                        var data = $("input.selector:checked", parent).serialize();
                        if (url != '') {
                            swal({
                                title: 'Warning!',
                                text: 'Are you sure you want to delete all selected records?',
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
                                    $.ajax({
                                        type: "POST",
                                        url: url,
                                        data: data,
                                        dataType: "json",
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        beforeSend: function() {
                                            $.fn.blockUI();
                                        },
                                        success: function($response) {
                                            if ($response.status == 'success') {
                                                new PNotify({
                                                    type: 'success',
                                                    title: 'Success',
                                                    text: $response.message,
                                                    styling: "bootstrap3"
                                                });

                                                //$.fn.submitForm()
                                                setTimeout(function(){ window.location = window.location.href; }, 1000); 
                                            } else if ($response.status == 'error') {
                                                new PNotify({
                                                    type: 'error',
                                                    title: 'Error',
                                                    text: $response.message,
                                                    styling: "bootstrap3"
                                                });
                                            } else {
                                                new PNotify({
                                                    type: 'notice',
                                                    title: 'Notice',
                                                    text: $response.message,
                                                    styling: "bootstrap3"
                                                });
                                            }

                                        },
                                        complete: function() {
                                            $.fn.unblockUI();
                                        }

                                    });
                                }

                            });
                        }
                        


                    } else {
                        swal("Error!", "Please check one or more check box", "error");
                    }
                } else if (method == 'print') {
                    window.print();
                }

                return false;
            })

            //Bulk Actions
            $("div#gridHeader div#gridBulkActions select#bulk_action", parent).on("change", function() {
                
                
                if ($("div#gridBody table.gridTable tbody tr td input.selector:checked", parent).length >= 1) {
                    var url = $(this).val();
                    var data = $("input.selector:checked", parent).serialize();
                    var action = $("option:selected", this).text();
                    if (url != '') {
                        swal({
                            title: 'Warning!',
                            text: "Are you sure you want to proceed " + action + "?",
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
                                $.ajax({
                                    type: "POST",
                                    url: url,
                                    data: data,
                                    dataType: "json",
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    beforeSend: function() {
                                        $.fn.blockUI();
                                    },
                                    success: function($response) {
                                        if ($response.status == 'success') {
                                            new PNotify({
                                                type: 'success',
                                                title: 'Success',
                                                text: $response.message,
                                                styling: "bootstrap3"
                                            });

                                            //$.fn.submitForm()
                                            setTimeout(function(){ window.location = window.location.href; }, 1000); 
                                        } else if ($response.status == 'error') {
                                            new PNotify({
                                                type: 'error',
                                                title: 'Error',
                                                text: $response.message,
                                                styling: "bootstrap3"
                                            });
                                        } else {
                                            new PNotify({
                                                type: 'notice',
                                                title: 'Notice',
                                                text: $response.message,
                                                styling: "bootstrap3"
                                            });
                                        }

                                    },
                                    complete: function() {
                                        $.fn.unblockUI();
                                    }

                                });
                            }

                        });
                    }
                } else {
                    swal("Error!", "Please check one or more check box", "error");
                }
                


                return false;

            })

            //Search
            $("div#gridHeader div#gridSearchForm button[type='submit']", parent).on("click", function() {

                $("#action", parent).val("search");
                $.fn.submitForm();
                return false;

            });

            //Reset
            $("div#gridHeader div#gridSearchForm button[type='reset']", parent).on("click", function() {

                $('div#gridHeader div#gridSearchForm :input', parent)
                    .not(':button, :submit, :reset, :hidden')
                    .val('')
                    .removeAttr('checked')
                    .removeAttr('selected');

                $("#action", parent).val("search");
                $.fn.submitForm();
                return false;

            });

            //Order By
            $("div#gridBody table.gridTable thead tr th a", parent).on("click", function() {

                $.fn.redirect($(this).attr('href'));
                return false;

            });

            //Check All
            $("div#gridBody table.gridTable thead tr th input.selector", parent).on("click", function() {
                //console.log($(this).is(':checked'));
                if ($(this).is(':checked') == true) {
                    $("div#gridBody table.gridTable tbody tr td input.selector", parent).prop("checked", true);
                    $("div#gridBody table.gridTable tbody tr", parent).addClass("selected");
                } else if ($(this).is(':checked') == false) {

                    $("div#gridBody table.gridTable tbody tr", parent).removeClass("selected");
                    $("div#gridBody table.gridTable tbody tr td input.selector", parent).prop("checked", false);
                }

            });

            //Single Check
            $("div#gridBody table.gridTable tbody tr td input.selector", parent).on("click", function() {

                if ($(this).is(':checked') == true) {
                    $(this).parents("tr:first").addClass("selected");
                } else if ($(this).is(':checked') == false) {
                    $(this).parents("tr:first").removeClass("selected");
                }

                var totalCheckboxes = $("div#gridBody table.gridTable tbody tr td input.selector", parent).length;
                var totalChecked = $("div#gridBody table.gridTable tbody tr td input.selector:checked", parent).length;

                if (totalCheckboxes == totalChecked) {
                    $("div#gridBody table.gridTable thead tr th input.selector", parent).prop("checked", true);
                } else {
                    $("div#gridBody table.gridTable thead tr th input.selector", parent).prop("checked", false);
                }

            })


            //Pagination
            $("div#gridFooter div#gridPagination a", parent).on("click", function() {

                $.fn.redirect($(this).attr('href'));
                return false;

            });

            $("div#gridFooter div#gridPagination input#page", parent).on("keypress", function(evt) {


                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if (charCode == 13) {
                    var page = $(this).val();
                    if (!page.match(NumberRegEx)) {
                        swal("Error!", "Please enter valid number in Page Field.", "error");
                        return false;
                    }
                    $.fn.submitForm();
                    return false;
                }
            });

            $("div#gridFooter div#gridPagination select#page", parent).on("change", function() {

                $.fn.submitForm();
                return false;

            });


            //Records per Page
            $("div#gridFooter div#gridRecordsPerPage a", parent).on("click", function() {

                $.fn.redirect($(this).attr('href'));
                return false;

            });

            $("div#gridFooter div#gridRecordsPerPage input#limit", parent).on("keypress", function(evt) {


                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if (charCode == 13) {
                    var limit = $(this).val();
                    if (!limit.match(NumberRegEx)) {
                        swal("Error!", "Please enter valid number in Records Per Page Field.", "error");
                        return false;
                    }

                    $.fn.submitForm();
                    return false;
                }
            });

            $("div#gridFooter div#gridRecordsPerPage select#limit", parent).on("change", function() {

                $.fn.submitForm();
                return false;
            });

            //AJAX Functions
            $("div#gridBody table.gridTable tbody tr td select.ajax", parent).on("change", function() {

                var element = this;
                var url = $(this).data('url');
                var data = {value: $(this).val()};
                
                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function() {
                        $(element).attr("disabled", true);
                        $.fn.blockUI();
                    },
                    success: function($response) {

                        if ($response.status == 'success') {
                            new PNotify({
                                type: 'success',
                                title: 'Success',
                                text: $response.message,
                                styling: "bootstrap3"
                            });
                        } else if ($response.status == 'error') {
                            new PNotify({
                                type: 'error',
                                title: 'Error',
                                text: $response.message,
                                styling: "bootstrap3"
                            });
                        } else {
                            new PNotify({
                                type: 'notice',
                                title: 'Notice',
                                text: $response.message,
                                styling: "bootstrap3"
                            });
                        }


                        
                    },
                    complete: function() {
                        $(element).attr("disabled", false);
                        $.fn.unblockUI();
                    }

                });
                return false;

            })
            $("div#gridBody table.gridTable tbody tr td input.ajax", parent).on("blur", function() {


                var element = this;
                var url = $(this).data('url');
                var data = {value: $(this).val()};
                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function() {
                        $(element).attr("disabled", true);
                        $.fn.blockUI();
                    },
                    success: function($response) {

                        if ($response.status == 'success') {
                            new PNotify({
                                type: 'success',
                                title: 'Success',
                                text: $response.message,
                                styling: "bootstrap3"
                            });
                        } else if ($response.status == 'error') {
                            new PNotify({
                                type: 'error',
                                title: 'Error',
                                text: $response.message,
                                styling: "bootstrap3"
                            });
                        } else {
                            new PNotify({
                                type: 'notice',
                                title: 'Notice',
                                text: $response.message,
                                styling: "bootstrap3"
                            });
                        }

                    },
                    complete: function() {
                        $(element).attr("disabled", false);
                        $.fn.unblockUI();
                    }

                });
                return false;

            })

            
            $("div#gridBody table.gridTable tbody tr td a.ajax",parent).on("click",function(){
                
                var url = $(this).data('url') || $(this).attr('href') ;
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
                            $.ajax({

                                type: "GET",
                                dataType: "json",
                                url: url,
                                beforeSend: function() {
                                    $.fn.blockUI();
                                },
                                success: function($response) {

                                    if ($response.status == 'success') {
                                        new PNotify({
                                            type: 'success',
                                            title: 'Success',
                                            text: $response.message,
                                            styling: "bootstrap3"
                                        });
                                    } else if ($response.status == 'error') {
                                        new PNotify({
                                            type: 'error',
                                            title: 'Error',
                                            text: $response.message,
                                            styling: "bootstrap3"
                                        });
                                    } else {
                                        new PNotify({
                                            type: 'notice',
                                            title: 'Notice',
                                            text: $response.message,
                                            styling: "bootstrap3"
                                        });
                                    }

                                },
                                complete: function() {
                                    $.fn.unblockUI();
                                }

                            });
                        }

                    });
                } else {
                     $.ajax({

                            type: "GET",
                            dataType: "json",
                            url: url,
                            beforeSend: function() {
                                $.fn.blockUI();
                            },
                            success: function($response) {

                                if ($response.status == 'success') {
                                    new PNotify({
                                        type: 'success',
                                        title: 'Success',
                                        text: $response.message,
                                        styling: "bootstrap3"
                                    });
                                } else if ($response.status == 'error') {
                                    new PNotify({
                                        type: 'error',
                                        title: 'Error',
                                        text: $response.message,
                                        styling: "bootstrap3"
                                    });
                                } else {
                                    new PNotify({
                                        type: 'notice',
                                        title: 'Notice',
                                        text: $response.message,
                                        styling: "bootstrap3"
                                    });
                                }

                            },
                            complete: function() {
                                $.fn.unblockUI();
                            }

                        });
                }

            })

            //Simple Actions
            $("div#gridBody table.gridTable tbody tr td a.edit", parent).on("click", function() {

                //Do Nothing

            })
            $("div#gridBody table.gridTable tbody tr td a.delete", parent).on("click", function() {

                    var url = $(this).attr("href");
                    swal({
                        title: 'Warning!',
                        text: 'Are you sure that you want to delete?',
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
                            $('<form action="'+url+'" method="POST"><input type="hidden" name="_method" value="DELETE"/><input type="hidden" name="_token" value="' + $('meta[name="csrf-token"]').attr('content') + '"/></form>').appendTo('body').submit().remove();
                            //document.location.href = url;
                        }

                    });
                    

                    return false;

                })
                

            //Form Submit
            /*$("form",parent).submit(function(){

                    $("input,select,textarea",parent).not("#gridBody").each(function() {
                      $.query=$.query.set( $(this).attr('name'), $(this).val());
                    });
                    var url = location.href;
                    var url = url.split("?");
                    var url = url[0]; 
                    $(this).attr('action',decodeURIComponent(url+$.query.toString()));
                    return true;
            })*/


        }); //end each


    };

    $.fn.blockUI = function() {
        $.blockUI({

            overlayCSS: {
                backgroundColor: '#fff',
                opacity: 0.9,
                cursor: 'wait'
            },
            baseZ: 100000,
        });
    }
    $.fn.unblockUI = function() {
        $.unblockUI();
    }


    $.fn.redirect = function(url) {
        document.location.href = url;
    }

    $.fn.submitForm = function() {
        $("#gridBulkActions select#bulk_action, #gridBody input, #gridBody select, #gridBody textarea", parent).remove();
        $("form", parent).submit();
    }

    $.fn.sendAjaxReqByUrl = function(url) {
        if (url == 'javascript:void(0);') {
            return false;
        }


        $.ajax({
            type: "GET",
            dataType: "html",
            url: url,
            beforeSend: function() {
                $.fn.blockUI();
            },
            success: function(data) {

                $(parent).html(data);
                $(parent).fadeIn();
                //$.fn.unblockUI();
            },
            complete: function() {
                $.fn.unblockUI();
            }

        });
        return false;
    }
    $.fn.submitFormByAjax = function() {

        $.ajax({
            type: "GET",
            dataType: "html",
            url: options.url,
            data: $("form", parent).serialize(),
            beforeSend: function() {
                $.fn.blockUI();
            },
            success: function(data) {

                $(parent).html(data);
                $(parent).fadeIn();
                $.fn.unblockUI();

            },
            complete: function() {
                $.fn.unblockUI();
            }

        });

    }

})(jQuery);