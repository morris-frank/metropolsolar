/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @since       3.2
 */

$( document ).ready(function() {
  var  header = document.getElementsByTagName("header")[0];
  var secHead = document.querySelector("section.head");
  var shrinkHeader = 40;
  $(window).scroll(function() {
    var scroll = getCurrentScroll();
    if ( scroll >= shrinkHeader ) {
      header.className = "shrink";
    } else {
      header.className = "";
    }

    var posY = -200 - (scroll/3)
    secHead.style.backgroundPositionY = posY.toString() +"px";
  });
  function getCurrentScroll() {
    return window.pageYOffset;
  }
});