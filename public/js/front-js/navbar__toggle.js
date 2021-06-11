JQuery(document).ready(function($){
    "use strict";

    $('body').on('click','.js__toggle',function(e){
        var $this = $(this);
        e.preventDfault();

        if($('body').hasClass('off__view')){
            $('body').removeClass('off__view')
        }else{
            $('body').addClass('off__view')
        }
    })
});