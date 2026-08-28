$( document ).ready(function() {

    $("html").delegate(".openclosebtn", "click", function() {
        $('nav.site-navigation, .openclosebtn').toggleClass("showmobnav");    
        $('html, body').toggleClass("scrolllock");  
        $('.site-title-col, .strapline-col').toggleClass("hideonmenu"); 
    });

    $("html").delegate(".scrolllock .menu a", "click", function() {
        $('nav.site-navigation, .openclosebtn').toggleClass("showmobnav");
        $('html, body').toggleClass("scrolllock");  
        $('.site-title-col, .strapline-col').toggleClass("hideonmenu"); 
    });

    // $( ".signupbtn" ).on('click',function() {
    //     $('body').toggleClass('showsubscribe');
    // });

    // $( ".closesubscribe" ).on('click',function() {
    //     $('body').removeClass('showsubscribe');
    //     $('.signupformfull').css('display', '');
    // });

});    