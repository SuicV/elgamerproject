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
/***/ (function(module, exports) {

$(document).ready(function (e) {
  // display image product
  $("#product-image").on("click", function () {
    var img = $(this).clone();
    var element = $("<div id=\"img-zoomed\" style=\"position: fixed; top: 0; right: 0; left: 0; bottom: 0; background: rgba(0,0,0,.4);text-align: center; overflow: scroll;\">\n            <div id=\"close\" style=\"position: fixed; right: 1.3rem; font-size: 1.5rem;cursor: pointer;\"><i style=\"color: black;\" class=\"fas fa-times\"></i></div>\n            </div>\n            ");
    img.css("maxHeight", "");
    img.css("verticalAlign", "center");
    img.removeClass("img-fluid");
    element.append(img);
    $("body").append(element);
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
      $("#comments-section").html(data.html);
    }).fail(function (error) {
      if (error.status === 400) {
        var errors = error.responseJSON.errors;
        var fields = ["name", "email", "comment"];
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

/***/ 1:
/*!************************************************!*\
  !*** multi ./resources/js/products/details.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/suicv/Sites/ecommerceporject/resources/js/products/details.js */"./resources/js/products/details.js");


/***/ })

/******/ });