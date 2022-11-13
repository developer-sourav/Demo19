
//equal-height

/**
* jquery-match-height 0.7.2 by @liabru
* http://brm.io/jquery-match-height/
* License: MIT
*/

;(function(factory) { // eslint-disable-line no-extra-semi
  'use strict';
  if (typeof define === 'function' && define.amd) {
      // AMD
      define(['jquery'], factory);
  } else if (typeof module !== 'undefined' && module.exports) {
      // CommonJS
      module.exports = factory(require('jquery'));
  } else {
      // Global
      factory(jQuery);
  }
})(function($) {
  /*
  *  internal
  */

  var _previousResizeWidth = -1,
      _updateTimeout = -1;

  /*
  *  _parse
  *  value parse utility function
  */

  var _parse = function(value) {
      // parse value and convert NaN to 0
      return parseFloat(value) || 0;
  };

  /*
  *  _rows
  *  utility function returns array of jQuery selections representing each row
  *  (as displayed after float wrapping applied by browser)
  */

  var _rows = function(elements) {
      var tolerance = 1,
          $elements = $(elements),
          lastTop = null,
          rows = [];

      // group elements by their top position
      $elements.each(function(){
          var $that = $(this),
              top = $that.offset().top - _parse($that.css('margin-top')),
              lastRow = rows.length > 0 ? rows[rows.length - 1] : null;

          if (lastRow === null) {
              // first item on the row, so just push it
              rows.push($that);
          } else {
              // if the row top is the same, add to the row group
              if (Math.floor(Math.abs(lastTop - top)) <= tolerance) {
                  rows[rows.length - 1] = lastRow.add($that);
              } else {
                  // otherwise start a new row group
                  rows.push($that);
              }
          }

          // keep track of the last row top
          lastTop = top;
      });

      return rows;
  };

  /*
  *  _parseOptions
  *  handle plugin options
  */

  var _parseOptions = function(options) {
      var opts = {
          byRow: true,
          property: 'height',
          target: null,
          remove: false
      };

      if (typeof options === 'object') {
          return $.extend(opts, options);
      }

      if (typeof options === 'boolean') {
          opts.byRow = options;
      } else if (options === 'remove') {
          opts.remove = true;
      }

      return opts;
  };

  /*
  *  matchHeight
  *  plugin definition
  */

  var matchHeight = $.fn.matchHeight = function(options) {
      var opts = _parseOptions(options);

      // handle remove
      if (opts.remove) {
          var that = this;

          // remove fixed height from all selected elements
          this.css(opts.property, '');

          // remove selected elements from all groups
          $.each(matchHeight._groups, function(key, group) {
              group.elements = group.elements.not(that);
          });

          // TODO: cleanup empty groups

          return this;
      }

      if (this.length <= 1 && !opts.target) {
          return this;
      }

      // keep track of this group so we can re-apply later on load and resize events
      matchHeight._groups.push({
          elements: this,
          options: opts
      });

      // match each element's height to the tallest element in the selection
      matchHeight._apply(this, opts);

      return this;
  };

  /*
  *  plugin global options
  */

  matchHeight.version = '0.7.2';
  matchHeight._groups = [];
  matchHeight._throttle = 80;
  matchHeight._maintainScroll = false;
  matchHeight._beforeUpdate = null;
  matchHeight._afterUpdate = null;
  matchHeight._rows = _rows;
  matchHeight._parse = _parse;
  matchHeight._parseOptions = _parseOptions;

  /*
  *  matchHeight._apply
  *  apply matchHeight to given elements
  */

  matchHeight._apply = function(elements, options) {
      var opts = _parseOptions(options),
          $elements = $(elements),
          rows = [$elements];

      // take note of scroll position
      var scrollTop = $(window).scrollTop(),
          htmlHeight = $('html').outerHeight(true);

      // get hidden parents
      var $hiddenParents = $elements.parents().filter(':hidden');

      // cache the original inline style
      $hiddenParents.each(function() {
          var $that = $(this);
          $that.data('style-cache', $that.attr('style'));
      });

      // temporarily must force hidden parents visible
      $hiddenParents.css('display', 'block');

      // get rows if using byRow, otherwise assume one row
      if (opts.byRow && !opts.target) {

          // must first force an arbitrary equal height so floating elements break evenly
          $elements.each(function() {
              var $that = $(this),
                  display = $that.css('display');

              // temporarily force a usable display value
              if (display !== 'inline-block' && display !== 'flex' && display !== 'inline-flex') {
                  display = 'block';
              }

              // cache the original inline style
              $that.data('style-cache', $that.attr('style'));

              $that.css({
                  'display': display,
                  'padding-top': '0',
                  'padding-bottom': '0',
                  'margin-top': '0',
                  'margin-bottom': '0',
                  'border-top-width': '0',
                  'border-bottom-width': '0',
                  'height': '100px',
                  'overflow': 'hidden'
              });
          });

          // get the array of rows (based on element top position)
          rows = _rows($elements);

          // revert original inline styles
          $elements.each(function() {
              var $that = $(this);
              $that.attr('style', $that.data('style-cache') || '');
          });
      }

      $.each(rows, function(key, row) {
          var $row = $(row),
              targetHeight = 0;

          if (!opts.target) {
              // skip apply to rows with only one item
              if (opts.byRow && $row.length <= 1) {
                  $row.css(opts.property, '');
                  return;
              }

              // iterate the row and find the max height
              $row.each(function(){
                  var $that = $(this),
                      style = $that.attr('style'),
                      display = $that.css('display');

                  // temporarily force a usable display value
                  if (display !== 'inline-block' && display !== 'flex' && display !== 'inline-flex') {
                      display = 'block';
                  }

                  // ensure we get the correct actual height (and not a previously set height value)
                  var css = { 'display': display };
                  css[opts.property] = '';
                  $that.css(css);

                  // find the max height (including padding, but not margin)
                  if ($that.outerHeight(false) > targetHeight) {
                      targetHeight = $that.outerHeight(false);
                  }

                  // revert styles
                  if (style) {
                      $that.attr('style', style);
                  } else {
                      $that.css('display', '');
                  }
              });
          } else {
              // if target set, use the height of the target element
              targetHeight = opts.target.outerHeight(false);
          }

          // iterate the row and apply the height to all elements
          $row.each(function(){
              var $that = $(this),
                  verticalPadding = 0;

              // don't apply to a target
              if (opts.target && $that.is(opts.target)) {
                  return;
              }

              // handle padding and border correctly (required when not using border-box)
              if ($that.css('box-sizing') !== 'border-box') {
                  verticalPadding += _parse($that.css('border-top-width')) + _parse($that.css('border-bottom-width'));
                  verticalPadding += _parse($that.css('padding-top')) + _parse($that.css('padding-bottom'));
              }

              // set the height (accounting for padding and border)
              $that.css(opts.property, (targetHeight - verticalPadding) + 'px');
          });
      });

      // revert hidden parents
      $hiddenParents.each(function() {
          var $that = $(this);
          $that.attr('style', $that.data('style-cache') || null);
      });

      // restore scroll position if enabled
      if (matchHeight._maintainScroll) {
          $(window).scrollTop((scrollTop / htmlHeight) * $('html').outerHeight(true));
      }

      return this;
  };

  /*
  *  matchHeight._applyDataApi
  *  applies matchHeight to all elements with a data-match-height attribute
  */

  matchHeight._applyDataApi = function() {
      var groups = {};

      // generate groups by their groupId set by elements using data-match-height
      $('[data-match-height], [data-mh]').each(function() {
          var $this = $(this),
              groupId = $this.attr('data-mh') || $this.attr('data-match-height');

          if (groupId in groups) {
              groups[groupId] = groups[groupId].add($this);
          } else {
              groups[groupId] = $this;
          }
      });

      // apply matchHeight to each group
      $.each(groups, function() {
          this.matchHeight(true);
      });
  };

  /*
  *  matchHeight._update
  *  updates matchHeight on all current groups with their correct options
  */

  var _update = function(event) {
      if (matchHeight._beforeUpdate) {
          matchHeight._beforeUpdate(event, matchHeight._groups);
      }

      $.each(matchHeight._groups, function() {
          matchHeight._apply(this.elements, this.options);
      });

      if (matchHeight._afterUpdate) {
          matchHeight._afterUpdate(event, matchHeight._groups);
      }
  };

  matchHeight._update = function(throttle, event) {
      // prevent update if fired from a resize event
      // where the viewport width hasn't actually changed
      // fixes an event looping bug in IE8
      if (event && event.type === 'resize') {
          var windowWidth = $(window).width();
          if (windowWidth === _previousResizeWidth) {
              return;
          }
          _previousResizeWidth = windowWidth;
      }

      // throttle updates
      if (!throttle) {
          _update(event);
      } else if (_updateTimeout === -1) {
          _updateTimeout = setTimeout(function() {
              _update(event);
              _updateTimeout = -1;
          }, matchHeight._throttle);
      }
  };

  /*
  *  bind events
  */

  // apply on DOM ready event
  $(matchHeight._applyDataApi);

  // use on or bind where supported
  var on = $.fn.on ? 'on' : 'bind';

  // update heights on load and resize events
  $(window)[on]('load', function(event) {
      matchHeight._update(false, event);
  });

  // throttled update heights on resize events
  $(window)[on]('resize orientationchange', function(event) {
      matchHeight._update(true, event);
  });

});

$(function(){
    var equal_height = $(".equal-height");
    if (equal_height.length) {
        equal_height.matchHeight();
    }
})

//--------------------------------------------------------------------------------------------


//sidenavbar

!function(a){"use strict";function b(b,d){this.$el=a(b),this.opt=a.extend(!0,{},c,d),this.init(this)}var c={};b.prototype={init:function(a){a.initToggle(a),a.initDropdown(a)},initToggle:function(b){a(document).on("click",function(c){var d=a(c.target);d.closest(b.$el.data("sidenav-toggle"))[0]?(b.$el.toggleClass("show"),a("body").toggleClass("sidenav-no-scroll"),b.toggleOverlay()):d.closest(b.$el)[0]||(b.$el.removeClass("show"),a("body").removeClass("sidenav-no-scroll"),b.hideOverlay())})},initDropdown:function(b){b.$el.on("click","[data-sidenav-dropdown-toggle]",function(b){var c=a(this);c.next("[data-sidenav-dropdown]").slideToggle("fast"),c.find("[data-sidenav-dropdown-icon]").toggleClass("show"),b.preventDefault()})},toggleOverlay:function(){var b=a("[data-sidenav-overlay]");b[0]||(b=a('<div data-sidenav-overlay class="sidenav-overlay"/>'),a("body").append(b)),b.fadeToggle("fast")},hideOverlay:function(){a("[data-sidenav-overlay]").fadeOut("fast")}},a.fn.sidenav=function(c){return this.each(function(){a.data(this,"sidenav")||a.data(this,"sidenav",new b(this,c))})}}(window.jQuery);

$('[data-sidenav]').sidenav();




//hoverdropdown
(function(factory) {
    if (typeof define === 'function' && define.amd) {
      define(['jquery'], factory);
    } else if (typeof module === 'object' && module.exports) {
      module.exports = function(root, jQuery) {
        if (jQuery === undefined) {
          if (typeof window !== 'undefined') {
            jQuery = require('jquery');
          }
          else {
            jQuery = require('jquery')(root);
          }
        }
        factory(jQuery);
        return jQuery;
      };
    } else {
      factory(jQuery);
    }
  }(function($) {
    var pluginName = 'bootstrapDropdownHover',
        defaults = {
          clickBehavior: 'sticky',  // Click behavior setting:
                                    // 'default' means that the dropdown toggles on hover and on click too
                                    // 'disable' disables dropdown toggling with clicking when mouse is detected
                                    //  'sticky' means if we click on an opened dropdown then it will not hide on
                                    //           mouseleave but on a second click only
          hideTimeout: 200
        },
        _hideTimeoutHandler,
        _hardOpened = false,
        _touchstartDetected = false,
        _mouseDetected = false;
  
    // The actual plugin constructor
    function BootstrapDropdownHover(element, options) {
      this.element = $(element);
      this.settings = $.extend({}, defaults, options, this.element.data());
      this._defaults = defaults;
      this._name = pluginName;
      this.init();
    }
  
    function bindEvents(dropdown) {
      var $body = $('body');
  
      $body.one('touchstart.dropdownhover', function() {
        _touchstartDetected = true;
      });
  
      $body.one('mousemove.dropdownhover', function() {
        // touchstart fires before mousemove on touch devices
        if (!_touchstartDetected) {
          _mouseDetected = true;
        }
      });
  
      $('.dropdown-toggle, .dropdown-menu', dropdown.element.parent()).on('mouseenter.dropdownhover', function () {
        // seems to be a touch device
        if(_mouseDetected && !$(this.hover)) {
          _mouseDetected = false;
        }
  
        if (!_mouseDetected) {
          return;
        }
  
        clearTimeout(_hideTimeoutHandler);
        if (!dropdown.element.parent().is('.open, .show')) {
          _hardOpened = false;
          dropdown.element.dropdown('toggle');
        }
      });
  
      $('.dropdown-toggle, .dropdown-menu', dropdown.element.parent()).on('mouseleave.dropdownhover', function () {
        if (!_mouseDetected) {
          return;
        }
  
        if (_hardOpened) {
          return;
        }
        _hideTimeoutHandler = setTimeout(function () {
          if (dropdown.element.parent().is('.open, .show')) {
            dropdown.element.dropdown('toggle');
          }
        }, dropdown.settings.hideTimeout);
      });
  
      dropdown.element.on('click.dropdownhover', function (e) {
        if (!_mouseDetected) {
          return;
        }
  
        switch(dropdown.settings.clickBehavior) {
          case 'default':
            return;
          case 'disable':
            e.preventDefault();
            e.stopImmediatePropagation();
            break;
          case 'sticky':
            if (_hardOpened) {
              _hardOpened = false;
            }
            else {
              _hardOpened = true;
              if (dropdown.element.parent().is('.open, .show')) {
                e.stopImmediatePropagation();
                e.preventDefault();
              }
            }
            return;
        }
      });
    }
  
    function removeEvents(dropdown) {
      $('.dropdown-toggle, .dropdown-menu', dropdown.element.parent()).off('.dropdownhover');
      // seems that bootstrap binds the click handler twice after we reinitializing the plugin after a destroy...
      $('.dropdown-toggle, .dropdown-menu', dropdown.element.parent()).off('.dropdown');
      dropdown.element.off('.dropdownhover');
      $('body').off('.dropdownhover');
    }
  
    BootstrapDropdownHover.prototype = {
      init: function () {
        this.setClickBehavior(this.settings.clickBehavior);
        this.setHideTimeout(this.settings.hideTimeout);
        bindEvents(this);
        return this.element;
      },
      setClickBehavior: function(value) {
        this.settings.clickBehavior = value;
        return this.element;
      },
      setHideTimeout: function(value) {
        this.settings.hideTimeout = value;
        return this.element;
      },
      destroy: function() {
        clearTimeout(_hideTimeoutHandler);
        removeEvents(this);
        this.element.data('plugin_' + pluginName, null);
        return this.element;
      }
    };
  
    // A really lightweight plugin wrapper around the constructor,
    // preventing against multiple instantiations
    $.fn[pluginName] = function (options) {
      var args = arguments;
  
      // Is the first parameter an object (options), or was omitted, instantiate a new instance of the plugin.
      if (options === undefined || typeof options === 'object') {
        // This allows the plugin to be called with $.fn.bootstrapDropdownHover();
        if (!$.contains(document, $(this)[0])) {
          $('[data-toggle="dropdown"]').each(function (index, item) {
            // For each nested select, instantiate the plugin
            $(item).bootstrapDropdownHover(options);
          });
        }
        return this.each(function () {
          // If this is not a select
          if (!$(this).hasClass('dropdown-toggle') || $(this).data('toggle') !== 'dropdown') {
            $('[data-toggle="dropdown"]', this).each(function (index, item) {
              // For each nested select, instantiate the plugin
              $(item).bootstrapDropdownHover(options);
            });
          } else if (!$.data(this, 'plugin_' + pluginName)) {
            // Only allow the plugin to be instantiated once so we check that the element has no plugin instantiation yet
  
            // if it has no instance, create a new one, pass options to our plugin constructor,
            // and store the plugin instance in the elements jQuery data object.
            $.data(this, 'plugin_' + pluginName, new BootstrapDropdownHover(this, options));
          }
        });
  
        // If the first parameter is a string and it doesn't start with an underscore or "contains" the `init`-function,
        // treat this as a call to a public method.
      } else if (typeof options === 'string' && options[0] !== '_' && options !== 'init') {
  
        // Cache the method call to make it possible to return a value
        var returns;
  
        this.each(function () {
          var instance = $.data(this, 'plugin_' + pluginName);
          // Tests that there's already a plugin-instance and checks that the requested public method exists
          if (instance instanceof BootstrapDropdownHover && typeof instance[options] === 'function') {
            // Call the method of our plugin instance, and pass it the supplied arguments.
            returns = instance[options].apply(instance, Array.prototype.slice.call(args, 1));
          }
        });
  
        // If the earlier cached method gives a value back return the value,
        // otherwise return this to preserve chainability.
        return returns !== undefined ? returns : this;
      }
  
    };
  
  }));

  $(function(){
    $('.navbar [data-toggle="dropdown"]').bootstrapDropdownHover();
  })


//popover
$(function () {
  $('[data-toggle="popover"]').popover({
    container: 'body',
    html : true
  })
})
  
//dataTable
$(function(){
  $('#main-data-table').DataTable();
})

//datepicker
$(function(){
  $(".date").flatpickr({
    enableTime: false,
    dateFormat: "d-m-Y",
  });
})

//Quantity
$(".quantity").find(".qty-up").on("click",function(){
  var min = $(this).prev().attr("data-min");
  var max = $(this).prev().attr("data-max");
  var step = $(this).prev().attr("data-step");
  if(step === undefined) step = 1;
  if(max !==undefined && Number($(this).prev().val())< Number(max) || max === undefined){ 
    if(step!='') $(this).prev().val(Number($(this).prev().val())+Number(step));
  }
  return false;
  })
  $(".quantity").find(".qty-down").on("click",function(){
  var min = $(this).next().attr("data-min");
  var max = $(this).next().attr("data-max");
  var step = $(this).next().attr("data-step");
  if(step === undefined) step = 1;
  if(Number($(this).next().val()) > 1){
    if(min !==undefined && $(this).next().val()>min || min === undefined){
      if(step!='') $(this).next().val(Number($(this).next().val())-Number(step));
    }
  }
  return false;
  })
  $("input.qty-val").on("keyup change",function(){
  var max = $(this).attr('data-max');
  if( Number($(this).val()) > Number(max) ) $(this).val(max);
})

//-----------------------------------------------------------------------------------------------------
//superfish
/*
 * jQuery Superfish Menu Plugin - v1.7.10
 * Copyright (c) 2018 Joel Birch
 *
 * Dual licensed under the MIT and GPL licenses:
 *	http://www.opensource.org/licenses/mit-license.php
 *	http://www.gnu.org/licenses/gpl.html
 */

;!function(a,b){"use strict";var c=function(){var c={bcClass:"sf-breadcrumb",menuClass:"sf-js-enabled",anchorClass:"sf-with-ul",menuArrowClass:"sf-arrows"},d=function(){var b=/^(?![\w\W]*Windows Phone)[\w\W]*(iPhone|iPad|iPod)/i.test(navigator.userAgent);return b&&a("html").css("cursor","pointer").on("click",a.noop),b}(),e=function(){var a=document.documentElement.style;return"behavior"in a&&"fill"in a&&/iemobile/i.test(navigator.userAgent)}(),f=function(){return!!b.PointerEvent}(),g=function(a,b,d){var e,f=c.menuClass;b.cssArrows&&(f+=" "+c.menuArrowClass),e=d?"addClass":"removeClass",a[e](f)},h=function(b,d){return b.find("li."+d.pathClass).slice(0,d.pathLevels).addClass(d.hoverClass+" "+c.bcClass).filter(function(){return a(this).children(d.popUpSelector).hide().show().length}).removeClass(d.pathClass)},i=function(a,b){var d=b?"addClass":"removeClass";a.children("a")[d](c.anchorClass)},j=function(a){var b=a.css("ms-touch-action"),c=a.css("touch-action");c=c||b,c="pan-y"===c?"auto":"pan-y",a.css({"ms-touch-action":c,"touch-action":c})},k=function(a){return a.closest("."+c.menuClass)},l=function(a){return k(a).data("sfOptions")},m=function(){var b=a(this),c=l(b);clearTimeout(c.sfTimer),b.siblings().superfish("hide").end().superfish("show")},n=function(b){b.retainPath=a.inArray(this[0],b.$path)>-1,this.superfish("hide"),this.parents("."+b.hoverClass).length||(b.onIdle.call(k(this)),b.$path.length&&a.proxy(m,b.$path)())},o=function(){var b=a(this),c=l(b);d?a.proxy(n,b,c)():(clearTimeout(c.sfTimer),c.sfTimer=setTimeout(a.proxy(n,b,c),c.delay))},p=function(b){var c=a(this),d=l(c),e=c.siblings(b.data.popUpSelector);return d.onHandleTouch.call(e)===!1?this:void(e.length>0&&e.is(":hidden")&&(c.one("click.superfish",!1),"MSPointerDown"===b.type||"pointerdown"===b.type?c.trigger("focus"):a.proxy(m,c.parent("li"))()))},q=function(b,c){var g="li:has("+c.popUpSelector+")";a.fn.hoverIntent&&!c.disableHI?b.hoverIntent(m,o,g):b.on("mouseenter.superfish",g,m).on("mouseleave.superfish",g,o);var h="MSPointerDown.superfish";f&&(h="pointerdown.superfish"),d||(h+=" touchend.superfish"),e&&(h+=" mousedown.superfish"),b.on("focusin.superfish","li",m).on("focusout.superfish","li",o).on(h,"a",c,p)};return{hide:function(b){if(this.length){var c=this,d=l(c);if(!d)return this;var e=d.retainPath===!0?d.$path:"",f=c.find("li."+d.hoverClass).add(this).not(e).removeClass(d.hoverClass).children(d.popUpSelector),g=d.speedOut;if(b&&(f.show(),g=0),d.retainPath=!1,d.onBeforeHide.call(f)===!1)return this;f.stop(!0,!0).animate(d.animationOut,g,function(){var b=a(this);d.onHide.call(b)})}return this},show:function(){var a=l(this);if(!a)return this;var b=this.addClass(a.hoverClass),c=b.children(a.popUpSelector);return a.onBeforeShow.call(c)===!1?this:(c.stop(!0,!0).animate(a.animation,a.speed,function(){a.onShow.call(c)}),this)},destroy:function(){return this.each(function(){var b,d=a(this),e=d.data("sfOptions");return!!e&&(b=d.find(e.popUpSelector).parent("li"),clearTimeout(e.sfTimer),g(d,e),i(b),j(d),d.off(".superfish").off(".hoverIntent"),b.children(e.popUpSelector).attr("style",function(a,b){if("undefined"!=typeof b)return b.replace(/display[^;]+;?/g,"")}),e.$path.removeClass(e.hoverClass+" "+c.bcClass).addClass(e.pathClass),d.find("."+e.hoverClass).removeClass(e.hoverClass),e.onDestroy.call(d),void d.removeData("sfOptions"))})},init:function(b){return this.each(function(){var d=a(this);if(d.data("sfOptions"))return!1;var e=a.extend({},a.fn.superfish.defaults,b),f=d.find(e.popUpSelector).parent("li");e.$path=h(d,e),d.data("sfOptions",e),g(d,e,!0),i(f,!0),j(d),q(d,e),f.not("."+c.bcClass).superfish("hide",!0),e.onInit.call(this)})}}}();a.fn.superfish=function(b,d){return c[b]?c[b].apply(this,Array.prototype.slice.call(arguments,1)):"object"!=typeof b&&b?a.error("Method "+b+" does not exist on jQuery.fn.superfish"):c.init.apply(this,arguments)},a.fn.superfish.defaults={popUpSelector:"ul,.sf-mega",hoverClass:"sfHover",pathClass:"overrideThisToUse",pathLevels:1,delay:800,animation:{opacity:"show"},animationOut:{opacity:"hide"},speed:"normal",speedOut:"fast",cssArrows:!0,disableHI:!1,onInit:a.noop,onBeforeShow:a.noop,onShow:a.noop,onBeforeHide:a.noop,onHide:a.noop,onIdle:a.noop,onDestroy:a.noop,onHandleTouch:a.noop}}(jQuery,window);


//-----------------------------------------------------------------------------------------------------
$(document).ready(function() {
  $('ul.sf-menu').superfish();
    var navigation = $('.navigation');
    $('.menu-toggle').on('click', function () {
      if (navigation.hasClass('opened')) {
          navigation.removeClass('opened').addClass('closed');
      } else {
          navigation.removeClass('closed').addClass('opened');
      }
    });
    $('.menu-toggle-close').on('click', function () {
      if (navigation.hasClass('opened')) {
          navigation.removeClass('opened').addClass('closed');
      } else {
          navigation.removeClass('closed').addClass('opened');
      }
    });
});

// Fixed menu toggle


//-----------------------------------------------------------------------------------------------------

//lightbox
/*!
 * Lightbox v2.11.1
 * by Lokesh Dhakar
 *
 * More info:
 * http://lokeshdhakar.com/projects/lightbox2/
 *
 * Copyright Lokesh Dhakar
 * Released under the MIT license
 * https://github.com/lokesh/lightbox2/blob/master/LICENSE
 *
 * @preserve
 */
!function(a,b){"function"==typeof define&&define.amd?define(["jquery"],b):"object"==typeof exports?module.exports=b(require("jquery")):a.lightbox=b(a.jQuery)}(this,function(a){function b(b){this.album=[],this.currentImageIndex=void 0,this.init(),this.options=a.extend({},this.constructor.defaults),this.option(b)}return b.defaults={albumLabel:"Image %1 of %2",alwaysShowNavOnTouchDevices:!1,fadeDuration:600,fitImagesInViewport:!0,imageFadeDuration:600,positionFromTop:50,resizeDuration:700,showImageNumberLabel:!0,wrapAround:!1,disableScrolling:!1,sanitizeTitle:!1},b.prototype.option=function(b){a.extend(this.options,b)},b.prototype.imageCountLabel=function(a,b){return this.options.albumLabel.replace(/%1/g,a).replace(/%2/g,b)},b.prototype.init=function(){var b=this;a(document).ready(function(){b.enable(),b.build()})},b.prototype.enable=function(){var b=this;a("body").on("click","a[rel^=lightbox], area[rel^=lightbox], a[data-lightbox], area[data-lightbox]",function(c){return b.start(a(c.currentTarget)),!1})},b.prototype.build=function(){if(!(a("#lightbox").length>0)){var b=this;a('<div id="lightboxOverlay" tabindex="-1" class="lightboxOverlay"></div><div id="lightbox" tabindex="-1" class="lightbox"><div class="lb-outerContainer"><div class="lb-container"><img class="lb-image" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" alt=""/><div class="lb-nav"><a class="lb-prev" aria-label="Previous image" href="" ></a><a class="lb-next" aria-label="Next image" href="" ></a></div><div class="lb-loader"><a class="lb-cancel"></a></div></div></div><div class="lb-dataContainer"><div class="lb-data"><div class="lb-details"><span class="lb-caption"></span><span class="lb-number"></span></div><div class="lb-closeContainer"><a class="lb-close"></a></div></div></div></div>').appendTo(a("body")),this.$lightbox=a("#lightbox"),this.$overlay=a("#lightboxOverlay"),this.$outerContainer=this.$lightbox.find(".lb-outerContainer"),this.$container=this.$lightbox.find(".lb-container"),this.$image=this.$lightbox.find(".lb-image"),this.$nav=this.$lightbox.find(".lb-nav"),this.containerPadding={top:parseInt(this.$container.css("padding-top"),10),right:parseInt(this.$container.css("padding-right"),10),bottom:parseInt(this.$container.css("padding-bottom"),10),left:parseInt(this.$container.css("padding-left"),10)},this.imageBorderWidth={top:parseInt(this.$image.css("border-top-width"),10),right:parseInt(this.$image.css("border-right-width"),10),bottom:parseInt(this.$image.css("border-bottom-width"),10),left:parseInt(this.$image.css("border-left-width"),10)},this.$overlay.hide().on("click",function(){return b.end(),!1}),this.$lightbox.hide().on("click",function(c){"lightbox"===a(c.target).attr("id")&&b.end()}),this.$outerContainer.on("click",function(c){return"lightbox"===a(c.target).attr("id")&&b.end(),!1}),this.$lightbox.find(".lb-prev").on("click",function(){return 0===b.currentImageIndex?b.changeImage(b.album.length-1):b.changeImage(b.currentImageIndex-1),!1}),this.$lightbox.find(".lb-next").on("click",function(){return b.currentImageIndex===b.album.length-1?b.changeImage(0):b.changeImage(b.currentImageIndex+1),!1}),this.$nav.on("mousedown",function(a){3===a.which&&(b.$nav.css("pointer-events","none"),b.$lightbox.one("contextmenu",function(){setTimeout(function(){this.$nav.css("pointer-events","auto")}.bind(b),0)}))}),this.$lightbox.find(".lb-loader, .lb-close").on("click",function(){return b.end(),!1})}},b.prototype.start=function(b){function c(a){d.album.push({alt:a.attr("data-alt"),link:a.attr("href"),title:a.attr("data-title")||a.attr("title")})}var d=this,e=a(window);e.on("resize",a.proxy(this.sizeOverlay,this)),this.sizeOverlay(),this.album=[];var f,g=0,h=b.attr("data-lightbox");if(h){f=a(b.prop("tagName")+'[data-lightbox="'+h+'"]');for(var i=0;i<f.length;i=++i)c(a(f[i])),f[i]===b[0]&&(g=i)}else if("lightbox"===b.attr("rel"))c(b);else{f=a(b.prop("tagName")+'[rel="'+b.attr("rel")+'"]');for(var j=0;j<f.length;j=++j)c(a(f[j])),f[j]===b[0]&&(g=j)}var k=e.scrollTop()+this.options.positionFromTop,l=e.scrollLeft();this.$lightbox.css({top:k+"px",left:l+"px"}).fadeIn(this.options.fadeDuration),this.options.disableScrolling&&a("body").addClass("lb-disable-scrolling"),this.changeImage(g)},b.prototype.changeImage=function(b){var c=this,d=this.album[b].link,e=d.split(".").slice(-1)[0],f=this.$lightbox.find(".lb-image");this.disableKeyboardNav(),this.$overlay.fadeIn(this.options.fadeDuration),a(".lb-loader").fadeIn("slow"),this.$lightbox.find(".lb-image, .lb-nav, .lb-prev, .lb-next, .lb-dataContainer, .lb-numbers, .lb-caption").hide(),this.$outerContainer.addClass("animating");var g=new Image;g.onload=function(){var h,i,j,k,l,m;f.attr({alt:c.album[b].alt,src:d}),a(g),f.width(g.width),f.height(g.height),m=a(window).width(),l=a(window).height(),k=m-c.containerPadding.left-c.containerPadding.right-c.imageBorderWidth.left-c.imageBorderWidth.right-20,j=l-c.containerPadding.top-c.containerPadding.bottom-c.imageBorderWidth.top-c.imageBorderWidth.bottom-c.options.positionFromTop-70,"svg"===e&&(0!==g.width&&0!==g.height||(f.width(k),f.height(j))),c.options.fitImagesInViewport?(c.options.maxWidth&&c.options.maxWidth<k&&(k=c.options.maxWidth),c.options.maxHeight&&c.options.maxHeight<j&&(j=c.options.maxHeight)):(k=c.options.maxWidth||g.width||k,j=c.options.maxHeight||g.height||j),(g.width>k||g.height>j)&&(g.width/k>g.height/j?(i=k,h=parseInt(g.height/(g.width/i),10),f.width(i),f.height(h)):(h=j,i=parseInt(g.width/(g.height/h),10),f.width(i),f.height(h))),c.sizeContainer(f.width(),f.height())},g.src=this.album[b].link,this.currentImageIndex=b},b.prototype.sizeOverlay=function(){var b=this;setTimeout(function(){b.$overlay.width(a(document).width()).height(a(document).height())},0)},b.prototype.sizeContainer=function(a,b){function c(){d.$lightbox.find(".lb-dataContainer").width(g),d.$lightbox.find(".lb-prevLink").height(h),d.$lightbox.find(".lb-nextLink").height(h),d.$overlay.focus(),d.showImage()}var d=this,e=this.$outerContainer.outerWidth(),f=this.$outerContainer.outerHeight(),g=a+this.containerPadding.left+this.containerPadding.right+this.imageBorderWidth.left+this.imageBorderWidth.right,h=b+this.containerPadding.top+this.containerPadding.bottom+this.imageBorderWidth.top+this.imageBorderWidth.bottom;e!==g||f!==h?this.$outerContainer.animate({width:g,height:h},this.options.resizeDuration,"swing",function(){c()}):c()},b.prototype.showImage=function(){this.$lightbox.find(".lb-loader").stop(!0).hide(),this.$lightbox.find(".lb-image").fadeIn(this.options.imageFadeDuration),this.updateNav(),this.updateDetails(),this.preloadNeighboringImages(),this.enableKeyboardNav()},b.prototype.updateNav=function(){var a=!1;try{document.createEvent("TouchEvent"),a=!!this.options.alwaysShowNavOnTouchDevices}catch(a){}this.$lightbox.find(".lb-nav").show(),this.album.length>1&&(this.options.wrapAround?(a&&this.$lightbox.find(".lb-prev, .lb-next").css("opacity","1"),this.$lightbox.find(".lb-prev, .lb-next").show()):(this.currentImageIndex>0&&(this.$lightbox.find(".lb-prev").show(),a&&this.$lightbox.find(".lb-prev").css("opacity","1")),this.currentImageIndex<this.album.length-1&&(this.$lightbox.find(".lb-next").show(),a&&this.$lightbox.find(".lb-next").css("opacity","1"))))},b.prototype.updateDetails=function(){var a=this;if(void 0!==this.album[this.currentImageIndex].title&&""!==this.album[this.currentImageIndex].title){var b=this.$lightbox.find(".lb-caption");this.options.sanitizeTitle?b.text(this.album[this.currentImageIndex].title):b.html(this.album[this.currentImageIndex].title),b.fadeIn("fast")}if(this.album.length>1&&this.options.showImageNumberLabel){var c=this.imageCountLabel(this.currentImageIndex+1,this.album.length);this.$lightbox.find(".lb-number").text(c).fadeIn("fast")}else this.$lightbox.find(".lb-number").hide();this.$outerContainer.removeClass("animating"),this.$lightbox.find(".lb-dataContainer").fadeIn(this.options.resizeDuration,function(){return a.sizeOverlay()})},b.prototype.preloadNeighboringImages=function(){if(this.album.length>this.currentImageIndex+1){(new Image).src=this.album[this.currentImageIndex+1].link}if(this.currentImageIndex>0){(new Image).src=this.album[this.currentImageIndex-1].link}},b.prototype.enableKeyboardNav=function(){this.$lightbox.on("keyup.keyboard",a.proxy(this.keyboardAction,this)),this.$overlay.on("keyup.keyboard",a.proxy(this.keyboardAction,this))},b.prototype.disableKeyboardNav=function(){this.$lightbox.off(".keyboard"),this.$overlay.off(".keyboard")},b.prototype.keyboardAction=function(a){var b=a.keyCode;27===b?(a.stopPropagation(),this.end()):37===b?0!==this.currentImageIndex?this.changeImage(this.currentImageIndex-1):this.options.wrapAround&&this.album.length>1&&this.changeImage(this.album.length-1):39===b&&(this.currentImageIndex!==this.album.length-1?this.changeImage(this.currentImageIndex+1):this.options.wrapAround&&this.album.length>1&&this.changeImage(0))},b.prototype.end=function(){this.disableKeyboardNav(),a(window).off("resize",this.sizeOverlay),this.$lightbox.fadeOut(this.options.fadeDuration),this.$overlay.fadeOut(this.options.fadeDuration),this.options.disableScrolling&&a("body").removeClass("lb-disable-scrolling")},new b});
//# sourceMappingURL=lightbox.min.map

//-------------------------------------------------------------------------------------------------------

//sticky
!function(t){"function"==typeof define&&define.amd?define(["jquery"],t):"object"==typeof module&&module.exports?module.exports=t(require("jquery")):t(jQuery)}(function(t){var e=Array.prototype.slice,i=Array.prototype.splice,n={topSpacing:0,bottomSpacing:0,className:"is-sticky",wrapperClassName:"sticky-wrapper",center:!1,getWidthFrom:"",widthFromWrapper:!0,responsiveWidth:!1,zIndex:"auto"},r=t(window),s=t(document),o=[],c=r.height(),a=function(){for(var e=r.scrollTop(),i=s.height(),n=i-c,a=e>n?n-e:0,p=0,d=o.length;p<d;p++){var l=o[p],u=l.stickyWrapper.offset().top,h=u-l.topSpacing-a;if(l.stickyWrapper.css("height",l.stickyElement.outerHeight()),e<=h)null!==l.currentTop&&(l.stickyElement.css({width:"",position:"",top:"","z-index":""}),l.stickyElement.parent().removeClass(l.className),l.stickyElement.trigger("sticky-end",[l]),l.currentTop=null);else{var g=i-l.stickyElement.outerHeight()-l.topSpacing-l.bottomSpacing-e-a;if(g<0?g+=l.topSpacing:g=l.topSpacing,l.currentTop!==g){var m;l.getWidthFrom?m=t(l.getWidthFrom).width()||null:l.widthFromWrapper&&(m=l.stickyWrapper.width()),null==m&&(m=l.stickyElement.width()),l.stickyElement.css("width",m).css("position","fixed").css("top",g).css("z-index",l.zIndex),l.stickyElement.parent().addClass(l.className),null===l.currentTop?l.stickyElement.trigger("sticky-start",[l]):l.stickyElement.trigger("sticky-update",[l]),l.currentTop===l.topSpacing&&l.currentTop>g||null===l.currentTop&&g<l.topSpacing?l.stickyElement.trigger("sticky-bottom-reached",[l]):null!==l.currentTop&&g===l.topSpacing&&l.currentTop<g&&l.stickyElement.trigger("sticky-bottom-unreached",[l]),l.currentTop=g}var y=l.stickyWrapper.parent(),f=l.stickyElement.offset().top+l.stickyElement.outerHeight()>=y.offset().top+y.outerHeight()&&l.stickyElement.offset().top<=l.topSpacing;f?l.stickyElement.css("position","absolute").css("top","").css("bottom",0).css("z-index",""):l.stickyElement.css("position","fixed").css("top",g).css("bottom","").css("z-index",l.zIndex)}}},p=function(){c=r.height();for(var e=0,i=o.length;e<i;e++){var n=o[e],s=null;n.getWidthFrom?n.responsiveWidth&&(s=t(n.getWidthFrom).width()):n.widthFromWrapper&&(s=n.stickyWrapper.width()),null!=s&&n.stickyElement.css("width",s)}},d={init:function(e){return this.each(function(){var i=t.extend({},n,e),r=t(this),s=r.attr("id"),c=s?s+"-"+n.wrapperClassName:n.wrapperClassName,a=t("<div></div>").attr("id",c).addClass(i.wrapperClassName);r.wrapAll(function(){if(0==t(this).parent("#"+c).length)return a});var p=r.parent();i.center&&p.css({width:r.outerWidth(),marginLeft:"auto",marginRight:"auto"}),"right"===r.css("float")&&r.css({float:"none"}).parent().css({float:"right"}),i.stickyElement=r,i.stickyWrapper=p,i.currentTop=null,o.push(i),d.setWrapperHeight(this),d.setupChangeListeners(this)})},setWrapperHeight:function(e){var i=t(e),n=i.parent();n&&n.css("height",i.outerHeight())},setupChangeListeners:function(t){if(window.MutationObserver){var e=new window.MutationObserver(function(e){(e[0].addedNodes.length||e[0].removedNodes.length)&&d.setWrapperHeight(t)});e.observe(t,{subtree:!0,childList:!0})}else window.addEventListener?(t.addEventListener("DOMNodeInserted",function(){d.setWrapperHeight(t)},!1),t.addEventListener("DOMNodeRemoved",function(){d.setWrapperHeight(t)},!1)):window.attachEvent&&(t.attachEvent("onDOMNodeInserted",function(){d.setWrapperHeight(t)}),t.attachEvent("onDOMNodeRemoved",function(){d.setWrapperHeight(t)}))},update:a,unstick:function(e){return this.each(function(){for(var e=this,n=t(e),r=-1,s=o.length;s-- >0;)o[s].stickyElement.get(0)===e&&(i.call(o,s,1),r=s);r!==-1&&(n.unwrap(),n.css({width:"",position:"",top:"",float:"","z-index":""}))})}};window.addEventListener?(window.addEventListener("scroll",a,!1),window.addEventListener("resize",p,!1)):window.attachEvent&&(window.attachEvent("onscroll",a),window.attachEvent("onresize",p)),t.fn.sticky=function(i){return d[i]?d[i].apply(this,e.call(arguments,1)):"object"!=typeof i&&i?void t.error("Method "+i+" does not exist on jQuery.sticky"):d.init.apply(this,arguments)},t.fn.unstick=function(i){return d[i]?d[i].apply(this,e.call(arguments,1)):"object"!=typeof i&&i?void t.error("Method "+i+" does not exist on jQuery.sticky"):d.unstick.apply(this,arguments)},t(function(){setTimeout(a,0)})});
//# sourceMappingURL=jquery.sticky.min.js.map

$(document).ready(function(){
  $("#sticker").sticky({topSpacing:0});
});

 * jQuery Cookie Plugin v1.4.1
 * https://github.com/carhartl/jquery-cookie
 *
 * Copyright 2013 Klaus Hartl
 * Released under the MIT license
 */
(function (factory) {
	if (typeof define === 'function' && define.amd) {
		// AMD
		define(['jquery'], factory);
	} else if (typeof exports === 'object') {
		// CommonJS
		factory(require('jquery'));
	} else {
		// Browser globals
		factory(jQuery);
	}
}(function ($) {

	var pluses = /\+/g;

	function encode(s) {
		return config.raw ? s : encodeURIComponent(s);
	}

	function decode(s) {
		return config.raw ? s : decodeURIComponent(s);
	}

	function stringifyCookieValue(value) {
		return encode(config.json ? JSON.stringify(value) : String(value));
	}

	function parseCookieValue(s) {
		if (s.indexOf('"') === 0) {
			// This is a quoted cookie as according to RFC2068, unescape...
			s = s.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, '\\');
		}

		try {
			// Replace server-side written pluses with spaces.
			// If we can't decode the cookie, ignore it, it's unusable.
			// If we can't parse the cookie, ignore it, it's unusable.
			s = decodeURIComponent(s.replace(pluses, ' '));
			return config.json ? JSON.parse(s) : s;
		} catch(e) {}
	}

	function read(s, converter) {
		var value = config.raw ? s : parseCookieValue(s);
		return $.isFunction(converter) ? converter(value) : value;
	}

	var config = $.cookie = function (key, value, options) {

		// Write

		if (value !== undefined && !$.isFunction(value)) {
			options = $.extend({}, config.defaults, options);

			if (typeof options.expires === 'number') {
				var days = options.expires, t = options.expires = new Date();
				t.setTime(+t + days * 864e+5);
			}

			return (document.cookie = [
				encode(key), '=', stringifyCookieValue(value),
				options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
				options.path    ? '; path=' + options.path : '',
				options.domain  ? '; domain=' + options.domain : '',
				options.secure  ? '; secure' : ''
			].join(''));
		}

		// Read

		var result = key ? undefined : {};

		// To prevent the for loop in the first place assign an empty array
		// in case there are no cookies at all. Also prevents odd result when
		// calling $.cookie().
		var cookies = document.cookie ? document.cookie.split('; ') : [];

		for (var i = 0, l = cookies.length; i < l; i++) {
			var parts = cookies[i].split('=');
			var name = decode(parts.shift());
			var cookie = parts.join('=');

			if (key && key === name) {
				// If second argument (value) is a function it's a converter...
				result = read(cookie, value);
				break;
			}

			// Prevent storing a cookie that we couldn't decode.
			if (!key && (cookie = read(cookie)) !== undefined) {
				result[name] = cookie;
			}
		}

		return result;
	};

	config.defaults = {};

	$.removeCookie = function (key, options) {
		if ($.cookie(key) === undefined) {
			return false;
		}

		// Must not alter options, thus extending a fresh object...
		$.cookie(key, '', $.extend({}, options, { expires: -1 }));
		return !$.cookie(key);
	};

}));

$(document).ready(function() {
    var last=$.cookie('activeAccordionGroup');
    if (last!=null) {
        //remove default collapse settings
        $(".fixed-sidebar-left .side-nav li > ul.collapse").removeClass('in');
        //show the account_last visible group
        $("#" + last).addClass("in");
    }
});



