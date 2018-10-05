//http://jsfiddle.net/aniskhan001/ux00pv5d/
$.fn.extend({
    treed: function (o) {
      
      var openedClass = 'glyphicon glyphicon-plus';
      var closedClass = 'glyphicon glyphicon-minus';
      
      if (typeof o != 'undefined'){
        if (typeof o.openedClass != 'undefined'){
        openedClass = o.openedClass;
        }
        if (typeof o.closedClass != 'undefined'){
        closedClass = o.closedClass;
        }
      };

      
        /* initialize each of the top levels */
        var tree = $(this);
        tree.addClass("tree");
        tree.find('li').has("ul").each(function () {
            var branch = $(this);
            //branch.prepend("");
            branch.prepend('<i class="'+openedClass+'"></i>')
            branch.addClass('branch');
            branch.on('click', function (e) {
                
                if (this == e.target) {
                    //console.log('cicked'+openedClass);
                    var icon = $(this).children('i:first');
                    icon.toggleClass(openedClass + " " + closedClass);
                    $(this).children().children().toggle();
                }
            })
            branch.children().children().toggle();

            
            //branch.prepend('<i class="'+openedClass+'"></i>')

        });
        /* fire event from the dynamically added icon */
        tree.find('.branch .indicator').each(function(){
            $(this).on('click', function () {
                $(this).closest('li').click();
            });
        });
        /* fire event to open branch if the li contains an anchor instead of text */
        tree.find('.branch>a').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
        /* fire event to open branch if the li contains a button instead of text */
        tree.find('.branch>button').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
    }
});
