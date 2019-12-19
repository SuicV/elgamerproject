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
/*! exports provided: getHtmlProduct, addPriceRange, paginationLinks, getProducts, addAjaxDefault */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getHtmlProduct", function() { return getHtmlProduct; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "addPriceRange", function() { return addPriceRange; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "paginationLinks", function() { return paginationLinks; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getProducts", function() { return getProducts; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "addAjaxDefault", function() { return addAjaxDefault; });
/**
 * @function getHtmlProduct
 * @desc create an html text for products got from ajax request
 * @param products array of products
 * @return {string} html text of products
 * */
function getHtmlProduct(products) {
  var html = '';
  products.forEach(function (product) {
    html += "<a href=\"http://el-gamer.com/produits/".concat(product.id, "\" class=\"col-12 col-md-4 my-3 product-container\">\n                            <div class=\"product-container border h-100\">\n                                <div class=\"img-product text-center\">\n                                    <img class=\"img-fluid product-image\" src=\"http://el-gamer.com/imgs/").concat(product.image, "\" />\n                                </div>\n                                <div class=\"product-inf mt-2 mx-2\">\n                                    <h5 class=\"product-title text-center\">").concat(product.title, "</h5>\n                                    <p class=\"product-descr\">").concat(product.description.substr(0, 50), " ...</p>\n                                    <p class=\"product-price\">Prix : <span class=\"proudct-price-number\">").concat(product.price, "DH</span></p>\n\n                                </div>\n                            </div>\n                        </a>");
  });
  return html;
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
 * @function paginationLinks
 * @desc function to generate html for pagination links
 * @param {Integer} min minimum page
 * @param {Integer} max maximal page
 * @param {Integer} selected selected page
 * @return {string} html to inject
 * */

function paginationLinks(min, max, selected) {
  if (min === max) {
    return "";
  }

  var pagHtml = "<nav><ul class=\"pagination\">";

  if (min === selected) {
    pagHtml += "<li class=\"page-item disabled\" aria-disabled=\"true\" aria-label=\"\xAB Pr\xE9c\xE9dent\">\n                    <span class=\"page-link\" aria-hidden=\"true\">\u2039</span>\n                </li>";
  } else {
    pagHtml += "<li class=\"page-item\" aria-disabled=\"true\" aria-label=\"\xAB Pr\xE9c\xE9dent\">\n                    <a href=\"http://el-gamer.com/produits?page=".concat(selected - 1, "\" rel=\"prev\" class=\"page-link\">\u2039</a>\n                </li>");
  }

  for (var i = min; i <= max; i++) {
    if (i === selected) {
      pagHtml += "<li class=\"page-item active\" aria-current=\"page\">\n                                        <span class=\"page-link\">".concat(i, "</span>\n                                    </li>");
    } else {
      pagHtml += "<li class=\"page-item\">\n                                        <a href=\"http://el-gamer.com/produits?page=".concat(i, "\" class=\"page-link\">").concat(i, "</a>\n                                    </li>");
    }
  }

  if (max === selected) {
    pagHtml += "<li class=\"page-item disabled\" aria-disabled=\"true\" aria-label=\"Suivant \xBB\">\n                    <span class=\"page-link\" aria-hidden=\"true\">\u203A</span>\n                </li>";
  } else {
    pagHtml += "<li class=\"page-item\" aria-disabled=\"true\" aria-label=\"Suivant \xBB\">\n                    <a href=\"http://el-gamer.com/produits/?page=".concat(selected + 1, "\" rel=\"next\" class=\"page-link\">\u203A</a>\n                </li>");
  }

  return pagHtml;
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
    if (data.data.length === 0) {
      $("#products").html("<div class=\"alert alert-danger text-center w-100\"><strong>Ooops ! </strong>Acune Produit Trouv\xE9</div>");
      $("#pagiantion").html("");
      return;
    }

    $("#products").html(getHtmlProduct(data.data));
    $("#pagiantion").html(paginationLinks(1, data.last_page, data.current_page));
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
      $("#products").html(getHtmlProduct(data.data));
      $("#pagiantion").html(paginationLinks(1, data.last_page, data.current_page));
      addAjaxDefault();
    }).fail(function (response) {
      console.log(response);
      console.error("getting products is fails");
    });
  });
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