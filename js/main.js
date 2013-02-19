// main.js
// Copyright (c)  2013
// Fabian "fabiantheblind" Morón Zirfas
// Permission is hereby granted, free of charge, to any
// person obtaining a copy of this software and associated
// documentation files (the "Software"), to deal in the Software
// without restriction, including without limitation the rights
// to use, copy, modify, merge, publish, distribute, sublicense,
// and/or sell copies of the Software, and to  permit persons to
// whom the Software is furnished to do so, subject to
// the following conditions:
// The above copyright notice and this permission notice
// shall be included in all copies or substantial portions of the Software.
// THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
// EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
// OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
// IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM,
// DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF  CONTRACT,
// TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTIO
// WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

// see also http://www.opensource.org/licenses/mit-license.php




// function mediaqueries($){
//   var ww = $(window).width();
//   var sz1 = 480;/* Landscape phones and down*/
//   var sz2 = 768; /* Landscape phone to portrait tablet */
//   var sz3 = 1024; /*Portrait tablet to landscape and desktop*/
//   var sz4 = 1600; /* Large desktop*/
  
//   if(ww < sz1 ){
//     /* Landscape phones and down*/
//     // $("#getSize1").removeClass().addClass("row-fluid");
//     // $("#getSize2").removeClass().addClass("span11");

//   }else if(ww > sz1 && ww <  sz2){
//     /* Landscape phone to portrait tablet */
//     // $("#getSize1").removeClass().addClass("row-fluid");
//     // $("#getSize2").removeClass().addClass("span11");

//   }else if(ww > sz2 && ww < sz3 ){
//     /*Portrait tablet to landscape*/
//     // $("#getSize1").removeClass().addClass("row");
//     // $("#getSize2").removeClass().addClass("span11 offset1");

//   }else if(ww > sz3 && ww < sz4 ){

//     /* tablet landscape to desktop*/
//     // $("#getSize1").removeClass().addClass("row");
//     //  $("#getSize2").removeClass().addClass("span8");

//   }else if(ww > sz4){
//      /* Large desktop*/
//     // $("#getSize1").removeClass().addClass("row");
//     // $("#getSize2").removeClass().addClass("span8");

//   }
    
//   }

/**
* using superfish plugin
*/
function superfish ($) {
// var width = $(window).width();
// if (width >=480) {
    $("ul.sf-menu,menu").superfish({
         // pathClass: 'current_page_parent',
         pathLevels: 2,
         autoArrows: false,// disable generation of arrow mark-up
        dropShadows: false// disable drop shadows
    });
// }else{

// }

}

/**
 * ADDING <i> to every link in specific container
 */
function linkIcons ($) {
// thanks to
// http://stackoverflow.com/questions/7258606/how-to-select-elements-which-do-not-have-a-specific-child-element-with-jquery

$('.entry-content').find('a[title]').prepend(function(){
// return 'hellow';
  return '<i class="' + $(this).attr('title') + '"></i> ';
});
  // var link = $('.entry-content a[title]');
  // if(link.attr('title')){
  //     var title = link.attr('title');
  //   link.prepend('<i class="' + title+ '"></i> ');
  // }

 $('.entry-content').find('a:not(:has(>img, i))').prepend('<i class="icon-hand-right"></i> ');
    // }
}


/**
 * Add better letterpress to elements
 * Looks better nut links get unclickable
 *
 */
// function depthLetterpress ($) {
// $('h1, h2, h3, h4').addClass('depth');
// $('h1, h2, h3').attr('title',function(){
//     return $(this).text();
// });
// }
//
// make the dropdown phone only
// function mobileDropdown ($) {


// if($('.navbar, .navbar-fixed-top, .visible-phone').css('display') !== 'none !important'){
// $('.nav').children('li').addClass('dropdown');
// $('ul.nav > li.dropdown').children('a').addClass('dropdown-toggle');
// $('.dropdown-toggle').attr('data-toggle','dropdown');
// $('a.dropdown-toggle').append(' <b class="caret"></b>');
// $('li.dropdown > ul.children').addClass('dropdown-menu');

// // remove the caret on the blog tab
// $('ul.nav > li').last().children('a').children('b').removeClass('caret');

// // we have to open the current item
// $('li.current_page_item').addClass('open');

// $('li.dropdown > a.dropdown-toggle').click(
//     function(){
//             var a_href = $(this).attr('href');
//             window.location = a_href;
//             }
//         );
//     }
// }

function helper ($) {
// get previous url
var cameFrom =  document.referrer;
$('div#debuginfo').append('This is where you came from' + cameFrom+ '<br>');
var res = "<?php echo get_bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php?action=search";
$('div#debuginfo').append('<br>' + res);
}

// function scrolltop_pos ($) {
  // var position = $('aside').position();
  // $('#scrolltop').css('right',position.right);
  //   $('#scrolltop').css('left',position.right -100);

// }

// jQuery(function($) {
//     $( ".combobox" ).combobox();
//     $( ".toggle" ).click(function() {
//       $( ".combobox" ).toggle();
//     });
//  });

// jQuery(window).resize(mediaqueries($));


jQuery(document).ready(function($){
superfish($);
linkIcons($);


$(window).resize(function() {
        superfish($);
    });


$(window).scroll(function() {
    if ($(this).scrollTop()) {
        $('#scrolltop').fadeIn();
    } else {
        $('#scrolltop').fadeOut();
    }
});

$('label > span.required').replaceWith('<span class="required"><i class="icon-asterisk"></i></span>');
//http://docs.jquery.com/UI/Effects/toggle
//effect String
// The effect to be used. Possible values:
// 'blind', 'clip', 'drop', 'explode', 'fold', 'puff', 'slide', 'scale', 'size', 'pulsate'.

// options Hash Optional
// A object/hash including specific options for the effect.

// speed String, Number Optional
// A string representing one of the predefined speeds ("slow" or "fast")
// or the number of milliseconds to run the animation (e.g. 1000).
// callback
// Function Optional
//
$('i#revealsearch').click(function(){
    $('li#searchfield').toggle('slide', {direction: 'right'}, 500);
});

$("a[href='#top']").click(function() {
  $("html, body").animate({ scrollTop: 0 }, "slow");
  return false;
});


// $('ul#desktop-search>li').last().css('background-color', 'red');
// // depthLetterpress($);
// mobileDropdown($);
helper($);
});
