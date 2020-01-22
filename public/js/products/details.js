/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/products/details.js":
/*!******************************************!*\
  !*** ./resources/js/products/details.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

$(document).ready(function (e) {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  var getComments = __webpack_require__(/*! ./inc/functions */ "./resources/js/products/inc/functions.js").getComments;

  getComments($("input[name='p']").attr('value'), 1); // display image product

  $("#product-image").on("click", function () {
    var img = $(this).clone();
    var element = $("<div id=\"img-zoomed\" style=\"position: fixed; top: 0; right: 0; left: 0; bottom: 0; background: rgba(0,0,0,.4);text-align: center; overflow: scroll;\">\n                <div id=\"close\" style=\"position: relative; height:1.5rem; left:0; right:0;font-size: 1.2rem;cursor: pointer;\">\n                    <i style=\"color: white; position: absolute; right:15px;\" class=\"fas fa-times\"></i>\n                </div>\n                <div margin-top:1.5rem; class=\"image-container\"></div>\n            </div>\n            ");
    img.css("maxHeight", "");
    img.css("verticalAlign", "center");
    img.removeClass("img-fluid");
    $("body").append(element);
    element.find(".image-container").html(img);
    $("body").css("overflow-y", "hidden");
    $("#close>i").on("click", function () {
      $("body").css("overflow-y", "scroll");
      $("#img-zoomed").remove();
    });
  }); // add to chart

  $("#add-chart-form").on("submit", function (e) {
    e.preventDefault();
    $.ajax({
      url: e.target.action,
      method: "POST",
      data: $(this).serialize()
    }).done(function (data) {
      $("#success-chart-add").modal("show");
      $("#pannier-sum").text(data.totalPrice + " DH");
    }).fail(function (response) {
      alert("Erreur");
    });
  }); // add comment with ajax

  $("#add-comment-form").on("submit", function (e) {
    e.preventDefault();
    $("#add-comment-form input:not([type='hidden']), #add-comment-form textarea").removeClass('border-danger');
    $("#add-comment-form span[class*='form-error']").remove();
    $.ajax({
      url: e.target.action,
      method: "POST",
      data: $(this).serialize()
    }).done(function (data) {
      $("#statistics").html(data.rate);
      $("#success-comment-add").modal("show");
      getComments($("input[name='p']").attr('value'), 1);
    }).fail(function (error) {
      if (error.status === 400) {
        var errors = error.responseJSON.errors;
        var fields = ["name", "email", "comment", "rating"];
        fields.forEach(function (value) {
          if (errors.hasOwnProperty(value)) {
            var input = $("#add-comment-form input[name='".concat(value, "'], #add-comment-form textarea[name='").concat(value, "']"));
            input.addClass("border-danger");
            input.parent().html(input.parent().html() + "<span class=\"form-error text-danger\">".concat(errors[value], "</span>"));
          }
        });
      }
    });
  }); // rating system

  $('#rating .fa-star').on('click', function (e) {
    var stars = $('#rating .fa-star'),
        found = false;
    var clicked = $(this);
    stars.each(function (index, element) {
      if (found) {
        $(this).removeClass("fas");
        $(this).addClass("far");
      } else {
        $(this).removeClass("far");
        $(this).addClass("fas");
      }

      if ($(this).is(clicked)) {
        found = true;
        $("input[name='rating']").attr("value", index + 1);
      }
    });
  });
});

/***/ }),

/***/ "./resources/js/products/inc/functions.js":
/*!************************************************!*\
  !*** ./resources/js/products/inc/functions.js ***!
  \************************************************/
/*! exports provided: addPriceRange, getProducts, addAjaxDefault, removeAutoComplition, getComments */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "addPriceRange", function() { return addPriceRange; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getProducts", function() { return getProducts; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "addAjaxDefault", function() { return addAjaxDefault; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "removeAutoComplition", function() { return removeAutoComplition; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getComments", function() { return getComments; });
function animateScroll(parent, to) {
  $(parent).animate({
    scrollTop: $(to).offset().top - 60
  }, 1000);
}
/**
 * @function addPriceRange
 * @desc display selected prices
 * @param {Integer} min min value
 * @param {Integer} max max value
 * */


function addPriceRange(min, max) {
  $("#price-range").html("<span>".concat(min, " DH</span> - <span>").concat(max, " DH</span>"));
}
/**
 * @function getProducts
 * @desc function to get filtered products with ajax and inject them in products section
 * @param {string} url page to call with ajax
 * @param page pagination page
 * */

function getProducts(url, page) {
  $.ajax({
    method: "POST",
    data: $("#product-filter").serialize() + "&page=" + page,
    dataType: "json",
    url: url
  }).done(function (data) {
    if (data.count == 0) {
      $("#products").html("<div class=\"alert alert-danger text-center w-100\"><strong>Ooops ! </strong>Acune Produit Trouv\xE9</div>");
      $("#pagiantion").html("");
      return;
    }

    $("#products").html(data.html);
    $("#pagiantion").html(data.links);
    animateScroll("html", "#products");
    $("#pagiantion a").on("click", function (e) {
      e.preventDefault();
      getProducts('http://el-gamer.com/produits', parseInt(e.target.href.split("?page=")[1]));
    });
  }).fail(function (response) {
    alert("Ooops un erreur occure");
  });
}
/**
 * @function addAjaxDefault
 * @desc function to add click event to pagination links
 * */

function addAjaxDefault() {
  $("#pagiantion a").on("click", function (e) {
    e.preventDefault();
    $.ajax({
      method: "GET",
      url: 'http://el-gamer.com/produits?page=' + parseInt(e.target.href.split("?page=")[1])
    }).done(function (data) {
      $("#products").html(data.html);
      $("#pagiantion").html(data.links);
      animateScroll("html", "#products");
      addAjaxDefault();
    }).fail(function (response) {
      console.error("getting products is fails");
    });
  });
}
function removeAutoComplition() {
  $("#auto-completion").addClass("d-none");
  $("#auto-completion").children().remove();
}
function getComments(product, page) {
  $.ajax({
    method: "post",
    url: "/comment/" + product,
    data: {
      'page': page
    }
  }).done(function (data) {
    $("#comments-section").html(data.html);
    $("#comments-section .links a").on("click", function (e) {
      e.preventDefault();
      getComments($("input[name='p']").attr("value"), parseInt(e.target.href.split("?page=")[1]));
      animateScroll("html", $("#comments-section"));
    });
  }).fail(function (error) {
    alert("un erreur occure");
  });
}

/***/ }),

/***/ 1:
/*!************************************************!*\
  !*** multi ./resources/js/products/details.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/suicv/Sites/ecommerceporject/resources/js/products/details.js */"./resources/js/products/details.js");


/***/ })

/******/ });