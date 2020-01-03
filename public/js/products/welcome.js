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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/products/inc/functions.js":
/*!************************************************!*\
  !*** ./resources/js/products/inc/functions.js ***!
  \************************************************/
/*! exports provided: addPriceRange, getProducts, addAjaxDefault, removeAutoComplition */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "addPriceRange", function() { return addPriceRange; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getProducts", function() { return getProducts; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "addAjaxDefault", function() { return addAjaxDefault; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "removeAutoComplition", function() { return removeAutoComplition; });
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

/***/ }),

/***/ "./resources/js/products/welcome.js":
/*!******************************************!*\
  !*** ./resources/js/products/welcome.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

(function () {
  // requiring function file
  var funcs = __webpack_require__(/*! ./inc/functions */ "./resources/js/products/inc/functions.js");
  /* Events */
  // add default event to pagination links


  funcs.addAjaxDefault(); // add event on submit of filter form

  $("#product-filter").on("submit", function (e) {
    e.preventDefault();
    funcs.getProducts('http://el-gamer.com/produits', 1);
  }); // add change event on prices range input

  var oldMinPrice = $("#min-price").val(),
      oldMaxPrice = $("#max-price").val();
  $("input[type='range']").on("change", function (e) {
    maxPrice = $("#max-price");
    minPrice = $("#min-price");

    if (this.id === "min-price") {
      if (this.value <= parseFloat(maxPrice.val())) {
        funcs.addPriceRange(this.value, maxPrice.val());
        oldMinPrice = this.value;
      } else {
        this.value = oldMinPrice;
      }
    } else if (this.id === "max-price") {
      if (this.value >= parseFloat(minPrice.val())) {
        funcs.addPriceRange(minPrice.val(), this.value);
        oldMaxPrice = this.value;
      } else {
        this.value = oldMaxPrice;
      }
    }
  }); // auto completion de recherche

  $("#search").on("keyup", function (e) {
    if (!$(this).val()) {
      funcs.removeAutoComplition();
      return;
    }

    if ($("#auto-completion").hasClass("d-none")) {
      $("#auto-completion").removeClass("d-none");
    }

    $.ajax({
      url: $("#search-form").attr("target"),
      method: "post",
      data: $("#search-form").serialize()
    }).done(function (data) {
      $("#auto-completion").html(data.html);
    }).fail(function (e) {
      console.log(e);
    });
  });
  $(document).on("click", function (e) {
    funcs.removeAutoComplition();
  });
})($);

/***/ }),

/***/ "./resources/sass/chart/welcome.scss":
/*!*******************************************!*\
  !*** ./resources/sass/chart/welcome.scss ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/contact.scss":
/*!*************************************!*\
  !*** ./resources/sass/contact.scss ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/produits/details.scss":
/*!**********************************************!*\
  !*** ./resources/sass/produits/details.scss ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/produits/welcome.scss":
/*!**********************************************!*\
  !*** ./resources/sass/produits/welcome.scss ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/purchase/welcome.scss":
/*!**********************************************!*\
  !*** ./resources/sass/purchase/welcome.scss ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/welcome.scss":
/*!*************************************!*\
  !*** ./resources/sass/welcome.scss ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*********************************************************************************************************************************************************************************************************************************************************************!*\
  !*** multi ./resources/js/products/welcome.js ./resources/sass/welcome.scss ./resources/sass/contact.scss ./resources/sass/produits/details.scss ./resources/sass/produits/welcome.scss ./resources/sass/purchase/welcome.scss ./resources/sass/chart/welcome.scss ***!
  \*********************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /home/suicv/Sites/ecommerceporject/resources/js/products/welcome.js */"./resources/js/products/welcome.js");
__webpack_require__(/*! /home/suicv/Sites/ecommerceporject/resources/sass/welcome.scss */"./resources/sass/welcome.scss");
__webpack_require__(/*! /home/suicv/Sites/ecommerceporject/resources/sass/contact.scss */"./resources/sass/contact.scss");
__webpack_require__(/*! /home/suicv/Sites/ecommerceporject/resources/sass/produits/details.scss */"./resources/sass/produits/details.scss");
__webpack_require__(/*! /home/suicv/Sites/ecommerceporject/resources/sass/produits/welcome.scss */"./resources/sass/produits/welcome.scss");
__webpack_require__(/*! /home/suicv/Sites/ecommerceporject/resources/sass/purchase/welcome.scss */"./resources/sass/purchase/welcome.scss");
module.exports = __webpack_require__(/*! /home/suicv/Sites/ecommerceporject/resources/sass/chart/welcome.scss */"./resources/sass/chart/welcome.scss");


/***/ })

/******/ });