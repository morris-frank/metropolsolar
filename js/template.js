/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @since       3.2
 */

$( document ).ready(function() {
 var shrinkHeader = 100;
  $(window).scroll(function() {
    var scroll = getCurrentScroll();
        var  header = document.getElementsByTagName("header")[0];
      if ( scroll >= shrinkHeader ) {
       	header.className = "shrink";
        }
        else {
        	header.className = "";
        }
  });
function getCurrentScroll() {
    return window.pageYOffset;
    }
});