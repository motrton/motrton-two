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
// function autocomplete ($) {
// // This would be jQuery autocomplete
// // searchterms
// var searchtermstring = $('#searchterms').text();
// // var searchterms = $.parseJSON("'" + searchtermstring + "'");
// // var terms = searchterms.list;
// // var availableTags = ["Batman", "Spiderman", "Hulk"];
// var terms = searchtermstring.split(',');
// terms.pop();
//  $( "input#s" ).autocomplete({
//      source: terms,
//      minLength: 0,
//      autoFocus: true,
//      delay: 10
// });
// $("div#debuginfo").append("<p>Preset searchterms added with js: -->" + terms + " as "+ terms.constructor.name+ "</p>");
// }
// function suggestions ($) {
//     var acs_action = 'myprefix_autocompletesearch';
//     // var res =  $.getJSON(MyAcSearch.url+'?callback=?&action='+acs_action);
//    $('input#s').suggest("<?php echo get_bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php?callback=?&action=" +acs_action, {multiple:false});
// }
/**
* using superfish plugin
*/function superfish(e){var t=e(window).width();t>=480&&e("ul.sf-menu,menu").superfish({pathLevels:2,autoArrows:!1,dropShadows:!1})}function linkIcons(e){e(".entry-content").find("a").prepend('<i class="icon-hand-right"></i> ')}function mobileDropdown(e){if(e(".navbar, .navbar-fixed-top, .visible-phone").css("display")!=="none !important"){e(".nav").children("li").addClass("dropdown");e("ul.nav > li.dropdown").children("a").addClass("dropdown-toggle");e(".dropdown-toggle").attr("data-toggle","dropdown");e("a.dropdown-toggle").append(' <b class="caret"></b>');e("li.dropdown > ul.children").addClass("dropdown-menu");e("ul.nav > li").last().children("a").children("b").removeClass("caret");e("li.current_page_item").addClass("open");e("li.dropdown > a.dropdown-toggle").click(function(){var t=e(this).attr("href");window.location=t})}}function helper(e){var t=document.referrer;e("div#debuginfo").append("This is where you came from"+t+"<br>");var n="<?php echo get_bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php?action=search";e("div#debuginfo").append("<br>"+n)}jQuery(document).ready(function(e){superfish(e);linkIcons(e);mobileDropdown(e);helper(e)});