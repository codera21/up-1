(function ($) {
    'use strict';

    $(document).ready(function () {

        if ($("form#material").length) {

            $("#sub_group_id").chained("#group_id");
                
        }

         $('form#material select#material_type').change(function() {

            if ($(this).val() == 'VIDEO') {
                $('#material-course').css('display', 'none');
                $('#material-video').css('display', 'block');
            } else { 
                $('#material-course').show();
                $('#material-video').hide();
            }
        })

        //iCheck Style
        $('form:not(.gridForm, .form-nostyle , #order-detail) input[type="checkbox"], input[type="radio"]').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
        });
        
        // Send CSRF Token with all Ajax Requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //Select/Unselect All items in cart
        $(".check-all").change(function () {
            var selector = $(this).data('for');
            $(selector + ':not(:disabled)').prop('checked', $(this).prop("checked"));
        });

        //Form Styling
        $("select[multiple='multiple']").chosen();

        //ColorBox
        if ($("a.iFrame").length > 0) {
            $("a.iFrame").each(function (index) {
                var iFrame = getURLVars($(this).attr("href"));
                $(this).colorbox({
                    width: iFrame["width"],
                    height: iFrame["height"],
                    iframe: true,
                    fixed: true,
                    'onClosed': function () {
                        if (iFrame["reload"] == 'true') {
                            location.reload();
                        }
                    }
                });
            });
        }

        //Bootstrap DatePicker and DateRange
        $('.datepicker').datepicker({});
        $('.daterange').daterangepicker({});


        /* Initialization of treeviews */
        $('#tree1').treed($('#tree1'));


    });// End Document Ready


})(jQuery);


/**
 * Change Left & Right Sidebar Drop Down
 * 
 * @param integer val
 * @returns boolean
 */
jQuery.fn.changeLeftRightSidebars = function(val) {
    //console.log('change Left Right Side Bards');
    if (val == 'NO SIDEBAR') {
        jQuery('#left-sidebar-block-box').css('display', 'none');
        jQuery('#right-sidebar-block-box').css('display', 'none');
    } else if(val == 'LEFT SIDEBAR'){
        jQuery('#left-sidebar-block-box').css('display', 'block');
        jQuery('#right-sidebar-block-box').css('display', 'none');
    } else if(val == 'RIGHT SIDEBAR'){
        jQuery('#left-sidebar-block-box').css('display', 'none');
        jQuery('#right-sidebar-block-box').css('display', 'block');
    } else if(val == 'LEFT & RIGHT SIDEBARS'){
        jQuery('#left-sidebar-block-box').css('display', 'block');
        jQuery('#right-sidebar-block-box').css('display', 'block');
    }
    return false;
}

/**
 * Build Custom Slug with Parent Page embeded slug
*/
jQuery.fn.buildSlug = function(str) {                
    
    var $selected = jQuery('form#manage-page select#parent_id option:selected');
    var $slug = '';
    var trimmed = jQuery.trim(str);
    $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '');


    if($selected.data('slug')!='' && $selected.data('slug')!=undefined){
        return $selected.data('slug')+'/'+$slug.toLowerCase();
    }else{
        return $slug.toLowerCase();
    }
    
};





