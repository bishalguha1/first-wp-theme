; (function($){

    $(document).ready(function(){
        $('.popup').each(function(){
            var getImg = $(this).find('img').attr('src');
            $(this).attr('href' , getImg);
        });
     });

 })(jQuery);