/*global $ */
$(document).ready(function() {

    "use strict";

    $('.megamenu > ul > li:has( > ul)').addClass('menu-dropdown-icon');
    //Checks if li has sub (ul) and adds class for toggle icon - just an UI


    $('.megamenu > ul > li > ul:not(:has(ul))').addClass('normal-sub');
    //Checks if drodown megamenu's li elements have anothere level (ul), if not the dropdown is shown as regular dropdown, not a mega megamenu (thanks Luka Kladaric)

    $(".megamenu > ul").before("<div class=\"menu-mobile\">Categories</div>");

    //Adds megamenu-mobile class (for mobile toggle megamenu) before the normal megamenu
    //Mobile megamenu is hidden if width is more then 959px, but normal megamenu is displayed
    //Normal megamenu is hidden if width is below 959px, and jquery adds mobile megamenu
    //Done this way so it can be used with wordpress without any trouble





    // $(".megamenu > ul > li").hover(function(e) {
    //     if ($(window).width() > 648) {
    //         $(this).children("ul").stop(true, false).fadeToggle(150);
    //         e.preventDefault();
    //     }
    // });






    //If width is more than 648px dropdowns are displayed on hover

    $(".megamenu > ul > li").click(function() {
        if ($(window).width() <= 648) {
            $(this).children("ul").fadeToggle(150);
        }
    });
    //If width is less or equal to 648px dropdowns are displayed on click (thanks Aman Jain from stackoverflow)

    $(".menu-mobile").click(function(e) {
        $(".megamenu > ul").toggleClass('show-on-mobile');
        e.preventDefault();
    });
    //when clicked on mobile-megamenu, normal megamenu is shown as a list, classic rwd megamenu story (thanks mwl from stackoverflow)

});
