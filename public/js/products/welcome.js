!function(t){var n={};function e(o){if(n[o])return n[o].exports;var r=n[o]={i:o,l:!1,exports:{}};return t[o].call(r.exports,r,r.exports,e),r.l=!0,r.exports}e.m=t,e.c=n,e.d=function(t,n,o){e.o(t,n)||Object.defineProperty(t,n,{enumerable:!0,get:o})},e.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},e.t=function(t,n){if(1&n&&(t=e(t)),8&n)return t;if(4&n&&"object"==typeof t&&t&&t.__esModule)return t;var o=Object.create(null);if(e.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:t}),2&n&&"string"!=typeof t)for(var r in t)e.d(o,r,function(n){return t[n]}.bind(null,r));return o},e.n=function(t){var n=t&&t.__esModule?function(){return t.default}:function(){return t};return e.d(n,"a",n),n},e.o=function(t,n){return Object.prototype.hasOwnProperty.call(t,n)},e.p="/",e(e.s=1)}([function(t,n,e){"use strict";function o(t,n){$(t).animate({scrollTop:$(n).offset().top-60},1e3)}function r(t,n){$("#price-range").html("<span>".concat(t," DH</span> - <span>").concat(n," DH</span>"))}function i(t,n){$.ajax({method:"POST",data:$("#product-filter").serialize()+"&page="+n,dataType:"json",url:t}).done((function(t){if(0==t.count)return $("#products").html('<div class="alert alert-danger text-center w-100"><strong>Ooops ! </strong>Acune Produit Trouvé</div>'),void $("#pagiantion").html("");$("#products").html(t.html),$("#pagiantion").html(t.links),o("html","#products"),$("#pagiantion a").on("click",(function(t){t.preventDefault(),i("http://el-gamer.com/produits",parseInt(t.target.href.split("?page=")[1]))}))})).fail((function(t){alert("Ooops un erreur occure")}))}function a(){$("#pagiantion a").on("click",(function(t){t.preventDefault(),$.ajax({method:"GET",url:"http://el-gamer.com/produits?page="+parseInt(t.target.href.split("?page=")[1])}).done((function(t){$("#products").html(t.html),$("#pagiantion").html(t.links),o("html","#products"),a()})).fail((function(t){console.error("getting products is fails")}))}))}function u(){$("#auto-completion").addClass("d-none"),$("#auto-completion").children().remove()}function c(t,n){$.ajax({method:"post",url:"/comment/"+t,data:{page:n}}).done((function(t){$("#comments-section").html(t.html),$("#comments-section .links a").on("click",(function(t){t.preventDefault(),c($("input[name='p']").attr("value"),parseInt(t.target.href.split("?page=")[1])),o("html",$("#comments-section"))}))})).fail((function(t){alert("un erreur occure")}))}e.r(n),e.d(n,"addPriceRange",(function(){return r})),e.d(n,"getProducts",(function(){return i})),e.d(n,"addAjaxDefault",(function(){return a})),e.d(n,"removeAutoComplition",(function(){return u})),e.d(n,"getComments",(function(){return c}))},function(t,n,e){e(2),e(7),e(12),e(14),e(16),e(18),t.exports=e(20)},function(t,n,e){!function(){var t=e(0);t.addAjaxDefault(),$("#product-filter").on("submit",(function(n){n.preventDefault(),t.getProducts("http://el-gamer.com/produits",1)}));var n=$("#min-price").val(),o=$("#max-price").val();$("input[type='range']").on("change",(function(e){maxPrice=$("#max-price"),minPrice=$("#min-price"),"min-price"===this.id?this.value<=parseFloat(maxPrice.val())?(t.addPriceRange(this.value,maxPrice.val()),n=this.value):this.value=n:"max-price"===this.id&&(this.value>=parseFloat(minPrice.val())?(t.addPriceRange(minPrice.val(),this.value),o=this.value):this.value=o)})),$("#search").on("keyup",(function(n){$(this).val()?($("#auto-completion").hasClass("d-none")&&$("#auto-completion").removeClass("d-none"),$.ajax({url:$("#search-form").attr("target"),method:"post",data:$("#search-form").serialize()}).done((function(t){$("#auto-completion").html(t.html)})).fail((function(t){console.log(t)}))):t.removeAutoComplition()})),$(document).on("click",(function(n){t.removeAutoComplition()}))}($)},,,,,function(t,n){},,,,,function(t,n){},,function(t,n){},,function(t,n){},,function(t,n){},,function(t,n){}]);